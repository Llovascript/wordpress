<?php
use News_Element\Khobish_Helper;
?>

    <div class="five ne-d-flex ne-mobile-block">
        <div class="ne-df-50">
        <?php if(!empty($previous_post_id)) :
            $previous_post = get_permalink($previous_post_id );
            $previous_post_title = get_the_title($previous_post_id );
            $preth = Khobish_Helper::madmag_lazy_img($previous_post_id,'thumbnail');
            ?>
            <a class="prev-post ne-d-flex ne-v-center" href="<?php echo $previous_post;?>">
                <?php echo $preth; ?> 
                <div class="pn-text">
                    <span class="pnlable"><?php echo $settings['ptxt'];?></span> 
                    <h4 class="link"><?php echo $previous_post_title;?></h4> 
                </div>      
            </a>
        <?php endif; ?>
        </div>
        <div class="ne-df-50 text-right">
        <?php if(!empty($next_post_id)) :
            $next_post= get_permalink($next_post_id );
            $next_post_title = get_the_title($next_post_id );
            $nxth = Khobish_Helper::madmag_lazy_img($next_post_id,'thumbnail');
            ?>
                <a class="next-post ne-d-flex ne-v-center" href="<?php echo $next_post;?>">
                    <?php echo $nxth;?>
                    <div class="pn-text">
                        <span class="pnlable"><?php echo $settings['ntxt'];?></span>
                        <h4 class="link"><?php echo $next_post_title;?></h4> 
                    </div>
                </a>
        <?php endif; ?>
        </div>
    </div>
