<?php
/**
 * The template part for displaying site section.
 *
 * @package Networker
 */

$scheme = csco_color_scheme(
	get_theme_mod( 'color_search_background', '#f8f9fa' ),
	get_theme_mod( 'color_search_background_dark', '#333335' )
);
?>

<div class="cs-search" <?php echo wp_kses( $scheme, 'post' ); ?>>
	<div class="cs-container">
		<form role="search" method="get" class="cs-search__nav-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
			<div class="cs-search__group">
				<button class="cs-search__submit">
					<i class="cs-icon cs-icon-search"></i>
				</button>

				<input data-swpparentel=".cs-header .cs-search-live-result" required class="cs-search__input" data-swplive="true" type="search" value="<?php the_search_query(); ?>" name="s" placeholder="<?php echo esc_attr( get_theme_mod( 'misc_search_placeholder', esc_html__( 'Enter keyword', 'networker' ) ) ); ?>">

				<button class="cs-search__close">
					<i class="cs-icon cs-icon-x"></i>
				</button>
			</div>
		</form>

		<div class="cs-search__content">
			<?php
			if ( get_theme_mod( 'header_search_posts', true ) ) {

				$args = array(
					'order'               => get_theme_mod( 'header_search_posts_order', 'DESC' ),
					'orderby'             => get_theme_mod( 'header_search_posts_orderby', 'date' ),
					'post_type'           => 'post',
					'ignore_sticky_posts' => true,
					'posts_per_page'      => 3,
				);

				$options = array(
					'image_orientation' => get_theme_mod( 'header_search_image_orientation', 'square' ),
					'image_size'        => get_theme_mod( 'header_search_image_size', 'csco-small' ),
				);

				// WP Query.
				$items = new WP_Query( $args );

				if ( $items->have_posts() ) {
					?>
					<div class="cs-search__posts-wrapper">
						<?php csco_section_heading( get_theme_mod( 'header_search_posts_heading', esc_html__( '[[Hand-Picked]] Top-Read Stories', 'networker' ) ) ); ?>

						<div class="cs-search__posts">
							<?php
							while ( $items->have_posts() ) {
								$items->the_post();
								?>
								<article <?php post_class(); ?>>
									<div class="cs-entry__outer">
										<?php if ( has_post_thumbnail() ) { ?>
											<div class="cs-entry__inner cs-entry__thumbnail cs-entry__overlay cs-overlay-ratio cs-ratio-<?php echo esc_attr( $options['image_orientation'] ); ?>" data-scheme="inverse">
												<div class="cs-overlay-background cs-overlay-transparent">
													<?php the_post_thumbnail( $options['image_size'] ); ?>
												</div>

												<a href="<?php echo esc_url( get_permalink() ); ?>" class="cs-overlay-link"></a>
											</div>
										<?php } ?>

										<div class="cs-entry__inner cs-entry__content">
											<?php the_title( '<h6 class="cs-entry__title"><a href="' . esc_url( get_permalink() ) . '">', '</a></h6>' ); ?>

											<?php csco_get_post_meta( array( 'category', 'author', 'date', 'views', 'shares', 'reading_time', 'comments' ), false, true, 'header_search_posts_meta' ); ?>
										</div>
									</div>
								</article>
							<?php } ?>
						</div>
					</div>
					<?php
				}

				wp_reset_postdata();
			}
			?>

			<?php
			if ( get_theme_mod( 'header_search_tags', true ) ) {
				$tags = get_terms( array(
					'taxonomy'   => 'post_tag',
					'number'     => get_theme_mod( 'header_search_tags_number', 10 ),
					'order'      => get_theme_mod( 'header_search_tags_order', 'DESC' ),
					'orderby'    => get_theme_mod( 'header_search_tags_orderby', 'date' ),
					'hide_empty' => false,
				) );

				if ( $tags && ! is_wp_error( $tags ) ) {
					?>
					<div class="cs-search__tags-wrapper">
						<?php csco_section_heading( get_theme_mod( 'header_search_tags_heading', esc_html__( '[[Trending]] Tags', 'networker' ) ) ); ?>

						<div class="cs-search__tags">
							<ul>
								<?php foreach ( $tags as $item ) { ?>
									<li>
										<a href="<?php echo esc_url( get_term_link( $item->term_id ) ); ?>" rel="tag">
											<?php echo esc_attr( $item->name ); ?>
										</a>
									</li>
								<?php } ?>
							</ul>
						</div>
					</div>
					<?php
				}
			}
			?>

			<div class="cs-search-live-result"></div>
		</div>
	</div>
</div>
