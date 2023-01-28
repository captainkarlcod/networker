<?php
/**
 * Block Wide Type 2
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
			<div class="cs-wide-carousel cs-flickity-init" data-autoplay="<?php echo esc_attr( $options['autoplay'] ); ?>" data-pagedots="<?php echo esc_attr( $options['pagedots'] ); ?>" data-wraparound="<?php echo esc_attr( $options['wraparound'] ); ?>">
				<div class="cs-wide-carousel__wrap" data-scheme="inverse">
					<div class="cs-wide-carousel__items">
						<?php
						while ( $posts->have_posts() ) {
							$posts->the_post();

							$options['withoutLink'] = true;
							?>
							<div class="cs-wide-carousel__cell">
								<article <?php post_class(); ?>>
									<div class="cs-entry__outer cs-entry__overlay cs-overlay-ratio cs-ratio-<?php echo esc_attr( $options['image_orientation'] ); ?>" data-scheme="inverse">
										<?php if ( has_post_thumbnail() ) { ?>
											<div class="cs-entry__inner cs-entry__thumbnail">
												<?php cnvs_block_post_overlay_thumbnail( $options, $attributes ); ?>
											</div>
										<?php } ?>

										<div class="cs-entry__inner cs-overlay-content cs-entry__content">
											<?php cnvs_block_post_details( $options, null, false ); ?>

											<div class="cs-carousel__info">
												<?php cnvs_block_post_meta( $options, array( 'category', 'views', 'comments', 'shares', 'reading_time' ) ); ?>

												<?php cnvs_block_post_title( $options ); ?>

												<?php cnvs_block_post_excerpt( $options ); ?>
											</div>
										</div>

										<a href="<?php echo esc_url( get_permalink() ); ?>" class="cs-overlay-link"></a>
									</div>
								</article>
							</div>
						<?php } ?>
					</div>

					<div class="cs-wide-carousel__arrows">
						<span class="cs-wide-carousel__arrow cs-wide-carousel__arrow-previous"></span>
						<span class="cs-wide-carousel__arrow cs-wide-carousel__arrow-next"></span>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
} else {
	cnvs_alert_warning( esc_html__( 'There aren\'t enough posts that match the filter criteria.', 'networker' ) );
}
