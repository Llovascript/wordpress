<?php
	use News_Element\Khobish_Helper;

        global $post;
        $pid = $post->ID;

		$per_page = $settings['post_perpage']['size'];
		$template = 'related/index'; 
        $metaf = Khobish_Helper::king_buildermeta_to_string($settings['metaf']);
        $imgf = $settings['imgf'];
        $excerptf = $settings['excerptf']['size'];
        $slice = array_slice($settings['navs'], 0, 1);
        $felm = array_shift($slice);
        $freq = $felm["type"];

        if ($freq=='author'){

            global $post;
            $author_id=$post->post_author;
            $query_args = array(
                'post_type' => 'post',
                'posts_per_page' => $per_page,
                'author' => $author_id,
            );

        }

        if ($freq=='related'){
            
            $postcat = wp_get_post_categories( $pid );
            $all_cat = implode(',' , $postcat);

            $query_args = array(
                'post_type' => 'post',
                'posts_per_page' => $per_page,
                'post__not_in' => array($pid),
                'tax_query' => array(
                    array(
                        'taxonomy' => 'category',
                        'field' => 'term_id',
                        'terms' => $all_cat,
                    ) ,
                ) ,
            );

        }
 
		$options = [
			'template' => $template,
		    'per_page' => $per_page,
		    'pagi_type' => $settings['pagination'],
		    'metaf' => $metaf,
		    'imgf' => $settings['imgf'],
		    'excerptf' => $excerptf,
            'usage'=> 'related',
            'pid' => $pid,
		];

		$wp_query = new WP_Query($query_args);
		$post_count = $wp_query->post_count;
		$post_found = $wp_query->found_posts;

        ?>

<div class="xl-mag-wrap khbrelatedgrid">	
    <?php echo '<div class="kb-filter-bar khrltd" data-xlopt =\''.wp_json_encode($options).'\'>';?>	
        
                    <div class="rightpart">
                     <ul class="kb_subcats_list">

                        <?php
                            $first=0;
                            foreach($settings['navs'] as $cat_id){

                                $first++;
                                $term = get_term( $cat_id);
                                if($first==1){
                                    $cls = 'class="active"';
                                } else {
                                    $cls = '';
                                }
                                echo '<li><a href="#" '.$cls.' data-ajax-catid='.$cat_id['type'].'>'.$cat_id['label'].'</a></li>';
                                                  
                            }
                        ?>

                     </ul>
                      
                </div>
            </div>

						
			<?php echo'<div class="relatedgridinr">';
			
			echo '<div class="khobish-ajax-wrap ne-d-flex ne-gutter">';
            require NEWS_ELM_PATH . 'includes/loops/related/index.php';
            echo '</div>';

			echo Khobish_Helper::xl_ajax_pagination($settings['pagination'],$post_count,$post_found);
			echo '</div>';

		
		echo '</div>';?>
	
