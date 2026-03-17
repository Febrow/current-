<?php
$default_settings = [
    'col_xl' => '4',
    'col_lg' => '4',
    'col_md' => '3',
    'col_sm' => '2',
    'col_xs' => '1',
    'content_list' => '',
    'ct_animate' => '',
];
$settings = array_merge($default_settings, $settings);
extract($settings);
$col_xl = 12 / intval($col_xl);
$col_lg = 12 / intval($col_lg);
$col_md = 12 / intval($col_md);
$col_sm = 12 / intval($col_sm);
$col_xs = 12 / intval($col_xs);
$grid_sizer = "col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
$item_class = "grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
$img_size = $widget->get_setting('img_size', '');
$image_size = !empty($img_size) ? $img_size : '600x600';
?>
<?php if(isset($content_list) && !empty($content_list) && count($content_list)): ?>
    <div class="ct-grid ct-gallery-grid1">
        <div class="grid-filter-wrap">
            <span class="filter-item active" data-filter="*">All</span>
            
            <?php $cat_list = array();
            foreach ( $content_list as $item ) {
                $g_category = isset($item['category']) ? $item['category'] : '';
                $c_a = explode(',', $g_category);
                foreach ( $c_a as $c){
                    $r_c = str_replace(' ', '-', strtolower(trim($c)));
                    $cat_list[$r_c] = $c;
                }
            } ?>
            <?php foreach ($cat_list as $key => $value):
                $key_result = preg_replace('#[&]*#', '', $key); ?>
                    <?php if(!empty($value)) : ?>
                        <span class="filter-item" data-filter="<?php echo esc_attr('.' . $key_result); ?>">
                            <?php echo esc_attr($value); ?>
                        </span>
                    <?php endif; ?>
            <?php endforeach; ?>
        </div>
        <div class="ct-grid-inner ct-grid-masonry row animate-time" data-gutter="7">
            <?php foreach ($content_list as $key => $value):
    			$image = isset($value['image']) ? $value['image'] : '';
                $category = isset($value['category']) ? $value['category'] : '';
                $c_l = explode(',',$category);
                $filter_class_a = array();
                foreach ( $c_l as $c_c ) {
                    $filter_class_a[] = str_replace(' ','-',trim(strtolower($c_c)));
                }
                $filter_class = implode(' ',$filter_class_a);
                $filter_class_result = preg_replace('#[&]*#', '', $filter_class);
            	?>
                <div class="<?php echo esc_attr($item_class); ?> <?php echo esc_attr( $filter_class_result ); ?>">
                    <div class="item--inner <?php echo esc_attr($ct_animate); ?>" data-wow-duration="1.2s">
                    	<?php if(!empty($image['id'])) { 
                            $img = ct_get_image_by_size( array(
                                'attach_id'  => $image['id'],
                                'thumb_size' => $image_size,
                                'class' => 'no-lazyload',
                            ));
                            $thumbnail = $img['thumbnail'];?>
                            <div class="item--image images-light-box">
                                <?php echo wp_kses_post($thumbnail); ?>
                                <a class="light-box" href="<?php echo wp_get_attachment_image_url( $image['id'], $size = 'full') ?>"><i class="zmdi zmdi-search"></i></a>
                            </div>
                        <?php } ?>
                   </div>
                </div>
            <?php endforeach; ?>
            <div class="grid-sizer <?php echo esc_attr($grid_sizer); ?>"></div>
        </div>
    </div>
<?php endif; ?>
