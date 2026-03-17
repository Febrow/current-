<?php

class CT_CtIcon_Widget extends Case_Theme_Core_Widget_Base{
    protected $name = 'ct_icon';
    protected $title = 'Case Icons';
    protected $icon = 'eicon-alert';
    protected $categories = array( 'case-theme-core' );
    protected $params = '{"sections":[{"name":"section_icon","label":"Icons","tab":"content","controls":[{"name":"icons","label":"Icons","type":"repeater","controls":[{"name":"ct_icon","label":"Icon","type":"icons","fa4compatibility":"icon","default":{"value":"fas fa-star","library":"fa-solid"}},{"name":"icon_link","label":"Icon Link","type":"url","label_block":true}]},{"name":"icon_color","label":"Color","type":"color","selectors":{"{{WRAPPER}} .ct-icon1.style1 a i":"color: {{VALUE}};"}},{"name":"icon_color_hover","label":"Color Hover","type":"color","selectors":{"{{WRAPPER}} .ct-icon1.style1 a:hover i":"color: {{VALUE}};"}},{"name":"icon_font_size","label":"Icon Font Size","type":"slider","control_type":"responsive","size_units":["px"],"range":{"px":{"min":0,"max":300}},"selectors":{"{{WRAPPER}} .ct-icon1 a i":"font-size: {{SIZE}}{{UNIT}};"}},{"name":"icon_spacer","label":"Icon Spacer","type":"dimensions","size_units":["px"],"selectors":{"{{WRAPPER}} .ct-icon1 a i":"margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};"},"control_type":"responsive"}]}]}';
    protected $styles = array(  );
    protected $scripts = array(  );
}