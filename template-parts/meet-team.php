<?php
/**
 * The template part for displaying meet team.
 *
 * @package Networker
 */

if ( csco_coauthors_enabled() ) {
	$authors = powerkit_get_users();
} else {
	$args = array(
		'orderby'    => 'display_name',
		'capability' => array( 'edit_posts' ),
	);

	// Capability queries were only introduced in WP 5.9.
	if ( version_compare( $GLOBALS['wp_version'], '5.9', '<' ) ) {
		$args['who'] = 'authors';
		unset( $args['capability'] );
	}

	$authors = get_users( apply_filters( 'csco_get_users_args', $args ) );
}

if ( isset( $authors ) && ! empty( $authors ) ) {
	?>
	<div class="cs-meet-team">
		<?php
		foreach ( $authors as $author ) {

			$args = array(
				'ignore_sticky_posts' => true,
				'posts_per_page'      => 6,
				'suppress_filters'    => true,
			);

			if ( csco_coauthors_enabled() && powerkit_is_guest( $author->ID ) ) {

				$terms = wp_get_object_terms(
					$author->ID,
					'author',
					array(
						'fields' => 'ids',
					)
				);

				$args['tax_query'] = array(
					array(
						'taxonomy' => 'author',
						'field'    => 'id',
						'terms'    => $terms,
					),
				);

			} else {
				$args['author'] = $author->ID;
			}

			$query = new WP_Query( apply_filters( 'csco_meet_team_args', $args ) );

			if ( $query->have_posts() ) {
				?>
				<div class="cs-author">
					<div class="cs-author-info">
						<div class="cs-author-meta">
							<div class="cs-author-avatar">
								<a href="<?php echo esc_url( get_author_posts_url( $author->ID ) ); ?>" rel="author">
									<?php echo get_avatar( $author->ID, 60 ); ?>
								</a>
							</div>

							<h3 class="cs-author-title">
								<a href="<?php echo esc_url( get_author_posts_url( $author->ID ) ); ?>" rel="author">
									<?php echo esc_html( get_the_author_meta( 'display_name', $author->ID ) ); ?>
								</a>
							</h3>

							<?php
							if ( function_exists( 'powerkit_author_social_links' ) ) {
								powerkit_author_social_links( $author->ID );
							}
							?>
						</div>
						<div class="cs-author-description">
							<?php echo wp_kses_post( get_the_author_meta( 'description', $author->ID ) ); ?>
						</div>
					</div>

					<div class="cs-author-posts">
						<h5 class="cs-author-title-posts">
							<?php esc_html_e( 'Latest from ', 'networker' ); ?> <?php echo esc_html( get_the_author_meta( 'display_name', $author->ID ) ); ?>
						</h5>

						<ul class="cs-author-list-posts cs-list-articles">
							<?php
							while ( $query->have_posts() ) {
								$query->the_post();
								?>
								<li>
									<a href="<?php the_permalink(); ?>">
										<?php the_title(); ?>
									</a>
								</li>
								<?php
							}
							?>
						</ul>
					</div>
				</div>
				<?php
			}
			wp_reset_postdata();
		}
		?>
	</div>
	<?php
}
