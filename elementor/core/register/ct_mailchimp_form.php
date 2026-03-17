<?php
ct_add_custom_widget(
    array(
        'name' => 'ct_mailchimp_form',
        'title' => esc_html__('Case Mailchimp Form', 'alico'),
        'icon' => 'eicon-email-field',
        'categories' => array(Case_Theme_Core::CT_CATEGORY_NAME),
        'scripts' => array(),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'source_section',
                    'label' => esc_html__('Settings', 'alico'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'style',
                            'label' => esc_html__('Style', 'alico' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'style1' => 'Style 1',
                                'style2' => 'Style 2',
                            ],
                            'default' => 'style1',
                        ),
                        array(
                            'name' => 'icon_color',
                            'label' => esc_html__('Icon Color', 'alico' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .ct-mailchimp1 .mc4wp-form .mc4wp-form-fields:after' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'button_bg_color',
                            'label' => esc_html__('Button Background Color', 'alico' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .ct-mailchimp1 .mc4wp-form .mc4wp-form-fields:before' => 'background-color: {{VALUE}} !important;',
                                '{{WRAPPER}} .ct-mailchimp1.style2 .mc4wp-form .mc4wp-form-fields input[type="submit"]' => 'background-color: {{VALUE}} !important;',
                            ],
                        ),
                        array(
                            'name' => 'button_bg_color2',
                            'label' => esc_html__('Button Background Color 2', 'alico' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                        ),

                        array(
                            'name' => 'input_typography',
                            'label' => esc_html__('Input Typography', 'alico' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .ct-mailchimp [type="email"]',
                            'condition' => [
                                'style' => ['style1'],
                            ],
                        ),
                        array(
                            'name' => 'input_color',
                            'label' => esc_html__('Input Color', 'alico' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .ct-mailchimp .mc4wp-form .mc4wp-form-fields [type="email"], {{WRAPPER}} .ct-mailchimp .mc4wp-form .mc4wp-form-fields [type="text"]' => 'color: {{VALUE}};',
                            ],
                            'condition' => [
                                'style' => ['style1'],
                            ],
                        ),
                        array(
                            'name' => 'input_bg_color',
                            'label' => esc_html__('Input Background Color', 'alico' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .ct-mailchimp .mc4wp-form .mc4wp-form-fields [type="email"], {{WRAPPER}} .ct-mailchimp .mc4wp-form .mc4wp-form-fields [type="text"]' => 'background-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'style' => ['style1'],
                            ],
                        ),
                    ),
                ),
            ),
        ),
    ),
    get_template_directory() . '/elementor/core/widgets/'
);