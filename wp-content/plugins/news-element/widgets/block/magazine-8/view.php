<?php
	use News_Element\Khobish_Helper;

		$cat = explode(',' , Khobish_Helper::king_buildermeta_to_string($settings['terms']));
		$per_page = $settings['post_perpage']['size'];
        $template = 'magazine-8/'.$settings['tmpl'].'';
 
        $metaf = Khobish_Helper::king_buildermeta_to_string($settings['metaf']);
        $metar = Khobish_Helper::king_buildermeta_to_string($settings['metar']);

        $imgf = $settings['imgf'];
        $imgr = $settings['imgr'];
 
        $excerptf = $settings['excerptf']['size'];
        $excerptr = $settings['excerptr']['size'];


        $query_args = Khobish_Helper::query_arg($settings);
		$options = Khobish_Helper::filter_options ($template,$settings);
        $filters = Khobish_Helper::filter_nav_label($settings);
        $i = 0;
		$wp_query = new WP_Query($query_args);
		$post_count = $wp_query->post_count;
		$post_found = $wp_query->found_posts;
		$cls = $settings['tmpl'];
		Khobish_Helper::xlmag_filter_nav($filters,$options,$cat);
			echo'<div class="mag8 '.$cls.'">';
			echo '<div class="khobish-ajax-wrap ne-d-flex ne-gutter ne-mobile-block">'; 
			if (in_array($settings['tmpl'], ['style_one', 'style_two'])) {
				require NEWS_ELM_PATH . 'includes/loops/magazine-8/' . $settings['tmpl'] . '.php';
			} 
			echo '</div>';
			echo Khobish_Helper::xl_ajax_pagination($settings['pagination'],$post_count,$post_found);
			echo '</div>';
		echo '</div>';?>  
