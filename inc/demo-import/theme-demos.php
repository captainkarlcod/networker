<?php
/**
 * Theme Demos
 *
 * @package Networker
 */

/**
 * Theme Demos
 */
function csco_theme_demos() {
	$demos = array(
		// Theme mods imported with every demo.
		'common_mods' => array(),
		// Specific demos.
		'demos'       =>
		array('networker' => array(
						'name'              => 'Networker',
						'preview_image_url' => '/inc/demo-import/theme-demos/logo-networker.png',
						'preset'            => 'networker',
						'mods'              => array (
		  'font_styled_heading' =>
		  array (
			'line-height' => '140%',
			'font-backup' => '',
			'variant' => 'regular',
			'font-weight' => 400,
			'font-style' => 'normal',
		  ),
		  'font_decorated_heading' =>
		  array (
			'font-family' => 'Sriracha',
			'font-size' => '1.25rem',
			'variant' => 'regular',
			'subsets' =>
			array (
			  0 => 'latin',
			),
			'letter-spacing' => '-0.05em',
			'text-transform' => 'uppercase',
			'line-height' => '1',
			'font-backup' => '',
			'font-weight' => 400,
			'font-style' => 'normal',
		  ),
		  'header_layout' => 'cs-header-four',
		  'color_topbar_background' => '#2d2f33',
		  'footer_social_links_maximum' => '4',
		  'home_layout' => 'list',
		  'navbar_smart_sticky' => true,
		  'color_topbar_background_dark' => '#000000',
		  'post_prev_next_meta' =>
		  array (
			0 => 'category',
			1 => 'date',
		  ),
		  'font_base' =>
		  array (
			'font-family' => 'Inter',
			'variant' => 'regular',
			'subsets' =>
			array (
			  0 => 'latin',
			),
			'font-size' => '1rem',
			'letter-spacing' => 'normal',
			'line-height' => '1.5',
			'font-backup' => '',
			'font-weight' => 400,
			'font-style' => 'normal',
		  ),
		  'font_primary' =>
		  array (
			'font-family' => 'Inter',
			'variant' => '500',
			'subsets' =>
			array (
			  0 => 'latin',
			),
			'font-size' => '0.875rem',
			'letter-spacing' => 'normal',
			'text-transform' => 'none',
			'font-backup' => '',
			'font-weight' => 500,
			'font-style' => 'normal',
		  ),
		  'font_secondary' =>
		  array (
			'font-family' => 'Inter',
			'variant' => 'regular',
			'subsets' =>
			array (
			  0 => 'latin',
			),
			'font-size' => '0.75rem',
			'letter-spacing' => 'normal',
			'text-transform' => 'none',
			'font-backup' => '',
			'font-weight' => 400,
			'font-style' => 'normal',
		  ),
		  'font_category' =>
		  array (
			'font-family' => 'Inter',
			'variant' => '600',
			'subsets' =>
			array (
			  0 => 'latin',
			),
			'font-size' => '0.6875rem',
			'letter-spacing' => 'normal',
			'text-transform' => 'uppercase',
			'font-backup' => '',
			'font-weight' => 600,
			'font-style' => 'normal',
		  ),
		  'font_post_meta' =>
		  array (
			'font-family' => 'Inter',
			'variant' => 'regular',
			'subsets' =>
			array (
			  0 => 'latin',
			),
			'font-size' => '0.75rem',
			'letter-spacing' => 'normal',
			'text-transform' => 'none',
			'font-backup' => '',
			'font-weight' => 400,
			'font-style' => 'normal',
		  ),
		  'font_post_subtitle' =>
		  array (
			'font-family' => 'inherit',
			'subsets' =>
			array (
			  0 => 'latin',
			),
			'font-size' => '1.5rem',
			'letter-spacing' => 'normal',
			'font-backup' => '',
			'variant' => '',
			'font-weight' => 0,
			'font-style' => '',
		  ),
		  'font_input' =>
		  array (
			'font-family' => 'Inter',
			'variant' => 'regular',
			'subsets' =>
			array (
			  0 => 'latin',
			),
			'font-size' => '0.75rem',
			'letter-spacing' => 'normal',
			'text-transform' => 'none',
			'font-backup' => '',
			'font-weight' => 400,
			'font-style' => 'normal',
		  ),
		  'font_post_content' =>
		  array (
			'font-family' => 'Inter',
			'subsets' =>
			array (
			  0 => 'latin',
			),
			'font-size' => '1rem',
			'letter-spacing' => 'normal',
			'font-backup' => '',
			'variant' => 'regular',
			'font-weight' => 400,
			'font-style' => 'normal',
		  ),
		  'font_summary' =>
		  array (
			'font-family' => 'Inter',
			'subsets' =>
			array (
			  0 => 'latin',
			),
			'font-size' => '1.5rem',
			'letter-spacing' => 'normal',
			'font-backup' => '',
			'variant' => 'regular',
			'font-weight' => 400,
			'font-style' => 'normal',
		  ),
		  'font_excerpt' =>
		  array (
			'font-family' => 'Inter',
			'subsets' =>
			array (
			  0 => 'latin',
			),
			'font-size' => '0.875rem',
			'letter-spacing' => 'normal',
			'font-backup' => '',
			'variant' => 'regular',
			'font-weight' => 400,
			'font-style' => 'normal',
		  ),
		  'font_headings' =>
		  array (
			'font-family' => 'Inter',
			'variant' => '600',
			'subsets' =>
			array (
			  0 => 'latin',
			),
			'letter-spacing' => 'normal',
			'text-transform' => 'none',
			'line-height' => '1.25',
			'font-backup' => '',
			'font-weight' => 600,
			'font-style' => 'normal',
		  ),
		  'section_heading_font' =>
		  array (
			'font-family' => 'Inter',
			'variant' => '500',
			'subsets' =>
			array (
			  0 => 'latin',
			),
			'font-size' => '1.125rem',
			'letter-spacing' => 'normal',
			'text-transform' => 'none',
			'font-backup' => '',
			'font-weight' => 500,
			'font-style' => 'normal',
		  ),
		  'section_subheading_font' =>
		  array (
			'font-family' => 'Inter',
			'variant' => '500',
			'subsets' =>
			array (
			  0 => 'latin',
			),
			'font-size' => '0.6875rem',
			'letter-spacing' => 'normal',
			'text-transform' => 'uppercase',
			'font-backup' => '',
			'font-weight' => 500,
			'font-style' => 'normal',
		  ),
		  'font_menu' =>
		  array (
			'font-family' => 'Inter',
			'variant' => 'regular',
			'subsets' =>
			array (
			  0 => 'latin',
			),
			'font-size' => '0.875rem',
			'letter-spacing' => '-0.0125em',
			'text-transform' => 'none',
			'font-backup' => '',
			'font-weight' => 400,
			'font-style' => 'normal',
		  ),
		  'font_submenu' =>
		  array (
			'font-family' => 'Inter',
			'subsets' =>
			array (
			  0 => 'latin',
			),
			'variant' => 'regular',
			'font-size' => '0.75rem',
			'letter-spacing' => '0px',
			'text-transform' => 'none',
			'font-backup' => '',
			'font-weight' => 400,
			'font-style' => 'normal',
		  ),
		  'section_heading' => 'style-1',
		),
						'mods_typekit'      => array (
		),
					), 'the-pitch' => array(
						'name'              => 'The Pitch.',
						'preview_image_url' => '/inc/demo-import/theme-demos/logo-the-pitch.png',
						'preset'            => 'the-pitch',
						'mods'              => array (
		  'font_styled_heading' =>
		  array (
			'line-height' => '140%',
			'font-backup' => '',
			'variant' => 'regular',
			'font-weight' => 400,
			'font-style' => 'normal',
		  ),
		  'font_decorated_heading' =>
		  array (
			'font-family' => 'Sriracha',
			'font-size' => '1.25rem',
			'variant' => 'regular',
			'subsets' =>
			array (
			  0 => 'latin',
			),
			'letter-spacing' => '-0.05em',
			'text-transform' => 'uppercase',
			'line-height' => '1',
			'font-backup' => '',
			'font-weight' => 400,
			'font-style' => 'normal',
		  ),
		  'header_layout' => 'cs-header-one',
		  'color_topbar_background' => '#2d2f33',
		  'footer_social_links_maximum' => '4',
		  'home_layout' => 'list',
		  'navbar_smart_sticky' => true,
		  'color_topbar_background_dark' => '#000000',
		  'post_prev_next_meta' =>
		  array (
			0 => 'category',
			1 => 'date',
		  ),
		  'header_initial_height' => '70px',
		  'header_height' => '70px',
		  'footer_layout' => 'cs-footer-three',
		  'design_primary_border_radius' => '0',
		  'design_common_border_radius' => '0',
		  'design_image_border_radius' => '0',
		  'post_header_type' => 'grid',
		  'font_headings' =>
		  array (
			'font-family' => 'Inter',
			'variant' => '600',
			'subsets' =>
			array (
			  0 => 'latin',
			),
			'letter-spacing' => '-0.025em',
			'text-transform' => 'none',
			'line-height' => '1.25',
			'font-backup' => '',
			'font-weight' => 600,
			'font-style' => 'normal',
		  ),
		  'font_post_subtitle' =>
		  array (
			'font-family' => 'inherit',
			'subsets' =>
			array (
			  0 => 'latin',
			),
			'font-size' => '1.5rem',
			'letter-spacing' => 'normal',
			'font-backup' => '',
			'variant' => '',
			'font-weight' => 0,
			'font-style' => '',
		  ),
		  'font_category' =>
		  array (
			'font-family' => 'Inter',
			'variant' => '700',
			'subsets' =>
			array (
			  0 => 'latin',
			),
			'font-size' => '0.875rem',
			'letter-spacing' => '-0.0125em',
			'text-transform' => 'none',
			'font-backup' => '',
			'font-weight' => 700,
			'font-style' => 'normal',
		  ),
		  'color_category' => '#03a464',
		  'design_secondary_border_radius' => '0',
		  'color_accent' => '#29c654',
		  'color_button' => '#03a464',
		  'color_button_hover' => '#29c654',
		  'font_main_logo' =>
		  array (
			'font-family' => 'Inter',
			'font-size' => '1.5rem',
			'variant' => '900',
			'subsets' =>
			array (
			  0 => 'latin',
			),
			'letter-spacing' => '-0.025em',
			'text-transform' => 'uppercase',
			'font-backup' => '',
			'font-weight' => 900,
			'font-style' => 'normal',
		  ),
		  'font_footer_logo' =>
		  array (
			'font-family' => 'Inter',
			'font-size' => '1.5rem',
			'variant' => '900',
			'subsets' =>
			array (
			  0 => 'latin',
			),
			'letter-spacing' => '-0.025em',
			'text-transform' => 'uppercase',
			'font-backup' => '',
			'font-weight' => 900,
			'font-style' => 'normal',
		  ),
		  'header_multi_column_display' => true,
		  'header_offcanvas' => true,
		  'woocommerce_header_hide_icon' => true,
		  'font_menu' =>
		  array (
			'font-family' => 'Inter',
			'variant' => '800',
			'subsets' =>
			array (
			  0 => 'latin',
			),
			'font-size' => '0.75rem',
			'letter-spacing' => '-0.0125em',
			'text-transform' => 'uppercase',
			'font-backup' => '',
			'font-weight' => 800,
			'font-style' => 'normal',
		  ),
		  'font_submenu' =>
		  array (
			'font-family' => 'Gothic A1',
			'subsets' =>
			array (
			  0 => 'latin',
			),
			'variant' => 'regular',
			'font-size' => '0.875rem',
			'letter-spacing' => '0px',
			'text-transform' => 'none',
			'font-backup' => '',
			'font-weight' => 400,
			'font-style' => 'normal',
		  ),
		  'font_base' =>
		  array (
			'font-family' => 'Inter',
			'variant' => 'regular',
			'subsets' =>
			array (
			  0 => 'latin',
			),
			'font-size' => '1rem',
			'letter-spacing' => 'normal',
			'line-height' => '1.5',
			'font-backup' => '',
			'font-weight' => 400,
			'font-style' => 'normal',
		  ),
		  'font_primary' =>
		  array (
			'font-family' => 'Inter',
			'variant' => '700',
			'subsets' =>
			array (
			  0 => 'latin',
			),
			'font-size' => '0.6875rem',
			'letter-spacing' => 'normal',
			'text-transform' => 'uppercase',
			'font-backup' => '',
			'font-weight' => 700,
			'font-style' => 'normal',
		  ),
		  'font_secondary' =>
		  array (
			'font-family' => 'Inter',
			'variant' => 'regular',
			'subsets' =>
			array (
			  0 => 'latin',
			),
			'font-size' => '0.75rem',
			'letter-spacing' => 'normal',
			'text-transform' => 'none',
			'font-backup' => '',
			'font-weight' => 400,
			'font-style' => 'normal',
		  ),
		  'font_post_meta' =>
		  array (
			'font-family' => 'Inter',
			'variant' => '500',
			'subsets' =>
			array (
			  0 => 'latin',
			),
			'font-size' => '0.75rem',
			'letter-spacing' => 'normal',
			'text-transform' => 'none',
			'font-backup' => '',
			'font-weight' => 500,
			'font-style' => 'normal',
		  ),
		  'font_input' =>
		  array (
			'font-family' => 'Inter',
			'variant' => 'regular',
			'subsets' =>
			array (
			  0 => 'latin',
			),
			'font-size' => '0.75rem',
			'letter-spacing' => 'normal',
			'text-transform' => 'none',
			'font-backup' => '',
			'font-weight' => 400,
			'font-style' => 'normal',
		  ),
		  'font_post_content' =>
		  array (
			'font-family' => 'Inter',
			'subsets' =>
			array (
			  0 => 'latin',
			),
			'font-size' => '1rem',
			'letter-spacing' => 'normal',
			'font-backup' => '',
			'variant' => 'regular',
			'font-weight' => 400,
			'font-style' => 'normal',
		  ),
		  'font_summary' =>
		  array (
			'font-family' => 'Inter',
			'subsets' =>
			array (
			  0 => 'latin',
			),
			'font-size' => '1.5rem',
			'letter-spacing' => 'normal',
			'font-backup' => '',
			'variant' => 'regular',
			'font-weight' => 400,
			'font-style' => 'normal',
		  ),
		  'font_excerpt' =>
		  array (
			'font-family' => 'Inter',
			'subsets' =>
			array (
			  0 => 'latin',
			),
			'font-size' => '0.875rem',
			'letter-spacing' => 'normal',
			'font-backup' => '',
			'variant' => 'regular',
			'font-weight' => 400,
			'font-style' => 'normal',
		  ),
		  'section_heading_font' =>
		  array (
			'font-family' => 'Inter',
			'variant' => '800',
			'subsets' =>
			array (
			  0 => 'latin',
			),
			'font-size' => '1rem',
			'letter-spacing' => '-0.025em',
			'text-transform' => 'uppercase',
			'font-backup' => '',
			'font-weight' => 800,
			'font-style' => 'normal',
		  ),
		  'section_subheading_font' =>
		  array (
			'font-family' => 'Inter',
			'variant' => '600',
			'subsets' =>
			array (
			  0 => 'latin',
			),
			'font-size' => '0.6875rem',
			'letter-spacing' => '-0.025em',
			'text-transform' => 'uppercase',
			'font-backup' => '',
			'font-weight' => 600,
			'font-style' => 'normal',
		  ),
		  'color_category_hover' => '#29c654',
		  'section_subheading_color_text' => '#9e9e9e',
		  'section_subheading_color_text_dark' => '#757575',
		  'color_secondary' => '#818b91',
		  'color_header_background' => '#03a464',
		  'color_submenu_background' => '#000000',
		  'color_category_dark' => '#03a464',
		  'color_button_dark' => '#03a464',
		  'color_category_hover_dark' => '#29c654',
		  'color_overlay' => 'rgba(0,0,0,0.26)',
		  'section_heading' => 'style-1',
		  'section_heading_color_border' => '#036de7',
		  'section_heading_color_border_dark' => '#8c8c8c',
		  'color_footer_background' => '#000000',
		  'header_border_width' => '0px',
		  'color_accent_dark' => '#29c654',
		  'color_button_hover_dark' => '#29c654',
		),
						'mods_typekit'      => array (
		),
					), 'apperific' => array(
						'name'              => 'Apperific',
						'preview_image_url' => '/inc/demo-import/theme-demos/logo-apperific.png',
						'preset'            => 'apperific',
						'mods'              => array (
		  'font_styled_heading' =>
		  array (
			'line-height' => '140%',
			'font-backup' => '',
			'variant' => 'regular',
			'font-weight' => 400,
			'font-style' => 'normal',
		  ),
		  'font_decorated_heading' =>
		  array (
			'font-family' => 'Sriracha',
			'font-size' => '1.25rem',
			'variant' => 'regular',
			'subsets' =>
			array (
			  0 => 'latin',
			),
			'letter-spacing' => '-0.05em',
			'text-transform' => 'uppercase',
			'line-height' => '1',
			'font-backup' => '',
			'font-weight' => 400,
			'font-style' => 'normal',
		  ),
		  'header_layout' => 'cs-header-four',
		  'color_topbar_background' => '#2d2f33',
		  'footer_social_links_maximum' => '4',
		  'home_layout' => 'list',
		  'navbar_smart_sticky' => true,
		  'color_topbar_background_dark' => '#000000',
		  'post_prev_next_meta' =>
		  array (
			0 => 'category',
			1 => 'date',
		  ),
		  'footer_instagram_username' => 'codesupply.co',
		  'footer_instagram_type' => 'carousel',
		  'section_heading' => 'style-2',
		  'post_header_type' => 'large',
		  'font_main_logo' =>
		  array (
			'font-family' => 'Norican',
			'font-size' => '1.75rem',
			'variant' => 'regular',
			'subsets' =>
			array (
			  0 => 'latin',
			),
			'letter-spacing' => 'normal',
			'text-transform' => 'none',
			'font-backup' => '',
			'font-weight' => 400,
			'font-style' => 'normal',
		  ),
		  'font_headings' =>
		  array (
			'font-family' => 'Inter',
			'variant' => '700',
			'subsets' =>
			array (
			  0 => 'latin',
			),
			'letter-spacing' => 'normal',
			'text-transform' => 'uppercase',
			'line-height' => '1.25',
			'font-backup' => '',
			'font-weight' => 700,
			'font-style' => 'normal',
		  ),
		  'color_accent' => '#ec0850',
		  'color_category' => '#ec3908',
		  'color_category_hover' => '#000000',
		  'color_button' => '#ec0850',
		  'color_button_hover' => '#000000',
		  'font_category' =>
		  array (
			'font-family' => 'Inter',
			'variant' => '500',
			'subsets' =>
			array (
			  0 => 'latin',
			),
			'font-size' => '0.875rem',
			'letter-spacing' => 'normal',
			'text-transform' => 'none',
			'font-backup' => '',
			'font-weight' => 500,
			'font-style' => 'normal',
		  ),
		  'font_post_subtitle' =>
		  array (
			'font-family' => 'inherit',
			'subsets' =>
			array (
			  0 => 'latin',
			),
			'font-size' => '1.5rem',
			'letter-spacing' => 'normal',
			'font-backup' => '',
			'variant' => '',
			'font-weight' => 0,
			'font-style' => '',
		  ),
		  'font_footer_logo' =>
		  array (
			'font-family' => 'Norican',
			'font-size' => '1.75rem',
			'variant' => 'regular',
			'subsets' =>
			array (
			  0 => 'latin',
			),
			'letter-spacing' => 'normal',
			'text-transform' => 'none',
			'font-backup' => '',
			'font-weight' => 400,
			'font-style' => 'normal',
		  ),
		  'section_heading_font' =>
		  array (
			'font-family' => 'Inter',
			'variant' => '700',
			'subsets' =>
			array (
			  0 => 'latin',
			),
			'font-size' => '1.125rem',
			'letter-spacing' => 'normal',
			'text-transform' => 'uppercase',
			'font-backup' => '',
			'font-weight' => 700,
			'font-style' => 'normal',
		  ),
		  'section_subheading_font' =>
		  array (
			'font-family' => 'Inter',
			'variant' => '500',
			'subsets' =>
			array (
			  0 => 'latin',
			),
			'font-size' => '0.6875rem',
			'letter-spacing' => '0.025em',
			'text-transform' => 'uppercase',
			'font-backup' => '',
			'font-weight' => 500,
			'font-style' => 'normal',
		  ),
		  'font_base' =>
		  array (
			'font-family' => 'Inter',
			'variant' => 'regular',
			'subsets' =>
			array (
			  0 => 'latin',
			),
			'font-size' => '1rem',
			'letter-spacing' => 'normal',
			'line-height' => '1.5',
			'font-backup' => '',
			'font-weight' => 400,
			'font-style' => 'normal',
		  ),
		  'font_primary' =>
		  array (
			'font-family' => 'Inter',
			'variant' => '500',
			'subsets' =>
			array (
			  0 => 'latin',
			),
			'font-size' => '0.875rem',
			'letter-spacing' => 'normal',
			'text-transform' => 'none',
			'font-backup' => '',
			'font-weight' => 500,
			'font-style' => 'normal',
		  ),
		  'font_secondary' =>
		  array (
			'font-family' => 'Inter',
			'variant' => 'regular',
			'subsets' =>
			array (
			  0 => 'latin',
			),
			'font-size' => '0.75rem',
			'letter-spacing' => 'normal',
			'text-transform' => 'none',
			'font-backup' => '',
			'font-weight' => 400,
			'font-style' => 'normal',
		  ),
		  'font_post_meta' =>
		  array (
			'font-family' => 'Inter',
			'variant' => 'regular',
			'subsets' =>
			array (
			  0 => 'latin',
			),
			'font-size' => '0.75rem',
			'letter-spacing' => 'normal',
			'text-transform' => 'none',
			'font-backup' => '',
			'font-weight' => 400,
			'font-style' => 'normal',
		  ),
		  'font_input' =>
		  array (
			'font-family' => 'Inter',
			'variant' => 'regular',
			'subsets' =>
			array (
			  0 => 'latin',
			),
			'font-size' => '0.75rem',
			'letter-spacing' => 'normal',
			'text-transform' => 'none',
			'font-backup' => '',
			'font-weight' => 400,
			'font-style' => 'normal',
		  ),
		  'font_post_content' =>
		  array (
			'font-family' => 'Inter',
			'subsets' =>
			array (
			  0 => 'latin',
			),
			'font-size' => '1rem',
			'letter-spacing' => 'normal',
			'font-backup' => '',
			'variant' => 'regular',
			'font-weight' => 400,
			'font-style' => 'normal',
		  ),
		  'font_summary' =>
		  array (
			'font-family' => 'Inter',
			'subsets' =>
			array (
			  0 => 'latin',
			),
			'font-size' => '1.5rem',
			'letter-spacing' => 'normal',
			'font-backup' => '',
			'variant' => 'regular',
			'font-weight' => 400,
			'font-style' => 'normal',
		  ),
		  'font_excerpt' =>
		  array (
			'font-family' => 'Inter',
			'subsets' =>
			array (
			  0 => 'latin',
			),
			'font-size' => '0.875rem',
			'letter-spacing' => 'normal',
			'font-backup' => '',
			'variant' => 'regular',
			'font-weight' => 400,
			'font-style' => 'normal',
		  ),
		  'font_menu' =>
		  array (
			'font-family' => 'Inter',
			'variant' => '500',
			'subsets' =>
			array (
			  0 => 'latin',
			),
			'font-size' => '0.9375rem',
			'letter-spacing' => '-0.025em',
			'text-transform' => 'none',
			'font-backup' => '',
			'font-weight' => 500,
			'font-style' => 'normal',
		  ),
		  'font_submenu' =>
		  array (
			'font-family' => 'Inter',
			'subsets' =>
			array (
			  0 => 'latin',
			),
			'variant' => 'regular',
			'font-size' => '0.875rem',
			'letter-spacing' => '0px',
			'text-transform' => 'none',
			'font-backup' => '',
			'font-weight' => 400,
			'font-style' => 'normal',
		  ),
		  'color_accent_dark' => '#ec0850',
		  'color_category_dark' => '#ec3908',
		  'color_button_dark' => '#ec0850',
		  'color_button_hover_dark' => '#222322',
		),
						'mods_typekit'      => array (
		),
					), 'gearbox' => array(
						'name'              => 'Gearbox',
						'preview_image_url' => '/inc/demo-import/theme-demos/logo-gearbox.png',
						'preset'            => 'gearbox',
						'mods'              => array (
		  'font_styled_heading' =>
		  array (
			'line-height' => '140%',
			'font-backup' => '',
			'variant' => 'regular',
			'font-weight' => 400,
			'font-style' => 'normal',
		  ),
		  'font_decorated_heading' =>
		  array (
			'font-family' => 'Sriracha',
			'font-size' => '1.25rem',
			'variant' => 'regular',
			'subsets' =>
			array (
			  0 => 'latin',
			),
			'letter-spacing' => '-0.05em',
			'text-transform' => 'uppercase',
			'line-height' => '1',
			'font-backup' => '',
			'font-weight' => 400,
			'font-style' => 'normal',
		  ),
		  'header_layout' => 'cs-header-three',
		  'color_topbar_background' => '#000000',
		  'footer_social_links_maximum' => '4',
		  'home_layout' => 'list',
		  'navbar_smart_sticky' => true,
		  'color_topbar_background_dark' => '#000000',
		  'post_prev_next_meta' =>
		  array (
			0 => 'category',
			1 => 'date',
		  ),
		  'footer_layout' => 'cs-footer-two',
		  'color_scheme' => 'system',
		  'color_scheme_toggle' => true,
		  'font_base' =>
		  array (
			'font-family' => 'Inter',
			'variant' => 'regular',
			'subsets' =>
			array (
			  0 => 'latin',
			),
			'font-size' => '1rem',
			'letter-spacing' => 'normal',
			'line-height' => '1.5',
			'font-backup' => '',
			'font-weight' => 400,
			'font-style' => 'normal',
		  ),
		  'font_primary' =>
		  array (
			'font-family' => 'Bebas Neue',
			'variant' => 'regular',
			'subsets' =>
			array (
			  0 => 'latin',
			),
			'font-size' => '0.9375rem',
			'letter-spacing' => '0.025em',
			'text-transform' => 'none',
			'font-backup' => '',
			'font-weight' => 400,
			'font-style' => 'normal',
		  ),
		  'font_secondary' =>
		  array (
			'font-family' => 'Inter',
			'variant' => 'regular',
			'subsets' =>
			array (
			  0 => 'latin',
			),
			'font-size' => '0.75rem',
			'letter-spacing' => 'normal',
			'text-transform' => 'none',
			'font-backup' => '',
			'font-weight' => 400,
			'font-style' => 'normal',
		  ),
		  'font_category' =>
		  array (
			'font-family' => 'Bebas Neue',
			'variant' => 'regular',
			'subsets' =>
			array (
			  0 => 'latin',
			),
			'font-size' => '0.875rem',
			'letter-spacing' => '0.025em',
			'text-transform' => 'uppercase',
			'font-backup' => '',
			'font-weight' => 400,
			'font-style' => 'normal',
		  ),
		  'font_post_meta' =>
		  array (
			'font-family' => 'Inter',
			'variant' => 'regular',
			'subsets' =>
			array (
			  0 => 'latin',
			),
			'font-size' => '0.75rem',
			'letter-spacing' => 'normal',
			'text-transform' => 'none',
			'font-backup' => '',
			'font-weight' => 400,
			'font-style' => 'normal',
		  ),
		  'font_input' =>
		  array (
			'font-family' => 'Inter',
			'variant' => 'regular',
			'subsets' =>
			array (
			  0 => 'latin',
			),
			'font-size' => '0.75rem',
			'letter-spacing' => 'normal',
			'text-transform' => 'none',
			'font-backup' => '',
			'font-weight' => 400,
			'font-style' => 'normal',
		  ),
		  'font_post_subtitle' =>
		  array (
			'font-family' => 'inherit',
			'subsets' =>
			array (
			  0 => 'latin',
			),
			'font-size' => '1.5rem',
			'letter-spacing' => 'normal',
			'font-backup' => '',
			'variant' => '',
			'font-weight' => 0,
			'font-style' => '',
		  ),
		  'font_post_content' =>
		  array (
			'font-family' => 'Inter',
			'subsets' =>
			array (
			  0 => 'latin',
			),
			'font-size' => '1rem',
			'letter-spacing' => 'normal',
			'font-backup' => '',
			'variant' => 'regular',
			'font-weight' => 400,
			'font-style' => 'normal',
		  ),
		  'font_summary' =>
		  array (
			'font-family' => 'Inter',
			'subsets' =>
			array (
			  0 => 'latin',
			),
			'font-size' => '1.5rem',
			'letter-spacing' => 'normal',
			'font-backup' => '',
			'variant' => 'regular',
			'font-weight' => 400,
			'font-style' => 'normal',
		  ),
		  'font_excerpt' =>
		  array (
			'font-family' => 'Inter',
			'subsets' =>
			array (
			  0 => 'latin',
			),
			'font-size' => '0.875rem',
			'letter-spacing' => 'normal',
			'font-backup' => '',
			'variant' => 'regular',
			'font-weight' => 400,
			'font-style' => 'normal',
		  ),
		  'font_headings' =>
		  array (
			'font-family' => 'Inter',
			'variant' => '600',
			'subsets' =>
			array (
			  0 => 'latin',
			),
			'letter-spacing' => 'normal',
			'text-transform' => 'none',
			'line-height' => '1.25',
			'font-backup' => '',
			'font-weight' => 600,
			'font-style' => 'normal',
		  ),
		  'section_heading_font' =>
		  array (
			'font-family' => 'Bebas Neue',
			'variant' => 'regular',
			'subsets' =>
			array (
			  0 => 'latin',
			),
			'font-size' => '1.75rem',
			'letter-spacing' => 'normal',
			'text-transform' => 'none',
			'font-backup' => '',
			'font-weight' => 400,
			'font-style' => 'normal',
		  ),
		  'section_subheading_font' =>
		  array (
			'font-family' => 'Inter',
			'variant' => '500',
			'subsets' =>
			array (
			  0 => 'latin',
			),
			'font-size' => '0.75rem',
			'letter-spacing' => 'normal',
			'text-transform' => 'uppercase',
			'font-backup' => '',
			'font-weight' => 500,
			'font-style' => 'normal',
		  ),
		  'font_menu' =>
		  array (
			'font-family' => 'Bebas Neue',
			'variant' => 'regular',
			'subsets' =>
			array (
			  0 => 'latin',
			),
			'font-size' => '1.25rem',
			'letter-spacing' => '0.025em',
			'text-transform' => 'none',
			'font-backup' => '',
			'font-weight' => 400,
			'font-style' => 'normal',
		  ),
		  'font_submenu' =>
		  array (
			'font-family' => 'Inter',
			'subsets' =>
			array (
			  0 => 'latin',
			),
			'variant' => 'regular',
			'font-size' => '0.875rem',
			'letter-spacing' => '0px',
			'text-transform' => 'none',
			'font-backup' => '',
			'font-weight' => 400,
			'font-style' => 'normal',
		  ),
		  'design_secondary_border_radius' => '5px',
		  'webfonts_load_method' => 'link',
		  'misc_search_placeholder' => 'Enter keyword',
		  'misc_label_more' => 'Read More',
		  'design_primary_border_radius' => '5px',
		  'color_accent' => '#f23a3a',
		  'color_category' => '#f23a3a',
		  'color_button_hover' => '#004eff',
		  'color_header_background' => '#ffffff',
		  'color_accent_dark' => '#f23a3a',
		  'color_category_dark' => '#f23a3a',
		  'section_heading' => 'style-1',
		),
						'mods_typekit'      => array (
		),
					), 'mockups-vault' => array(
						'name'              => 'Mockups Vault',
						'preview_image_url' => '/inc/demo-import/theme-demos/logo-mockups-vault.png',
						'preset'            => 'mockups-vault',
						'mods'              => array (
		  'font_styled_heading' =>
		  array (
			'line-height' => '140%',
			'font-backup' => '',
			'variant' => 'regular',
			'font-weight' => 400,
			'font-style' => 'normal',
		  ),
		  'font_decorated_heading' =>
		  array (
			'font-family' => 'Sriracha',
			'font-size' => '1.25rem',
			'variant' => 'regular',
			'subsets' =>
			array (
			  0 => 'latin',
			),
			'letter-spacing' => '-0.05em',
			'text-transform' => 'uppercase',
			'line-height' => '1',
			'font-backup' => '',
			'font-weight' => 400,
			'font-style' => 'normal',
		  ),
		  'header_layout' => 'cs-header-two',
		  'color_topbar_background' => '#2d2f33',
		  'footer_social_links_maximum' => '4',
		  'home_layout' => 'list',
		  'navbar_smart_sticky' => true,
		  'color_topbar_background_dark' => '#000000',
		  'post_prev_next_meta' =>
		  array (
			0 => 'category',
			1 => 'date',
		  ),
		  'footer_layout' => 'cs-footer-one',
		  'section_heading' => 'style-2',
		  'color_overlay' => 'rgba(68,79,75,0.29)',
		  'post_header_type' => 'grid',
		  'font_base' =>
		  array (
			'font-family' => 'Inter',
			'variant' => 'regular',
			'subsets' =>
			array (
			  0 => 'latin',
			),
			'font-size' => '1rem',
			'letter-spacing' => 'normal',
			'line-height' => '1.5',
			'font-backup' => '',
			'font-weight' => 400,
			'font-style' => 'normal',
		  ),
		  'font_primary' =>
		  array (
			'font-family' => 'Poppins',
			'variant' => '500',
			'subsets' =>
			array (
			  0 => 'latin',
			),
			'font-size' => '0.875rem',
			'letter-spacing' => 'normal',
			'text-transform' => 'none',
			'font-backup' => '',
			'font-weight' => 500,
			'font-style' => 'normal',
		  ),
		  'font_secondary' =>
		  array (
			'font-family' => 'Inter',
			'variant' => 'regular',
			'subsets' =>
			array (
			  0 => 'latin',
			),
			'font-size' => '0.75rem',
			'letter-spacing' => 'normal',
			'text-transform' => 'none',
			'font-backup' => '',
			'font-weight' => 400,
			'font-style' => 'normal',
		  ),
		  'font_category' =>
		  array (
			'font-family' => 'Poppins',
			'variant' => '500',
			'subsets' =>
			array (
			  0 => 'latin',
			),
			'font-size' => '0.875rem',
			'letter-spacing' => 'normal',
			'text-transform' => 'none',
			'font-backup' => '',
			'font-weight' => 500,
			'font-style' => 'normal',
		  ),
		  'font_post_meta' =>
		  array (
			'font-family' => 'Inter',
			'variant' => 'regular',
			'subsets' =>
			array (
			  0 => 'latin',
			),
			'font-size' => '0.75rem',
			'letter-spacing' => 'normal',
			'text-transform' => 'none',
			'font-backup' => '',
			'font-weight' => 400,
			'font-style' => 'normal',
		  ),
		  'font_input' =>
		  array (
			'font-family' => 'Poppins',
			'variant' => 'regular',
			'subsets' =>
			array (
			  0 => 'latin',
			),
			'font-size' => '0.9375rem',
			'letter-spacing' => 'normal',
			'text-transform' => 'none',
			'font-backup' => '',
			'font-weight' => 400,
			'font-style' => 'normal',
		  ),
		  'font_post_subtitle' =>
		  array (
			'font-family' => 'inherit',
			'subsets' =>
			array (
			  0 => 'latin',
			),
			'font-size' => '1.5rem',
			'letter-spacing' => 'normal',
			'font-backup' => '',
			'variant' => '',
			'font-weight' => 0,
			'font-style' => '',
		  ),
		  'font_headings' =>
		  array (
			'font-family' => 'Poppins',
			'variant' => '500',
			'subsets' =>
			array (
			  0 => 'latin',
			),
			'letter-spacing' => 'normal',
			'text-transform' => 'none',
			'line-height' => '1.25',
			'font-backup' => '',
			'font-weight' => 500,
			'font-style' => 'normal',
		  ),
		  'font_post_content' =>
		  array (
			'font-family' => 'Inter',
			'subsets' =>
			array (
			  0 => 'latin',
			),
			'font-size' => '1rem',
			'letter-spacing' => 'normal',
			'font-backup' => '',
			'variant' => 'regular',
			'font-weight' => 400,
			'font-style' => 'normal',
		  ),
		  'font_summary' =>
		  array (
			'font-family' => 'Inter',
			'subsets' =>
			array (
			  0 => 'latin',
			),
			'font-size' => '1.5rem',
			'letter-spacing' => 'normal',
			'font-backup' => '',
			'variant' => 'regular',
			'font-weight' => 400,
			'font-style' => 'normal',
		  ),
		  'font_excerpt' =>
		  array (
			'font-family' => 'Inter',
			'subsets' =>
			array (
			  0 => 'latin',
			),
			'font-size' => '0.875rem',
			'letter-spacing' => 'normal',
			'font-backup' => '',
			'variant' => 'regular',
			'font-weight' => 400,
			'font-style' => 'normal',
		  ),
		  'section_heading_font' =>
		  array (
			'font-family' => 'Poppins',
			'variant' => '500',
			'subsets' =>
			array (
			  0 => 'latin',
			),
			'font-size' => '1.25rem',
			'letter-spacing' => 'normal',
			'text-transform' => 'none',
			'font-backup' => '',
			'font-weight' => 500,
			'font-style' => 'normal',
		  ),
		  'section_subheading_font' =>
		  array (
			'font-family' => 'Sriracha',
			'variant' => 'regular',
			'subsets' =>
			array (
			  0 => 'latin',
			),
			'font-size' => '1rem',
			'letter-spacing' => '-0.025em',
			'text-transform' => 'none',
			'font-backup' => '',
			'font-weight' => 400,
			'font-style' => 'normal',
		  ),
		  'font_menu' =>
		  array (
			'font-family' => 'Poppins',
			'variant' => '500',
			'subsets' =>
			array (
			  0 => 'latin',
			),
			'font-size' => '1.25rem',
			'letter-spacing' => '-0.025em',
			'text-transform' => 'none',
			'font-backup' => '',
			'font-weight' => 500,
			'font-style' => 'normal',
		  ),
		  'font_submenu' =>
		  array (
			'font-family' => 'Poppins',
			'subsets' =>
			array (
			  0 => 'latin',
			),
			'variant' => 'regular',
			'font-size' => '0.75rem',
			'letter-spacing' => '0px',
			'text-transform' => 'none',
			'font-backup' => '',
			'font-weight' => 400,
			'font-style' => 'normal',
		  ),
		  'color_accent' => '#20b382',
		  'color_category' => '#20b382',
		  'color_button' => '#20b382',
		  'color_button_hover' => '#14a373',
		  'section_subheading_color_text' => '#20b382',
		  'section_subheading_color_text_dark' => '#20b382',
		  'section_heading_submenu_default' => true,
		  'header_offcanvas' => false,
		  'color_accent_dark' => '#20b382',
		  'color_category_dark' => '#20b382',
		  'color_button_dark' => '#20b382',
		  'color_button_hover_dark' => '#14a373',
		),
						'mods_typekit'      => array (
		),
					), 'cloudware' => array(
						'name'              => 'Cloudware',
						'preview_image_url' => '/inc/demo-import/theme-demos/logo-cloudware.png',
						'preset'            => 'cloudware',
						'mods'              => array (
		  'font_styled_heading' =>
		  array (
			'line-height' => '140%',
			'font-backup' => '',
			'variant' => 'regular',
			'font-weight' => 400,
			'font-style' => 'normal',
		  ),
		  'font_decorated_heading' =>
		  array (
			'font-family' => 'Sriracha',
			'font-size' => '1.25rem',
			'variant' => 'regular',
			'subsets' =>
			array (
			  0 => 'latin',
			),
			'letter-spacing' => '-0.05em',
			'text-transform' => 'uppercase',
			'line-height' => '1',
			'font-backup' => '',
			'font-weight' => 400,
			'font-style' => 'normal',
		  ),
		  'header_layout' => 'cs-header-one',
		  'color_topbar_background' => '#2d2f33',
		  'footer_social_links_maximum' => '4',
		  'home_layout' => 'list',
		  'navbar_smart_sticky' => true,
		  'color_topbar_background_dark' => '#000000',
		  'post_prev_next_meta' =>
		  array (
			0 => 'category',
			1 => 'date',
		  ),
		  'footer_layout' => 'cs-footer-three',
		  'footer_instagram_username' => '',
		  'post_header_type' => 'large',
		  'font_base' =>
		  array (
			'font-family' => 'Jost',
			'variant' => 'regular',
			'subsets' =>
			array (
			  0 => 'latin',
			),
			'font-size' => '1rem',
			'letter-spacing' => 'normal',
			'line-height' => '1.5',
			'font-backup' => '',
			'font-weight' => 400,
			'font-style' => 'normal',
		  ),
		  'font_primary' =>
		  array (
			'font-family' => 'Jost',
			'variant' => '500',
			'subsets' =>
			array (
			  0 => 'latin',
			),
			'font-size' => '0.875rem',
			'letter-spacing' => 'normal',
			'text-transform' => 'none',
			'font-backup' => '',
			'font-weight' => 500,
			'font-style' => 'normal',
		  ),
		  'font_secondary' =>
		  array (
			'font-family' => 'Jost',
			'variant' => 'regular',
			'subsets' =>
			array (
			  0 => 'latin',
			),
			'font-size' => '0.75rem',
			'letter-spacing' => 'normal',
			'text-transform' => 'none',
			'font-backup' => '',
			'font-weight' => 400,
			'font-style' => 'normal',
		  ),
		  'font_post_subtitle' =>
		  array (
			'font-family' => 'inherit',
			'subsets' =>
			array (
			  0 => 'latin',
			),
			'font-size' => '1.5rem',
			'letter-spacing' => 'normal',
			'font-backup' => '',
			'variant' => '',
			'font-weight' => 0,
			'font-style' => '',
		  ),
		  'font_headings' =>
		  array (
			'font-family' => 'Jost',
			'variant' => '500',
			'subsets' =>
			array (
			  0 => 'latin',
			),
			'letter-spacing' => 'normal',
			'text-transform' => 'none',
			'line-height' => '1.25',
			'font-backup' => '',
			'font-weight' => 500,
			'font-style' => 'normal',
		  ),
		  'font_category' =>
		  array (
			'font-family' => 'Jost',
			'variant' => '500',
			'subsets' =>
			array (
			  0 => 'latin',
			),
			'font-size' => '0.75rem',
			'letter-spacing' => 'normal',
			'text-transform' => 'uppercase',
			'font-backup' => '',
			'font-weight' => 500,
			'font-style' => 'normal',
		  ),
		  'font_post_meta' =>
		  array (
			'font-family' => 'Jost',
			'variant' => 'regular',
			'subsets' =>
			array (
			  0 => 'latin',
			),
			'font-size' => '0.75rem',
			'letter-spacing' => 'normal',
			'text-transform' => 'none',
			'font-backup' => '',
			'font-weight' => 400,
			'font-style' => 'normal',
		  ),
		  'font_input' =>
		  array (
			'font-family' => 'Jost',
			'variant' => 'regular',
			'subsets' =>
			array (
			  0 => 'latin',
			),
			'font-size' => '0.75rem',
			'letter-spacing' => 'normal',
			'text-transform' => 'none',
			'font-backup' => '',
			'font-weight' => 400,
			'font-style' => 'normal',
		  ),
		  'font_post_content' =>
		  array (
			'font-family' => 'Jost',
			'subsets' =>
			array (
			  0 => 'latin',
			),
			'font-size' => '1rem',
			'letter-spacing' => 'normal',
			'font-backup' => '',
			'variant' => 'regular',
			'font-weight' => 400,
			'font-style' => 'normal',
		  ),
		  'font_summary' =>
		  array (
			'font-family' => 'Jost',
			'subsets' =>
			array (
			  0 => 'latin',
			),
			'font-size' => '1.5rem',
			'letter-spacing' => 'normal',
			'font-backup' => '',
			'variant' => 'regular',
			'font-weight' => 400,
			'font-style' => 'normal',
		  ),
		  'font_excerpt' =>
		  array (
			'font-family' => 'Jost',
			'subsets' =>
			array (
			  0 => 'latin',
			),
			'font-size' => '1rem',
			'letter-spacing' => 'normal',
			'font-backup' => '',
			'variant' => 'regular',
			'font-weight' => 400,
			'font-style' => 'normal',
		  ),
		  'font_main_logo' =>
		  array (
			'font-family' => 'Jost',
			'font-size' => '1.25rem',
			'variant' => '500',
			'subsets' =>
			array (
			  0 => 'latin',
			),
			'letter-spacing' => 'normal',
			'text-transform' => 'none',
			'font-backup' => '',
			'font-weight' => 500,
			'font-style' => 'normal',
		  ),
		  'font_footer_logo' =>
		  array (
			'font-family' => 'Jost',
			'font-size' => '1.25rem',
			'variant' => '500',
			'subsets' =>
			array (
			  0 => 'latin',
			),
			'letter-spacing' => 'normal',
			'text-transform' => 'none',
			'font-backup' => '',
			'font-weight' => 500,
			'font-style' => 'normal',
		  ),
		  'section_heading_font' =>
		  array (
			'font-family' => 'Jost',
			'variant' => '500',
			'subsets' =>
			array (
			  0 => 'latin',
			),
			'font-size' => '1.125rem',
			'letter-spacing' => 'normal',
			'text-transform' => 'none',
			'font-backup' => '',
			'font-weight' => 500,
			'font-style' => 'normal',
		  ),
		  'section_subheading_font' =>
		  array (
			'font-family' => 'Jost',
			'variant' => '500',
			'subsets' =>
			array (
			  0 => 'latin',
			),
			'font-size' => '0.75rem',
			'letter-spacing' => 'normal',
			'text-transform' => 'uppercase',
			'font-backup' => '',
			'font-weight' => 500,
			'font-style' => 'normal',
		  ),
		  'font_menu' =>
		  array (
			'font-family' => 'Jost',
			'variant' => 'regular',
			'subsets' =>
			array (
			  0 => 'latin',
			),
			'font-size' => '1rem',
			'letter-spacing' => '0px',
			'text-transform' => 'none',
			'font-backup' => '',
			'font-weight' => 400,
			'font-style' => 'normal',
		  ),
		  'font_submenu' =>
		  array (
			'font-family' => 'Jost',
			'subsets' =>
			array (
			  0 => 'latin',
			),
			'variant' => 'regular',
			'font-size' => '0.875rem',
			'letter-spacing' => '0px',
			'text-transform' => 'none',
			'font-backup' => '',
			'font-weight' => 400,
			'font-style' => 'normal',
		  ),
		  'design_common_border_radius' => '5px',
		  'design_image_border_radius' => '5px',
		  'design_primary_border_radius' => '5px',
		  'section_heading' => 'style-1',
		),
						'mods_typekit'      => array (
		),
					)),
	);
	return $demos;
}
add_filter( 'csco_theme_demos', 'csco_theme_demos' );
