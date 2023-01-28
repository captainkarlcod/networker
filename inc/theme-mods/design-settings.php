<?php
/**
 * Design
 *
 * @package Networker
 */

CSCO_Kirki::add_section(
	'design',
	array(
		'title'    => esc_html__( 'Design', 'networker' ),
		'priority' => 20,
	)
);

/**
 * -------------------------------------------------------------------------
 * Colors
 * -------------------------------------------------------------------------
 */

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'        => 'collapsible',
		'settings'    => 'design_collapsible_dark_mode',
		'section'     => 'design',
		'label'       => esc_html__( 'Dark Mode', 'networker' ),
		'priority'    => 10,
		'input_attrs' => array(
			'collapsed' => true,
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'     => 'radio',
		'settings' => 'color_scheme',
		'label'    => esc_html__( 'Site Color Scheme', 'networker' ),
		'section'  => 'design',
		'default'  => 'system',
		'choices'  => array(
			'system' => esc_html__( 'User’s system preference', 'networker' ),
			'light'  => esc_html__( 'Light', 'networker' ),
			'dark'   => esc_html__( 'Dark', 'networker' ),
		),
		'priority' => 10,
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'     => 'checkbox',
		'settings' => 'color_scheme_toggle',
		'label'    => esc_html__( 'Enable dark/light mode toggle', 'networker' ),
		'section'  => 'design',
		'default'  => true,
		'priority' => 10,
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'        => 'collapsible',
		'settings'    => 'design_collapsible_common',
		'section'     => 'design',
		'label'       => esc_html__( 'Light Scheme', 'networker' ),
		'priority'    => 10,
		'input_attrs' => array(
			'collapsed' => true,
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'     => 'color',
		'settings' => 'color_site_background',
		'label'    => esc_html__( 'Site Background', 'networker' ),
		'section'  => 'design',
		'priority' => 10,
		'default'  => '#FFFFFF',
		'choices'  => array(
			'alpha' => true,
		),
		'output'   => array(
			array(
				'element'  => ':root, [data-site-scheme="default"]',
				'property' => '--cs-color-site-background',
				'context'  => array( 'editor', 'front' ),
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'     => 'color',
		'settings' => 'color_search_background',
		'label'    => esc_html__( 'Site Search Background', 'networker' ),
		'section'  => 'design',
		'priority' => 10,
		'default'  => '#FFFFFF',
		'choices'  => array(
			'alpha' => true,
		),
		'output'   => array(
			array(
				'element'  => ':root, [data-site-scheme="default"]',
				'property' => '--cs-color-search-background',
				'context'  => array( 'editor', 'front' ),
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'            => 'color',
		'settings'        => 'color_topbar_background',
		'label'           => esc_html__( 'Topbar Background', 'networker' ),
		'section'         => 'design',
		'priority'        => 10,
		'default'         => '#f8f9fa',
		'choices'         => array(
			'alpha' => true,
		),
		'output'          => array(
			array(
				'element'  => ':root, [data-site-scheme="default"]',
				'property' => '--cs-color-topbar-background',
				'context'  => array( 'editor', 'front' ),
			),
		),
		'active_callback' => array(
			array(
				array(
					'setting'  => 'header_layout',
					'operator' => '==',
					'value'    => 'cs-header-three',
				),
				array(
					'setting'  => 'header_layout',
					'operator' => '==',
					'value'    => 'cs-header-four',
				),
				array(
					'setting'  => 'header_layout',
					'operator' => '==',
					'value'    => 'cs-header-five',
				),
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'     => 'color',
		'settings' => 'color_header_background',
		'label'    => esc_html__( 'Header Background', 'networker' ),
		'section'  => 'design',
		'priority' => 10,
		'default'  => '#FFFFFF',
		'choices'  => array(
			'alpha' => true,
		),
		'output'   => array(
			array(
				'element'  => ':root, [data-site-scheme="default"]',
				'property' => '--cs-color-header-background',
				'context'  => array( 'editor', 'front' ),
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'     => 'color',
		'settings' => 'color_submenu_background',
		'label'    => esc_html__( 'Submenu Background', 'networker' ),
		'section'  => 'design',
		'priority' => 10,
		'default'  => '#FFFFFF',
		'choices'  => array(
			'alpha' => true,
		),
		'output'   => array(
			array(
				'element'  => ':root, [data-site-scheme="default"]',
				'property' => '--cs-color-submenu-background',
				'context'  => array( 'editor', 'front' ),
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'     => 'color',
		'settings' => 'color_footer_background',
		'label'    => esc_html__( 'Footer Background', 'networker' ),
		'section'  => 'design',
		'priority' => 10,
		'default'  => '#f8f9fa',
		'choices'  => array(
			'alpha' => true,
		),
		'output'   => array(
			array(
				'element'  => ':root, [data-site-scheme="default"]',
				'property' => '--cs-color-footer-background',
				'context'  => array( 'editor', 'front' ),
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'     => 'color',
		'settings' => 'color_accent',
		'label'    => esc_html__( 'Accent Color', 'networker' ),
		'section'  => 'design',
		'priority' => 10,
		'default'  => '#007AFF',
		'choices'  => array(
			'alpha' => true,
		),
		'output'   => array(
			array(
				'element'  => ':root, [data-scheme="default"]',
				'property' => '--cs-color-accent',
				'context'  => array( 'editor', 'front' ),
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'     => 'color',
		'settings' => 'color_accent_contrast',
		'label'    => esc_html__( 'Accent Contrast Color', 'networker' ),
		'section'  => 'design',
		'priority' => 10,
		'default'  => '#FFFFFF',
		'choices'  => array(
			'alpha' => true,
		),
		'output'   => array(
			array(
				'element'  => ':root, [data-scheme="default"]',
				'property' => '--cs-color-accent-contrast',
				'context'  => array( 'editor', 'front' ),
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'     => 'color',
		'settings' => 'color_secondary',
		'label'    => esc_html__( 'Secondary Color', 'networker' ),
		'section'  => 'design',
		'priority' => 10,
		'default'  => '#818181',
		'choices'  => array(
			'alpha' => true,
		),
		'output'   => array(
			array(
				'element'  => ':root, [data-scheme="default"]',
				'property' => '--cs-color-secondary',
				'context'  => array( 'editor', 'front' ),
			),
			array(
				'element'  => ':root, [data-scheme="default"]',
				'property' => '--cs-palette-color-secondary',
				'context'  => array( 'editor', 'front' ),
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'     => 'color',
		'settings' => 'color_secondary_contrast',
		'label'    => esc_html__( 'Secondary Contrast Color', 'networker' ),
		'section'  => 'design',
		'priority' => 10,
		'default'  => '#000000',
		'choices'  => array(
			'alpha' => true,
		),
		'output'   => array(
			array(
				'element'  => ':root, [data-scheme="default"]',
				'property' => '--cs-color-secondary-contrast',
				'context'  => array( 'editor', 'front' ),
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'     => 'color',
		'settings' => 'color_post_archive_heading',
		'label'    => esc_html__( 'Post Archive Heading Color', 'networker' ),
		'section'  => 'design',
		'priority' => 10,
		'default'  => '#000000',
		'choices'  => array(
			'alpha' => true,
		),
		'output'   => array(
			array(
				'element'  => ':root .cs-posts-area-posts .cs-entry__title, [data-scheme="default"] .cs-posts-area-posts .cs-entry__title, :root .cs-entry__prev-next .cs-entry__title, [data-scheme="default"] .cs-entry__prev-next .cs-entry__title, :root .cs-entry__post-related .cs-entry__title, [data-scheme="default"] .cs-entry__post-related .cs-entry__title',
				'property' => '--cs-color-title',
				'context'  => array( 'editor', 'front' ),
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'     => 'color',
		'settings' => 'color_post_archive_heading_hover',
		'label'    => esc_html__( 'Post Archive Heading Hover Color', 'networker' ),
		'section'  => 'design',
		'priority' => 10,
		'default'  => '#818181',
		'choices'  => array(
			'alpha' => true,
		),
		'output'   => array(
			array(
				'element'  => ':root .cs-posts-area-posts .cs-entry__title, [data-scheme="default"] .cs-posts-area-posts .cs-entry__title, :root .cs-entry__prev-next .cs-entry__title, [data-scheme="default"] .cs-entry__prev-next .cs-entry__title, :root .cs-entry__post-related .cs-entry__title, [data-scheme="default"] .cs-entry__post-related .cs-entry__title',
				'property' => '--cs-color-title-hover',
				'context'  => array( 'editor', 'front' ),
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'     => 'color',
		'settings' => 'color_category',
		'label'    => esc_html__( 'Category Color', 'networker' ),
		'section'  => 'design',
		'priority' => 10,
		'default'  => '#007AFF',
		'choices'  => array(
			'alpha' => true,
		),
		'output'   => array(
			array(
				'element'  => ':root, [data-scheme="default"]',
				'property' => '--cs-color-category',
				'context'  => array( 'editor', 'front' ),
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'     => 'color',
		'settings' => 'color_category_hover',
		'label'    => esc_html__( 'Category Hover Color', 'networker' ),
		'section'  => 'design',
		'priority' => 10,
		'default'  => '#818181',
		'choices'  => array(
			'alpha' => true,
		),
		'output'   => array(
			array(
				'element'  => ':root, [data-scheme="default"]',
				'property' => '--cs-color-category-hover',
				'context'  => array( 'editor', 'front' ),
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'     => 'color',
		'settings' => 'color_button',
		'label'    => esc_html__( 'Button Background', 'networker' ),
		'section'  => 'design',
		'priority' => 10,
		'default'  => '#007AFF',
		'choices'  => array(
			'alpha' => true,
		),
		'output'   => array(
			array(
				'element'  => ':root, [data-scheme="default"]',
				'property' => '--cs-color-button',
				'context'  => array( 'editor', 'front' ),
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'     => 'color',
		'settings' => 'color_button_contrast',
		'label'    => esc_html__( 'Button Color', 'networker' ),
		'section'  => 'design',
		'priority' => 10,
		'default'  => '#FFFFFF',
		'choices'  => array(
			'alpha' => true,
		),
		'output'   => array(
			array(
				'element'  => ':root, [data-scheme="default"]',
				'property' => '--cs-color-button-contrast',
				'context'  => array( 'editor', 'front' ),
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'     => 'color',
		'settings' => 'color_button_hover',
		'label'    => esc_html__( 'Button Hover Background', 'networker' ),
		'section'  => 'design',
		'priority' => 10,
		'default'  => '#004eff',
		'choices'  => array(
			'alpha' => true,
		),
		'output'   => array(
			array(
				'element'  => ':root, [data-scheme="default"]',
				'property' => '--cs-color-button-hover',
				'context'  => array( 'editor', 'front' ),
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'     => 'color',
		'settings' => 'color_button_hover_contrast',
		'label'    => esc_html__( 'Button Hover Color', 'networker' ),
		'section'  => 'design',
		'priority' => 10,
		'default'  => '#FFFFFF',
		'choices'  => array(
			'alpha' => true,
		),
		'output'   => array(
			array(
				'element'  => ':root, [data-scheme="default"]',
				'property' => '--cs-color-button-hover-contrast',
				'context'  => array( 'editor', 'front' ),
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'     => 'color',
		'settings' => 'color_overlay',
		'label'    => esc_html__( 'Overlay Color', 'networker' ),
		'section'  => 'design',
		'priority' => 10,
		'default'  => 'rgba(49,50,54,0.4)',
		'choices'  => array(
			'alpha' => true,
		),
		'output'   => array(
			array(
				'element'  => ':root, [data-scheme="default"]',
				'property' => '--cs-color-overlay-background',
				'context'  => array( 'editor', 'front' ),
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'     => 'collapsible',
		'settings' => 'design_collapsible_dark',
		'section'  => 'design',
		'label'    => esc_html__( 'Dark Scheme', 'networker' ),
		'priority' => 10,
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'     => 'color',
		'settings' => 'color_site_background_dark',
		'label'    => esc_html__( 'Site Background', 'networker' ),
		'section'  => 'design',
		'priority' => 10,
		'default'  => '#1c1c1c',
		'choices'  => array(
			'alpha' => true,
		),
		'output'   => array(
			array(
				'element'  => '[data-site-scheme="dark"]',
				'property' => '--cs-color-site-background',
				'context'  => array( 'editor', 'front' ),
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'     => 'color',
		'settings' => 'color_search_background_dark',
		'label'    => esc_html__( 'Site Search Background', 'networker' ),
		'section'  => 'design',
		'priority' => 10,
		'default'  => '#333335',
		'choices'  => array(
			'alpha' => true,
		),
		'output'   => array(
			array(
				'element'  => '[data-site-scheme="dark"]',
				'property' => '--cs-color-search-background',
				'context'  => array( 'editor', 'front' ),
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'            => 'color',
		'settings'        => 'color_topbar_background_dark',
		'label'           => esc_html__( 'Topbar Background', 'networker' ),
		'section'         => 'design',
		'priority'        => 10,
		'default'         => '#333335',
		'choices'         => array(
			'alpha' => true,
		),
		'output'          => array(
			array(
				'element'  => '[data-site-scheme="dark"]',
				'property' => '--cs-color-topbar-background',
				'context'  => array( 'editor', 'front' ),
			),
		),
		'active_callback' => array(
			array(
				array(
					'setting'  => 'header_layout',
					'operator' => '==',
					'value'    => 'cs-header-three',
				),
				array(
					'setting'  => 'header_layout',
					'operator' => '==',
					'value'    => 'cs-header-four',
				),
				array(
					'setting'  => 'header_layout',
					'operator' => '==',
					'value'    => 'cs-header-five',
				),
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'     => 'color',
		'settings' => 'color_header_background_dark',
		'label'    => esc_html__( 'Header Background', 'networker' ),
		'section'  => 'design',
		'priority' => 10,
		'default'  => '#1c1c1c',
		'choices'  => array(
			'alpha' => true,
		),
		'output'   => array(
			array(
				'element'  => '[data-site-scheme="dark"]',
				'property' => '--cs-color-header-background',
				'context'  => array( 'editor', 'front' ),
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'     => 'color',
		'settings' => 'color_submenu_background_dark',
		'label'    => esc_html__( 'Submenu Background', 'networker' ),
		'section'  => 'design',
		'priority' => 10,
		'default'  => '#1c1c1c',
		'choices'  => array(
			'alpha' => true,
		),
		'output'   => array(
			array(
				'element'  => '[data-site-scheme="dark"]',
				'property' => '--cs-color-submenu-background',
				'context'  => array( 'editor', 'front' ),
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'     => 'color',
		'settings' => 'color_footer_background_dark',
		'label'    => esc_html__( 'Footer Background', 'networker' ),
		'section'  => 'design',
		'priority' => 10,
		'default'  => '#1c1c1c',
		'choices'  => array(
			'alpha' => true,
		),
		'output'   => array(
			array(
				'element'  => '[data-site-scheme="dark"]',
				'property' => '--cs-color-footer-background',
				'context'  => array( 'editor', 'front' ),
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'     => 'color',
		'settings' => 'color_accent_dark',
		'label'    => esc_html__( 'Accent Color', 'networker' ),
		'section'  => 'design',
		'priority' => 10,
		'default'  => '#007AFF',
		'choices'  => array(
			'alpha' => true,
		),
		'output'   => array(
			array(
				'element'  => '[data-scheme="dark"]',
				'property' => '--cs-color-accent',
				'context'  => array( 'editor', 'front' ),
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'     => 'color',
		'settings' => 'color_accent_contrast_dark',
		'label'    => esc_html__( 'Accent Contrast Color', 'networker' ),
		'section'  => 'design',
		'priority' => 10,
		'default'  => '#FFFFFF',
		'choices'  => array(
			'alpha' => true,
		),
		'output'   => array(
			array(
				'element'  => '[data-scheme="dark"]',
				'property' => '--cs-color-accent-contrast',
				'context'  => array( 'editor', 'front' ),
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'     => 'color',
		'settings' => 'color_secondary_dark',
		'label'    => esc_html__( 'Secondary Color', 'networker' ),
		'section'  => 'design',
		'priority' => 10,
		'default'  => '#858585',
		'choices'  => array(
			'alpha' => true,
		),
		'output'   => array(
			array(
				'element'  => '[data-scheme="dark"]',
				'property' => '--cs-color-secondary',
				'context'  => array( 'editor', 'front' ),
			),
			array(
				'element'  => '[data-scheme="dark"]',
				'property' => '--cs-palette-color-secondary',
				'context'  => array( 'editor', 'front' ),
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'     => 'color',
		'settings' => 'color_secondary_contrast_dark',
		'label'    => esc_html__( 'Secondary Contrast Color', 'networker' ),
		'section'  => 'design',
		'priority' => 10,
		'default'  => '#000000',
		'choices'  => array(
			'alpha' => true,
		),
		'output'   => array(
			array(
				'element'  => '[data-scheme="dark"]',
				'property' => '--cs-color-secondary-contrast',
				'context'  => array( 'editor', 'front' ),
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'     => 'color',
		'settings' => 'color_post_archive_heading_dark',
		'label'    => esc_html__( 'Post Archive Heading Color', 'networker' ),
		'section'  => 'design',
		'priority' => 10,
		'default'  => '#ffffff',
		'choices'  => array(
			'alpha' => true,
		),
		'output'   => array(
			array(
				'element'  => '[data-scheme="dark"] .cs-posts-area-posts .cs-entry__title, [data-scheme="dark"] .cs-entry__prev-next .cs-entry__title, [data-scheme="dark"] .cs-entry__post-related .cs-entry__title',
				'property' => '--cs-color-title',
				'context'  => array( 'editor', 'front' ),
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'     => 'color',
		'settings' => 'color_post_archive_heading_hover_dark',
		'label'    => esc_html__( 'Post Archive Heading Hover Color', 'networker' ),
		'section'  => 'design',
		'priority' => 10,
		'default'  => '#858585',
		'choices'  => array(
			'alpha' => true,
		),
		'output'   => array(
			array(
				'element'  => '[data-scheme="dark"] .cs-posts-area-posts .cs-entry__title, [data-scheme="dark"] .cs-entry__prev-next .cs-entry__title, [data-scheme="dark"] .cs-entry__post-related .cs-entry__title',
				'property' => '--cs-color-title-hover',
				'context'  => array( 'editor', 'front' ),
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'     => 'color',
		'settings' => 'color_category_dark',
		'label'    => esc_html__( 'Category Color', 'networker' ),
		'section'  => 'design',
		'priority' => 10,
		'default'  => '#007AFF',
		'choices'  => array(
			'alpha' => true,
		),
		'output'   => array(
			array(
				'element'  => '[data-scheme="dark"]',
				'property' => '--cs-color-category',
				'context'  => array( 'editor', 'front' ),
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'     => 'color',
		'settings' => 'color_category_hover_dark',
		'label'    => esc_html__( 'Category Hover Color', 'networker' ),
		'section'  => 'design',
		'priority' => 10,
		'default'  => '#818181',
		'choices'  => array(
			'alpha' => true,
		),
		'output'   => array(
			array(
				'element'  => '[data-scheme="dark"]',
				'property' => '--cs-color-category-hover',
				'context'  => array( 'editor', 'front' ),
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'     => 'color',
		'settings' => 'color_button_dark',
		'label'    => esc_html__( 'Button Background', 'networker' ),
		'section'  => 'design',
		'priority' => 10,
		'default'  => '#007AFF',
		'choices'  => array(
			'alpha' => true,
		),
		'output'   => array(
			array(
				'element'  => '[data-scheme="dark"]',
				'property' => '--cs-color-button',
				'context'  => array( 'editor', 'front' ),
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'     => 'color',
		'settings' => 'color_button_contrast_dark',
		'label'    => esc_html__( 'Button Color', 'networker' ),
		'section'  => 'design',
		'priority' => 10,
		'default'  => '#FFFFFF',
		'choices'  => array(
			'alpha' => true,
		),
		'output'   => array(
			array(
				'element'  => '[data-scheme="dark"]',
				'property' => '--cs-color-button-contrast',
				'context'  => array( 'editor', 'front' ),
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'     => 'color',
		'settings' => 'color_button_hover_dark',
		'label'    => esc_html__( 'Button Hover Background', 'networker' ),
		'section'  => 'design',
		'priority' => 10,
		'default'  => '#004eff',
		'choices'  => array(
			'alpha' => true,
		),
		'output'   => array(
			array(
				'element'  => '[data-scheme="dark"]',
				'property' => '--cs-color-button-hover',
				'context'  => array( 'editor', 'front' ),
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'     => 'color',
		'settings' => 'color_button_hover_contrast_dark',
		'label'    => esc_html__( 'Button Hover Color', 'networker' ),
		'section'  => 'design',
		'priority' => 10,
		'default'  => '#FFFFFF',
		'choices'  => array(
			'alpha' => true,
		),
		'output'   => array(
			array(
				'element'  => '[data-scheme="dark"]',
				'property' => '--cs-color-button-hover-contrast',
				'context'  => array( 'editor', 'front' ),
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'     => 'color',
		'settings' => 'color_overlay_dark',
		'label'    => esc_html__( 'Overlay Color', 'networker' ),
		'section'  => 'design',
		'priority' => 10,
		'default'  => 'rgba(49,50,54,0.4)',
		'choices'  => array(
			'alpha' => true,
		),
		'output'   => array(
			array(
				'element'  => '[data-scheme="dark"]',
				'property' => '--cs-color-overlay-background',
				'context'  => array( 'editor', 'front' ),
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'     => 'collapsible',
		'settings' => 'design_collapsible_border_radius',
		'section'  => 'design',
		'label'    => esc_html__( 'Border Radius', 'networker' ),
		'priority' => 10,
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'              => 'dimension',
		'settings'          => 'design_common_border_radius',
		'label'             => esc_html__( 'Common Border Radius', 'networker' ),
		'description'       => esc_html__( 'Used on containers and layers. For example: 10px. If the input is empty, original value will be used.', 'networker' ),
		'section'           => 'design',
		'default'           => '0px',
		'priority'          => 10,
		'sanitize_callback' => 'esc_html',
		'output'            => array(
			array(
				'element'  => ':root',
				'property' => '--cs-common-border-radius',
				'context'  => array( 'editor', 'front' ),
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'              => 'dimension',
		'settings'          => 'design_primary_border_radius',
		'label'             => esc_html__( 'Primary Border Radius', 'networker' ),
		'description'       => esc_html__( 'Used on all primary elements. For example: 10px. If the input is empty, original value will be used.', 'networker' ),
		'section'           => 'design',
		'default'           => '0px',
		'priority'          => 10,
		'sanitize_callback' => 'esc_html',
		'output'            => array(
			array(
				'element'  => ':root',
				'property' => '--cs-primary-border-radius',
				'context'  => array( 'editor', 'front' ),
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'              => 'dimension',
		'settings'          => 'design_secondary_border_radius',
		'label'             => esc_html__( 'Secondary Border Radius', 'networker' ),
		'description'       => esc_html__( 'Used on square elements. For example: 10px. If the input is empty, original value will be used.', 'networker' ),
		'section'           => 'design',
		'default'           => '50%',
		'priority'          => 10,
		'sanitize_callback' => 'esc_html',
		'output'            => array(
			array(
				'element'  => ':root',
				'property' => '--cs-secondary-border-radius',
				'context'  => array( 'editor', 'front' ),
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'              => 'dimension',
		'settings'          => 'design_secondary_border_radius',
		'label'             => esc_html__( 'Additional Border Radius', 'networker' ),
		'description'       => esc_html__( 'Used on additional elements. For example: 10px. If the input is empty, original value will be used.', 'networker' ),
		'section'           => 'design',
		'default'           => '25px',
		'priority'          => 10,
		'sanitize_callback' => 'esc_html',
		'output'            => array(
			array(
				'element'  => ':root',
				'property' => '--cs-additional-border-radius',
				'context'  => array( 'editor', 'front' ),
			),
		),
	)
);


CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'              => 'dimension',
		'settings'          => 'design_image_border_radius',
		'label'             => esc_html__( 'Image Border Radius', 'networker' ),
		'description'       => esc_html__( 'Used on post thumbnail. For example: 10px. If the input is empty, original value will be used.', 'networker' ),
		'section'           => 'design',
		'default'           => '0px',
		'priority'          => 10,
		'sanitize_callback' => 'esc_html',
		'output'            => array(
			array(
				'element'  => ':root',
				'property' => '--cs-image-border-radius',
				'context'  => array( 'editor', 'front' ),
			),
		),
	)
);
