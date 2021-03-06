<?php defined( 'ABSPATH' ) OR die( 'This script cannot be accessed directly.' );

/**
 * The template for displaying archive pages
 */

$us_layout = US_Layout::instance();

get_header();

// Creating .l-titlebar
$title = ( is_category() ) ? single_cat_title( '', false ) :  single_term_title( '', false );
$titlebar_vars = array(
	'title' => $title,
);
if ( is_category() OR is_tag() OR is_tax() ) {
	$term = get_queried_object();
	
	$archive = $term;
	
	if ( $term ) {
		$taxonomy = $term->taxonomy;
		$term = $term->term_id;
	}
	$titlebar_vars['subtitle'] = get_term_field( 'description', $term, $taxonomy, 'display' );
}

echo '<div class="l-titlebar"><h1>' . $archive->name . '</h1>';

/****** Display Archive breadcrumb *********/
echo '<div id="archive_breadcrumbs"><a href="' . get_home_url() . '">Home</a> > ';

if( $archive->parent ){
	$parent = get_term_by( 'id', $archive->parent, $archive->taxonomy );
	
	echo '<a href="' . get_term_link( $archive->parent, $parent->taxonomy ) . '">' . $parent->name . '</a> > ';
}

echo '<a href="' . get_term_link( $archive->term_id, $archive->taxonomy ) . '">' . $archive->name . '</a>'. '</div>';

echo '<p> ' . get_term_field( 'description', $term, $taxonomy, 'display' ) . '</p></div>';

$template_vars = array(
	'layout' => us_get_option( 'archive_layout', 'smallcircle' ),
	'type' => us_get_option( 'archive_type', 'grid' ),
	'columns' => us_get_option( 'archive_cols', 1 ),
	'img_size' => us_get_option( 'archive_img_size', 'default' ),
	'metas' => (array) us_get_option( 'archive_meta', array() ),
	'content_type' => us_get_option( 'archive_content_type', 'excerpt' ),
	'show_read_more' => in_array( 'read_more', us_get_option( 'archive_meta', array() ) ),
	'pagination' => us_get_option( 'archive_pagination', 'regular' ),
);

$default_archive_sidebar_id = us_get_option( 'archive_sidebar_id', 'default_sidebar' );

?>
	<div class="l-main">
		<div class="l-main-h i-cf">

			<main class="l-content"<?php echo ( us_get_option( 'schema_markup' ) ) ? ' itemprop="mainContentOfPage"' : ''; ?>>
				<section class="l-section">
					<div class="l-section-h i-cf">

						<?php do_action( 'us_before_archive' ) ?>

						<?php us_load_template( 'templates/blog/listing', $template_vars ) ?>

						<?php do_action( 'us_after_archive' ) ?>

					</div>
				</section>
			</main>

			<?php if ( $us_layout->sidebar_pos == 'left' OR $us_layout->sidebar_pos == 'right' ): ?>
				<aside class="l-sidebar at_<?php echo $us_layout->sidebar_pos . ' ' . us_dynamic_sidebar_id( $default_archive_sidebar_id ); ?>"<?php echo ( us_get_option( 'schema_markup' ) ) ? ' itemscope itemtype="https://schema.org/WPSideBar"' : ''; ?>>
					<?php us_dynamic_sidebar( $default_archive_sidebar_id ); ?>
				</aside>
			<?php endif; ?>

		</div>
	</div>

<?php
get_footer();
