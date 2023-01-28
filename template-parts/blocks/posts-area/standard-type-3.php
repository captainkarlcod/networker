<?php
/**
 * Block Standard Type 3
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

		<?php cnvs_block_post_thumbnail( $options, $attributes, null, array( 'views', 'comments', 'shares', 'reading_time' ) ); ?>

		<div class="cs-entry__inner cs-entry__content">

			<?php cnvs_block_post_meta( array_merge( $options, array( 'display_meta_compact' => false ) ), array( 'category' ) ); ?>

			<?php cnvs_block_post_title( $options ); ?>

			<?php cnvs_block_post_excerpt( $options ); ?>

			<?php cnvs_block_post_meta( array_merge( $options, array( 'display_meta_compact' => false ) ), array( 'author', 'date' ) ); ?>
		</div>
	</div>
</article>
