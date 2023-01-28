<?php
/**
 * The template part for displaying post prev next alt section.
 *
 * @package Networker
 */

$options = array(
	'image_orientation' => get_theme_mod( 'post_prev_next_type2_image_orientation', 'landscape' ),
	'image_size'        => get_theme_mod( 'post_prev_next_type2_image_size', 'csco-thumbnail' ),
);

$prev_post = get_previous_post();
$next_post = get_next_post();

if ( $prev_post || $next_post ) {
	?>
	<div class="cs-entry__prev-next cs-entry__prev-next-type-2">
		<?php
		// Prev post.
		if ( $prev_post ) {
			$post = $prev_post;

			setup_postdata( $post );
			?>
			<div class="cs-entry__prev-next-item cs-entry__prev">

				<a class="cs-entry__prev-next-link" href="<?php the_permalink(); ?>"></a>

				<div class="cs-entry__prev-next-label">
					<?php csco_section_heading( esc_html__( '[[Previous Post]]', 'networker' ) ); ?>
				</div>

				<div class="cs-entry">
					<div class="cs-entry__outer cs-entry__overlay cs-overlay-ratio cs-ratio-<?php echo esc_attr( $options['image_orientation'] ); ?>" data-scheme="inverse">
						<?php if ( has_post_thumbnail() ) { ?>
							<div class="cs-entry__inner cs-entry__thumbnail">
								<div class="cs-overlay-background">
									<?php the_post_thumbnail( $options['image_size'] ); ?>
								</div>
							</div>
						<?php } ?>
						<div class="cs-entry__inner cs-overlay-content cs-entry__content">
							<?php csco_entry_details( 'post_prev_next_meta', false ); ?>

							<?php
								csco_get_post_meta( array( 'category', 'views', 'shares', 'reading_time', 'comments' ), false, true, 'post_prev_next_meta' );
							?>

							<?php the_title( '<h2 class="cs-entry__title"><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' ); ?>
						</div>

						<a href="<?php the_permalink(); ?>" class="cs-overlay-link"></a>
					</div>
				</div>
			</div>
			<?php
			wp_reset_postdata();
		}

		// Next post.
		if ( $next_post ) {
			$post = $next_post;

			setup_postdata( $post );
			?>
			<div class="cs-entry__prev-next-item cs-entry__next">

				<a class="cs-entry__prev-next-link" href="<?php the_permalink(); ?>"></a>

				<div class="cs-entry__prev-next-label">
					<?php csco_section_heading( esc_html__( '[[Next Post]]', 'networker' ) ); ?>
				</div>

				<div class="cs-entry">
					<div class="cs-entry__outer cs-entry__overlay cs-overlay-ratio cs-ratio-<?php echo esc_attr( $options['image_orientation'] ); ?>" data-scheme="inverse">
						<?php if ( has_post_thumbnail() ) { ?>
							<div class="cs-entry__inner cs-entry__thumbnail">
								<div class="cs-overlay-background">
									<?php the_post_thumbnail( $options['image_size'] ); ?>
								</div>
							</div>
						<?php } ?>
						<div class="cs-entry__inner cs-overlay-content cs-entry__content">
							<?php csco_entry_details( 'post_prev_next_meta', false ); ?>

							<?php
								csco_get_post_meta( array( 'category', 'views', 'shares', 'reading_time', 'comments' ), false, true, 'post_prev_next_meta' );
							?>

							<?php the_title( '<h2 class="cs-entry__title"><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' ); ?>
						</div>

						<a href="<?php the_permalink(); ?>" class="cs-overlay-link"></a>
					</div>
				</div>
			</div>
			<?php
			wp_reset_postdata();
		}
		?>
	</div>
	<?php
}
