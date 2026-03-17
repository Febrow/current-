<?php
ct_add_custom_widget(
    array(
        'name' => 'ct_menu_single',
        'title' => esc_html__('Case Menu Single', 'alico'),
        'icon' => 'eicon-nav-menu',
        'categories' => array(Case_Theme_Core::CT_CATEGORY_NAME),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_list',
                    'label' => esc_html__('Content', 'alico'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'current',
                            'label' => esc_html__('Current Item', 'alico'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'current_item_typography',
                            'label' => esc_html__('Current Item Typography', 'alico' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .ct-menu-single1 .current--item',
                        ),
                        array(
                            'name' => 'current_item_color',
                            'label' => esc_html__('Current Item Color', 'alico' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .ct-menu-single1 .current--item' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'menu_item',
                            'label' => esc_html__('Item', 'alico'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'text',
                                    'label' => esc_html__('Text', 'alico'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'link',
                                    'label' => esc_html__('Link', 'alico'),
                                    'type' => \Elementor\Controls_Manager::URL,
                                    'label_block' => true,
                                ),
                            ),
                            'title_field' => '{{{ text }}}',
                        ),
                        array(
                            'name' => 'dropdown_position',
                            'label' => esc_html__('Dropdown Position', 'alico' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'dr-left' => 'Left',
                                'dr-right' => 'Right',
                            ],
                            'default' => 'dr-left',
                        ),
                        array(
                            'name' => 'sub_border_radius',
                            'label' => esc_html__('Sub Border Radius', 'alico' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .ct-menu-single1 ul' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                    ),
                ),
            ),
        ),
    ),
    get_template_directory() . '/elementor/core/widgets/'
);