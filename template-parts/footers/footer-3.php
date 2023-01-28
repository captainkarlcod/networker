<?php
/**
 * The template for displaying the footer layout 3
 *
 * @package Networker
 */

$scheme = csco_color_scheme(
	get_theme_mod( 'color_footer_background', '#f8f9fa' ),
	get_theme_mod( 'color_footer_background_dark', '#1c1c1c' )
);
?>

<footer class="cs-footer cs-footer-three" <?php echo wp_kses( $scheme, 'post' ); ?>>
	<div class="cs-container">
		<?php if ( has_nav_menu( 'footer_columns' ) ) { ?>
			<div class="cs-footer__item">
				<div class="cs-footer__col cs-col-top">
					<?php csco_component( 'footer_nav_columns_menu' ); ?>
				</div>
			</div>
		<?php } ?>

		<div class="cs-footer__item">
			<div class="cs-footer__col cs-footer__col-compact  cs-col-left">
				<div class="cs-footer__inner">
					<?php csco_component( 'footer_logo' ); ?>
				</div>
			</div>
			<div class="cs-footer__col cs-footer__col-compact cs-col-right">
				<div class="cs-footer-social-links">
					<?php csco_component( 'footer_social_links' ); ?>
				</div>
			</div>
		</div>
		<div class="cs-footer__item cs-footer__item-line">
			<div class="cs-footer__col cs-footer__col-compact  cs-col-left">
				<div class="cs-footer__inner">
					<?php csco_component( 'footer_description' ); ?>
				</div>
			</div>
		</div>
	</div>
</footer>
