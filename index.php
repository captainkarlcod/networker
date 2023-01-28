<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Networker
 */

get_header(); ?>

<div id="primary" class="cs-content-area">

	<?php do_action( 'csco_main_before' ); ?>

	<?php
	if ( have_posts() ) {
		// Set options.
		$options = csco_get_archive_options();

		// Location.
		$main_classes = ' cs-posts-area__' . $options['location'];

		// Layout.
		$main_classes .= ' cs-posts-area__' . $options['layout'];

		// Image Width.
		if ( $options['image_width'] && ( 'list' === $options['layout'] ) ) {
			$main_classes .= ' cs-posts-area__image-width-' . $options['image_width'];
		}

		// Fullwith or withsidebar.
		if ( 'disabled' !== csco_get_page_sidebar() ) {
			$main_classes .= ' cs-posts-area__withsidebar';
		} else {
			$main_classes .= ' cs-posts-area__fullwidth';
		}

		// Posts Type.
		$area_type = 'mixed' === $options['layout'] ? 'mixed' : 'default';
		?>
		<div class="cs-posts-area cs-posts-area-posts">
			<div class="cs-posts-area__outer cs-posts-area__type-<?php echo esc_attr( $area_type ); ?>">

				<?php
				if ( 'mixed' === $options['layout'] ) {
					$counter = 1;

					$open = false;

					$point_end = ( get_theme_mod( csco_get_archive_option( 'columns_desktop' ), 2 ) * 2 ) + 1;

					$point_start = 1;

					// Start the Loop.
					while ( have_posts() ) {
						the_post();

						set_query_var( 'options', $options );

						if ( ( $point_end + 1 ) === $counter ) {
							$counter = $point_start;
						}

						// Open grid layout.
						if ( $point_start === $counter ) {
							$open = true;
							?>
								<div class="cs-posts-area__main cs-posts-area__grid <?php echo esc_attr( $main_classes ); ?>">
							<?php
						}

						// Open full layout.
						if ( $point_end === $counter ) {
							$open = true;
							?>
								<div class="cs-posts-area__main cs-posts-area__alt <?php echo esc_attr( $main_classes ); ?>">
							<?php
						}

						// Include template.
						if ( $counter <= ( $point_end - 1 ) ) {
							get_template_part( 'template-parts/archive/content' );
						} else {
							get_template_part( 'template-parts/archive/content-alt' );
						}

						// Close grid or full layout.
						if ( ( $point_end - 1 ) === $counter || $point_end === $counter ) {
							$open = false;
							?>
								</div>
							<?php
						}

						$counter++;
					}

					// Close the open tag.
					if ( $open ) {
						?>
							</div>
						<?php
					}
				} else {
					?>
					<div class="cs-posts-area__main cs-archive-<?php echo esc_attr( $options['layout'] ); ?> <?php echo esc_attr( $main_classes ); ?>">
						<?php
						// Start the Loop.
						while ( have_posts() ) {
							the_post();

							set_query_var( 'options', $options );

							if ( 'full' === $options['layout'] ) {
								get_template_part( 'template-parts/archive/content-full' );
							} elseif ( 'alt' === $options['layout'] ) {
								get_template_part( 'template-parts/archive/content-alt' );
							} else {
								get_template_part( 'template-parts/archive/content' );
							}
						}
						?>
					</div>
				<?php } ?>

			</div>

			<?php
			/* Posts Pagination */
			if ( 'standard' === get_theme_mod( csco_get_archive_option( 'pagination_type' ), 'load-more' ) ) {
				?>
				<div class="cs-posts-area__pagination">
					<?php
						the_posts_pagination(
							array(
								'prev_text' => esc_html__( 'Previous', 'networker' ),
								'next_text' => esc_html__( 'Next', 'networker' ),
							)
						);
					?>
				</div>
				<?php
			}
			?>
		</div>
		<?php
	} else {
		?>
		<div class="entry-content cs-content-not-found">
			<p><?php esc_html_e( 'It seems we cannot find what you are looking for. Perhaps searching can help.', 'networker' ); ?></p>

			<?php get_search_form(); ?>
		</div>
		<?php
	}
	?>

	<?php do_action( 'csco_main_after' ); ?>
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
