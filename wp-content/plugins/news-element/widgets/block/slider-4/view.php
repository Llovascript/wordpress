<?php
use News_Element\Khobish_Helper;
$excerpt = $settings['excerptf']['size'];
$imgf = $settings['imgf'];
$metaf = Khobish_Helper::king_buildermeta_to_string($settings['metas']);

$query_args = Khobish_Helper::hero_slide_query($settings,'query');

$swiper_opt = Khobish_Helper::swiper_markup_helper($settings);

$loop = new \WP_Query($query_args);

?>
<div class="khobish-slider-four">
<?php echo '<div style="display:none" class="swiper news-swiper-slide '.$settings['bordered'].'" data-slideparams =\''.wp_json_encode($swiper_opt['settings']).'\'>';?>
<div class="swiper-wrapper">
      <?php if ($loop->have_posts()) : ?>
              <?php while ($loop->have_posts()) : $loop->the_post();
               ?>

                  <div  class="swiper-slide inner">
                     <div class="inrwrapper lazyload" <?php echo Khobish_Helper::madmag_bg_images($imgf); ?>>   
                      <div class="excerpt-wrap">
                        <div class="inrexcerpt">
                          <?php Khobish_Helper::ae_build_postmeta($metaf,$excerpt);?>
                        </div>
                      </div>                                            
                    </div>
                  </div>
       
              <?php endwhile; ?>

              <?php wp_reset_postdata(); ?>
              
      <?php endif;?>
  </div>
  <?php echo $swiper_opt['nav'];?> 
</div>
</div>

