<?php
use News_Element\Khobish_Helper;
if (empty($settings['lists']))
    return;
?>
<div class="ne-social-profile style-one ne-d-flex ne-dir-col">
    <?php
    foreach ($settings['lists'] as $a) {
        $icon = Khobish_Helper::display_iconfont($a['icon'],'ne-icon');
        $sub = $a['sub'] ? '<span class="sub">' . $a['sub'] . '</span>' : ''; 
        $count = $a['count'] ? '<span class="count">' . $a['count'] . '</span>' : ''; 
        echo '<a class="ne-d-flex ne-v-center ne-space-btwn elementor-repeater-item-' . $a['_id'].'" ' . Khobish_Helper::render_link($a['url']) . '><span class="social-left ne-d-flex ne-v-center">'.$icon.$sub.'</span>'.$count.'</a>';
        ?> 
        <?php
    } ?>

</div>    