<?php
use Elementor\Plugin;
use News_Element\Khobish_Helper;
if ( Plugin::instance()->editor->is_edit_mode() || get_post_type()=='elementor_library' ){
    $id = $settings['prev_id'];
} else { 
    $id = get_the_ID(); 
}

$reading =  Khobish_Helper::fashmag_reading_time();
$u_time = get_the_time('U',$id);

$u_modified_time = get_the_modified_time('U',$id);
$updated_time = get_the_modified_time('h:i a',$id);
$updated_date = get_the_modified_time('F jS, Y',$id);

if ($u_modified_time >= $u_time + 86400) {
    
    $updated = '<p class="last-updated-date margin-0">Last updated: '. $updated_date . ' at '. $updated_time .'</p>';
} else {
    $updated = '<p class="last-updated-date margin-0">Last updated: '. $updated_date . ' at '. $updated_time .'</p>';
}
  
?>

<div class="ne-author-image ne-d-flex ne-v-center">
    <?php echo '<a class="pos-rel" href="'.get_author_posts_url( get_the_author_meta( 'ID' )).'">'.get_avatar( get_the_author_meta( 'ID' ), 100 ).'<i aria-hidden="true" class="pos-abs bivo bi-patch-check-fill"></i></a>';?>
    <div class="ne-post-info">
        <?php echo get_the_author_posts_link();?>
        <?php echo $reading.$updated;?>
    </div>
</div>
 