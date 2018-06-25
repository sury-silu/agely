<?php
/* Custom functions code goes here. */


// Function to display inspiration section.
add_shortcode( 'inspiration', 'agely_inspiration_render');

function agely_inspiration_render() {

	$content = "";
	
	$content .="</div></div></div></div></div>";
	
	$inspiration = new WP_Query( array(
		'post_type'			=> 'inspiration',
		'posts_per_page'	=> 8
	) );
	
	// The Loop
	if ( $inspiration->have_posts() ) {

		while ( $inspiration->have_posts() ) {
			$inspiration->the_post();
			
			$post_id = get_the_ID();
      if( $post_id == 80 || $post_id == 71 || $post_id == 75 ){
      		$flip_class = "vertical_flip_bottom";
      }
      else {
        	$flip_class = "";
      }
      
			$content .= '<div class="inspi-cards vc_col-sm-3 wpb_column vc_column_container">
							<div class="vc_column-inner">
								<div class="wpb_wrapper">
									<div class="flip-box-wrap">
										<div class="flip-box ifb-jq-height ' . $flip_class . '  flip-ifb-jq-height">
											<div class="ifb-flip-box">';
			
			// HTML for front.
			$content .= '<div class="ifb-face ifb-front">
							<div class="ifb-flip-box-section">';
							
			$card_image = get_post_meta( get_the_ID(), 'wpcf-card-image', true );
      if( !$card_image )
        $card_image = "http://agely.co/wp-content/uploads/2018/03/place-img2-1.jpg";
      
			$content .=	'<div class="inspi-thumb"><img src="'. $card_image . '"></div>';
			
			$categories = get_the_category();
			$content .= '<div class="inspiration-category">' . $categories[0]->name .'</div>';
			
			$content .='</div></div>';
			
			// HTML for back.
			
			if( $post_id == 80 || $post_id == 71 || $post_id == 75 ){
				
				$content .= '<div class="ifb-face ifb-back">
								<div class="ifb-flip-box-section">';
							
				$logo = get_post_meta( get_the_ID(), 'wpcf-logo', true );
				$short_description = get_post_meta( get_the_ID(), 'wpcf-short-description', true );
				
				$content .= '<img class="card-logo" src="' . $logo . '">';
				
				$content .='<br><div class="inspi-back-cat">' . $categories[0]->name .'</div>';
				$content .= '<span class="short-description">' . $short_description . '</span><br>';
				$content .='<div class="inspi-details"><a href="' . get_the_permalink() . '">READ MORE</a></div>';
				
				$content .='</div></div>';
			}
			
			$content .= '</div></div></div></div></div></div>';
			
			//$content .= get_the_title();
		}
		
		/* Restore original Post Data */
		wp_reset_postdata();
	} else {
	// no posts found
	}
	
	$content .="<div><div><div><div><div>";
	
	return $content;
}

/* Open external product in new tab */
remove_action( 'woocommerce_external_add_to_cart', 'woocommerce_external_add_to_cart', 30 );
add_action( 'woocommerce_external_add_to_cart', 'rei_external_add_to_cart', 30 );
function rei_external_add_to_cart(){

    global $product;

    if ( ! $product->add_to_cart_url() ) {
        return;
    }

    $product_url = $product->add_to_cart_url();
    $button_text = $product->single_add_to_cart_text();

    do_action( 'woocommerce_before_add_to_cart_button' ); ?>
    <p class="cart">
        <a href="<?php echo esc_url( $product_url ); ?>" target="_blank" rel="nofollow" class="single_add_to_cart_button button alt"><?php echo esc_html( $button_text ); ?></a>
    </p>
    <?php do_action( 'woocommerce_after_add_to_cart_button' );
}


// Function to display Article section.
add_shortcode( 'article', 'agely_article_render');

function agely_article_render($atts){
	
	echo '<div class="w-blog articletype layout_classic type_grid cols_4">
			<div class="w-blog-list">';
	
	//$categories = array('Ease of<br>Living', 'Accessibility <br>and Safety', 'Smart Home <br>Automation', 'Wellness and<br> Healthy Living','Home <br>Improvement', 'Spirituality <br>at Home', 'Universal<br> Design', 'In The <br>Garden' );
	
	$articles = explode(',', $atts['id']);
	
  $categories = explode(',', $atts['categories']);
  
	$counter = 0;
	
	foreach( $articles as $article ){
		
		
		$card_image = get_post_meta( $article, 'wpcf-cardimage', true );
	
		if( !$card_image )
			$card_image = 'https://agely.co/wp-content/uploads/2018/05/ease-of-living-aids-aging-in-place-agely.co1_-1.jpg';
		
		echo	'<article class="w-blog-post">
					<div class="w-blog-post-h">
						<a href="' . get_permalink($article) . '">
							<div class="w-blog-post-preview">
								<img src="' . $card_image . '">
							</div>
						</a>
						<div class="w-blog-post-body">
							<h2 class="w-blog-post-title">
								<a class="entry-title" href="' . get_permalink($article) . '">' . $categories[$counter] . '</a>
							</h2>
						</div>
					</div>
				</article>';
				
		$counter++;
	}
}

// Image size for article cards
add_image_size( 'article-card', 680, 540, true );

function remove_menus(){  

  remove_menu_page( 'wpcf-cpt' );

}  
add_action( 'admin_menu', 'remove_menus', PHP_INT_MAX );  

// Add social icon to products cards on shop page.
add_action( 'wp_head', 'remove_woo_action' );
function remove_woo_action(){
	remove_action( 'woocommerce_after_shop_loop_item_title', 'us_woocommerce_after_shop_loop_item_title', 20 );
}

add_action( 'woocommerce_after_shop_loop_item_title', 'us_child_woocommerce_after_shop_loop_item_title', 20 );
function us_child_woocommerce_after_shop_loop_item_title() {
	
	if ( us_get_option( 'post_sharing' ) ) {
		$sharing_providers = (array) us_get_option( 'post_sharing_providers' );
		$us_sharing_atts = array(
			'type' => us_get_option( 'post_sharing_type', 'simple' ),
			'align' => 'center',
		);
		foreach ( array( 'email', 'facebook', 'twitter', 'linkedin', 'gplus', 'pinterest', 'vk' ) as $provider ) {
			$us_sharing_atts[$provider] = in_array( $provider, $sharing_providers );
		}
		us_load_template( 'shortcodes/us_sharing', array( 'atts' => $us_sharing_atts ) );
	}
	
	echo '</div>';
}