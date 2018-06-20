<?php  defined( 'ABSPATH' ) OR die( 'This script cannot be accessed directly.' );

// Template Name: Articles

$us_layout = US_Layout::instance();

get_header();

$page_id = get_the_id();
$cat_text_1 = get_post_meta( $page_id, 'cat_text_1', true );
$cat_text_2 = get_post_meta( $page_id, 'cat_text_2', true );
$cat_text_3 = get_post_meta( $page_id, 'cat_text_3', true );
$cat_text_4 = get_post_meta( $page_id, 'cat_text_4', true );
$cat_text_5 = get_post_meta( $page_id, 'cat_text_5', true );
$cat_text_6 = get_post_meta( $page_id, 'cat_text_6', true );
$cat_text_7 = get_post_meta( $page_id, 'cat_text_7', true );
$cat_text_8 = get_post_meta( $page_id, 'cat_text_8', true );
$cat_icon_1 = get_post_meta( $page_id, 'cat_icon_1', true );
$cat_icon_2 = get_post_meta( $page_id, 'cat_icon_2', true );
$cat_icon_3 = get_post_meta( $page_id, 'cat_icon_3', true );
$cat_icon_4 = get_post_meta( $page_id, 'cat_icon_4', true );
$cat_icon_5 = get_post_meta( $page_id, 'cat_icon_5', true );
$cat_icon_6 = get_post_meta( $page_id, 'cat_icon_6', true );
$cat_icon_7 = get_post_meta( $page_id, 'cat_icon_7', true );
$cat_icon_8 = get_post_meta( $page_id, 'cat_icon_8', true );
$group_text_1 = get_post_meta( $page_id, 'group_text_1', true );
$group_text_2 = get_post_meta( $page_id, 'group_text_2', true );
$group_text_3 = get_post_meta( $page_id, 'group_text_3', true );
$group_icon_1 = get_post_meta( $page_id, 'group_icon_1', true );
$group_icon_2 = get_post_meta( $page_id, 'group_icon_2', true );
$group_icon_3 = get_post_meta( $page_id, 'group_icon_3', true );

$terms = array('ease-of-living', 'accessibility-and-safety', 'smart-home-automation', 'wellness-and-healthy-living', 'home-improvement', 'spirituality-at-home', 'universal-design', 'in-the-garden' );

$category_slug_list = $terms;

$groups = array( 'guides', 'learn', 'stories' );

if( isset($_POST["category"]) && $_POST["category"] ) {
	
	if( in_array( $_POST["category"], $terms )  ) {
		$selected[ array_search( $_POST["category"], $terms ) + 1 ] = "category-selected";
	}

	$terms = array($_POST["category"]);
	
	$category_obj = get_term_by('slug', $_POST["category"], 'article-category');

	$category_description =  term_description( $category_obj->term_id, 'article-category' );
}

if( isset($_POST["group"]) && $_POST["group"] ) {
	$groups = array($_POST["group"]);
}
?>


<div class="l-main">
<div class="l-main-h i-cf">
<main class="l-content" itemprop="mainContentOfPage">


