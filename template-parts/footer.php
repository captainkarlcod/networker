<?php
/**
 * The template for displaying the footer layout
 *
 * @package Networker
 */

csco_component( 'footer_instagram' );

switch ( get_theme_mod( 'footer_layout', 'cs-footer-one' ) ) {
	case 'cs-footer-one':
		get_template_part( 'template-parts/footers/footer-1' );
		break;
	case 'cs-footer-two':
		get_template_part( 'template-parts/footers/footer-2' );
		break;
	case 'cs-footer-three':
		get_template_part( 'template-parts/footers/footer-3' );
		break;
}
