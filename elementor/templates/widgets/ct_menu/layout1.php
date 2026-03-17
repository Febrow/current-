<?php
$default_settings = [
    'menu' => '',
    'style' => '',
    'menu_icon' => '',
];
$settings = array_merge($default_settings, $settings);
extract($settings);
$html_id = ct_get_element_id($settings);
$h_custom_main_menu = alico_get_page_opt('h_custom_menu');
if(!empty($h_custom_main_menu)) {
    $menu = $h_custom_main_menu;
}

if(!empty($menu)) { ?>
    <div id="<?php echo esc_attr($html_id); ?>" class="ct-nav-menu ct-nav-menu1 <?php echo esc_attr($style.' '.$menu_icon); ?>">
        <?php wp_nav_menu(array(
            'menu_class' => 'ct-main-menu clearfix',
            'walker'     => class_exists( 'EFramework_Mega_Menu_Walker' ) ? new EFramework_Mega_Menu_Walker : '',
            'link_before'     => '',
            'link_after'      => '<span class="ct--skew"></span>',
            'menu'        => wp_get_nav_menu_object($menu))
        ); ?>
    </div>
<?php } elseif( has_nav_menu( 'primary' ) ) { ?>
    <div id="<?php echo esc_attr($html_id); ?>" class="ct-nav-menu ct-nav-menu1 <?php echo esc_attr($style.' '.$menu_icon); ?>">
        <?php $attr_menu = array(
            'theme_location' => 'primary',
            'menu_class' => 'ct-main-menu clearfix',
            'link_before'     => '<span>',
            'link_after'      => '</span>',
            'walker'         => class_exists( 'EFramework_Mega_Menu_Walker' ) ? new EFramework_Mega_Menu_Walker : '',
        );
        wp_nav_menu( $attr_menu ); ?>
    </div>
<?php } ?>