<section id="category_selector" class="l-section wpb_row height_medium">
<div class="l-section-h i-cf">
<div class="g-cols vc_row type_default valign_top">

	
	<div class="vc_col-sm-6 wpb_column vc_column_container">
	<div class="vc_column-inner">
	<div class="wpb_wrapper">
	<div class="g-cols wpb_row type_default valign_top vc_inner">
	
		<!-- Category 1 -->
		<div class="vc_col-sm-3 wpb_column vc_column_container">
		<div class="category-selector vc_column-inner <?php echo $selected[1];?>">
		<div class="wpb_wrapper">
			<div class="w-image">
				<img id="ease-of-living" src="<?php echo $cat_icon_1;?>">
			</div>
			<span class="category-name"><?php echo $cat_text_1;?></span>
		</div>
		</div>
		</div>
		
		<!-- Category 2 -->
		<div class="vc_col-sm-3 wpb_column vc_column_container">
		<div class="category-selector vc_column-inner <?php echo $selected[2];?>">
		<div class="wpb_wrapper">
			<div class="w-image">
				<img id="accessibility-and-safety" src="<?php echo $cat_icon_2;?>">
			</div>
			<span class="category-name"><?php echo $cat_text_2;?></span>
		</div>
		</div>
		</div>
		
		<!-- Category 3 -->
		<div class="vc_col-sm-3 wpb_column vc_column_container">
		<div class="category-selector vc_column-inner <?php echo $selected[3];?>">
		<div class="wpb_wrapper">
			<div class="w-image">
				<img id="smart-home-automation" src="<?php echo $cat_icon_3;?>">
			</div>
			<span class="category-name"><?php echo $cat_text_3;?></span>
		</div>
		</div>
		</div>
		
		<!-- Category 4 -->
		<div class="vc_col-sm-3 wpb_column vc_column_container">
		<div class="category-selector vc_column-inner <?php echo $selected[4];?>">
		<div class="wpb_wrapper">
			<div class="w-image">
				<img id="wellness-and-healthy-living" src="<?php echo $cat_icon_4;?>">
			</div>
			<span class="category-name"><?php echo $cat_text_4;?></span>
		</div>
		</div>
		</div>
	</div>
	</div>
	</div>
	</div>
	
	
	<div class="vc_col-sm-6 wpb_column vc_column_container">
	<div class="vc_column-inner">
	<div class="wpb_wrapper">
	<div class="g-cols wpb_row type_default valign_top vc_inner">
	
		<!-- Category 5 -->
		<div class="vc_col-sm-3 wpb_column vc_column_container">
		<div class="category-selector vc_column-inner <?php echo $selected[5];?>">
		<div class="wpb_wrapper">
			<div class="w-image">
				<img id="home-improvement" src="<?php echo $cat_icon_5;?>">
			</div>
			<span class="category-name"><?php echo $cat_text_5;?></span>
		</div>
		</div>
		</div>
		
		<!-- Category 6 -->
		<div class="vc_col-sm-3 wpb_column vc_column_container">
		<div class="category-selector vc_column-inner <?php echo $selected[6];?>">
		<div class="wpb_wrapper">
			<div class="w-image">
				<img id="spirituality-at-home" src="<?php echo $cat_icon_6;?>">
			</div>
			<span class="category-name"><?php echo $cat_text_6;?></span>
		</div>
		</div>
		</div>
		
		<!-- Category 7 -->
		<div class="vc_col-sm-3 wpb_column vc_column_container">
		<div class="category-selector vc_column-inner <?php echo $selected[7];?>">
		<div class="wpb_wrapper">
			<div class="w-image">
				<img id="universal-design" src="<?php echo $cat_icon_7;?>">
			</div>
			<span class="category-name"><?php echo $cat_text_7;?></span>
		</div>
		</div>
		</div>
		
		<!-- Category 8 -->
		<div class="vc_col-sm-3 wpb_column vc_column_container">
		<div class="category-selector vc_column-inner <?php echo $selected['8'];?>">
		<div class="wpb_wrapper">
			<div class="w-image">
				<img id="in-the-garden" src="<?php echo $cat_icon_8;?>">
			</div>
			<span class="category-name"><?php echo $cat_text_8;?></span>
		</div>
		</div>
		</div>
	</div>
	</div>
	</div>
	</div>
	

	<div class="vc_col-sm-4 wpb_column vc_column_container" style="margin-bottom: 0px;">
	<div class="vc_column-inner">
	<div class="wpb_wrapper">
	<div class="g-cols wpb_row type_default valign_top vc_inner">
	</div></div></div></div>
	
	
	<div id="group_selector" class="vc_col-sm-4 wpb_column vc_column_container">
	<div class="vc_column-inner">
	<div class="wpb_wrapper">
	<div class="g-cols wpb_row type_default valign_top vc_inner">
	
		<!-- Groups 1 -->
		<div class="vc_col-sm-4 wpb_column vc_column_container">
		<div class="group-selector vc_column-inner">
		<div class="wpb_wrapper">
			<div class="w-image">
				<img id="guides" src="<?php echo $group_icon_1;?>">
			</div>
			<span class="category-name"><?php echo $group_text_1;?></span>
		</div>
		</div>
		</div>
		
		<!-- Groups 2 -->
		<div class="vc_col-sm-4 wpb_column vc_column_container">
		<div class="group-selector vc_column-inner">
		<div class="wpb_wrapper">
			<div class="w-image">
				<img id="learn" src="<?php echo $group_icon_2;?>">
			</div>
			<span class="category-name"><?php echo $group_text_2;?></span>
		</div>
		</div>
		</div>
		
		<!-- Groups 3 -->
		<div class="vc_col-sm-4 wpb_column vc_column_container">
		<div class="group-selector vc_column-inner">
		<div class="wpb_wrapper">
			<div class="w-image">
				<img id="stories" src="<?php echo $group_icon_3;?>">
			</div>
			<span class="category-name"><?php echo $group_text_3;?></span>
		</div>
		</div>
		</div>
	</div>
	</div>
	</div>
	</div>
	
	
	<div class="vc_col-sm-4 wpb_column vc_column_container" style="margin-bottom: 0px;">
	<div class="vc_column-inner">
	<div class="wpb_wrapper">
	<div class="g-cols wpb_row type_default valign_top vc_inner">
	</div></div></div></div>
	
	<form id="category_selection" action="" method="post">
		<input id="category" type="hidden" name="category" value="<?php echo $_POST["category"]; ?>">
		<input id="group" type="hidden" name="group" value="<?php echo $_POST["group"]; ?>">
	</form>
	
	
