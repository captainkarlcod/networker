<?php
/**
 * Block Standard Type 2
 *
 * @var        $attributes - block attributes
 * @var        $options - layout options
 * @var        $posts - all available posts
 *
 * @package Networker
 */

// Set prefix.
$prefix = isset( $options['option_prefix'] ) ? $options['option_prefix'] : null;
?>

<article <?php post_class(); ?>>
	<div class="cs-entry__outer">
		<?php cnvs_block_post_thumbnail( $options, $attributes, $prefix, array( 'views', 'comments', 'shares', 'reading_time' ) ); ?>

		<div class="cs-entry__inner cs-entry__content cs-entry__information">
			<?php cnvs_block_post_meta( $options, array( 'category' ) ); ?>

			<div class="cs-entry__row">
				<div class="cs-entry__col">
					<?php cnvs_block_post_title( $options, $prefix ); ?>

					<?php cnvs_block_post_details( $options, $prefix, false ); ?>
				</div>

				<div class="cs-entry__col">
					<?php cnvs_block_post_excerpt( $options, $prefix ); ?>

					<?php cnvs_block_post_more( $options, $prefix ); ?>
				</div>
			</div>
		</div>
	</div>
</article>
