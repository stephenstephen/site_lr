<?php

namespace FluentFormPro\Payments\Classes;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

use FluentForm\App\Modules\Acl\Acl;
use FluentFormPro\Payments\PaymentHelper;

class PaymentEntries
{

    public function init()
    {
        add_action('flunetform_render_payment_entries', array($this, 'loadApp'));
        
        add_action('wp_ajax_fluentform_get_payments', array($this, 'getPayments'));
        
    }

    public function loadApp()
    {
        wp_enqueue_script('ff-payment-entries', FLUENTFORMPRO_DIR_URL . 'public/js/payment-entries.js', ['jquery'], FLUENTFORMPRO_VERSION, true);

        do_action('fluentform_global_menu');
        echo '<div id="ff_payment_entries"><ff-payment-entries></ff-payment-entries></div>';
    }

    public function getPayments()
    {
        Acl::verify('fluentform_settings_capability');
        $perPage = intval($_REQUEST['per_page']);
        if(!$perPage) {
            $perPage = 10;
        }
        $page = intval($_REQUEST['current_page']);
        if(!$page) {
            $page = 1;
        }

        $offset = ($page - 1) * $perPage;
        $paymentsQuery = wpFluent()->table('fluentform_transactions')
            ->select([
                'fluentform_transactions.id',
                'fluentform_transactions.form_id',
                'fluentform_transactions.submission_id',
                'fluentform_transactions.transaction_type',
                'fluentform_transactions.payment_method',
                'fluentform_transactions.payment_mode',
                'fluentform_transactions.charge_id',
                'fluentform_transactions.card_brand',
                'fluentform_transactions.payment_total',
                'fluentform_transactions.created_at',
                'fluentform_transactions.payer_name',
                'fluentform_transactions.status',
                'fluentform_transactions.currency',
                'fluentform_forms.title'
            ])
            ->join('fluentform_forms', 'fluentform_forms.id', '=', 'fluentform_transactions.form_id')
            ->limit($perPage)
            ->offset($offset)
            ->orderBy('fluentform_transactions.id', 'DESC');

        $total = $paymentsQuery->count();

        $payments = $paymentsQuery->get();

        foreach ($payments as $payment) {
            $payment->formatted_payment_total = PaymentHelper::formatMoney($payment->payment_total, $payment->currency);
            $payment->entry_url = admin_url('admin.php?page=fluent_forms&route=entries&form_id='.$payment->form_id.'#/entries/'.$payment->submission_id);
            if($payment->payment_method == 'test') {
                $payment->payment_method = 'offline';
            }
        }

        wp_send_json_success([
            'payments' => $payments,
            'total' => $total,
            'last_page' => ceil($total/$perPage)
        ]);

    }
}