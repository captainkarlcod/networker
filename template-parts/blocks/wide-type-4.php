<?php
/**
 * Block Wide Type 4
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
				<div class="cs-wide-carousel__wrap">
					<div class="cs-wide-carousel__items">
						<?php
						while ( $posts->have_posts() ) {
							$posts->the_post();
							?>
							<div class="cs-wide-carousel__cell">
								<article <?php post_class(); ?>>
									<div class="cs-entry__outer">
										<?php cnvs_block_post_thumbnail( $options, $attributes, null, array( 'views', 'comments', 'shares', 'reading_time' ) ); ?>

										<div class="cs-entry__inner cs-entry__content">

											<?php cnvs_block_post_meta( array_merge( $options, array( 'display_meta_compact' => false ) ), array( 'category' ) ); ?>

											<?php cnvs_block_post_title( $options ); ?>

											<?php cnvs_block_post_excerpt( $options ); ?>

											<?php cnvs_block_post_details( array_merge( $options, array( 'display_meta_compact' => false ) ), null, $options['display_more_button'] ); ?>
										</div>
									</div>
								</article>
							</div>
						<?php } ?>
					</div>
				</div>

				<div class="cs-wide-carousel__arrows">
					<span class="cs-wide-carousel__arrow cs-wide-carousel__arrow-next"></span>
					<span class="cs-wide-carousel__arrow cs-wide-carousel__arrow-previous"></span>
				</div>
			</div>
		</div>
	</div>
	<?php
} else {
	cnvs_alert_warning( esc_html__( 'There aren\'t enough posts that match the filter criteria.', 'networker' ) );
}
