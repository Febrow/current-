<?php

class CT_CtIconSearch_Widget extends Case_Theme_Core_Widget_Base{
    protected $name = 'ct_icon_search';
    protected $title = 'Case Search';
    protected $icon = 'eicon-search';
    protected $categories = array( 'case-theme-core' );
    protected $params = '{"sections":[{"name":"source_section","label":"Source Settings","tab":"content","controls":[{"name":"selected_icon","label":"Icon","type":"icons","fa4compatibility":"icon"},{"name":"icon_color","label":"Icon Color","type":"color","selectors":{"{{WRAPPER}} .ct-search-popup1":"color: {{VALUE}};"}}]}]}';
    protected $styles = array(  );
    protected $scripts = array(  );
}