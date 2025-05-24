<?php
use News_Element\Khobish_Helper;
        $out1 = '';
        foreach ($settings['items'] as $item){
            $url = $item['url']['url'];
            $ext = $item['url']['is_external'];
            $nofollow = $item['url']['nofollow'];
            $img = Khobish_Helper::madmag_lazy_img($item['img']['id'],$settings['size']);
            $url = ( isset($url) && $url ) ? 'href='.esc_url($url). '' : '';
            $ext = ( isset($ext) && $ext ) ? 'target= _blank' : '';
            $nofollow = ( isset($url) && $url ) ? 'rel=nofollow' : '';
            $link = $url.' '.$ext.' '.$nofollow;
            $label = $item['label'] ? '<h3 class="label">'.$item['label'].'</h3>' : '';
            $sub = $item['sub'] ? '<p class="subtitle">'.$item['sub'].'</p>' : '';
            $btn = $item['btn'] ? '<a class="nebtn" '.$link.'>'.$item['btn'].'</a>' : '';
            $cout = '<div class="txtcontent">'.$label.$sub.$btn.'</div>';

            $out1 .= '
                <li><div class="inrwrp">'.$img.$cout.'</div></li>
            ';

        }

?>
<div class="khobish-promobox tpoverflow style-2">
  <?php  echo '<ul class="inr">'.$out1.'</ul>';?> 
 </div>
