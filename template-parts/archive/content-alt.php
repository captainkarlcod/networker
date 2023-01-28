<?php
/**
 * Template part for displaying alt posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Networker
 */

// Thumbnail size.
$thumbnail_size = 'csco-medium';

if ( 'disabled' === csco_get_page_sidebar() ) {
	$thumbnail_size = 'csco-large';
}
?>
<article <?php post_class( 'cs-entry-default' ); ?>>
	<div class="cs-entry__outer">
		<?php if ( has_post_thumbnail() ) { ?>
			<div class="cs-entry__inner cs-entry__overlay cs-entry__thumbnail" data-scheme="inverse">
				<div class="cs-overlay-background">
					<?php the_post_thumbnail( $thumbnail_size ); ?>
				</div>

				<?php csco_get_video_background( 'archive' ); ?>

				<?php csco_the_post_format_icon(); ?>

				<div class="cs-overlay-content">
					<?php csco_get_post_meta( array( 'views', 'comments', 'shares', 'reading_time' ), false, true, $options['meta'] ); ?>
				</div>

				<a href="<?php echo esc_url( get_permalink() ); ?>" class="cs-overlay-link"></a>
			</div>
		<?php } ?>

		<div class="cs-entry__inner cs-entry__content">
			<?php csco_get_post_meta( array( 'category' ), false, true, $options['meta'] ); ?>

			<div class="cs-entry__row">
				<div class="cs-entry__col">
					<?php the_title( '<h2 class="cs-entry__title"><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' ); ?>

					<?php csco_entry_details( $options['meta'], false ); ?>
				</div>

				<div class="cs-entry__col">
					<?php
					$post_excerpt = get_the_excerpt();

					if ( $post_excerpt ) {
						?>
						<div class="cs-entry__excerpt">
							<?php echo wp_kses( $post_excerpt, 'post' ); ?>
						</div>
					<?php } ?>

					<?php if ( $options['more_button'] ) { ?>
						<div class="cs-entry__read-more">
							<a href="<?php the_permalink(); ?>">
								<?php echo esc_html( apply_filters( 'csco_filter_label_more', null ) ); ?>
							</a>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</article>
