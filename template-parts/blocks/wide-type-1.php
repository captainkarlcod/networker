<?php
/**
 * Block Wide Type 1
 *
 * @var        $attributes - block attributes
 * @var        $options - layout options
 * @var        $posts - all available posts
 *
 * @package Networker
 */

// Check if there're enough posts in the query.
if ( $posts->have_posts() ) {

	$posts->the_post();
	?>
	<div class="<?php echo esc_attr( $attributes['className'] ); ?>">
		<div class="cnvs-block-posts-inner">
			<div class="cs-layout-wide__wrap cs-overlay-ratio" data-scheme="inverse">
				<?php cnvs_block_post_overlay_thumbnail( $options, $attributes, 'large' ); ?>

				<div class="cs-layout-wide__inner cs-overlay-content">
					<?php cnvs_block_post_details( $options, 'large', false ); ?>

					<?php
					cnvs_block_post_meta( array_merge( $options, array(
						'meta-settings' => array(
							'prefix' => 'large',
						),
					) ), array( 'category', 'views', 'shares', 'reading_time', 'comments' ) );
					?>

					<?php cnvs_block_post_title( $options, 'large' ); ?>

					<?php cnvs_block_post_excerpt( $options, 'large' ); ?>

					<div class="cs-layout-wide__row">
						<?php
						while ( $posts->have_posts() ) {
							$posts->the_post();

							$options['video'] = false;
							?>
							<div class="cs-layout-wide__col">
								<article class="cs-entry">
									<div class="cs-entry__outer">
										<?php cnvs_block_post_thumbnail( $options, $attributes, 'small' ); ?>

										<div class="cs-entry__inner cs-entry__content">
											<?php
											cnvs_block_post_meta( array_merge( $options, array(
												'meta-settings' => array(
													'prefix' => 'small',
												),
											) ), array( 'category', 'author', 'date', 'views', 'shares', 'reading_time', 'comments' ) );
											?>

											<?php cnvs_block_post_title( $options, 'small' ); ?>
										</div>
									</div>
								</article>
							</div>
						<?php } ?>
					</div>
				</div>

				<a href="<?php echo esc_url( get_permalink() ); ?>" class="cs-overlay-link"></a>
			</div>
		</div>
	</div>
	<?php
	wp_reset_postdata();
} else {
	cnvs_alert_warning( esc_html__( 'There aren\'t enough posts that match the filter criteria.', 'networker' ) );
}
