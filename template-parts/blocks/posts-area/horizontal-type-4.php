<?php
/**
 * Block Horizontal Type 4
 *
 * @var        $attributes - block attributes
 * @var        $options - layout options
 * @var        $posts - all available posts
 *
 * @package Networker
 */

?>

<article <?php post_class(); ?>>
	<div class="cs-entry__outer">
		<div class="cs-entry__content cs-entry__inner">
			<?php cnvs_block_post_meta( $options, array( 'category' ) ); ?>

			<?php cnvs_block_post_title( $options ); ?>

			<?php cnvs_block_post_excerpt( $options ); ?>

			<?php cnvs_block_post_meta( $options, array( 'author', 'date', 'views', 'shares', 'reading_time', 'comments' ) ); ?>
		</div>
	</div>
</article>
