<?php

namespace SHORTCODE_ADDONS_UPLOAD\Mailchimp\Admin;

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Description of Style_5
 * Content of Shortcode Addons Plugins
 *
 * @author $biplob018
 */

use SHORTCODE_ADDONS\Core\AdminStyle;
use SHORTCODE_ADDONS\Core\Admin\Controls as Controls;

class Style_5 extends AdminStyle
{

    public function register_controls()
    {

        $this->start_section_header(
            'shortcode-addons-start-tabs',
            [
                'options' => [
                    'general-settings' => esc_html__('General Settings', SHORTCODE_ADDOONS),
                    'button' => esc_html__('Button', SHORTCODE_ADDOONS),
                ]
            ]
        );
        $this->start_section_tabs(
            'shortcode-addons-start-tabs',
            [
                'condition' => [
                    'shortcode-addons-start-tabs' => 'general-settings'
                ]
            ]
        );

        $this->start_section_devider();
        $this->start_controls_section(
            'shortcode-addons',
            [
                'label' => esc_html__('General Settings', SHORTCODE_ADDOONS),
                'showing' => TRUE,
            ]
        );

        $this->add_control(
            'sa_mail_chimp_api',
            $this->style,
            [
                'label' => __('API Key', SHORTCODE_ADDOONS),
                'type' => Controls::TEXT,
                'default' => ' ',
            ]
        );
        $this->add_control(
            'sa_mail_chimp_audience_id',
            $this->style,
            [
                'label' => __('Audience Id', SHORTCODE_ADDOONS),
                'type' => Controls::TEXT,
                'default' => '',
            ]
        );
        $this->add_group_control(
            'sa_mail_chimp_main_background',
            $this->style,
            [
                'type' => Controls::BACKGROUND,
                'selector' => [
                    '{{WRAPPER}} .oxi-addons-mailchimp-style-5' => ''
                ],
            ]
        );
        $this->add_responsive_control(
            'sa_mail_chimp_main_width',
            $this->style,
            [
                'label' => __('Max  Width', SHORTCODE_ADDOONS),
                'type' => Controls::SLIDER, 
                'default' => [
                    'unit' => 'px',
                    'size' => 500,
                ], 
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1300,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 50,
                        'max' => 250,
                        'step' => 1,
                    ],
                    'em' => [
                        'min' => 10,
                        'max' => 50,
                        'step' => 0.1,
                    ], 
                ], 
                'selector' => [
                    '{{WRAPPER}}  .oxi-addons-mailchimp-style-5' => 'max-width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'sa_mail_chimp_main_padding',
            $this->style,
            [
                'label' => __('Padding', SHORTCODE_ADDOONS),
                'type' => Controls::DIMENSIONS,
                'default' => [
                    'unit' => 'px',
                    'size' => '',
                ],
                'range' => [
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => .1,
                    ],
                    'px' => [
                        'min' => 0,
                        'max' => 700,
                        'step' => 1,
                    ],
                    'em' => [
                        'min' => 0,
                        'max' => 50,
                        'step' => .1,
                    ],
                ],
                'selector' => [
                    '{{WRAPPER}} .oxi-addons-mailchimp-style-5' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'shortcode-addons',
            [
                'label' => esc_html__('Alert Settings', SHORTCODE_ADDOONS),
                'showing' => FALSE,
            ]
        );

        $this->add_control(
            'sa_mail_chimp_audience_success',
            $this->style,
            [
                'label' => __('Success Alert Text', SHORTCODE_ADDOONS),
                'type' => Controls::TEXT,
                'default' => 'You have Subscribed Successfully!',
                'placeholder' => 'You have Subscribed Successfully!',
            ]
        );
        $this->add_control(
            'sa_mail_chimp_audience_error',
            $this->style,
            [
                'label' => __('Error Alert Text', SHORTCODE_ADDOONS),
                'type' => Controls::TEXT,
                'default' => 'You\'re Already Subscribed!',
                'placeholder' => 'You\'re Already Subscribed!',
            ]
        );

        $this->add_group_control(
            'sa_mail_chimp_input_typo',
            $this->style,
            [
                'label' => __('Typography', SHORTCODE_ADDOONS),
                'type' => Controls::TYPOGRAPHY,
                'include' => Controls::ALIGNNORMAL,
                'selector' => [
                    '{{WRAPPER}} .oxi-addons-mailchimp-style-5 .oxi-addons-mailchimp-alert .oxi-addons-mailchimp-alert-text' => ''
                ],
            ]
        );
        $this->start_controls_tabs(
            'shortcode-addons-start-tabs',
            [
                'options' => [
                    'normal' => esc_html__('Success', SHORTCODE_ADDOONS),
                    'hover' => esc_html__('Error', SHORTCODE_ADDOONS),
                ]
            ]
        );
        $this->start_controls_tab();
        $this->add_control(
            'sa_mail_chimp_success_color',
            $this->style,
            [
                'label' => __('  Color', SHORTCODE_ADDOONS),
                'type' => Controls::COLOR,
                'default' => '#fff',
                'selector' => [
                    '{{WRAPPER}} .oxi-addons-mailchimp-style-5 .oxi-addons-mailchimp-success-text' => 'color:{{VALUE}};'
                ],
            ]
        );
        $this->add_control(
            'sa_mail_chimp_success_bg_color',
            $this->style,
            [
                'label' => __('Background Color', SHORTCODE_ADDOONS),
                'type' => Controls::COLOR,
                'default' => '#536fbd',
                'operator' => 'RGB',
                'selector' => [
                    '{{WRAPPER}} .oxi-addons-mailchimp-style-5 .oxi-addons-mailchimp-success-text' => 'background-color:{{VALUE}};'
                ],
            ]
        );
        $this->add_group_control(
            'sa_mail_success_border',
            $this->style,
            [
                'type' => Controls::BORDER,
                'selector' => [
                    '{{WRAPPER}} .oxi-addons-mailchimp-style-5 .oxi-addons-mailchimp-success-text' => ''
                ],
            ]
        );

        $this->end_controls_tab();
        $this->start_controls_tab();
        $this->add_control(
            'sa_mail_chimp_alert_color',
            $this->style,
            [
                'label' => __('  Color', SHORTCODE_ADDOONS),
                'type' => Controls::COLOR,
                'default' => '#fff',
                'selector' => [
                    '{{WRAPPER}} .oxi-addons-mailchimp-style-5 .oxi-addons-mailchimp-alert .oxi-addons-mailchimp-alert-text' => 'color:{{VALUE}};'
                ],
            ]
        );
        $this->add_control(
            'sa_mail_chimp_alert_bg_color',
            $this->style,
            [
                'label' => __('Background Color', SHORTCODE_ADDOONS),
                'type' => Controls::COLOR,
                'default' => '#e63a3a',
                'operator' => 'RGB',
                'selector' => [
                    '{{WRAPPER}} .oxi-addons-mailchimp-style-5 .oxi-addons-mailchimp-alert .oxi-addons-mailchimp-alert-text' => 'background-color:{{VALUE}};'
                ],
            ]
        );
        $this->add_group_control(
            'sa_mail_alert_border',
            $this->style,
            [
                'type' => Controls::BORDER,
                'selector' => [
                    '{{WRAPPER}} .oxi-addons-mailchimp-style-5 .oxi-addons-mailchimp-alert .oxi-addons-mailchimp-alert-text' => ''
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->add_control(
            'sa_mail_chimp_separetor',
            $this->style,
            [
                'label' => __('', SHORTCODE_ADDOONS),
                'type' => Controls::SEPARATOR,
                Controls::SEPARATOR => TRUE
            ]
        );
        $this->add_responsive_control(
            'sa_mail_chimp_alert_border_radius',
            $this->style,
            [
                'label' => __('Border radius', SHORTCODE_ADDOONS),
                'type' => Controls::DIMENSIONS,
                'default' => [
                    'unit' => 'px',
                    'size' => '',
                ],
                'range' => [
                    '%' => [
                        'min' => 0,
                        'max' => 50,
                        'step' => .1,
                    ],
                    'px' => [
                        'min' => 0,
                        'max' => 200,
                        'step' => 1,
                    ],
                    'em' => [
                        'min' => 0,
                        'max' => 10,
                        'step' => .1,
                    ],
                ],
                'selector' => [
                    '{{WRAPPER}} .oxi-addons-mailchimp-style-5 .oxi-addons-mailchimp-alert .oxi-addons-mailchimp-alert-text' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
            ]
        );
        $this->add_responsive_control(
            'sa_mail_chimp_alert_padding',
            $this->style,
            [
                'label' => __('Padding', SHORTCODE_ADDOONS),
                'type' => Controls::DIMENSIONS,
                'default' => [
                    'unit' => 'px',
                    'size' => '',
                ],
                'range' => [
                    '%' => [
                        'min' => 0,
                        'max' => 50,
                        'step' => .1,
                    ],
                    'px' => [
                        'min' => 0,
                        'max' => 200,
                        'step' => 1,
                    ],
                    'em' => [
                        'min' => 0,
                        'max' => 10,
                        'step' => .1,
                    ],
                ],
                'selector' => [
                    '{{WRAPPER}} .oxi-addons-mailchimp-style-5 .oxi-addons-mailchimp-alert .oxi-addons-mailchimp-alert-text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
            ]
        );
        $this->add_responsive_control(
            'sa_mail_chimp_alert_margin',
            $this->style,
            [
                'label' => __('Margin', SHORTCODE_ADDOONS),
                'type' => Controls::DIMENSIONS,
                'default' => [
                    'unit' => 'px',
                    'size' => '',
                ],
                'range' => [
                    '%' => [
                        'min' => 0,
                        'max' => 50,
                        'step' => .1,
                    ],
                    'px' => [
                        'min' => -200,
                        'max' => 200,
                        'step' => 1,
                    ],
                    'em' => [
                        'min' => 0,
                        'max' => 10,
                        'step' => .1,
                    ],
                ],
                'selector' => [
                    '{{WRAPPER}} .oxi-addons-mailchimp-style-5 .oxi-addons-mailchimp-alert .oxi-addons-mailchimp-alert-text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
            ]
        );
        $this->end_controls_section();

        $this->end_section_devider();

        $this->start_section_devider();
        $this->start_controls_section(
            'shortcode-addons',
            [
                'label' => esc_html__('Input Settings', SHORTCODE_ADDOONS),
                'showing' => FALSE,
            ]
        );

        $this->start_controls_tabs(
            'shortcode-addons-start-tabs',
            [
                'options' => [
                    'placeholder' => esc_html__('Placeholder', SHORTCODE_ADDOONS),
                    'label' => esc_html__('Label', SHORTCODE_ADDOONS),
                ]
            ]
        );
        $this->start_controls_tab();
        $this->add_group_control(
            'sa_mail_chimp_input_typo_placeholder',
            $this->style,
            [
                'label' => __('Typography', SHORTCODE_ADDOONS),
                'type' => Controls::TYPOGRAPHY,
                'include' => Controls::ALIGNNORMAL,
                'selector' => [
                    '{{WRAPPER}} .oxi-addons-mailchimp-style-5 .oxi-addons-mailchimp-form .oxi-addons-mailchimp-input::placeholder' =>  ''
                ],
            ]
        );
        $this->add_control(
            'sa_mail_chimp_input_placeholder_color',
            $this->style,
            [
                'label' => __('Color', SHORTCODE_ADDOONS),
                'type' => Controls::COLOR,
                'default' => '#a8a8a8',
                'selector' => [
                    '{{WRAPPER}} .oxi-addons-mailchimp-style-5 .oxi-addons-mailchimp-form .oxi-addons-mailchimp-input::placeholder' => 'color:{{VALUE}};'
                ],
            ]
        );
        $this->add_control(
            'sa_mail_chimp_placeholder',
            $this->style,
            [
                'label' => __('Email', SHORTCODE_ADDOONS),
                'type' => Controls::TEXT,
                'default' => 'Email Address',
                'placeholder' => 'Email Address', 
            ]
        );
        $this->add_control(
            'sa_mail_chimp_placeholder_first',
            $this->style,
            [
                'label' => __('First Name', SHORTCODE_ADDOONS),
                'type' => Controls::TEXT,
                'default' => 'Write Your First Name',
                'placeholder' => 'Write Your First Name', 
            ]
        );
        $this->add_control(
            'sa_mail_chimp_placeholder_last',
            $this->style,
            [
                'label' => __('Last Name', SHORTCODE_ADDOONS),
                'type' => Controls::TEXT,
                'default' => 'Write Your Last Name',
                'placeholder' => 'Write Your Last Name', 
            ]
        );

        $this->end_controls_tab();
        $this->start_controls_tab();
        $this->add_group_control(
            'sa_mail_chimp_input_typo_label',
            $this->style,
            [
                'label' => __('Typography', SHORTCODE_ADDOONS),
                'type' => Controls::TYPOGRAPHY,
                'include' => Controls::ALIGNNORMAL,
                'selector' => [
                    '{{WRAPPER}} .oxi-addons-mailchimp-style-5 .oxi-addons-mailchimp-label' =>  ''
                ],
            ]
        );
        $this->add_control(
            'sa_mail_chimp_input_label_color',
            $this->style,
            [
                'label' => __('Color', SHORTCODE_ADDOONS),
                'type' => Controls::COLOR,
                'default' => '#a8a8a8',
                'selector' => [
                    '{{WRAPPER}} .oxi-addons-mailchimp-style-5 .oxi-addons-mailchimp-label' => 'color:{{VALUE}};'
                ],
            ]
        );
        $this->add_control(
            'sa_mail_chimp_label',
            $this->style,
            [
                'label' => __('Email', SHORTCODE_ADDOONS),
                'type' => Controls::TEXT,
                'default' => 'Email',
                'placeholder' => 'Email',
                'selector' => [
                    '{{WRAPPER}} .oxi-addons-mailchimp-style-5 .oxi-addons-mailchimp-label.oxi-label-email' => ''
                ],
            ]
        );
        $this->add_control(
            'sa_mail_chimp_label_first',
            $this->style,
            [
                'label' => __('First Name', SHORTCODE_ADDOONS),
                'type' => Controls::TEXT,
                'default' => 'First Name',
                'placeholder' => 'First Name',
                'selector' => [
                    '{{WRAPPER}} .oxi-addons-mailchimp-style-5 .oxi-addons-mailchimp-label.oxi-label-first-name' => ''
                ],
            ]
        );
        $this->add_control(
            'sa_mail_chimp_label_last',
            $this->style,
            [
                'label' => __('Last Name', SHORTCODE_ADDOONS),
                'type' => Controls::TEXT,
                'default' => 'Last Name',
                'placeholder' => 'Last Name',
                'selector' => [
                    '{{WRAPPER}} .oxi-addons-mailchimp-style-5 .oxi-addons-mailchimp-label.oxi-label-last-name' => ''
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->add_control(
            'sa_mail_chimp_separetor',
            $this->style,
            [
                'label' => __('', SHORTCODE_ADDOONS),
                'type' => Controls::SEPARATOR,
                Controls::SEPARATOR => TRUE
            ]
        );
        $this->add_group_control(
            'sa_mail_chimp_input_typo',
            $this->style,
            [
                'label' => __('Typography', SHORTCODE_ADDOONS),
                'type' => Controls::TYPOGRAPHY,
                'include' => Controls::ALIGNNORMAL,
                'selector' => [
                    '{{WRAPPER}} .oxi-addons-mailchimp-style-5 .oxi-addons-mailchimp-form ..oxi-addons-mailchimp-input' => ''
                ],
            ]
        );
        $this->add_control(
            'sa_mail_chimp_input_writing_color',
            $this->style,
            [
                'label' => __('Writing Color', SHORTCODE_ADDOONS),
                'type' => Controls::COLOR,
                'default' => '#121212',
                'selector' => [
                    '{{WRAPPER}} .oxi-addons-mailchimp-style-5 .oxi-addons-mailchimp-form ..oxi-addons-mailchimp-input' => 'color:{{VALUE}};'
                ],
            ]
        );
        $this->add_control(
            'sa_mail_chimp_input_writing_bg_color',
            $this->style,
            [
                'label' => __('Background Color', SHORTCODE_ADDOONS),
                'type' => Controls::COLOR,
                'default' => 'rgba(255, 255, 255, 1)',
                'operator' => 'RGB',
                'selector' => [
                    '{{WRAPPER}} .oxi-addons-mailchimp-style-5 .oxi-addons-mailchimp-form ..oxi-addons-mailchimp-input' => 'background-color:{{VALUE}};'
                ],
            ]
        );

        $this->start_controls_tabs(
            'shortcode-addons-start-tabs',
            [
                'options' => [
                    'normal' => esc_html__('Normal', SHORTCODE_ADDOONS),
                    'hover' => esc_html__('Focus', SHORTCODE_ADDOONS),
                ]
            ]
        );
        $this->start_controls_tab();
        $this->add_group_control(
            'sa_mail_chimp_input_border',
            $this->style,
            [
                'type' => Controls::BORDER,
                'selector' => [
                    '{{WRAPPER}} .oxi-addons-mailchimp-style-5 .oxi-addons-mailchimp-form ..oxi-addons-mailchimp-input' => ''
                ],
            ]
        );
        $this->end_controls_tab();
        $this->start_controls_tab();
        $this->add_control(
            'sa_mail_chimp_input_border_focus',
            $this->style,
            [
                'label' => __('Border Color', SHORTCODE_ADDOONS),
                'type' => Controls::COLOR,
                'default' => '#121212',
                'selector' => [
                    '{{WRAPPER}} .oxi-addons-mailchimp-style-5 .oxi-addons-mailchimp-form ..oxi-addons-mailchimp-input:focus' => 'border-color:{{VALUE}};',
                    '{{WRAPPER}} .oxi-addons-mailchimp-style-5 .oxi-addons-mailchimp-form ..oxi-addons-mailchimp-input:active' => 'border-color:{{VALUE}};'
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->add_control(
            'sa_mail_chimp_input_spa',
            $this->style,
            [
                'label' => __(' ', SHORTCODE_ADDOONS),
                'type' => Controls::SEPARATOR,
                Controls::SEPARATOR => True,
            ]
        );
        $this->add_responsive_control(
            'sa_mail_chimp_input_border_radius',
            $this->style,
            [
                'label' => __('Border radius', SHORTCODE_ADDOONS),
                'type' => Controls::DIMENSIONS,
                'default' => [
                    'unit' => 'px',
                    'size' => '',
                ],
                'range' => [
                    '%' => [
                        'min' => 0,
                        'max' => 50,
                        'step' => .1,
                    ],
                    'px' => [
                        'min' => 0,
                        'max' => 200,
                        'step' => 1,
                    ],
                    'em' => [
                        'min' => 0,
                        'max' => 10,
                        'step' => .1,
                    ],
                ],
                'selector' => [
                    '{{WRAPPER}} .oxi-addons-mailchimp-style-5 .oxi-addons-mailchimp-form .oxi-addons-mailchimp-input' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
            ]
        );
        $this->add_responsive_control(
            'sa_mail_chimp_input_padding',
            $this->style,
            [
                'label' => __('Padding', SHORTCODE_ADDOONS),
                'type' => Controls::DIMENSIONS,
                'default' => [
                    'unit' => 'px',
                    'size' => '',
                ],
                'range' => [
                    '%' => [
                        'min' => 0,
                        'max' => 50,
                        'step' => .1,
                    ],
                    'px' => [
                        'min' => 0,
                        'max' => 200,
                        'step' => 1,
                    ],
                    'em' => [
                        'min' => 0,
                        'max' => 10,
                        'step' => .1,
                    ],
                ],
                'selector' => [
                    '{{WRAPPER}} .oxi-addons-mailchimp-style-5 .oxi-addons-mailchimp-form .oxi-addons-mailchimp-input' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
            ]
        );
        $this->add_responsive_control(
            'sa_mail_chimp_input_margin',
            $this->style,
            [
                'label' => __('Margin', SHORTCODE_ADDOONS),
                'type' => Controls::DIMENSIONS,
                'default' => [
                    'unit' => 'px',
                    'size' => '',
                ],
                'range' => [
                    '%' => [
                        'min' => 0,
                        'max' => 50,
                        'step' => .1,
                    ],
                    'px' => [
                        'min' => -200,
                        'max' => 200,
                        'step' => 1,
                    ],
                    'em' => [
                        'min' => 0,
                        'max' => 10,
                        'step' => .1,
                    ],
                ],
                'selector' => [
                    '{{WRAPPER}} .oxi-addons-mailchimp-style-5 .oxi-addons-form-group' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
            ]
        );


        $this->end_controls_section();
        $this->start_controls_section(
            'shortcode-addons',
            [
                'label' => esc_html__('Loading Settings', SHORTCODE_ADDOONS),
                'showing' => true,
            ]
        );

        $this->add_control(
            'sa_mail_chimp_loading_icon',
            $this->style,
            [
                'label' => __('Icon', SHORTCODE_ADDOONS),
                'type' => Controls::ICON,
                'default' => 'fas fa-spinner',
                'placeholder' => 'example:- fas fa-spinner',
                'selector' => [
                    '{{WRAPPER}} .oxi-addons-mailchimp-style-5 .oxi-addons-mailchimp-button' => ''
                ],
            ]
        );
        $this->add_control(
            'sa_mail_chimp_loading_text',
            $this->style,
            [
                'label' => __('Text', SHORTCODE_ADDOONS),
                'type' => Controls::TEXT,
                'default' => 'Please Wait..',
                'placeholder' => 'Please Wait..',
            ]
        );
        $this->end_controls_section();
        $this->end_section_devider();
        $this->end_section_tabs();


        $this->start_section_tabs(
            'shortcode-addons-start-tabs',
            [
                'condition' => [
                    'shortcode-addons-start-tabs' => 'button',
                ],
            ]
        );

        $this->start_section_devider();
        $this->start_controls_section(
            'shortcode-addons',
            [
                'label' => esc_html__('General Settings', SHORTCODE_ADDOONS),
                'showing' => TRUE,
            ]
        );
        $this->add_responsive_control(
            'sa_mail_chimp_btn_position',
            $this->style,
            [
                'label' => __('Button Postion', SHORTCODE_ADDOONS),
                'type' => Controls::CHOOSE,
                'operator' => Controls::OPERATOR_ICON,
                'default' => 'center',
                'options' => [
                    'row' => [
                        'title' => __('Left', SHORTCODE_ADDOONS),
                        'icon' => 'fas fa-align-left',
                    ],
                    'row-reverse' => [
                        'title' => __('Right', SHORTCODE_ADDOONS),
                        'icon' => 'fas fa-align-right',
                    ],
                ],
                'selector' => [
                    '{{WRAPPER}} .oxi-addons-mailchimp-style-5 .oxi-addons-btn-content' => 'flex-direction: {{VALUE}};'
                ],
            ]
        );
        $this->add_control(
            'sa_mail_chimp_button_text',
            $this->style,
            [
                'label' => __('Button Text', SHORTCODE_ADDOONS),
                'type' => Controls::TEXT,
                'default' => 'Subscribe',
                'placeholder' => 'Subscribe',
                'selector' => [
                    '{{WRAPPER}} .oxi-addons-mailchimp-style-5 .oxi-addons-mailchimp-button' => ''
                ],
            ]
        );

        $this->add_responsive_control(
            'sa_mail_chimp_button_padding',
            $this->style,
            [
                'label' => __('Padding', SHORTCODE_ADDOONS),
                'type' => Controls::DIMENSIONS,
                'default' => [
                    'unit' => 'px',
                    'size' => '',
                ],
                'range' => [
                    '%' => [
                        'min' => 0,
                        'max' => 50,
                        'step' => .1,
                    ],
                    'px' => [
                        'min' => 0,
                        'max' => 300,
                        'step' => 1,
                    ],
                    'em' => [
                        'min' => 0,
                        'max' => 10,
                        'step' => .1,
                    ],
                ],
                'selector' => [
                    '{{WRAPPER}} .oxi-addons-mailchimp-style-5 .oxi-addons-mailchimp-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
            ]
        );
        $this->add_responsive_control(
            'sa_mail_chimp_button_margin',
            $this->style,
            [
                'label' => __('Margin', SHORTCODE_ADDOONS),
                'type' => Controls::DIMENSIONS,
                'default' => [
                    'unit' => 'px',
                    'size' => '',
                ],
                'range' => [
                    '%' => [
                        'min' => 0,
                        'max' => 50,
                        'step' => .1,
                    ],
                    'px' => [
                        'min' => -200,
                        'max' => 500,
                        'step' => 1,
                    ],
                    'em' => [
                        'min' => 0,
                        'max' => 10,
                        'step' => .1,
                    ],
                ],
                'selector' => [
                    '{{WRAPPER}} .oxi-addons-mailchimp-style-5 .oxi-addons-mailchimp-button-section' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
            ]
        );
        $this->end_controls_section();
        $this->end_section_devider();
        $this->start_section_devider();
        $this->start_controls_section(
            'shortcode-addons',
            [
                'label' => esc_html__('Button Settings', SHORTCODE_ADDOONS),
                'showing' => TRUE,
            ]
        );

        $this->add_group_control(
            'sa_mail_chimp_button_typo',
            $this->style,
            [
                'type' => Controls::TYPOGRAPHY,
                'selector' => [
                    '{{WRAPPER}} .oxi-addons-mailchimp-style-5 .oxi-addons-mailchimp-button' => ' ',
                ],
            ]
        );


        $this->start_controls_tabs(
            'shortcode-addons-start-tabs',
            [
                'options' => [
                    'normal' => esc_html__('Normal', SHORTCODE_ADDOONS),
                    'hover' => esc_html__('Hover', SHORTCODE_ADDOONS),
                ]
            ]
        );
        $this->start_controls_tab();
        $this->add_control(
            'sa_mail_chimp_button_color',
            $this->style,
            [
                'label' => __('Color', SHORTCODE_ADDOONS),
                'type' => Controls::COLOR,
                'default' => '#fff',
                'selector' => [
                    '{{WRAPPER}} .oxi-addons-mailchimp-style-5 .oxi-addons-mailchimp-button' => 'color:{{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'sa_mail_chimp_button_bg_color',
            $this->style,
            [
                'label' => __('Background Color', SHORTCODE_ADDOONS),
                'type' => Controls::COLOR,
                'default' => '#28a745',
                'oparetor' => 'RGB',
                'selector' => [
                    '{{WRAPPER}} .oxi-addons-mailchimp-style-5 .oxi-addons-mailchimp-button' => 'background-color:{{VALUE}};'
                ],
            ]
        );
        $this->add_group_control(
            'sa_mail_chimp_button_border',
            $this->style,
            [
                'type' => Controls::BORDER,
                'selector' => [
                    '{{WRAPPER}} .oxi-addons-mailchimp-style-5 .oxi-addons-mailchimp-button' => ''
                ],
            ]
        );
        $this->add_responsive_control(
            'sa_mail_chimp_button_radius',
            $this->style,
            [
                'label' => __('Border Radius', SHORTCODE_ADDOONS),
                'type' => Controls::DIMENSIONS,
                'default' => [
                    'unit' => 'px',
                    'size' => '',
                ],
                'range' => [
                    '%' => [
                        'min' => 0,
                        'max' => 50,
                        'step' => .1,
                    ],
                    'px' => [
                        'min' => -100,
                        'max' => 200,
                        'step' => 1,
                    ],
                    'em' => [
                        'min' => 0,
                        'max' => 10,
                        'step' => .1,
                    ],
                ],
                'selector' => [
                    '{{WRAPPER}} .oxi-addons-mailchimp-style-5 .oxi-addons-mailchimp-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
            ]
        );
        $this->add_group_control(
            'sa_mail_chimp_button_sadow',
            $this->style,
            [
                'label' => __('Box Shadow', SHORTCODE_ADDOONS),
                'type' => Controls::BOXSHADOW,
                'selector' => [
                    '{{WRAPPER}} .oxi-addons-mailchimp-style-5 .oxi-addons-mailchimp-button' => ''
                ],
            ]
        );
        $this->end_controls_tab();
        $this->start_controls_tab();
        $this->add_control(
            'sa_mail_chimp_button_hover_color',
            $this->style,
            [
                'label' => __('Color', SHORTCODE_ADDOONS),
                'type' => Controls::COLOR,
                'default' => '#fff',
                'selector' => [
                    '{{WRAPPER}} .oxi-addons-mailchimp-style-5 .oxi-addons-mailchimp-button:hover' => 'color:{{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'sa_mail_chimp_button_hover_bg_color',
            $this->style,
            [
                'label' => __('Background Color', SHORTCODE_ADDOONS),
                'type' => Controls::COLOR,
                'default' => '#28a745',
                'oparetor' => 'RGB',
                'selector' => [
                    '{{WRAPPER}} .oxi-addons-mailchimp-style-5 .oxi-addons-mailchimp-button:hover' => 'background-color:{{VALUE}};'
                ],
            ]
        );
        $this->add_group_control(
            'sa_mail_chimp_button_hover_border',
            $this->style,
            [
                'type' => Controls::BORDER,
                'selector' => [
                    '{{WRAPPER}} .oxi-addons-mailchimp-style-5 .oxi-addons-mailchimp-button:hover' => ''
                ],
            ]
        );
        $this->add_responsive_control(
            'sa_mail_chimp_button_hover_radius',
            $this->style,
            [
                'label' => __('Border Radius', SHORTCODE_ADDOONS),
                'type' => Controls::DIMENSIONS,
                'default' => [
                    'unit' => 'px',
                    'size' => '',
                ],
                'range' => [
                    '%' => [
                        'min' => 0,
                        'max' => 50,
                        'step' => .1,
                    ],
                    'px' => [
                        'min' => -100,
                        'max' => 200,
                        'step' => 1,
                    ],
                    'em' => [
                        'min' => 0,
                        'max' => 10,
                        'step' => .1,
                    ],
                ],
                'selector' => [
                    '{{WRAPPER}} .oxi-addons-mailchimp-style-5 .oxi-addons-mailchimp-button:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
            ]
        );
        $this->add_group_control(
            'sa_mail_chimp_button_hover_shadow',
            $this->style,
            [
                'label' => __('Box Shadow', SHORTCODE_ADDOONS),
                'type' => Controls::BOXSHADOW,
                'selector' => [
                    '{{WRAPPER}} .oxi-addons-mailchimp-style-5 .oxi-addons-mailchimp-button:hover' => ''
                ],

            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->end_controls_section();
        $this->end_section_devider();
        $this->end_section_tabs();
    }
}
