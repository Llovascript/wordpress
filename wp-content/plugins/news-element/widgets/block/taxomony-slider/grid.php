<?php
use News_Element\Khobish_Helper;
$swiper_opt = Khobish_Helper::swiper_markup_helper($settings);
$output = '';
foreach ( $settings['taxi'] as $item ) {
    $term = get_term((int)$item['meta']);
    $link = get_term_link((int)$item['meta']);
    $tooltip = $item['high'] ? '<span class="highlight">'.$item['high'].'</span>' : '';
    if ( is_wp_error( $link ) ) {
        echo $link->get_error_message();
    } else {
        $count = $term->count;
        $builder_img = Khobish_Helper::madmag_lazy_img($item['img']['id'],$settings['img']);
        $output .='
                <div class="tax-item">
                    <div class="thumb">
                        '.$tooltip.'
                        <a href="'.$link.'">'.$builder_img.'</a>
                    </div>
                    <div class="tax-content">
                        <a class="tax-label" href="'.$link.'">'.$term->name.'</a>
                        <span class="tax-count">'.$count.' '.$settings['prefix'].'</span>
                    </div>
                </div>    
        
        ';     
    }
}

    echo '
      <div class="taxonomy-slider tax-grid">
        <div class="news-slider">
            '.$output.'
        </div>
      </div>
    ';
?>  

<style>
.taxonomy-slider .tax-item{
    display: inline-flex;
    width: auto; 
    align-items: center;
}

.taxonomy-slider.tax-grid .news-slider {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
}   
.taxonomy-slider .tax-item .thumb{
    position: relative;
} 
.taxonomy-slider .tax-item .highlight{
    position: absolute;
}

</style>  