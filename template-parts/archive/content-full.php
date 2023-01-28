<?php
/**
 * Template part for displaying full posts
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

if ( 'uncropped' === csco_get_page_preview() ) {
	$thumbnail_size = sprintf( '%s-uncropped', $thumbnail_size );
}
?>

<article <?php post_class( 'cs-entry-default' ); ?>>
	<div class="cs-entry__header cs-entry__header-standard">
		<div class="cs-entry__header-inner">
			<div class="cs-entry__header-info">
				<?php
				csco_get_post_meta( array( 'category', 'views', 'shares', 'reading_time', 'comments' ), false, true, $options['meta'] );

				the_title( '<h2 class="cs-entry__title"><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' );

				csco_entry_details( 'post_meta', false, 'post-header', array( 'class' => 'cs-entry__header-details' ) );
				?>
			</div>

			<?php if ( has_post_thumbnail() ) { ?>
				<figure class="cs-entry__post-media post-media">
					<a href="<?php echo esc_url( get_permalink() ); ?>">
						<?php the_post_thumbnail( $thumbnail_size ); ?>
					</a>
				</figure>
			<?php } ?>
		</div>
	</div>

	<!-- ENTRY WRAP HTML -->
	<div class="cs-entry__wrap">
		<div class="cs-entry__container">
			<div class="cs-entry__content-wrap">
				<div class="cs-entry-type-<?php echo esc_attr( $options['summary_type'] ); ?> ">
					<?php
					if ( 'summary' === $options['summary_type'] ) {
						the_excerpt();
					} else {
						$more_link_text = false;

						if ( $options['more_button'] ) {
							$more_link_text = sprintf(
								/* translators: %s: Name of current post */
								__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'networker' ),
								get_the_title()
							);
						}

						the_content( $more_link_text );
					}
					?>
				</div>

				<?php
				if ( 'summary' === $options['summary_type'] && $options['more_button'] ) {
					?>
						<div class="cs-entry__read-more">
							<a class="cs-button" href="<?php echo esc_url( get_permalink() ); ?>">
								<?php echo esc_html( apply_filters( 'csco_filter_label_more', null ) ); ?>
							</a>
						</div>
					<?php
				}
				?>
			</div>
		</div>
	</div>
</article>
