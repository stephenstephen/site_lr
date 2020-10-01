<?php
namespace FluentFormPro\classes;

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

use FluentForm\App\Modules\Form\Form;
use FluentForm\App\Services\FormBuilder\ShortCodeParser;
use FluentForm\Framework\Helpers\ArrayHelper;

class ResendNotificationHandler
{
    public function resend()
    {
        $notificationId = intval(ArrayHelper::get($_REQUEST, 'notification_id'));
        $formId = intval(ArrayHelper::get($_REQUEST, 'form_id'));
        $entryId = intval(ArrayHelper::get($_REQUEST, 'entry_id'));

        $entryIds = [];
        if(!empty($_REQUEST['entry_ids'])) {
            $entryIds = array_filter(ArrayHelper::get($_REQUEST, 'entry_ids', []), 'intval');
        }

        $sendToType = sanitize_text_field(ArrayHelper::get($_REQUEST, 'send_to_type'));
        $customRecipient = sanitize_text_field(ArrayHelper::get($_REQUEST, 'send_to_custom_email'));

        $feed = wpFluent()->table('fluentform_form_meta')
                            ->where('id', $notificationId)
                            ->where('meta_key', 'notifications')
                            ->where('form_id', $formId)
                            ->first();

        if(!$feed) {
            wp_send_json_error([
                'message' => __('Sorry, No notification found!')
            ], 423);
        }


        $feed->value = \json_decode($feed->value, true);

        $form = wpFluent()->table('fluentform_forms')
            ->where('id', $formId)
            ->first();

        if($entryId) {
            $this->resendEntryEmail($entryId, $feed, $sendToType, $customRecipient, $form);
        } else if($entryIds) {
            foreach ($entryIds as $entry_id) {
                $this->resendEntryEmail($entry_id, $feed, $sendToType, $customRecipient, $form);
            }
        }

        wp_send_json_success([
            'message' => 'Notification successfully resent'
        ], 200);
    }


    private function resendEntryEmail($entryId, $feed, $sendToType, $customRecipient, $form)
    {
        $parsedValue = $feed->value;
        $entry = wpFluent()->table('fluentform_submissions')
            ->where('id', $entryId)
            ->first();

        $formData = \json_decode($entry->response, true);
        $processedValues = ShortCodeParser::parse($parsedValue, $entry, $formData);

        if($sendToType == 'custom') {
            $processedValues['bcc'] = '';
            $processedValues['sendTo']['email'] = $customRecipient;
        }

        $attachments = [];
        if(!empty($processedValues['attachments']) && is_array($processedValues['attachments'])) {
            foreach ($processedValues['attachments'] as $name) {
                $fileUrls = ArrayHelper::get($formData, $name);
                if($fileUrls && is_array($fileUrls)) {
                    foreach ($fileUrls as $url) {
                        $filePath = str_replace(
                            site_url(''),
                            wp_normalize_path( untrailingslashit( ABSPATH ) ),
                            $url
                        );
                        if(file_exists($filePath)) {
                            $attachments[] = $filePath;
                        }
                    }
                }
            }
        }

        // let others to apply attachments
        $attachments = apply_filters('fluentform_email_attachments', $attachments, $processedValues, $formData, $entry, $form);

        $processedValues['attachments'] = $attachments;

        $enabledFeed = [
            'id'       => $feed->id,
            'meta_key' => $feed->meta_key,
            'settings' => $parsedValue,
            'processedValues' => $processedValues
        ];

        add_action('wp_mail_failed', function ($error) {
            $reason = $error->get_error_message();
            wp_send_json_error([
                'message' => "Email Notification failed to sent. Reason: " . $reason
            ], 423);
        }, 10, 1);

        $notifier = wpFluentForm()->make(
            'FluentForm\App\Services\FormBuilder\Notifications\EmailNotification'
        );
        $notifier->notify($enabledFeed['processedValues'], $formData, $form, $entry->id);
    }

}