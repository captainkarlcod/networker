<?php
/**
 * Page Settings
 *
 * @package Networker
 */

CSCO_Kirki::add_section(
	'page_settings',
	array(
		'title'    => esc_html__( 'Page Settings', 'networker' ),
		'priority' => 50,
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'     => 'radio',
		'settings' => 'page_sidebar',
		'label'    => esc_html__( 'Default Sidebar', 'networker' ),
		'section'  => 'page_settings',
		'default'  => 'right',
		'priority' => 10,
		'choices'  => array(
			'right'    => esc_html__( 'Right Sidebar', 'networker' ),
			'left'     => esc_html__( 'Left Sidebar', 'networker' ),
			'disabled' => esc_html__( 'No Sidebar', 'networker' ),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'     => 'radio',
		'settings' => 'page_header_type',
		'label'    => esc_html__( 'Page Header Type', 'networker' ),
		'section'  => 'page_settings',
		'default'  => 'standard',
		'priority' => 10,
		'choices'  => array(
			'standard' => esc_html__( 'Standard', 'networker' ),
			'grid'     => esc_html__( 'Grid', 'networker' ),
			'large'    => esc_html__( 'Large', 'networker' ),
			'title'    => esc_html__( 'Page Title Only', 'networker' ),
			'none'     => esc_html__( 'None', 'networker' ),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'            => 'radio',
		'settings'        => 'page_media_preview',
		'label'           => esc_html__( 'Standard Page Header Preview', 'networker' ),
		'section'         => 'page_settings',
		'default'         => 'uncropped',
		'priority'        => 10,
		'choices'         => array(
			'cropped'   => esc_html__( 'Display Cropped Image', 'networker' ),
			'uncropped' => esc_html__( 'Display Preview in Original Ratio', 'networker' ),
		),
		'active_callback' => array(
			array(
				'setting'  => 'page_header_type',
				'operator' => '==',
				'value'    => 'standard',
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'     => 'checkbox',
		'settings' => 'page_comments_simple',
		'label'    => esc_html__( 'Display comments without the View Comments button', 'networker' ),
		'section'  => 'page_settings',
		'default'  => false,
		'priority' => 10,
	)
);
