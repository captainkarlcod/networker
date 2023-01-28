<?php
/**
 * Template part entry media large
 *
 * @package Networker
 */

if ( has_post_thumbnail() ) {
	$header_type = csco_get_page_header_type();

	$thumbnail_size = 'csco-extra-large';
	?>
		<div class="cs-entry__media-large cs-video-wrap">
			<div class="cs-entry__media-inner">
				<div class="cs-entry__media-wrap cs-overlay-ratio cs-ratio-wide">
					<figure class="cs-entry__overlay-bg">
						<?php the_post_thumbnail( $thumbnail_size ); ?>

						<?php csco_get_video_background( 'large-header', null, 'large', true, true ); ?>
					</figure>
				</div>
			</div>
		</div>
	<?php
}
