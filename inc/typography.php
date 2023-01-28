<?php
/**
 * Typography
 *
 * @package Networker
 */

?>
<style id='csco-theme-typography'>
	:root {
		/* Base Font */
		--cs-font-base-family: <?php csco_typography( 'font_base', 'font-family', 'Inter' ); ?>;
		--cs-font-base-size: <?php csco_typography( 'font_base', 'font-size', '1rem' ); ?>;
		--cs-font-base-weight: <?php csco_typography( 'font_base', 'font-weight', '400' ); ?>;
		--cs-font-base-style: <?php csco_typography( 'font_base', 'font-style', 'normal' ); ?>;
		--cs-font-base-letter-spacing: <?php csco_typography( 'font_base', 'letter-spacing', 'normal' ); ?>;
		--cs-font-base-line-height: <?php csco_typography( 'font_base', 'line-height', '1.5' ); ?>;

		/* Primary Font */
		--cs-font-primary-family: <?php csco_typography( 'font_primary', 'font-family', 'Inter' ); ?>;
		--cs-font-primary-size: <?php csco_typography( 'font_primary', 'font-size', '0.875rem' ); ?>;
		--cs-font-primary-weight: <?php csco_typography( 'font_primary', 'font-weight', '500' ); ?>;
		--cs-font-primary-style: <?php csco_typography( 'font_primary', 'font-style', 'normal' ); ?>;
		--cs-font-primary-letter-spacing: <?php csco_typography( 'font_primary', 'letter-spacing', 'normal' ); ?>;
		--cs-font-primary-text-transform: <?php csco_typography( 'font_primary', 'text-transform', 'none' ); ?>;

		/* Secondary Font */
		--cs-font-secondary-family: <?php csco_typography( 'font_secondary', 'font-family', 'Inter' ); ?>;
		--cs-font-secondary-size: <?php csco_typography( 'font_secondary', 'font-size', '0.75rem' ); ?>;
		--cs-font-secondary-weight: <?php csco_typography( 'font_secondary', 'font-weight', '400' ); ?>;
		--cs-font-secondary-style: <?php csco_typography( 'font_secondary', 'font-style', 'normal' ); ?>;
		--cs-font-secondary-letter-spacing: <?php csco_typography( 'font_secondary', 'letter-spacing', 'normal' ); ?>;
		--cs-font-secondary-text-transform: <?php csco_typography( 'font_secondary', 'text-transform', 'none' ); ?>;

		/* Category Font */
		--cs-font-category-family: <?php csco_typography( 'font_category', 'font-family', 'Inter' ); ?>;
		--cs-font-category-size: <?php csco_typography( 'font_category', 'font-size', '0.6875rem' ); ?>;
		--cs-font-category-weight: <?php csco_typography( 'font_category', 'font-weight', '600' ); ?>;
		--cs-font-category-style: <?php csco_typography( 'font_category', 'font-style', 'normal' ); ?>;
		--cs-font-category-letter-spacing: <?php csco_typography( 'font_category', 'letter-spacing', 'normal' ); ?>;
		--cs-font-category-text-transform: <?php csco_typography( 'font_category', 'text-transform', 'uppercase' ); ?>;

		/* Post Meta Font */
		--cs-font-post-meta-family: <?php csco_typography( 'font_post_meta', 'font-family', 'Inter' ); ?>;
		--cs-font-post-meta-size: <?php csco_typography( 'font_post_meta', 'font-size', '0.75rem' ); ?>;
		--cs-font-post-meta-weight: <?php csco_typography( 'font_post_meta', 'font-weight', '400' ); ?>;
		--cs-font-post-meta-style: <?php csco_typography( 'font_post_meta', 'font-style', 'normal' ); ?>;
		--cs-font-post-meta-letter-spacing: <?php csco_typography( 'font_post_meta', 'letter-spacing', 'normal' ); ?>;
		--cs-font-post-meta-text-transform: <?php csco_typography( 'font_post_meta', 'text-transform', 'none' ); ?>;

		/* Input Font */
		--cs-font-input-family: <?php csco_typography( 'font_input', 'font-family', 'Inter' ); ?>;
		--cs-font-input-size: <?php csco_typography( 'font_input', 'font-size', '0.75rem' ); ?>;
		--cs-font-input-weight: <?php csco_typography( 'font_input', 'font-weight', '400' ); ?>;
		--cs-font-input-style: <?php csco_typography( 'font_input', 'font-style', 'normal' ); ?>;
		--cs-font-input-letter-spacing: <?php csco_typography( 'font_input', 'letter-spacing', 'normal' ); ?>;
		--cs-font-input-text-transform: <?php csco_typography( 'font_input', 'text-transform', 'none' ); ?>;

		/* Post Subbtitle */
		--cs-font-post-subtitle-family: <?php csco_typography( 'font_post_subtitle', 'font-family', 'inherit' ); ?>;
		--cs-font-post-subtitle-size: <?php csco_typography( 'font_post_subtitle', 'font-size', '1.5rem' ); ?>;
		--cs-font-post-subtitle-letter-spacing: <?php csco_typography( 'font_post_subtitle', 'letter-spacing', 'normal' ); ?>;

		/* Post Content */
		--cs-font-post-content-family: <?php csco_typography( 'font_post_content', 'font-family', 'Inter' ); ?>;
		--cs-font-post-content-size: <?php csco_typography( 'font_post_content', 'font-size', '1rem' ); ?>;
		--cs-font-post-content-letter-spacing: <?php csco_typography( 'font_post_content', 'letter-spacing', 'normal' ); ?>;

		/* Summary */
		--cs-font-entry-summary-family: <?php csco_typography( 'font_summary', 'font-family', 'Inter' ); ?>;
		--cs-font-entry-summary-size: <?php csco_typography( 'font_summary', 'font-size', '1.5rem' ); ?>;
		--cs-font-entry-summary-letter-spacing: <?php csco_typography( 'font_summary', 'letter-spacing', 'normal' ); ?>;

		/* Entry Excerpt */
		--cs-font-entry-excerpt-family: <?php csco_typography( 'font_excerpt', 'font-family', 'Inter' ); ?>;
		--cs-font-entry-excerpt-size: <?php csco_typography( 'font_excerpt', 'font-size', '0.875rem' ); ?>;
		--cs-font-entry-excerpt-letter-spacing: <?php csco_typography( 'font_excerpt', 'letter-spacing', 'normal' ); ?>;


		/* Logos --------------- */

		/* Main Logo */
		--cs-font-main-logo-family: <?php csco_typography( 'font_main_logo', 'font-family', 'Inter' ); ?>;
		--cs-font-main-logo-size: <?php csco_typography( 'font_main_logo', 'font-size', '1.25rem' ); ?>;
		--cs-font-main-logo-weight: <?php csco_typography( 'font_main_logo', 'font-weight', '500' ); ?>;
		--cs-font-main-logo-style: <?php csco_typography( 'font_main_logo', 'font-style', 'normal' ); ?>;
		--cs-font-main-logo-letter-spacing: <?php csco_typography( 'font_main_logo', 'letter-spacing', 'normal' ); ?>;
		--cs-font-main-logo-text-transform: <?php csco_typography( 'font_main_logo', 'text-transform', 'none' ); ?>;

		/* Large Logo */
		--cs-font-large-logo-family: <?php csco_typography( 'font_large_logo', 'font-family', 'Inter' ); ?>;
		--cs-font-large-logo-size: <?php csco_typography( 'font_large_logo', 'font-size', '1.5rem' ); ?>;
		--cs-font-large-logo-weight: <?php csco_typography( 'font_large_logo', 'font-weight', '500' ); ?>;
		--cs-font-large-logo-style: <?php csco_typography( 'font_large_logo', 'font-style', 'normal' ); ?>;
		--cs-font-large-logo-letter-spacing: <?php csco_typography( 'font_large_logo', 'letter-spacing', 'normal' ); ?>;
		--cs-font-large-logo-text-transform: <?php csco_typography( 'font_large_logo', 'text-transform', 'none' ); ?>;

		/* Footer Logo */
		--cs-font-footer-logo-family: <?php csco_typography( 'font_footer_logo', 'font-family', 'Inter' ); ?>;
		--cs-font-footer-logo-size: <?php csco_typography( 'font_footer_logo', 'font-size', '1.25rem' ); ?>;
		--cs-font-footer-logo-weight: <?php csco_typography( 'font_footer_logo', 'font-weight', '500' ); ?>;
		--cs-font-footer-logo-style: <?php csco_typography( 'font_footer_logo', 'font-style', 'normal' ); ?>;
		--cs-font-footer-logo-letter-spacing: <?php csco_typography( 'font_footer_logo', 'letter-spacing', 'normal' ); ?>;
		--cs-font-footer-logo-text-transform: <?php csco_typography( 'font_footer_logo', 'text-transform', 'none' ); ?>;

		/* Headings --------------- */

		/* Headings */
		--cs-font-headings-family: <?php csco_typography( 'font_headings', 'font-family', 'Inter' ); ?>;
		--cs-font-headings-weight: <?php csco_typography( 'font_headings', 'font-weight', '600' ); ?>;
		--cs-font-headings-style: <?php csco_typography( 'font_headings', 'font-style', 'normal' ); ?>;
		--cs-font-headings-line-height: <?php csco_typography( 'font_headings', 'line-height', '1.25' ); ?>;
		--cs-font-headings-letter-spacing: <?php csco_typography( 'font_headings', 'letter-spacing', 'normal' ); ?>;
		--cs-font-headings-text-transform: <?php csco_typography( 'font_headings', 'text-transform', 'none' ); ?>;

		/* Menu Font --------------- */

		/* Menu */
		/* Used for main top level menu elements. */
		--cs-font-menu-family: <?php csco_typography( 'font_menu', 'font-family', 'Inter' ); ?>;
		--cs-font-menu-size: <?php csco_typography( 'font_menu', 'font-size', '0.875rem' ); ?>;
		--cs-font-menu-weight: <?php csco_typography( 'font_menu', 'font-weight', '400' ); ?>;
		--cs-font-menu-style: <?php csco_typography( 'font_menu', 'font-style', 'normal' ); ?>;
		--cs-font-menu-letter-spacing: <?php csco_typography( 'font_menu', 'letter-spacing', '-0.0125em' ); ?>;
		--cs-font-menu-text-transform: <?php csco_typography( 'font_menu', 'text-transform', 'none' ); ?>;

		/* Submenu Font */
		/* Used for submenu elements. */
		--cs-font-submenu-family: <?php csco_typography( 'font_submenu', 'font-family', 'Inter' ); ?>;
		--cs-font-submenu-size: <?php csco_typography( 'font_submenu', 'font-size', '0.75rem' ); ?>;
		--cs-font-submenu-weight: <?php csco_typography( 'font_submenu', 'font-weight', '400' ); ?>;
		--cs-font-submenu-style: <?php csco_typography( 'font_submenu', 'font-style', 'normal' ); ?>;
		--cs-font-submenu-letter-spacing: <?php csco_typography( 'font_submenu', 'letter-spacing', 'normal' ); ?>;
		--cs-font-submenu-text-transform: <?php csco_typography( 'font_submenu', 'text-transform', 'none' ); ?>;

		/* Section Headings --------------- */
		--cs-font-section-headings-family: <?php csco_typography( 'section_heading_font', 'font-family', 'Inter' ); ?>;
		--cs-font-section-headings-size: <?php csco_typography( 'section_heading_font', 'font-size', '1.1255rem' ); ?>;
		--cs-font-section-headings-weight: <?php csco_typography( 'section_heading_font', 'font-weight', '500' ); ?>;
		--cs-font-section-headings-style: <?php csco_typography( 'section_heading_font', 'font-style', 'normal' ); ?>;
		--cs-font-section-headings-letter-spacing: <?php csco_typography( 'section_heading_font', 'letter-spacing', 'normal' ); ?>;
		--cs-font-section-headings-text-transform: <?php csco_typography( 'section_heading_font', 'text-transform', 'none' ); ?>;

		--cs-font-section-subheadings-family: <?php csco_typography( 'section_subheading_font', 'font-family', 'Inter' ); ?>;
		--cs-font-section-subheadings-size: <?php csco_typography( 'section_subheading_font', 'font-size', '0.6875rem' ); ?>;
		--cs-font-section-subheadings-weight: <?php csco_typography( 'section_subheading_font', 'font-weight', '500' ); ?>;
		--cs-font-section-subheadings-style: <?php csco_typography( 'section_subheading_font', 'font-style', 'normal' ); ?>;
		--cs-font-section-subheadings-letter-spacing: <?php csco_typography( 'section_subheading_font', 'letter-spacing', 'normal' ); ?>;
		--cs-font-section-subheadings-text-transform: <?php csco_typography( 'section_subheading_font', 'text-transform', 'uppercase' ); ?>;
	}

	<?php if ( ! get_theme_mod( 'section_heading_submenu_default', true ) ) { ?>
		.cs-header__widgets-column {
			--cs-font-section-headings-family: <?php csco_typography( 'section_heading_submenu_font', 'font-family', 'Inter' ); ?>;
			--cs-font-section-headings-size: <?php csco_typography( 'section_heading_submenu_font', 'font-size', '1.125rem' ); ?>;
			--cs-font-section-headings-weight: <?php csco_typography( 'section_heading_submenu_font', 'font-weight', '500' ); ?>;
			--cs-font-section-headings-style: <?php csco_typography( 'section_heading_submenu_font', 'font-style', 'normal' ); ?>;
			--cs-font-section-headings-letter-spacing: <?php csco_typography( 'section_heading_submenu_font', 'letter-spacing', 'normal' ); ?>;
			--cs-font-section-headings-text-transform: <?php csco_typography( 'section_heading_submenu_font', 'text-transform', 'none' ); ?>;

			--cs-font-section-subheadings-family: <?php csco_typography( 'section_subheading_submenu_font', 'font-family', 'Inter' ); ?>;
			--cs-font-section-subheadings-size: <?php csco_typography( 'section_subheading_submenu_font', 'font-size', '0.6875rem' ); ?>;
			--cs-font-section-subheadings-weight: <?php csco_typography( 'section_subheading_submenu_font', 'font-weight', '500' ); ?>;
			--cs-font-section-subheadings-style: <?php csco_typography( 'section_subheading_submenu_font', 'font-style', 'normal' ); ?>;
			--cs-font-section-subheadings-letter-spacing: <?php csco_typography( 'section_subheading_submenu_font', 'letter-spacing', 'normal' ); ?>;
			--cs-font-section-subheadings-text-transform: <?php csco_typography( 'section_subheading_submenu_font', 'text-transform', 'uppercase' ); ?>;
		}
	<?php } ?>
</style>
