<?php

	use News_Element\Khobish_Helper;
	use Elementor\Plugin; 

    $meta = Khobish_Helper::king_buildermeta_to_string($settings['metas']);

    if(Plugin::instance()->editor->is_edit_mode() || get_post_type()=='elementor_library'){

       $id = $settings['prev_id']; 

    } else {

        global $wp_query; 
        $id = $wp_query->post->ID;
    }
    
    echo '<div class="khbginr"><div class="lazyload bgpostthumb" '.Khobish_Helper::ae_bg_images($id,$settings['img_size']).'><div class="overlaymeta"><div class="inr">';
      Khobish_Helper::ae_build_postmeta($meta,$ex='');
    echo '</div></div>';
    echo '</div></div>';
?>
 
        
