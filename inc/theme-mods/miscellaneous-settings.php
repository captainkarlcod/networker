<?php
/**
 * Miscellaneous Settings
 *
 * @package Networker
 */

CSCO_Kirki::add_section(
	'miscellaneous',
	array(
		'title'    => esc_html__( 'Miscellaneous Settings', 'networker' ),
		'priority' => 60,
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'     => 'checkbox',
		'settings' => 'misc_published_date',
		'label'    => esc_html__( 'Display published date instead of modified date', 'networker' ),
		'section'  => 'miscellaneous',
		'default'  => true,
		'priority' => 10,
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'     => 'text',
		'settings' => 'misc_search_placeholder',
		'label'    => esc_html__( 'Search Form Placeholder', 'networker' ),
		'section'  => 'miscellaneous',
		'default'  => esc_html__( 'Enter keyword', 'networker' ),
		'priority' => 10,
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'     => 'text',
		'settings' => 'misc_label_more',
		'label'    => esc_html__( '"Read More" Button Label', 'networker' ),
		'section'  => 'miscellaneous',
		'default'  => esc_html__( 'Read More', 'networker' ),
		'priority' => 10,
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'     => 'radio',
		'settings' => 'misc_classic_gallery_alignment',
		'label'    => esc_html__( 'Alignment of Galleries in Classic Block', 'networker' ),
		'section'  => 'miscellaneous',
		'default'  => 'default',
		'priority' => 10,
		'choices'  => array(
			'default' => esc_html__( 'Default', 'networker' ),
			'wide'    => esc_html__( 'Wide', 'networker' ),
			'large'   => esc_html__( 'Large', 'networker' ),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'     => 'checkbox',
		'settings' => 'misc_sticky_sidebar',
		'label'    => esc_html__( 'Sticky Sidebar', 'networker' ),
		'section'  => 'miscellaneous',
		'default'  => true,
		'priority' => 10,
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'            => 'radio',
		'settings'        => 'misc_sticky_sidebar_method',
		'label'           => esc_html__( 'Sticky Method', 'networker' ),
		'section'         => 'miscellaneous',
		'default'         => 'stick-to-top',
		'priority'        => 10,
		'choices'         => array(
			'cs-stick-to-top'    => esc_html__( 'Sidebar top edge', 'networker' ),
			'cs-stick-to-bottom' => esc_html__( 'Sidebar bottom edge', 'networker' ),
			'cs-stick-last'      => esc_html__( 'Last widget top edge', 'networker' ),
		),
		'active_callback' => array(
			array(
				'setting'  => 'misc_sticky_sidebar',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'        => 'radio',
		'settings'    => 'webfonts_load_method',
		'label'       => esc_html__( 'Webfonts Load Method', 'networker' ),
		'description' => esc_html__( 'Please', 'networker' ) . ' <a href="' . add_query_arg( array( 'action' => 'kirki-reset-cache' ), get_site_url() ) . '" target="_blank">' . esc_html__( 'reset font cache', 'networker' ) . '</a> ' . esc_html__( 'after saving.', 'networker' ),
		'section'     => 'miscellaneous',
		'default'     => 'async',
		'priority'    => 10,
		'choices'     => array(
			'async' => esc_html__( 'Asynchronous', 'networker' ),
			'link'  => esc_html__( 'Render-Blocking', 'networker' ),
		),
	)
);
