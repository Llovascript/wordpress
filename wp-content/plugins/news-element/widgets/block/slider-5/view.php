<?php
use News_Element\Khobish_Helper;

$excerpt = $settings['excerptf']['size'];
$posts = $settings['posts']['size'];  
$imgf = $settings['imgf'];
$metaf = Khobish_Helper::king_buildermeta_to_string($settings['metas']);

$query_args = Khobish_Helper::hero_slide_query($settings,'query');

$swiper_opt = Khobish_Helper::swiper_markup_helper($settings);
 
$loop = new \WP_Query($query_args);
?>
<div class="khobish-slider-five-wrap">
  <?php echo '<div style="display:none;" class="khobish-slider-five swiper news-swiper-slide" data-slideparams =\''.wp_json_encode($swiper_opt['settings']).'\'>';?>
    <div class="swiper-wrapper line-clip">

      <?php if ($loop->have_posts()) : ?>
              <?php $post_count = 0;while ($loop->have_posts()) : $loop->the_post();$post_count++;
                require dirname(__FILE__) .'/'. sanitize_key($settings['style']) .'.php';
                  endwhile;
                  wp_reset_postdata();
                endif;
              ?>
    </div>
      <?php echo $swiper_opt['nav'];?>            
  </div>
</div>
