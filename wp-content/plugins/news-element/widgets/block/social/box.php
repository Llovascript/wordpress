<?php
use News_Element\Khobish_Helper;
if (empty($settings['lists']))
    return;
?>
<div class="ne-social-profile style-two ne-d-flex ne-gutter">
    <?php
    foreach ($settings['lists'] as $a) {
        $icon = Khobish_Helper::display_iconfont($a['icon'],'ne-icon');
        $sub = $a['sub'] ? '<span class="sub">' . $a['sub'] . '</span>' : ''; 
        $count = $a['count'] ? '<span class="count">' . $a['count'] . '</span>' : ''; 
        echo '<div class="ne-df-50"><a class="ne-d-flex ne-v-center elementor-repeater-item-' . $a['_id'].'" ' . Khobish_Helper::render_link($a['url']) . '>'.$icon.'<span class="social-left ne-d-flex ne-dir-col">'.$sub.$count.'</span></a></div>';
        ?> 
        <?php
    } ?>

</div>    