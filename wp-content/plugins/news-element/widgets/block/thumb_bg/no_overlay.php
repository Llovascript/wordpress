<?php

    use Elementor\Plugin; 

    if(Plugin::instance()->editor->is_edit_mode() || get_post_type()=='elementor_library'){
        
       $id = $settings['prev_id']; 

    } else {

        global $wp_query; 
        $id = $wp_query->post->ID;        
    }
    
    echo '<div class="lazyload bgpostthumb" '.Khobish_Helper::ae_bg_images($id,$settings['img_size']).'>';
    echo '</div>';

?>
      