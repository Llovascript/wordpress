<?php
	use News_Element\Khobish_Helper;
?>

  <div  class="swiper-slide">
     <div class="inrwrapper"> 

      <div class="excerpt-wrap">
        <div class="inrexcerpt">
          <?php Khobish_Helper::ae_build_postmeta($metaf,$excerpt);?>
        </div>
      </div>

      <div class="ft-thumbwrap odd <?php echo Khobish_Helper::xl_post_format_icon();?>">
        <a href="<?php the_permalink();?>">
          <span class="khbmedia icon"></span>
          <?php echo Khobish_Helper::madmag_lazy_img(get_the_ID(),$imgf);?>
        </a>
        <div class="khboverlaythumb"><?php echo Khobish_Helper::khobish_single_category_bg();?></div>
      </div> 
                                            
    </div>
  </div>
                  