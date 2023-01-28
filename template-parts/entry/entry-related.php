<?php
/**
 * The template part for displaying related posts.
 *
 * @package Networker
 */

// Order by.
$orderby = get_theme_mod( 'related_orderby', 'rand' );

$args = array(
	'query_type'          => 'related',
	'orderby'             => $orderby,
	'ignore_sticky_posts' => true,
	'post__not_in'        => array( $post->ID ),
	'category__in'        => wp_get_post_categories( $post->ID ),
	'posts_per_page'      => get_theme_mod( 'related_number', 3 ),
);

$type_post_views = csco_post_views_enabled();

if ( 'post_views' === $orderby && $type_post_views ) {
	// Post Views.
	$args['orderby'] = $type_post_views;
	// Don't hide posts without views.
	$args['views_query']['hide_empty'] = false;

	// Time Frame.
	$time_frame = get_theme_mod( 'related_time_frame' );
	if ( $time_frame ) {
		$args['date_query'] = array(
			array(
				'column' => 'post_date_gmt',
				'after'  => $time_frame . ' ago',
			),
		);
	}
}

// Set query vars, so that we can get them across all templates.
set_query_var( 'csco_query', array( 'location' => 'related' ) );

// WP Query.
$related = new WP_Query( apply_filters( 'csco_related_posts_args', $args ) );

if ( $related->have_posts() && isset( $related->posts ) ) {

	$related_enable = true;
	$maximum_posts  = false;

	// Calc possible number of posts.
	$divider = 3;

	$maximum_posts = floor( count( $related->posts ) / $divider ) * $divider;

	if ( $maximum_posts <= 0 ) {
		$related_enable = false;
	}

	if ( $related_enable ) :
		?>
		<div class="cs-entry__post-related">
			<?php csco_section_heading( esc_html__( '[[Related Posts]]', 'networker' ) ); ?>

			<div class="cs-entry__post-wrap">
				<?php
				$counter = 0;
				/* Start the Loop */
				while ( $related->have_posts() ) {
					$related->the_post();

					$counter++;

					// Possible number of posts for Grid.
					if ( false !== $maximum_posts ) {
						if ( $counter > $maximum_posts ) {
							continue;
						}
					}

					// Set options.
					$options = array(
						'location'          => 'related',
						'layout'            => 'grid',
						'meta'              => 'related_post_meta',
						'compact_meta'      => get_theme_mod( 'related_compact_post_meta', true ),
						'image_orientation' => get_theme_mod( 'related_image_orientation', 'original' ),
						'image_size'        => get_theme_mod( 'related_image_size', 'csco-thumbnail' ),
						'overlay_image'     => false,
						'more_button'       => true,
					);

					set_query_var( 'options', $options );

					// Get content template part.
					get_template_part( 'template-parts/archive/content' );
				}
				?>
			</div>
		</div>
	<?php endif; ?>

	<?php wp_reset_postdata(); ?>

	<?php
	set_query_var( 'csco_archive_layout', null );
}
