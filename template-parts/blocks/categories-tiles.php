<?php
/**
 * Tiles Categories block template
 *
 * @package Networker
 */

$params = array(
	'layout'     => $attributes['layout'],
	'filter_ids' => $attributes['filter_ids'],
	'orderby'    => $attributes['orderby'],
	'order'      => $attributes['order'],
	'maximum'    => $attributes['maximum'],
);

echo '<div class="' . esc_attr( $attributes['className'] ) . '" ' . ( isset( $attributes['anchor'] ) ? ' id="' . esc_attr( $attributes['anchor'] ) . '"' : '' ) . '>';

// Convert filter ids.
if ( $params['filter_ids'] ) {

	$params['filter_ids'] = wp_parse_list( $params['filter_ids'] );

	foreach ( $params['filter_ids'] as $key => $slug ) {
		$term = get_term_by( 'slug', $slug, 'category' );

		if ( isset( $term->term_id ) ) {
			$params['filter_ids'][ $key ] = $term->term_id;
		}
	}
}

$params = array_merge( array(
	'title'      => '',
	'layout'     => 'tiles',
	'filter_ids' => '',
	'orderby'    => 'name',
	'order'      => 'ASC',
	'maximum'    => 0,
), $params );
?>
	<div class="cs-tiles-categories">
		<div class="cs-tiles-categories__wrap">
			<?php
			$params['maximum'] = intval( $params['maximum'] );

			// Get terms.
			$categories = get_terms( array(
				'include'    => $params['filter_ids'],
				'orderby'    => $params['orderby'],
				'order'      => $params['order'],
				'number'     => $params['maximum'] > 0 ? $params['maximum'] : '',
				'taxonomy'   => 'category',
				'hide_empty' => true,
			) );

			foreach ( $categories as $category ) {
				$featured_image = get_term_meta( $category->term_id, 'powerkit_featured_image', true );

				$tag = isset( $options['typography_heading_tag'] ) ? $options['typography_heading_tag'] : 'h2';
				?>
					<div class="cs-tiles-categories__item">
						<div class="cs-tiles-categories__inner cs-overlay-ratio cs-ratio-<?php echo esc_attr( $options['orientation'] ); ?>" data-scheme="inverse">
							<?php if ( $featured_image ) { ?>
								<div class="cs-tiles-categories__thumbnail">
									<div class="cs-overlay-background">
										<?php echo wp_get_attachment_image( $featured_image, $options['image_size'] ); ?>
									</div>
								</div>
							<?php } ?>

							<div class="cs-tiles-categories__info">
								<<?php echo esc_html( $tag ); ?> class="cs-tiles-categories__label">
									<?php echo esc_html( $category->name ); ?>
								</<?php echo esc_html( $tag ); ?>>

								<div class="cs-tiles-categories__bottom">
									<span class="cs-tiles-categories__number"><?php echo esc_html( (int) $category->count ); ?> <?php esc_html_e( 'posts', 'networker' ); ?></span>
								</div>
							</div>
							<a href="<?php echo esc_url( get_term_link( $category->term_id ) ); ?>" class="cs-overlay-link"></a>
						</div>
					</div>
				<?php
			}
			?>
		</div>
	</div>
<?php

echo '</div>';