</div>

</div>
</section>



<?php
// The Query
$articles = new WP_Query( array(
				'post_type' => 'article',
				'tax_query' => array(
					'relation' => 'AND',
					array(
						'taxonomy' => 'article-category',
						'field'    => 'slug',
						'terms'    => $terms,
					),
					array(
						'taxonomy' => 'article-group',
						'field'    => 'slug',
						'terms'    => $groups,
					)
				)
			) );
?>

<section class="l-section wpb_row height_medium">
<div class="l-section-h i-cf">
<div class="g-cols vc_row type_default valign_top">


<div class="vc_col-sm-12 wpb_column vc_column_container">
<div class="vc_column-inner">
<div class="wpb_wrapper" id="category_description">
	<?php echo $category_description; ?>
</div>
</div>
</div>

<div class="vc_col-sm-12 wpb_column vc_column_container">
<div class="vc_column-inner">
<div class="wpb_wrapper">
<div class="w-blog layout_classic type_grid cols_3">
<div class="w-blog-list">

<?php // The Loop
while ( $articles->have_posts() ) {
	$articles->the_post();
	
	$article_group = get_the_terms( get_the_ID(), 'article-group' );
	$article_categories = get_the_terms( get_the_ID(), 'article-category' );
	
?>	
	
	<article class="w-blog-post">
		<div class="w-blog-post-wrapper">
			<div class="w-blog-post-h">
				<?php
				if( $article_group[0]->name ) {
					echo '<span class="' . $article_group[0]->slug . '">' . $article_group[0]->name . '</span>';
				}?>
				
				<a href="<?php the_permalink(); ?>"> <?php the_post_thumbnail( 'article-card' ); ?> </a>
			</div>
			<div class="w-blog-post-body">
				<h2 class="w-blog-post-title"><?php echo substr( get_the_title(), 0, 60 ); ?>...</h2>
			</div>
			<div class="w-blog-post-meta">
				<?php
				$primary_category_id = get_post_meta( get_the_ID(), '_yoast_wpseo_primary_article-category', true );
				$primary_category_obj = get_term_by('id', $primary_category_id, 'article-category');
				$category_position = array_search( $primary_category_obj->slug, $category_slug_list ) + 1;
				$category_icon =  ${'cat_icon_'.$category_position};
				
				echo '<img class="category-icon" src="' . $category_icon . '">';
				?>
			
			</div>
		</div>
	</article>
	
	
<?php
}?>

</div></div></main></section>  </div></div></div></div></div></div></div>

<?php /* Restore original Post Data */
wp_reset_postdata();


get_footer();
?>


<script>
	jQuery( document ).ready(function() {
		jQuery('#category_selector .category-selector').click(function(){
			jQuery('#category').val( jQuery( '.w-image img', this).attr('id') );
			jQuery('form#category_selection').submit();
		});
		
		jQuery('#category_selector .group-selector').click(function(){
			jQuery('#group').val( jQuery( '.w-image img', this).attr('id') );
			jQuery('form#category_selection').submit();
		});
	});
</script>