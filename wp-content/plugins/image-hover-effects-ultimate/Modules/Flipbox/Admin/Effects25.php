<?php

namespace OXI_IMAGE_HOVER_PLUGINS\Modules\Flipbox\Admin;

/**
 * Description of Effects25
 *
 * @author biplo
 */
use OXI_IMAGE_HOVER_PLUGINS\Modules\Flipbox\Modules as Modules;
use OXI_IMAGE_HOVER_PLUGINS\Classes\Controls as Controls;

class Effects25 extends Modules {

    public function register_frontend_tabs() {
        $this->start_section_tabs(
                'oxi-image-hover-start-tabs', [
            'condition' => [
                'oxi-image-hover-start-tabs' => 'frontend'
            ]
                ]
        );
        $this->start_section_devider();
        $this->register_front_content_settings();
        $this->end_section_devider();
        $this->end_section_tabs();
    }

    public function register_front_content_settings() {
        $this->start_controls_section(
                'oxi-image-hover', [
            'label' => esc_html__('Content Settings', OXI_IMAGE_HOVER_TEXTDOMAIN),
            'showing' => TRUE,
                ]
        );
        $this->add_group_control(
                'oxi-image-flip-front-background', $this->style, [
            'type' => Controls::BACKGROUND,
            'selector' => [
                '{{WRAPPER}} .oxi-image-hover-figure-front-section' => '',
            ]
                ]
        );

        $this->add_group_control(
                'oxi-image-flip-front-border', $this->style, [
            'type' => Controls::BORDER,
            'selector' => [
                '{{WRAPPER}} .oxi-image-hover-figure-front-section' => '',
            ], 'description' => 'Customize Hover Background with Color or Gradient or Image properties.',
                ]
        );

        $this->add_responsive_control(
                'oxi-image-flip-front-border-radius', $this->style, [
            'label' => __('Border Radius', OXI_IMAGE_HOVER_TEXTDOMAIN),
            'type' => Controls::DIMENSIONS,
            'default' => [
                'unit' => 'px',
                'size' => '',
            ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 500,
                    'step' => 1,
                ],
                '%' => [
                    'min' => 0,
                    'max' => 50,
                    'step' => 1,
                ],
                'em' => [
                    'min' => 0,
                    'max' => 100,
                    'step' => .1,
                ],
            ],
            'selector' => [
                '{{WRAPPER}} .oxi-image-hover-figure-frontend, '
                . '{{WRAPPER}} .oxi-image-hover-figure-frontend:before, '
                . '{{WRAPPER}} .oxi-image-hover-figure-frontend:after, '
                . '{{WRAPPER}} .oxi-image-hover-figure-front-section, '
                . '{{WRAPPER}} .oxi-image-hover-figure-front-section img, '
                . '{{WRAPPER}} .oxi-image-hover-figure-backend, '
                . '{{WRAPPER}} .oxi-image-hover-figure-backend:before, '
                . '{{WRAPPER}} .oxi-image-hover-figure-backend:after, '
                . '{{WRAPPER}} .oxi-image-hover-figure-back-section ' => 'border-radius:{{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ], 'description' => 'Allows you to add rounded corners to Flipbox with options.',
                ]
        );
        $this->add_group_control(
                'oxi-image-flip-front-boxshadow', $this->style, [
            'type' => Controls::BOXSHADOW,
            'selector' => [
                '{{WRAPPER}} .oxi-image-hover-figure-frontend:before' => '',
                '{{WRAPPER}} .oxi-image-hover-figure-backend:before' => '',
            ], 'description' => 'Allows you at hover to attaches one or more shadows into Button.',
                ]
        );
        $this->end_controls_section();
    }

    public function register_backend_tabs() {
        $this->start_section_tabs(
                'oxi-image-hover-start-tabs', [
            'condition' => [
                'oxi-image-hover-start-tabs' => 'backend'
            ]
                ]
        );
        $this->start_section_devider();
        $this->register_back_content_settings();
        $this->register_back_description_settings();
        $this->end_section_devider();

        $this->start_section_devider();
        $this->register_back_heading_settings();
        $this->register_back_button_settings();
        $this->end_section_devider();


        $this->end_section_tabs();
    }

