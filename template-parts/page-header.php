<?php
/**
 * The template part for displaying page header.
 *
 * @package Networker
 */

// Init clasfor header.
$class = null;

// If description exists.
if ( get_the_archive_description() ) {
	$class = 'cs-page__header-has-description';
}
?>

<div class="cs-page__header <?php echo esc_attr( $class ); ?>">


		<?php
		do_action( 'csco_page_header_before' );

		if ( is_author() ) {

			$subtitle  = esc_html__( 'All Posts By', 'networker' );
			$author_id = get_queried_object_id();
			?>
			<div class="cs-page__author">
				<div class="cs-page__author-photo">
					<div  class="cs-page__author-thumbnail">
						<?php echo get_avatar( $author_id, 100 ); ?>
					</div>
					<?php if ( csco_powerkit_module_enabled( 'social_links' ) ) { ?>
						<div class="cs-page__author-social">
							<?php powerkit_author_social_links( $author_id ); ?>
						</div>
					<?php } ?>
				</div>
				<div class="cs-page__author-info">
					<?php
						the_archive_title( '<h1 class="cs-page__title">', '</h1>' );
						csco_archive_post_count();
						csco_archive_post_description();
					?>
				</div>
			</div>

			<?php
		} elseif ( is_archive() ) {

			// Add special subtitles.
			if ( is_category() ) {
				$subtitle = esc_html__( 'Browsing Category', 'networker' );
			} elseif ( is_tag() ) {
				$subtitle = esc_html__( 'Browsing Tag', 'networker' );
			} else {
				$subtitle = '';
			}

			// Add a subtitle.
			if ( $subtitle ) {
				?>
				<span class="cs-page__subtitle"><?php echo esc_html( $subtitle ); ?></span>
				<?php
			}

			the_archive_title( '<h1 class="cs-page__title">', '</h1>' );
			csco_archive_post_count();
			csco_archive_post_description();

		} elseif ( is_search() ) {

			?>
			<span class="cs-page__subtitle"><?php esc_html_e( 'Search Results', 'networker' ); ?></span>
			<h1 class="cs-page__title"><?php echo get_search_query(); ?></h1>
			<?php
			csco_archive_post_count();

		} elseif ( is_404() ) {
			?>
			<h1 class="cs-page__title"><?php esc_html_e( '404', 'networker' ); ?></h1>
			<?php
		}

		do_action( 'csco_page_header_after' );
		?>


</div>
