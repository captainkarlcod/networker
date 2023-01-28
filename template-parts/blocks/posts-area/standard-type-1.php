<?php
/**
 * Block Standard Type 1
 *
 * @var        $attributes - block attributes
 * @var        $options - layout options
 * @var        $posts - all available posts
 *
 * @package Networker
 */

// Set post style.
$style = 'default';

if ( $options['custom_appearance'] ) {
	$style = csco_get_appearance_grid();
}

$overlay_image = ( isset( $options['overlay_image'] ) ? $options['overlay_image'] : false );

// Display all posts with image overlay.
if ( $overlay_image ) {
	$style = 'overlay';
}

// Set post class.
$post_class = 'cs-entry-default';

if ( 'minimalist' === $style ) {
	$post_class = 'cs-entry-minimalist';
}
if ( 'overlay' === $style ) {
	$post_class = 'cs-entry-overlay';
}

// Set prefix.
$prefix = isset( $options['option_prefix'] ) ? $options['option_prefix'] : null;
?>

<?php if ( 'default' === $style ) { ?>

	<article <?php post_class( $post_class ); ?>>
		<div class="cs-entry__outer">

			<?php cnvs_block_post_thumbnail( $options, $attributes, $prefix, array( 'views', 'comments', 'shares', 'reading_time' ) ); ?>

			<div class="cs-entry__inner cs-entry__content cs-entry__information">

				<?php cnvs_block_post_meta( array_merge( $options, array( 'display_meta_compact' => false ) ), array( 'category' ) ); ?>

				<?php cnvs_block_post_title( $options, $prefix ); ?>

				<?php cnvs_block_post_excerpt( $options, $prefix ); ?>

				<?php cnvs_block_post_details( array_merge( $options, array( 'display_meta_compact' => false ) ), $prefix ); ?>
			</div>
		</div>
	</article>

	<?php
} elseif ( 'overlay' === $style ) {

	$options['image_orientation'] = isset( $options[ $prefix . '_image_orientation' ] ) ? $options[ $prefix . '_image_orientation' ] : $options['image_orientation'];

	$options['image_orientation'] = str_replace( 'original', 'default', $options['image_orientation'] );
	?>

	<article <?php post_class( $post_class ); ?>>
		<div class="cs-entry__outer cs-entry__overlay cs-overlay-ratio cs-ratio-<?php echo esc_attr( $options['image_orientation'] ); ?>" data-scheme="inverse">
			<?php if ( has_post_thumbnail() ) { ?>
				<div class="cs-entry__inner cs-entry__thumbnail">
					<?php cnvs_block_post_overlay_thumbnail( $options, $attributes, $prefix ); ?>
				</div>
			<?php } ?>

			<div class="cs-entry__inner cs-overlay-content cs-entry__content">
				<?php cnvs_block_post_details( $options, $prefix, false ); ?>

				<div class="cs-entry__data">
					<?php cnvs_block_post_meta( $options, array( 'category' ) ); ?>

					<?php cnvs_block_post_title( $options, $prefix ); ?>

					<?php cnvs_block_post_excerpt( $options, $prefix ); ?>

					<?php cnvs_block_post_meta( $options, array( 'views', 'comments', 'shares', 'reading_time' ) ); ?>

					<?php cnvs_block_post_more( $options, $prefix ); ?>
				</div>
			</div>

			<a href="<?php echo esc_url( get_permalink() ); ?>" class="cs-overlay-link"></a>
		</div>
	</article>

<?php } elseif ( 'minimalist' === $style ) { ?>

	<article <?php post_class( $post_class ); ?>>
		<div class="cs-entry__outer">
			<div class="cs-entry__inner cs-entry__information">
				<?php cnvs_block_post_details( $options, $prefix, false ); ?>
			</div>

			<div class="cs-entry__inner cs-entry__content cs-entry__information">
				<?php cnvs_block_post_meta( $options, array( 'category' ) ); ?>

				<?php cnvs_block_post_title( $options, $prefix ); ?>

				<?php cnvs_block_post_excerpt( $options, $prefix ); ?>

				<?php cnvs_block_post_meta( $options, array( 'views', 'comments', 'shares', 'reading_time' ) ); ?>
			</div>
		</div>
	</article>

<?php } ?>
