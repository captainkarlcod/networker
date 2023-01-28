<?php
/**
 * The template part for displaying off-canvas area.
 *
 * @package Networker
 */

if ( csco_offcanvas_exists() ) {

	$scheme = csco_color_scheme(
		get_theme_mod( 'color_header_background', '#FFFFFF' ),
		get_theme_mod( 'color_header_background_dark', '#1c1c1c' )
	);
	?>

	<div class="cs-site-overlay"></div>

	<div class="cs-offcanvas">
		<div class="cs-offcanvas__header" <?php echo wp_kses( $scheme, 'post' ); ?>>
			<?php do_action( 'csco_offcanvas_header_start' ); ?>

			<nav class="cs-offcanvas__nav">
				<?php csco_component( 'header_logo' ); ?>

				<span class="cs-offcanvas__toggle" role="button"><i class="cs-icon cs-icon-x"></i></span>
			</nav>

			<?php do_action( 'csco_offcanvas_header_end' ); ?>
		</div>
		<aside class="cs-offcanvas__sidebar">
			<div class="cs-offcanvas__inner cs-offcanvas__area cs-widget-area">
				<?php
				$locations = get_nav_menu_locations();

				// Get menu by location.
				if ( isset( $locations['primary'] ) || isset( $locations['mobile'] ) ) {

					if ( isset( $locations['primary'] ) ) {
						$location = $locations['primary'];
					}
					if ( isset( $locations['mobile'] ) ) {
						$location = $locations['mobile'];
					}

					the_widget( 'WP_Nav_Menu_Widget', array( 'nav_menu' => $location ), array(
						'before_widget' => '<div class="widget %s cs-d-lg-none">',
						'after_widget'  => '</div>',
					) );
				}
				?>

				<?php dynamic_sidebar( 'sidebar-offcanvas' ); ?>
			</div>
		</aside>
	</div>
	<?php
}
