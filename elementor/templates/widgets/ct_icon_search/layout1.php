<?php 
$default_settings = [
    'selected_icon' => '',
];
$settings = array_merge($default_settings, $settings);
extract($settings);

$widget->add_render_attribute( 'selected_icon', 'class' );
if ( !empty( $selected_icon["value"] ) ) { 
    $widget->add_render_attribute( 'i', 'class', $selected_icon );
    $widget->add_render_attribute( 'i', 'aria-hidden', 'true' );
}
$is_new = \Elementor\Icons_Manager::is_migration_allowed();
$html_id = ct_get_element_id($settings);
?>
<div id="<?php echo esc_attr($html_id) ?>" class="ct-search-popup ct-search-popup1 h-btn-search">
	<?php if ( !empty( $selected_icon["value"] ) ) { ?>
        <?php if($is_new):
            \Elementor\Icons_Manager::render_icon( $selected_icon, [ 'aria-hidden' => 'true' ] );
            else: ?>
            <i <?php ct_print_html($widget->get_render_attribute_string( 'i' )); ?>></i>
        <?php endif; ?>
    <?php } else { ?>
    	<i class="zmdi zmdi-search"></i>
    <?php } ?>
</div>