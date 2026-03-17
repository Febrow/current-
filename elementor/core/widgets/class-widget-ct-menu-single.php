<?php

class CT_CtMenuSingle_Widget extends Case_Theme_Core_Widget_Base{
    protected $name = 'ct_menu_single';
    protected $title = 'Case Menu Single';
    protected $icon = 'eicon-nav-menu';
    protected $categories = array( 'case-theme-core' );
    protected $params = '{"sections":[{"name":"section_list","label":"Content","tab":"content","controls":[{"name":"current","label":"Current Item","type":"text","label_block":true},{"name":"current_item_typography","label":"Current Item Typography","type":"typography","control_type":"group","selector":"{{WRAPPER}} .ct-menu-single1 .current--item"},{"name":"current_item_color","label":"Current Item Color","type":"color","selectors":{"{{WRAPPER}} .ct-menu-single1 .current--item":"color: {{VALUE}};"}},{"name":"menu_item","label":"Item","type":"repeater","controls":[{"name":"text","label":"Text","type":"text","label_block":true},{"name":"link","label":"Link","type":"url","label_block":true}],"title_field":"{{{ text }}}"},{"name":"dropdown_position","label":"Dropdown Position","type":"select","options":{"dr-left":"Left","dr-right":"Right"},"default":"dr-left"},{"name":"sub_border_radius","label":"Sub Border Radius","type":"dimensions","size_units":["px"],"selectors":{"{{WRAPPER}} .ct-menu-single1 ul":"border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};"}}]}]}';
    protected $styles = array(  );
    protected $scripts = array(  );
}