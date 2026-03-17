<?php
if(!function_exists('alico_configs')){
    function alico_configs($value){
        
        $t_primary_color = alico_get_opt('primary_color', '#09a223');
        $p_primary_color = alico_get_page_opt('primary_color');
        if(!empty($p_primary_color)) {
           $t_primary_color = $p_primary_color;
        }

        $t_secondary_color = alico_get_opt('secondary_color', '#89c709');
        $p_secondary_color = alico_get_page_opt('secondary_color');
        if(!empty($p_secondary_color)) {
           $t_secondary_color = $p_secondary_color;
        }

        $t_third_color = alico_get_opt('third_color', '#6C9C07');
        $p_third_color = alico_get_page_opt('third_color');
        if(!empty($p_third_color)) {
           $t_third_color = $p_third_color;
        }
        
        $t_dark_color = alico_get_opt('dark_color', '#000000');
        
        $t_gradient_color_f = alico_get_opt('gradient_color', ['from' => '#0c3ef8']);
        $t_gradient_color_t = alico_get_opt('gradient_color', ['to' => '#6a84ff']);
        $p_gradient_color = alico_get_page_opt( 'gradient_color' );
        if( !empty($p_gradient_color['from']) && !empty($p_gradient_color['to']) ) {
            $t_gradient_color_f['from'] = $p_gradient_color['from'];
            $t_gradient_color_t['to'] = $p_gradient_color['to'];
        }

        $t_gradient_color_f2 = alico_get_opt('gradient_color2', ['from' => '#9fd712']);
        $t_gradient_color_t2 = alico_get_opt('gradient_color2', ['to' => '#cbf855']);
        $p_gradient_color2 = alico_get_page_opt( 'gradient_color2' );
        if( !empty($p_gradient_color2['from']) && !empty($p_gradient_color2['to']) ) {
            $t_gradient_color_f2['from'] = $p_gradient_color2['from'];
            $t_gradient_color_t2['to'] = $p_gradient_color2['to'];
        }

        $t_gradient_color_f3 = alico_get_opt('gradient_color3', ['from' => '#1c7cff']);
        $t_gradient_color_t3 = alico_get_opt('gradient_color3', ['to' => '#a3ff12']);
        $p_gradient_color3 = alico_get_page_opt( 'gradient_color3' );
        if( !empty($p_gradient_color3['from']) && !empty($p_gradient_color3['to']) ) {
            $t_gradient_color_f3['from'] = $p_gradient_color3['from'];
            $t_gradient_color_t3['to'] = $p_gradient_color3['to'];
        }

        $t_gradient_color_f4 = alico_get_opt('gradient_color4', ['from' => '#006acc']);
        $t_gradient_color_t4 = alico_get_opt('gradient_color4', ['to' => '#01d5ff']);
        $p_gradient_color4 = alico_get_page_opt( 'gradient_color4' );
        if( !empty($p_gradient_color4['from']) && !empty($p_gradient_color4['to']) ) {
            $t_gradient_color_f4['from'] = $p_gradient_color4['from'];
            $t_gradient_color_t4['to'] = $p_gradient_color4['to'];
        }

        $configs = [
            'theme_colors' => [
                'primary'   => [
                    'title' => esc_html__('Primary', 'alico').' ('.alico_get_opt('primary_color', '#09a223').')', 
                    'value' => $t_primary_color
                ],
                'secondary'   => [
                    'title' => esc_html__('Secondary', 'alico').' ('.alico_get_opt('secondary_color', '#89c709').')', 
                    'value' => $t_secondary_color
                ],
                'third'   => [
                    'title' => esc_html__('Third', 'alico').' ('.alico_get_opt('third_color', '#6C9C07').')', 
                    'value' => $t_third_color
                ],
                'dark'   => [
                    'title' => esc_html__('Dark', 'alico').' ('.alico_get_opt('dark_color', '#000000').')', 
                    'value' => $t_dark_color
                ]
            ],
            'link' => [
                'color' => alico_get_opt('link_color', ['regular' => '#09a223'])['regular'],
                'color-hover'   => alico_get_opt('link_color', ['hover' => '#89c709'])['hover'],
                'color-active'  => alico_get_opt('link_color', ['active' => '#89c709'])['active'],
            ],
            'gradient' => [
                'color-from' => $t_gradient_color_f['from'],
                'color-to' => $t_gradient_color_t['to'],
            ],

            'gradient2' => [
                'color-from2' => $t_gradient_color_f2['from'],
                'color-to2' => $t_gradient_color_t2['to'],
            ],

            'gradient3' => [
                'color-from3' => $t_gradient_color_f3['from'],
                'color-to3' => $t_gradient_color_t3['to'],
            ],

            'gradient4' => [
                'color-from4' => $t_gradient_color_f4['from'],
                'color-to4' => $t_gradient_color_t4['to'],
            ]
               
        ];
        return $configs[$value];
    }
}
if(!function_exists('alico_inline_styles')) {
    function alico_inline_styles() {  
        
        $theme_colors      = alico_configs('theme_colors');
        $link_color        = alico_configs('link');
        $gradient_color        = alico_configs('gradient');
        $gradient_color2        = alico_configs('gradient2');
        $gradient_color3        = alico_configs('gradient3');
        $gradient_color4        = alico_configs('gradient4');
        ob_start();
        echo ':root{';
            
            foreach ($theme_colors as $color => $value) {
                printf('--%1$s-color: %2$s;', str_replace('#', '',$color),  $value['value']);
            }
            foreach ($theme_colors as $color => $value) {
                printf('--%1$s-color-rgb: %2$s;', str_replace('#', '',$color),  alico_hex_rgb($value['value']));
            }
            foreach ($link_color as $color => $value) {
                printf('--link-%1$s: %2$s;', $color, $value);
            }

            foreach ($gradient_color as $color => $value) {
                printf('--gradient-%1$s: %2$s;', $color, $value);
            }
            foreach ($gradient_color as $color => $value) {
                printf('--gradient-%1$s-rgb: %2$s;', $color, alico_hex_rgb($value));
            }

            foreach ($gradient_color2 as $color => $value) {
                printf('--gradient-%1$s: %2$s;', $color, $value);
            }
            foreach ($gradient_color2 as $color => $value) {
                printf('--gradient-%1$s-rgb: %2$s;', $color, alico_hex_rgb($value));
            }

            foreach ($gradient_color3 as $color => $value) {
                printf('--gradient-%1$s: %2$s;', $color, $value);
            }
            foreach ($gradient_color3 as $color => $value) {
                printf('--gradient-%1$s-rgb: %2$s;', $color, alico_hex_rgb($value));
            }

            foreach ($gradient_color4 as $color => $value) {
                printf('--gradient-%1$s: %2$s;', $color, $value);
            }
            foreach ($gradient_color4 as $color => $value) {
                printf('--gradient-%1$s-rgb: %2$s;', $color, alico_hex_rgb($value));
            }

        echo '}';

        return ob_get_clean();
         
    }
}
 