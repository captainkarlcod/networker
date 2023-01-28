<?php
/**
 * The template for displaying the footer layout 2
 *
 * @package Networker
 */

$scheme = csco_color_scheme(
	get_theme_mod( 'color_footer_background', '#f8f9fa' ),
	get_theme_mod( 'color_footer_background_dark', '#1c1c1c' )
);
?>

<footer class="cs-footer cs-footer-two" <?php echo wp_kses( $scheme, 'post' ); ?>>
	<div class="cs-container">
		<div class="cs-footer__item">
			<div class="cs-footer__col  cs-col-left">
				<div class="cs-footer__inner">
					<?php csco_component( 'footer_logo' ); ?>

					<?php csco_component( 'footer_description' ); ?>
				</div>
			</div>
			<div class="cs-footer__col cs-col-center">
				<?php csco_component( 'footer_nav_menu', true, array( 'menu_class' => 'cs-nav-grid' ) ); ?>
			</div>
			<div class="cs-footer__col cs-col-right">
				<div class="cs-footer-social-links">
					<?php csco_component( 'footer_social_links' ); ?>
				</div>
			</div>
		</div>
	</div>
</footer>
