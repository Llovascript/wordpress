<?php
use Elementor\Plugin;
use News_Element\Khobish_Helper;
if ( Plugin::instance()->editor->is_edit_mode() || get_post_type()=='elementor_library' ){
    $id = $settings['prev_id'];
} else { 
    $id = get_the_ID(); 
}
$thumb_id = get_post_thumbnail_id($id);
$caption = wp_get_attachment_caption($thumb_id) && $settings['caption'] ? '<span class="ne-caption">'.wp_get_attachment_caption($thumb_id).'</span>' : '';
?>
<div class="ne-post-thumb no-overflow pos-rel">
<?php echo Khobish_Helper::madmag_lazy_img($id,$settings['imgr']).$caption;?>
</div> 