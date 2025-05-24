<?php
use News_Element\Khobish_Helper;
        $out1 = '';
        foreach ($settings['items'] as $item){

            $label = $item['label'] ? '<h3 class="label">'.$item['label'].'</h3>' : '';
            $sub = $item['sub'] ? '<p class="subtitle">'.$item['sub'].'</p>' : '';
            $cout = '<div class="khbcontent">'.$label.$sub.'</div>';
            $url = $item['url']['url'];
            $ext = $item['url']['is_external'];
            $nofollow = $item['url']['nofollow'];
            $img = Khobish_Helper::madmag_lazy_img($item['img']['id'],$settings['size']);
            $url = ( isset($url) && $url ) ? 'href='.esc_url($url). '' : '';
            $ext = ( isset($ext) && $ext ) ? 'target= _blank' : '';
            $nofollow = ( isset($url) && $url ) ? 'rel=nofollow' : '';
            $link = $url.' '.$ext.' '.$nofollow;
            $out1 .= '
                <li><div class="inrwrp"><div class="ovly">'.$cout.'</div>'.$img.'<a class="linksocial" '.$link.'></a></div></li>
            ';

        }

?>
<div class="khobish-promobox style-1 tpoverflow">
  <?php  echo '<ul class="inr">'.$out1.'</ul>';?> 
 </div>
