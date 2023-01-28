<?php
/**
 * Block Large Type 1
 *
 * @var        $attributes - block attributes
 * @var        $options - layout options
 * @var        $posts - all available posts
 *
 * @package Networker
 */

// Check if there're enough posts in the query.
if ( $posts->have_posts() ) { ?>
	<div class="<?php echo esc_attr( $attributes['className'] ); ?>">
		<div class="cnvs-block-posts-inner">
			<div class="cs-slider cs-flickity-init" data-autoplay="<?php echo esc_attr( $options['autoplay'] ); ?>" data-pagedots="<?php echo esc_attr( $options['pagedots'] ); ?>" data-wraparound="<?php echo esc_attr( $options['wraparound'] ); ?>">
				<div class="cs-slider__wrap">
					<div class="cs-slider__items">
						<?php
						while ( $posts->have_posts() ) {
							$posts->the_post();

							$options['withoutLink'] = true;

							$meta_transform = cnvs_block_post_meta( $options, array( 'views', 'comments', 'shares', 'reading_time' ), false );

							// Data class.
							$meta_transform = $meta_transform ? 'cs-entry__data-transform' : null;
							?>
							<div class="cs-slider__cell">
								<article <?php post_class(); ?>>
									<div class="cs-entry__outer cs-entry__overlay cs-overlay-ratio cs-ratio-<?php echo esc_attr( $options['image_orientation'] ); ?>" data-scheme="inverse">
										<?php if ( has_post_thumbnail() ) { ?>
											<div class="cs-entry__inner cs-entry__thumbnail">
												<?php cnvs_block_post_overlay_thumbnail( $options, $attributes ); ?>
											</div>
										<?php } ?>

										<div class="cs-entry__inner cs-overlay-content cs-entry__content">
											<?php cnvs_block_post_details( $options, null, false ); ?>

											<div class="cs-entry__data <?php echo esc_attr( $meta_transform ); ?>">
												<?php cnvs_block_post_meta( $options, array( 'category' ) ); ?>

												<?php cnvs_block_post_title( $options ); ?>

												<?php cnvs_block_post_excerpt( $options ); ?>

												<div class="cs-entry__bottom">
													<?php cnvs_block_post_meta( $options, array( 'views', 'comments', 'shares', 'reading_time' ) ); ?>
												</div>

												<a href="<?php echo esc_url( get_permalink() ); ?>" class="cs-overlay-link"></a>
											</div>
										</div>

										<a href="<?php echo esc_url( get_permalink() ); ?>" class="cs-overlay-link"></a>
									</div>
								</article>
							</div>
						<?php } ?>
					</div>

					<div class="cs-slider__arrows-wrapper">
						<div class="cs-container">
							<div class="cs-slider__arrows">
								<span class="cs-slider__arrow cs-slider__arrow-previous"></span>
								<span class="cs-slider__arrow cs-slider__arrow-next"></span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
} else {
	cnvs_alert_warning( esc_html__( 'There aren\'t enough posts that match the filter criteria.', 'networker' ) );
}
