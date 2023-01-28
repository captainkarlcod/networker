<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Networker
 */

$options = get_query_var( 'options' );

// Set post style.
$style = 'default';

if ( 'grid' === $options['layout'] ) {
	$style = csco_get_appearance_grid();

	// Display all posts with image overlay.
	if ( $options['overlay_image'] ) {
		$style = 'overlay';
	}
}

// Set post class.
$post_class = 'cs-entry-default';

if ( 'minimalist' === $style ) {
	$post_class = 'cs-entry-minimalist';
}
if ( 'overlay' === $style ) {
	$post_class = 'cs-entry-overlay';
}
?>

<?php if ( 'default' === $style ) { ?>

	<article <?php post_class( $post_class ); ?>>
		<div class="cs-entry__outer">
			<?php
			if ( has_post_thumbnail() ) {
				$options['thumbnail_meta'] = csco_get_post_meta( array( 'views', 'comments', 'shares', 'reading_time' ), false, false, $options['meta'] );
				?>
				<div class="cs-entry__inner cs-entry__thumbnail cs-entry__overlay cs-overlay-ratio cs-ratio-<?php echo esc_attr( $options['image_orientation'] ); ?>" data-scheme="inverse">

					<?php if ( $options['thumbnail_meta'] ) { ?>
						<div class="cs-overlay-background">
							<?php the_post_thumbnail( $options['image_size'] ); ?>
						</div>
					<?php } else { ?>
						<div class="cs-overlay-background cs-overlay-transparent">
							<?php the_post_thumbnail( $options['image_size'] ); ?>
						</div>
					<?php } ?>

					<?php csco_get_video_background( 'archive' ); ?>

					<?php csco_the_post_format_icon(); ?>

					<?php if ( $options['thumbnail_meta'] ) { ?>
						<div class="cs-overlay-content">
							<?php csco_get_post_meta( array( 'views', 'comments', 'shares', 'reading_time' ), $options['compact_meta'], true, $options['meta'] ); ?>
						</div>
					<?php } ?>

					<a href="<?php echo esc_url( get_permalink() ); ?>" class="cs-overlay-link"></a>
				</div>
			<?php } ?>

			<div class="cs-entry__inner cs-entry__content">

				<?php csco_get_post_meta( array( 'category' ), false, true, $options['meta'] ); ?>

				<?php the_title( '<h2 class="cs-entry__title"><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' ); ?>

				<?php
				$post_excerpt = get_the_excerpt();

				if ( $post_excerpt ) {
					?>
					<div class="cs-entry__excerpt">
						<?php echo wp_kses( $post_excerpt, 'post' ); ?>
					</div>
				<?php } ?>

				<?php csco_entry_details( $options['meta'], $options['more_button'] ); ?>
			</div>
		</div>
	</article>

<?php } elseif ( 'overlay' === $style ) { ?>

	<article <?php post_class( $post_class ); ?>>
		<div class="cs-entry__outer cs-entry__overlay cs-overlay-ratio cs-ratio-<?php echo esc_attr( 'original' !== $options['image_orientation'] ? $options['image_orientation'] : 'default' ); ?>" data-scheme="inverse">
			<?php if ( has_post_thumbnail() ) { ?>
				<div class="cs-entry__inner cs-entry__thumbnail">
					<div class="cs-overlay-background">
						<?php the_post_thumbnail( $options['image_size'] ); ?>
					</div>
				</div>
			<?php } ?>

			<div class="cs-entry__inner cs-overlay-content cs-entry__content">
				<?php csco_entry_details( $options['meta'], false ); ?>

				<div class="cs-entry__data">
					<?php csco_get_post_meta( array( 'category' ), false, true, $options['meta'] ); ?>

					<?php the_title( '<h2 class="cs-entry__title">', '</h2>' ); ?>

					<?php
					$post_excerpt = get_the_excerpt();

					if ( $post_excerpt ) {
						?>
						<div class="cs-entry__excerpt">
							<?php echo wp_kses( $post_excerpt, 'post' ); ?>
						</div>
					<?php } ?>

					<?php csco_get_post_meta( array( 'views', 'comments', 'shares', 'reading_time' ), $options['compact_meta'], true, $options['meta'] ); ?>

					<?php if ( $options['more_button'] ) { ?>
						<div class="cs-entry__read-more">
							<a href="<?php the_permalink(); ?>">
								<?php echo esc_html( apply_filters( 'csco_filter_label_more', null ) ); ?>
							</a>
						</div>
					<?php } ?>
				</div>
			</div>

			<a href="<?php echo esc_url( get_permalink() ); ?>" class="cs-overlay-link"></a>
		</div>
	</article>

<?php } elseif ( 'minimalist' === $style ) { ?>

	<article <?php post_class( $post_class ); ?>>
		<div class="cs-entry__outer">
			<div class="cs-entry__inner">
				<?php csco_entry_details( $options['meta'], false ); ?>
			</div>

			<div class="cs-entry__inner cs-entry__content">
				<?php csco_get_post_meta( array( 'category' ), false, true, $options['meta'] ); ?>

				<?php the_title( '<h2 class="cs-entry__title"><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' ); ?>

				<?php
				$post_excerpt = get_the_excerpt();

				if ( $post_excerpt ) {
					?>
					<div class="cs-entry__excerpt">
						<?php echo wp_kses( $post_excerpt, 'post' ); ?>
					</div>
				<?php } ?>

				<?php csco_get_post_meta( array( 'views', 'comments', 'shares', 'reading_time' ), $options['compact_meta'], true, $options['meta'] ); ?>
			</div>
		</div>
	</article>

<?php } ?>
