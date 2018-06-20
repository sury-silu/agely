<?php defined( 'ABSPATH' ) OR die( 'Sorry boss, i can not be accessed directly!' );

get_header();

// Fetch post data.
$post_id			= get_the_ID();
$name				= get_the_title();
$categories			= get_the_category();
$info				= get_post_meta( $post_id, 'wpcf-info', true );
$logo				= get_post_meta( $post_id, 'wpcf-logo', true );
$intro				= get_post_meta( $post_id, 'wpcf-introduction', true );
$address			= get_post_meta( $post_id, 'wpcf-address', true );
$phone				= get_post_meta( $post_id, 'wpcf-phone', true );
$website			= get_post_meta( $post_id, 'wpcf-website', true );
$facebook			= get_post_meta( $post_id, 'wpcf-facebook', true );
$twitter			= get_post_meta( $post_id, 'wpcf-twitter', true );
$gplus				= get_post_meta( $post_id, 'wpcf-gplus', true );
$linkedin			= get_post_meta( $post_id, 'wpcf-linkedin', true );
$pinterest			= get_post_meta( $post_id, 'wpcf-pinterest', true );
$youtube			= get_post_meta( $post_id, 'wpcf-youtube', true );
$tagline			= get_post_meta( $post_id, 'wpcf-tagline', true );
$short_description	= get_post_meta( $post_id, 'wpcf-short-description', true );

?>

<div id="inspi_single" class="l-main">
	<div class="l-main-h i-cf">

		<main class="l-content" itemprop="mainContentOfPage">

			<!-- Row > 1 : company name, info, breadcrumb -->
			<section id="inspi-top" class="l-section wpb_row height_medium" style="background-image:url('<?php echo get_the_post_thumbnail_url( $post_id, 'full' ); ?>')">
			
				<div id="inspi_overlay"></div>
				<div class="l-section-h i-cf">
					<div class="g-cols vc_row type_default valign_top">
						<div class="vc_col-sm-12 wpb_column vc_column_container">
							<div class="vc_column-inner">
								<div class="wpb_wrapper">
									<h2 id="name"><?php echo $name;?></h2>
									<p id="info"><?php echo $info;?></p>
									<div id="breadcrumb">
										<a href="http://agely.co/#inspiration">
											Inspiration / <?php echo $categories[0]->name; ?> / <?php echo $name;?>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			
			<!-- Row > 3: Logo, company introduction and address. -->
			<section id="inspi_details_row" class="l-section wpb_row height_medium">
				<div class="l-section-h i-cf">
					<div class="g-cols vc_row type_default valign_middle">
					
						<!-- Left: Logo -->
						<div id="inspi_logo" class="vc_col-sm-4 wpb_column vc_column_container">
							<div class="vc_column-inner">
								<div class="wpb_wrapper">
									<div class="w-image">
										<div class="w-image-h">
											<img src="<?php echo $logo; ?>">
										</div>
									</div>
									<p id="short_description"><?php echo $tagline;?></p>
									<div id="inspi_social">
										<p>FOLLOW</p>
										
										<?php
										if( $facebook ) {
										?>
											<div class="w-socials-item facebook">
												<a class="w-socials-item-link" target="_blank" href="<?php echo $facebook;?>" aria-label="Facebook"></a>
											</div>
										<?php
										}
										if( $twitter ) {
										?>
											<div class="w-socials-item twitter">
												<a class="w-socials-item-link" target="_blank" href="<?php echo $twitter;?>" aria-label="Twitter"></a>
											</div>
										<?php
										}
										if( $gplus ) {
										?>
											<div class="w-socials-item google">
												<a class="w-socials-item-link" target="_blank" href="<?php echo $gplus;?>" aria-label="gplus"></a>
											</div>
										<?php
										}
										if( $linkedin ) {
										?>
											<div class="w-socials-item linkedin">
												<a class="w-socials-item-link" target="_blank" href="<?php echo $linkedin;?>" aria-label="LinkedIn"></a>
											</div>
										<?php
										}
										if( $pinterest ) {
										?>
											<div class="w-socials-item pinterest">
												<a class="w-socials-item-link" target="_blank" href="<?php echo $pinterest;?>" aria-label="Pinterest"></a>
											</div>
										<?php
										}
										if( $youtube ) {
										?>
											<div class="w-socials-item youtube">
												<a class="w-socials-item-link" target="_blank" href="<?php echo $youtube;?>" aria-label="YouTube"></a>
											</div>
										<?php
										} ?>
									</div>
								</div>
							</div>
						</div>
						
						<!-- Right: company introduction and address. -->
						<div id="inspi_details" class="vc_col-sm-8 wpb_column vc_column_container">
							<div class="vc_column-inner">
								<div class="wpb_wrapper">
									<h2>Who We Are</h2>
									<p id="intro"><?php echo $intro;?></p>
									<i class="fa fa-map-marker"><span><?php echo $address;?></span></i><br>
									<i class="fa fa-phone"><span><?php echo $phone;?></span></i>
									<i class="fa fa-globe"><span>
                    <a target="_blank" href="https://<?php echo $website;?>"><?php echo $website;?></a>
                  </span></i>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			
			
			<?php // Display the post content.
			the_content();
			?>
			
		</main>
	</div>
</div>


<?php get_footer(); ?>