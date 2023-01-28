<?php
/**
 * Template part entry header
 *
 * @package Networker
 */

$header_type = csco_get_page_header_type();

switch ( $header_type ) {
	case 'standard':
		$header_class = 'cs-entry__header-standard';
		break;
	case 'grid':
		$header_class = 'cs-entry__header-grid';
		break;
	case 'large':
		$header_class = 'cs-entry__header-large';
		break;
}

$thumbnail_size = 'csco-medium';

if ( 'disabled' === csco_get_page_sidebar() ) {
	$thumbnail_size = 'csco-large';
}

if ( 'grid' === $header_type ) {
	$thumbnail_size = 'csco-intermediate';
}

if ( 'uncropped' === csco_get_page_preview() || ( 'standard' === $header_type || 'grid' === $header_type ) ) {
	$thumbnail_size = sprintf( '%s-uncropped', $thumbnail_size );
}

if ( 'title' === $header_type ) {
	?>
	<div class="cs-entry__header cs-entry__header-standard">
		<div class="cs-entry__header-inner">
			<div class="cs-entry__header-info">
				<?php the_title( '<h1 class="cs-entry__title"><span>', '</span></h1>' ); ?>
			</div>
		</div>
	</div>

<?php } elseif ( 'standard' === $header_type || 'grid' === $header_type || 'large' === $header_type ) { ?>

	<div class="cs-entry__header <?php echo esc_attr( $header_class ); ?> cs-video-wrap">
		<div class="cs-entry__header-inner">
			<div class="cs-entry__header-info">
				<?php get_template_part( 'template-parts/entry/entry-header-info' ); ?>
			</div>

			<?php if ( 'large' !== $header_type && has_post_thumbnail() ) { ?>
				<figure class="cs-entry__post-media post-media">
					<?php the_post_thumbnail( $thumbnail_size ); ?>
				</figure>
			<?php } ?>

			<?php if ( 'standard' === $header_type && get_the_post_thumbnail_caption() ) { ?>
				<figcaption class="cs-entry__caption-text wp-caption-text">
					<?php the_post_thumbnail_caption(); ?>
				</figcaption>
			<?php } ?>
		</div>
	</div>

<?php } ?>