    public function register_back_button_settings() {
        $this->start_controls_section(
                'oxi-image-hover', [
            'label' => esc_html__('Button Settings', OXI_IMAGE_HOVER_TEXTDOMAIN),
            'showing' => false,
                ]
        );
        $this->add_control(
                'oxi-image-flip-back-button-position', $this->style, [
            'label' => __('Position', OXI_IMAGE_HOVER_TEXTDOMAIN),
            'type' => Controls::CHOOSE,
            'operator' => Controls::OPERATOR_ICON,
            'default' => 'center',
            'options' => [
                'left' => [
                    'title' => __('Left', OXI_IMAGE_HOVER_TEXTDOMAIN),
                    'icon' => 'fa fa-align-left',
                ],
                'center' => [
                    'title' => __('Center', OXI_IMAGE_HOVER_TEXTDOMAIN),
                    'icon' => 'fa fa-align-center',
                ],
                'right' => [
                    'title' => __('Right', OXI_IMAGE_HOVER_TEXTDOMAIN),
                    'icon' => 'fa fa-align-right',
                ],
            ],
            'selector' => [
                '{{WRAPPER}}  .oxi-image-hover-button' => 'text-align:{{VALUE}}',
            ], 'description' => 'Allows you set Button Align as Left, Center or Right.',
                ]
        );
        $this->add_responsive_control(
                'oxi-image-flip-back-button-size', $this->style, [
            'label' => __('Button Size', OXI_IMAGE_HOVER_TEXTDOMAIN),
            'type' => Controls::SLIDER,
            'default' => [
                'unit' => 'px',
                'size' => 20,
            ],
            'range' => [
                'px' => [
                    'min' => 1,
                    'max' => 500,
                    'step' => 1,
                ],
                '%' => [
                    'min' => 0,
                    'max' => 100,
                    'step' => 1,
                ],
                'em' => [
                    'min' => 0,
                    'max' => 100,
                    'step' => .1,
                ],
            ],
            'selector' => [
                '{{WRAPPER}} .oxi-image-hover-button .oxi-icons' => 'font-size:{{SIZE}}{{UNIT}};',
            ],
            'description' => 'Set your icon size .',
                ]
        );

        $this->start_controls_tabs(
                'oxi-image-hover-start-tabs', [
            'options' => [
                'normal' => esc_html__('Normal ', OXI_IMAGE_HOVER_TEXTDOMAIN),
                'hover' => esc_html__('Hover ', OXI_IMAGE_HOVER_TEXTDOMAIN),
            ]
                ]
        );
        $this->start_controls_tab();
        $this->add_control(
                'oxi-image-flip-back-button-color', $this->style, [
            'label' => __('Color', OXI_IMAGE_HOVER_TEXTDOMAIN),
            'type' => Controls::COLOR,
            'default' => '#ffffff',
            'selector' => [
                '{{WRAPPER}}  .oxi-image-hover-button a.oxi-image-btn' => 'color: {{VALUE}};',
                '{{WRAPPER}}  .oxi-image-hover-button a.oxi-image-btn:hover' => 'color: {{VALUE}};',
            ],
            'description' => 'Color property is used to set the color of the Button.',
                ]
        );

        $this->add_group_control(
                'oxi-image-flip-back-button-tx-shadow', $this->style, [
            'type' => Controls::TEXTSHADOW,
            'selector' => [
                '{{WRAPPER}} .oxi-image-hover-button  a.oxi-image-btn' => '',
                '{{WRAPPER}} .oxi-image-hover-button  a.oxi-image-btn:hover' => '',
            ],
            'description' => 'Text Shadow property adds shadow to Icon.',
                ]
        );

        $this->end_controls_tab();
        $this->start_controls_tab();
        $this->add_control(
                'oxi-image-flip-back-button-hover-color', $this->style, [
            'label' => __('Color', OXI_IMAGE_HOVER_TEXTDOMAIN),
            'type' => Controls::COLOR,
            'default' => '#ffffff',
            'selector' => [
                '{{WRAPPER}} .oxi-image-hover-figure .oxi-image-hover-button a.oxi-image-btn:hover' => 'color: {{VALUE}};',
            ],
            'description' => 'Color property is used to set the Hover color of the Button.',
                ]
        );

        $this->add_group_control(
                'oxi-image-flip-back-button-hover-tx-shadow', $this->style, [
            'type' => Controls::TEXTSHADOW,
            'selector' => [
                '{{WRAPPER}} .oxi-image-hover-figure .oxi-image-hover-button a.oxi-image-btn:hover' => '',
            ],
            'description' => 'Text Shadow property adds shadow to Icon.',
                ]
        );


        $this->end_controls_tab();
        $this->end_controls_tabs();


        $this->add_responsive_control(
                'oxi-image-flip-back-button-margin', $this->style, [
            'label' => __('Margin', OXI_IMAGE_HOVER_TEXTDOMAIN),
            'type' => Controls::DIMENSIONS,
            'default' => [
                'unit' => 'px',
                'size' => '',
            ],
            'range' => [
                'px' => [
                    'min' => -100,
                    'max' => 500,
                    'step' => 1,
                ],
                '%' => [
                    'min' => -50,
                    'max' => 100,
                    'step' => 1,
                ],
                'em' => [
                    'min' => -50,
                    'max' => 100,
                    'step' => .1,
                ],
            ],
            'selector' => [
                '{{WRAPPER}} .oxi-image-hover-button a.oxi-image-btn' => 'margin:{{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'description' => 'Generate space around a Button, Outside of Content.',
                ]
        );
        $this->add_control(
                'oxi-image-flip-back-button-animation', $this->style, [
            'label' => __('Animation', OXI_IMAGE_HOVER_TEXTDOMAIN),
            'type' => Controls::SELECT,
            'default' => 'solid',
            'options' => [
                '' => __('None', OXI_IMAGE_HOVER_TEXTDOMAIN),
                'iheu-fade-up' => __('Fade Up', OXI_IMAGE_HOVER_TEXTDOMAIN),
                'iheu-fade-down' => __('Fade Down', OXI_IMAGE_HOVER_TEXTDOMAIN),
                'iheu-fade-left' => __('Fade Left', OXI_IMAGE_HOVER_TEXTDOMAIN),
                'iheu-fade-right' => __('Fade Right', OXI_IMAGE_HOVER_TEXTDOMAIN),
                'iheu-fade-up-big' => __('Fade up Big', OXI_IMAGE_HOVER_TEXTDOMAIN),
                'iheu-fade-down-big' => __('Fade down Big', OXI_IMAGE_HOVER_TEXTDOMAIN),
                'iheu-fade-left-big' => __('Fade left Big', OXI_IMAGE_HOVER_TEXTDOMAIN),
                'iheu-fade-right-big' => __('Fade Right Big', OXI_IMAGE_HOVER_TEXTDOMAIN),
                'iheu-zoom-in' => __('Zoom In', OXI_IMAGE_HOVER_TEXTDOMAIN),
                'iheu-zoom-out' => __('Zoom Out', OXI_IMAGE_HOVER_TEXTDOMAIN),
                'iheu-flip-x' => __('Flip X', OXI_IMAGE_HOVER_TEXTDOMAIN),
                'iheu-flip-y' => __('Flip Y', OXI_IMAGE_HOVER_TEXTDOMAIN),
            ],
            'selector' => [
                '{{WRAPPER}} .oxi-image-hover-button' => '',
            ],
            'description' => 'Allows you to animated Button while viewing.',
                ]
        );
        $this->add_control(
                'oxi-image-flip-back-button-animation-delay', $this->style, [
            'label' => __('Animation Delay', OXI_IMAGE_HOVER_TEXTDOMAIN),
            'type' => Controls::SELECT,
            'default' => '',
            'options' => [
                '' => __('None', OXI_IMAGE_HOVER_TEXTDOMAIN),
                'oxi-image-hover-delay-xs' => __('Delay XS', OXI_IMAGE_HOVER_TEXTDOMAIN),
                'oxi-image-hover-delay-sm' => __('Delay SM', OXI_IMAGE_HOVER_TEXTDOMAIN),
                'oxi-image-hover-delay-md' => __('Delay MD', OXI_IMAGE_HOVER_TEXTDOMAIN),
                'oxi-image-hover-delay-lg' => __('Delay LG', OXI_IMAGE_HOVER_TEXTDOMAIN),
                'oxi-image-hover-delay-xl' => __('Delay XL', OXI_IMAGE_HOVER_TEXTDOMAIN),
                'oxi-image-hover-delay-xxl' => __('Delay XXL', OXI_IMAGE_HOVER_TEXTDOMAIN),
            ],
            'selector' => [
                '{{WRAPPER}} .oxi-image-hover-button' => '',
            ],
            'description' => 'Allows you to animation delay at Button while viewing.',
                ]
        );

        $this->end_controls_section();
    }

    public function modal_form_data() {
        echo '<div class="modal-header">                    
                    <h4 class="modal-title">Image Hover Form</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">';

        $this->add_control(
                'image_hover_back_heading', $this->style, [
            'label' => __('Title', OXI_IMAGE_HOVER_TEXTDOMAIN),
            'type' => Controls::TEXT,
            'default' => '',
            'placeholder' => 'Heading',
            'description' => 'Add Your Flipbox Backend Title.'
                ]
        );



        $this->add_control(
                'image_hover_back_description', $this->style, [
            'label' => __('Short Description', OXI_IMAGE_HOVER_TEXTDOMAIN),
            'type' => Controls::TEXTAREA,
            'default' => '',
            'description' => 'Add Your Description Unless make it blank.'
                ]
        );
        $this->start_controls_tabs(
                'image_hover-start-tabs', [
            'separator' => TRUE,
            'options' => [
                'frontend' => esc_html__('Front Image', OXI_IMAGE_HOVER_TEXTDOMAIN),
                'backend' => esc_html__('Backend Image', OXI_IMAGE_HOVER_TEXTDOMAIN),
            ]
                ]
        );
        $this->start_controls_tab();

        $this->add_group_control(
                'image_hover_front_image', $this->style, [
            'label' => __('Image', OXI_IMAGE_HOVER_TEXTDOMAIN),
            'type' => Controls::MEDIA,
            'description' => 'Add or Modify Your Front Image.'
                ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab();
        $this->add_group_control(
                'image_hover_back_image', $this->style, [
            'label' => __('Feature Image', OXI_IMAGE_HOVER_TEXTDOMAIN),
            'type' => Controls::MEDIA,
            'description' => 'Add or Modify Your Backend Image. Adjust Backend background to get better design.'
                ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();


        $this->add_group_control(
                'image_hover_button_link', $this->style, [
            'label' => __('URL', OXI_IMAGE_HOVER_TEXTDOMAIN),
            'type' => Controls::URL,
            'separator' => TRUE,
            'default' => '',
            'placeholder' => 'https://www.yoururl.com',
            'description' => 'Add Your Desire Link or Url Unless make it blank'
                ]
        );
        $this->add_control(
                'image_hover_button_icon', $this->style, [
            'label' => __('Button Icon', OXI_IMAGE_HOVER_TEXTDOMAIN),
            'type' => Controls::ICON,
            'description' => 'Add Your Flipbox Button Icon.'
                ]
        );
        echo '</div>';
    }

    /**
     * Template Parent Item Data Rearrange
     *
     * @since 2.0.0
     */
    public function Rearrange() {
        return '<li class="list-group-item" id="{{id}}">{{image_hover_back_heading}}</li>';
    }

}
