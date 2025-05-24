<?php

use News_Element\Khobish_Helper;
    $output = '';
    $icon = Khobish_Helper::display_iconfont($settings['icon'],'khbicon');
    foreach ( $settings['taxi'] as $item ) { 

        $term = get_term((int)$item['meta']);
        $link = get_term_link((int)$item['meta']);
        if ( is_wp_error( $link ) ) {
            echo $link->get_error_message();
        } else {
            $meta = get_term_meta((int)$item['meta']);
            $count = sprintf("%02d", $term->count);
            $img = Khobish_Helper::ae_bg_images($item['img']['id'],$settings['img']);

            $output .='<a class="ne-df-100 bgtax-2 elementor-repeater-item-' . $item['_id'].'" href="'.$link.'">
                                <div '.$img.' class="lazyload ne-d-flex ne-space-btwn ne-v-center pos-rel no-overflow">
                                    <h3 class="title margin-0">'.$icon.$term->name.'</h3>
                                    <span class="taxnum ne-d-flex ne-v-center ne-center-justify">'.$count.' '.$settings['prefix'].'</span>
                                </div>
                        </a>';

        } 
    }

    echo '<div class="khbtaxlist3 ne-d-flex ne-gutter">'.$output.'</div>';

?>