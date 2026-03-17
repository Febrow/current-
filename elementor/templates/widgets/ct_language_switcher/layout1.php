<?php
$default_settings = [
    'current' => '',
    'menu_item' => '',
    'dropdown_position' => '',
];
$settings = array_merge($default_settings, $settings);
extract($settings);
?>
<?php if(!empty($current) && isset($menu_item) && !empty($menu_item) && count($menu_item)): ?>
    <div class="ct-language-switcher1 <?php echo esc_attr($dropdown_position); ?>">
        <div class="current--item">
            <?php $flag  = ct_get_image_by_size( array(
                    'attach_id'  => $settings['current_flag']['id'],
                    'thumb_size' => 'full',
                ) );
                $thumbnail_flag    = $flag['thumbnail'];
            echo ct_print_html($thumbnail_flag); ?>
            <label><?php echo esc_attr($current); ?><svg enable-background="new 0 0 32 32" height="12" viewBox="0 0 32 32" width="12" xmlns="http://www.w3.org/2000/svg"><g><path d="m29.6043 10.528-12.0735 12.8281c-.83.8819-2.2315.8819-3.0615 0l-12.0736-12.8281c-.9071-.9639-.2238-2.5455 1.0998-2.5455h25.0089c1.3237 0 2.007 1.5816 1.0999 2.5455z" /></g></svg></label>
        </div>
        <ul>
            <?php
                foreach ($menu_item as $key => $item):
                    $flag_icon = isset($item['flag']) ? $item['flag'] : '';
                    $link_key = $widget->get_repeater_setting_key( 'title', 'value', $key );
                    if ( ! empty( $item['link']['url'] ) ) {
                        $widget->add_render_attribute( $link_key, 'href', $item['link']['url'] );

                        if ( $item['link']['is_external'] ) {
                            $widget->add_render_attribute( $link_key, 'target', '_blank' );
                        }

                        if ( $item['link']['nofollow'] ) {
                            $widget->add_render_attribute( $link_key, 'rel', 'nofollow' );
                        }
                    }
                    $link_attributes = $widget->get_render_attribute_string( $link_key );
                    ?>
                    <li>
                        <a <?php echo implode( ' ', [ $link_attributes ] ); ?>>
                            <?php if(!empty($flag_icon['id'])) { 
                                $flag_img = ct_get_image_by_size( array(
                                    'attach_id'  => $flag_icon['id'],
                                    'thumb_size' => 'full',
                                ));
                                $thumbnail = $flag_img['thumbnail'];
                                echo ct_print_html($thumbnail);
                            } ?>
                            <?php echo ct_print_html($item['text']); ?>
                        </a>
                    </li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>
