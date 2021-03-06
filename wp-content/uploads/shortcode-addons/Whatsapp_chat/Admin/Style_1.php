<?php

namespace SHORTCODE_ADDONS_UPLOAD\Whatsapp_chat\Admin;

if (!defined('ABSPATH')) {
    exit;
}

use SHORTCODE_ADDONS\Core\AdminStyle;
use SHORTCODE_ADDONS\Core\Admin\Controls as Controls;

class Style_1 extends AdminStyle
{

    public function register_controls()
    {

        $this->start_section_tabs(
            'shortcode-addons-start-tabs'
        );

        $this->start_section_devider();

        $this->start_controls_section(
            'shortcode-addons', [
                'label' => esc_html__('Chat', SHORTCODE_ADDOONS),
                'showing' => true,
            ]
        );

        $this->add_control(
            'sa_whatsapp_chat_type',
            $this->style,
            [
                'label' => __('Chat', SHORTCODE_ADDOONS),
                'type' => Controls::SELECT,
                'default' => 'private',
                'loader' => true,
                'options' => [
                    'private' => __('Private', SHORTCODE_ADDOONS),
                    'group' => __('Group', SHORTCODE_ADDOONS),
                ],
            ]
        );
        $this->add_control(
            'sa_whatsapp_chat_group', $this->style, [
                'type' => Controls::TEXT,
                'label' => __('Group ID', SHORTCODE_ADDOONS),
                'placeholder' => __('', SHORTCODE_ADDOONS),
                'description' => 'click  <a href="https://www.youtube.com/watch?time_continue=13&v=Vx53spbt_qk">here</a> to know how to get the group id',
                'condition' => [
                    'sa_whatsapp_chat_type' => 'group',
                ],
            ]
        );
        $this->add_control(
            'sa_whatsapp_chat_number', $this->style, [
                'type' => Controls::TEXT,
                'label' => __('Phone Number', SHORTCODE_ADDOONS),
                'placeholder' => __('', SHORTCODE_ADDOONS),
                'description' => 'Example: +1123456789',
                'condition' => [
                    'sa_whatsapp_chat_type' => 'private',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'shortcode-addons', [
                'label' => esc_html__('General Setting', SHORTCODE_ADDOONS),
                'showing' => true,
            ]
        );
        $this->add_control(
            'sa_whatsapp_chat_float', $this->style, [
                'label' => __('Float', SHORTCODE_ADDOONS),
                'type' => Controls::CHOOSE,
                'default' => 'oxi_addons__nofloat',
                'loader' => true,
                'options' => [
                    'oxi_addons__float' => [
                        'title' => __('True', SHORTCODE_ADDOONS),
                        'icon' => 'fas fa-align-left',
                    ],
                    'oxi_addons__nofloat' => [
                        'title' => __('false', SHORTCODE_ADDOONS),
                        'icon' => 'fas fa-align-center',
                    ],
                ],
            ]
        );

        $this->add_responsive_control(
            'sa_whatsapp_chat_horizontal_offset',
            $this->style,
            [
                'label' => __('Horizontal Offset', SHORTCODE_ADDOONS),
                'type' => Controls::SLIDER,
                'default' => [
                    'unit' => 'px',
                    'size' => '',
                ],
                'condition' => [
                    'sa_whatsapp_chat_float' => 'oxi_addons__float',
                ],
                'range' => [
                    'px' => [
                        'min' => -400,
                        'max' => 400,
                        'step' => 1,
                    ],
                    'em' => [
                        'min' => -50,
                        'max' => 50,
                        'step' => 0.1,
                    ],
                    'rem' => [
                        'min' => -50,
                        'max' => 50,
                        'step' => 0.1,
                    ],
                ],
                'selector' => [
                    '{{WRAPPER}} .oxi_addons__whatsapp_style_1 .oxi_addons__float.oxi_addons__float_left' => 'left: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .oxi_addons__whatsapp_style_1 .oxi_addons__float.oxi_addons__float_right' => 'right: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'sa_whatsapp_chat_vertical_offset',
            $this->style,
            [
                'label' => __('Vertical Offset', SHORTCODE_ADDOONS),
                'type' => Controls::SLIDER,
                'default' => [
                    'unit' => 'px',
                    'size' => '',
                ],
                'condition' => [
                    'sa_whatsapp_chat_float' => 'oxi_addons__float',
                ],
                'range' => [
                    'px' => [
                        'min' => -400,
                        'max' => 400,
                        'step' => 1,
                    ],
                    'em' => [
                        'min' => -50,
                        'max' => 50,
                        'step' => 0.1,
                    ],
                    'rem' => [
                        'min' => -50,
                        'max' => 50,
                        'step' => 0.1,
                    ],
                ],
                'selector' => [
                    '{{WRAPPER}} .oxi_addons__whatsapp_style_1 .oxi_addons__float' => 'bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'sa_whatsapp_chat_text_switter', $this->style, [
                'label' => __('Text', SHORTCODE_ADDOONS),
                'type' => Controls::SWITCHER,
                'loader' => true,
                'default' => 'yes',
                'label_on' => __('Yes', SHORTCODE_ADDOONS),
                'label_off' => __('No', SHORTCODE_ADDOONS),
                'return_value' => 'yes',
            ]
        );
        $this->add_control(
            'sa_whatsapp_chat_button_text', $this->style, [
                'type' => Controls::TEXT,
                'label' => __('Text', SHORTCODE_ADDOONS),
                'placeholder' => __('Contact Us', SHORTCODE_ADDOONS),
                'default' => 'Contact Us',
                'condition' => [
                    'sa_whatsapp_chat_text_switter' => 'yes',
                ],
                'selector' => [
                    '{{WRAPPER}} .oxi_addons__whatsapp_style_1 .oxi_addons__button' => '',
                ],
            ]
        );
        $this->add_control(
            'sa_whatsapp_chat_icon_switter', $this->style, [
                'label' => __('Icon', SHORTCODE_ADDOONS),
                'type' => Controls::SWITCHER,
                'loader' => true,
                'default' => 'yes',
                'label_on' => __('Yes', SHORTCODE_ADDOONS),
                'label_off' => __('No', SHORTCODE_ADDOONS),
                'return_value' => 'yes',
            ]
        );
        $this->add_control(
            'sa_whatsapp_chat_icon', $this->style, [
                'type' => Controls::ICON,
                'label' => __('Icon Class', SHORTCODE_ADDOONS),
                'placeholder' => __('Icon Class', SHORTCODE_ADDOONS),
                'default' => 'fab fa-whatsapp',
                'selector' => [
                    '{{WRAPPER}} .oxi_addons__whatsapp_style_1 .oxi_addons__icon .oxi-icons' => '',
                ],
                'condition' => [
                    'sa_whatsapp_chat_icon_switter' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'sa_whatsapp_chat_button_alignment',
            $this->style,
            [
                'label' => __('Button Position', SHORTCODE_ADDOONS),
                'type' => Controls::SELECT,
                'default' => 'oxi_addons__float_right',
                'loader' => true,
                'options' => [
                    'oxi_addons__float_left' => __('Left', SHORTCODE_ADDOONS),
                    'oxi_addons__float_right' => __('Right', SHORTCODE_ADDOONS),
                ],
                'condition' => [
                    'sa_whatsapp_chat_float' => 'oxi_addons__float',
                ],
            ]
        );
        $this->add_responsive_control(
            'sa_whatsapp_chat_button_alignment_normal',
            $this->style,
            [
                'label' => __('Button Alignment', SHORTCODE_ADDOONS),
                'type' => Controls::CHOOSE,
                'operator' => Controls::OPERATOR_ICON,
                'default' => 'flex-start',
                'options' => [
                    'flex-start' => [
                        'title' => __('Left', SHORTCODE_ADDOONS),
                        'icon' => 'fas fa-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', SHORTCODE_ADDOONS),
                        'icon' => 'fas fa-align-center',
                    ],
                    'flex-end' => [
                        'title' => __('Right', SHORTCODE_ADDOONS),
                        'icon' => 'fas fa-align-right',
                    ],
                ],
                'selector' => [
                    '{{WRAPPER}} .oxi_addons__whatsapp_style_1' => 'justify-content: {{VALUE}};',
                ],
                'condition' => [
                    'sa_whatsapp_chat_float' => 'oxi_addons__nofloat',
                ],

            ]
        );
        $this->add_control(
            'sa_whatsapp_chat_open_link', $this->style, [
                'label' => __('Open Link in New Tab', SHORTCODE_ADDOONS),
                'type' => Controls::SWITCHER,
                'loader' => true,
                'default' => 'yes',
                'label_on' => __('Yes', SHORTCODE_ADDOONS),
                'label_off' => __('No', SHORTCODE_ADDOONS),
                'return_value' => 'yes',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'shortcode-addons', [
                'label' => esc_html__('Advanced Setting', SHORTCODE_ADDOONS),
                'showing' => false,
            ]
        );
        $this->add_control(
            'sa_whatsapp_chat_hide_on_tab', $this->style, [
                'label' => __('Hide on Tabs', SHORTCODE_ADDOONS),
                'type' => Controls::SWITCHER,
                'loader' => true,
                'description' => 'This will hide the chat button on tablets',
                'label_on' => __('No', SHORTCODE_ADDOONS),
                'label_off' => __('Yes', SHORTCODE_ADDOONS),
                'return_value' => 'yes',
            ]
        );
        $this->add_control(
            'sa_whatsapp_chat_hide_on_mobile', $this->style, [
                'label' => __('Hide on Mobiles', SHORTCODE_ADDOONS),
                'type' => Controls::SWITCHER,
                'loader' => true,
                'description' => 'This will hide the chat button on mobile phones',
                'label_on' => __('No', SHORTCODE_ADDOONS),
                'label_off' => __('Yes', SHORTCODE_ADDOONS),
                'return_value' => 'yes',
            ]
        );
        $this->add_control(
            'sa_whatsapp_chat_tooltip_switter', $this->style, [
                'label' => __('Tooltips', SHORTCODE_ADDOONS),
                'type' => Controls::SWITCHER,
                'loader' => true,
                'description' => 'This will show a tooltip next to the button when hovered',
                'label_on' => __('No', SHORTCODE_ADDOONS),
                'label_off' => __('Yes', SHORTCODE_ADDOONS),
                'return_value' => 'yes',
            ]
        );
        $this->add_control(
            'sa_whatsapp_chat_tooltips_text', $this->style, [
                'type' => Controls::TEXT,
                'label' => __('Tooltip Message', SHORTCODE_ADDOONS),
                'placeholder' => __('Message us', SHORTCODE_ADDOONS),
                'default' => 'Message us',
                'condition' => [
                    'sa_whatsapp_chat_tooltip_switter' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'sa_whatsapp_chat_tooltips_animation',
            $this->style,
            [
                'label' => __('Animation', SHORTCODE_ADDOONS),
                'type' => Controls::SELECT,
                'default' => 'fade',
                'loader' => true,
                'options' => [
                    'fade' => __('Fade', SHORTCODE_ADDOONS),
                    'grow' => __('Grow', SHORTCODE_ADDOONS),
                    'swing' => __('Swing', SHORTCODE_ADDOONS),
                    'slide' => __('Slide', SHORTCODE_ADDOONS),
                    'fall' => __('Fall', SHORTCODE_ADDOONS),
                ],
                'condition' => [
                    'sa_whatsapp_chat_tooltip_switter' => 'yes',
                ],
            ]
        );

        $this->end_controls_section();
        $this->end_section_devider();
        $this->start_section_devider();
        $this->start_controls_section(
            'shortcode-addons', [
                'label' => esc_html__('Button Setting', SHORTCODE_ADDOONS),
                'showing' => true,
            ]
        );
        $this->add_control(
            'sa_whatsapp_chat_button_height_width_switter',
            $this->style,
            [
                'label' => __('Custom Width', SHORTCODE_ADDOONS),
                'type' => Controls::SWITCHER,
                'default' => 'no',
                'loader' => true,
                'label_on' => __('Yes', SHORTCODE_ADDOONS),
                'label_off' => __('No', SHORTCODE_ADDOONS),
                'return_value' => 'yes',
            ]
        );
        $this->add_responsive_control(
            'sa_whatsapp_chat_button_width',
            $this->style,
            [
                'label' => __('Width', SHORTCODE_ADDOONS),
                'type' => Controls::SLIDER,
                'condition' => [
                    'sa_whatsapp_chat_button_height_width_switter' => 'yes',
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => '',
                ],
                'range' => [
                    'px' => [
                        'min' => 40,
                        'max' => 400,
                        'step' => 5,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                    'em' => [
                        'min' => 10,
                        'max' => 50,
                        'step' => 0.1,
                    ],
                ],
                'selector' => [
                    '{{WRAPPER}} .oxi_addons__whatsapp_style_1 .oxi_addons__whatsapp_main' => 'max-width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'sa_whatsapp_chat_button_height',
            $this->style,
            [
                'label' => __('Height', SHORTCODE_ADDOONS),
                'type' => Controls::SLIDER,
                'condition' => [
                    'sa_whatsapp_chat_button_height_width_switter' => 'yes',
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => '',
                ],
                'range' => [
                    'px' => [
                        'min' => 15,
                        'max' => 200,
                        'step' => 5,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                    'em' => [
                        'min' => 10,
                        'max' => 50,
                        'step' => 0.1,
                    ],
                ],
                'selector' => [
                    '{{WRAPPER}} .oxi_addons__whatsapp_style_1 .oxi_addons__whatsapp_main' => 'height: {{SIZE}}{{UNIT}}; ',
                ],
            ]
        );
        $this->add_group_control(
            'sa_whatsapp_chat_button_typho', $this->style, [
                'type' => Controls::TYPOGRAPHY,
                'selector' => [
                    '{{WRAPPER}} .oxi_addons__whatsapp_style_1 .oxi_addons__button' => '',
                ],
            ]
        );
        $this->start_controls_tabs(
            'shortcode-addons-start-tabs', [
                'options' => [
                    'normal' => esc_html__('Normal', SHORTCODE_ADDOONS),
                    'hover' => esc_html__('Hover', SHORTCODE_ADDOONS),
                ],
            ]
        );
        $this->start_controls_tab();
        $this->add_control(
            'sa_whatsapp_chat_button_color', $this->style, [
                'label' => __('Color', SHORTCODE_ADDOONS),
                'type' => Controls::COLOR,
                'default' => '#ffffff',
                'selector' => [
                    '{{WRAPPER}} .oxi_addons__whatsapp_style_1 .oxi_addons__whatsapp_main' => 'color:{{VALUE}};',
                    '{{WRAPPER}} .oxi_addons__whatsapp_style_1 .oxi_addons__icon .oxi-icons' => 'color:{{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'sa_whatsapp_chat_button_bg', $this->style, [
                'label' => __('Background Color', SHORTCODE_ADDOONS),
                'type' => Controls::COLOR,
                'oparetor' => 'RGB',
                'selector' => [
                    '{{WRAPPER}} .oxi_addons__whatsapp_style_1 .oxi_addons__whatsapp_main' => 'background:{{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            'sa_whatsapp_chat_button_border', $this->style, [
                'type' => Controls::BORDER,
                'selector' => [
                    '{{WRAPPER}} .oxi_addons__whatsapp_style_1 .oxi_addons__whatsapp_main' => '',
                ],
            ]
        );

        $this->add_responsive_control(
            'sa_whatsapp_chat_button_border_radius', $this->style, [
                'label' => __('Border radius', SHORTCODE_ADDOONS),
                'separator' => false,
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
                    '{{WRAPPER}} .oxi_addons__whatsapp_style_1 .oxi_addons__whatsapp_main' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            'sa_whatsapp_chat_button_box_shadow', $this->style, [
                'type' => Controls::BOXSHADOW,
                'selector' => [
                    '{{WRAPPER}} .oxi_addons__whatsapp_style_1 .oxi_addons__whatsapp_main' => '',
                ],
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab();
        $this->add_control(
            'sa_whatsapp_chat_button_hover_color', $this->style, [
                'label' => __('Color', SHORTCODE_ADDOONS),
                'type' => Controls::COLOR,
                'default' => '#ffffff',
                'selector' => [
                    '{{WRAPPER}} .oxi_addons__whatsapp_style_1 .oxi_addons__whatsapp_main:hover' => 'color:{{VALUE}} ;',
                    '{{WRAPPER}} .oxi_addons__whatsapp_style_1 .oxi_addons__whatsapp_main:hover  .oxi-icons' => 'color:{{VALUE}} ;',
                ],
            ]
        );
        $this->add_control(
            'sa_whatsapp_chat_button_hover_bg', $this->style, [
                'label' => __('Background Color', SHORTCODE_ADDOONS),
                'type' => Controls::COLOR,
                'oparetor' => 'RGB',
                'selector' => [
                    '{{WRAPPER}} .oxi_addons__whatsapp_style_1 .oxi_addons__whatsapp_main:hover' => 'background:{{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            'sa_whatsapp_chat_button_hover_border', $this->style, [
                'type' => Controls::BORDER,
                'selector' => [
                    '{{WRAPPER}} .oxi_addons__whatsapp_style_1 .oxi_addons__whatsapp_main:hover' => '',
                ],
            ]
        );

        $this->add_responsive_control(
            'sa_whatsapp_chat_button_hover_border_radius', $this->style, [
                'label' => __('Border radius', SHORTCODE_ADDOONS),
                'separator' => false,
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
                    '{{WRAPPER}} .oxi_addons__whatsapp_style_1 .oxi_addons__whatsapp_main:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]]
        );
        $this->add_group_control(
            'sa_whatsapp_chat_button_hover_box_shadow', $this->style, [
                'type' => Controls::BOXSHADOW,
                'selector' => [
                    '{{WRAPPER}} .oxi_addons__whatsapp_style_1 .oxi_addons__whatsapp_main:hover' => '',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();
        $this->add_responsive_control(
            'sa_whatsapp_chat_button_margin', $this->style, [
                'label' => __('Margin', SHORTCODE_ADDOONS),
                'type' => Controls::DIMENSIONS,
                'separator' => true,
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
                        'min' => -400,
                        'max' => 400,
                        'step' => 1,
                    ],
                    'em' => [
                        'min' => 0,
                        'max' => 10,
                        'step' => .1,
                    ],
                ],
                'selector' => [
                    '{{WRAPPER}} .oxi_addons__whatsapp_style_1 .oxi_addons__whatsapp_main' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'shortcode-addons', [
                'label' => esc_html__('Icon Setting', SHORTCODE_ADDOONS),
                'showing' => false,
                'condition' => [
                    'sa_whatsapp_chat_icon_switter' => 'yes',
                ],
            ]
        );
        $this->add_responsive_control(
            'sa_whatsapp_chat_icon_size', $this->style, [
                'label' => __('Icon Size', SHORTCODE_ADDOONS),
                'type' => Controls::SLIDER,
                'default' => [
                    'unit' => 'px',
                    'size' => '',
                ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 200,
                        'step' => 1,
                    ],
                    'em' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => .1,
                    ],
                    'rem' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 0.1,
                    ],
                ],
                'selector' => [
                    '{{WRAPPER}} .oxi_addons__whatsapp_style_1 .oxi_addons__icon .oxi-icons' => 'font-size:{{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'sa_whatsapp_chat_icon_alignment_normal',
            $this->style,
            [
                'label' => __('Icon Alignment', SHORTCODE_ADDOONS),
                'type' => Controls::CHOOSE,
                'operator' => Controls::OPERATOR_ICON,
                'default' => 'row-reverse',
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
                    '{{WRAPPER}} .oxi_addons__whatsapp_style_1 .oxi_addons__whatsapp_main' => 'flex-direction: {{VALUE}};',
                ],

            ]
        );
        $this->add_responsive_control(
            'sa_whatsapp_chat_icon_padding', $this->style, [
                'label' => __('Icon Padding', SHORTCODE_ADDOONS),
                'type' => Controls::DIMENSIONS,
                'separator' => true,
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
                        'max' => 50,
                        'step' => 1,
                    ],
                    'em' => [
                        'min' => 0,
                        'max' => 10,
                        'step' => .1,
                    ],
                ],
                'selector' => [
                    '{{WRAPPER}} .oxi_addons__whatsapp_style_1 .oxi_addons__icon .oxi-icons' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        $this->end_section_devider();
        $this->end_section_tabs();
    }

}
