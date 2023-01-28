<?php
/**
 * Block Tile Type 1
 *
 * @var        $attributes - block attributes
 * @var        $options - layout options
 * @var        $posts - all available posts
 *
 * @package Networker
 */

$options['withoutLink'] = true;

$meta_transform = cnvs_block_post_meta( $options, array( 'views', 'comments', 'shares', 'reading_time' ), false );

// Data class.
$meta_transform = $meta_transform ? 'cs-entry__data-transform' : null;
?>
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
