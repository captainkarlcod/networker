<?php
/**
 * Header Settings
 *
 * @package Networker
 */

CSCO_Kirki::add_section(
	'header',
	array(
		'title'    => esc_html__( 'Header Settings', 'networker' ),
		'priority' => 40,
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'        => 'collapsible',
		'settings'    => 'header_collapsible_common',
		'section'     => 'header',
		'label'       => esc_html__( 'Common', 'networker' ),
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
		'settings' => 'header_layout',
		'label'    => esc_html__( 'Layout', 'networker' ),
		'section'  => 'header',
		'default'  => 'cs-header-one',
		'priority' => 10,
		'choices'  => apply_filters( 'csco_header_layouts', array(
			'cs-header-one'   => esc_html__( 'Header 1', 'networker' ),
			'cs-header-two'   => esc_html__( 'Header 2', 'networker' ),
			'cs-header-three' => esc_html__( 'Header 3', 'networker' ),
			'cs-header-four'  => esc_html__( 'Header 4', 'networker' ),
			'cs-header-five'  => esc_html__( 'Header 5', 'networker' ),
		) ),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'            => 'dimension',
		'settings'        => 'header_topbar_height',
		'label'           => esc_html__( 'Topbar Height', 'networker' ),
		'section'         => 'header',
		'default'         => '50px',
		'priority'        => 10,
		'output'          => array(
			array(
				'element'  => ':root',
				'property' => '--cs-header-topbar-height',
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
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'            => 'dimension',
		'settings'        => 'header_topbar_large_height',
		'label'           => esc_html__( 'Topbar Height', 'networker' ),
		'section'         => 'header',
		'default'         => '90px',
		'priority'        => 10,
		'output'          => array(
			array(
				'element'  => ':root',
				'property' => '--cs-header-topbar-large-height',
			),
		),
		'active_callback' => array(
			array(
				'setting'  => 'header_layout',
				'operator' => '==',
				'value'    => 'cs-header-five',
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'            => 'dimension',
		'settings'        => 'header_initial_height',
		'label'           => esc_html__( 'Header Initial Height', 'networker' ),
		'section'         => 'header',
		'default'         => '90px',
		'priority'        => 10,
		'output'          => array(
			array(
				'element'  => ':root',
				'property' => '--cs-header-initial-height',
			),
		),
		'active_callback' => array(
			array(
				'setting'  => 'header_layout',
				'operator' => '!=',
				'value'    => 'cs-header-four',
			),
			array(
				'setting'  => 'header_layout',
				'operator' => '!=',
				'value'    => 'cs-header-five',
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'     => 'dimension',
		'settings' => 'header_height',
		'label'    => esc_html__( 'Header Height', 'networker' ),
		'section'  => 'header',
		'default'  => '60px',
		'priority' => 10,
		'output'   => array(
			array(
				'element'  => ':root',
				'property' => '--cs-header-height',
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'     => 'dimension',
		'settings' => 'header_border_width',
		'label'    => esc_html__( 'Header Border Width', 'networker' ),
		'section'  => 'header',
		'default'  => '1px',
		'priority' => 10,
		'output'   => array(
			array(
				'element'  => ':root',
				'property' => '--cs-header-border-width',
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'        => 'checkbox',
		'settings'    => 'navbar_sticky',
		'label'       => esc_html__( 'Make navigation bar sticky', 'networker' ),
		'description' => esc_html__( 'Enabling this option will make navigation bar visible when scrolling.', 'networker' ),
		'section'     => 'header',
		'default'     => true,
		'priority'    => 10,
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'            => 'checkbox',
		'settings'        => 'navbar_smart_sticky',
		'label'           => esc_html__( 'Enable the smart sticky feature', 'networker' ),
		'description'     => esc_html__( 'Enabling this option will reveal navigation bar when scrolling up and hide it when scrolling down.', 'networker' ),
		'section'         => 'header',
		'default'         => true,
		'priority'        => 10,
		'active_callback' => array(
			array(
				'setting'  => 'navbar_sticky',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'     => 'checkbox',
		'settings' => 'header_offcanvas',
		'label'    => esc_html__( 'Display offcanvas toggle button', 'networker' ),
		'section'  => 'header',
		'default'  => true,
		'priority' => 10,
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'            => 'checkbox',
		'settings'        => 'header_navigation_menu',
		'label'           => esc_html__( 'Display navigation menu', 'networker' ),
		'section'         => 'header',
		'default'         => true,
		'priority'        => 10,
		'active_callback' => array(
			array(
				'setting'  => 'header_layout',
				'operator' => '!=',
				'value'    => 'cs-header-two',
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'     => 'collapsible',
		'settings' => 'header_collapsible_search',
		'section'  => 'header',
		'label'    => esc_html__( 'Search', 'networker' ),
		'priority' => 10,
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'            => 'checkbox',
		'settings'        => 'header_search_form',
		'label'           => esc_html__( 'Display search form', 'networker' ),
		'section'         => 'header',
		'default'         => true,
		'priority'        => 10,
		'active_callback' => array(
			array(
				array(
					'setting'  => 'header_layout',
					'operator' => '==',
					'value'    => 'cs-header-two',
				),
				array(
					'setting'  => 'header_layout',
					'operator' => '==',
					'value'    => 'cs-header-three',
				),
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'            => 'checkbox',
		'settings'        => 'header_search_button',
		'label'           => esc_html__( 'Display search button', 'networker' ),
		'section'         => 'header',
		'default'         => true,
		'priority'        => 10,
		'active_callback' => array(
			array(
				'setting'  => 'header_layout',
				'operator' => '!=',
				'value'    => 'cs-header-two',
			),
			array(
				'setting'  => 'header_layout',
				'operator' => '!=',
				'value'    => 'cs-header-three',
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'            => 'checkbox',
		'settings'        => 'header_search_posts',
		'label'           => esc_html__( 'Display search posts', 'networker' ),
		'description'     => esc_html__( 'Display posts in popup search form.', 'networker' ),
		'section'         => 'header',
		'default'         => true,
		'priority'        => 10,
		'active_callback' => array(
			array(
				'setting'  => 'header_layout',
				'operator' => '!=',
				'value'    => 'cs-header-two',
			),
			array(
				'setting'  => 'header_layout',
				'operator' => '!=',
				'value'    => 'cs-header-three',
			),
			array(
				'setting'  => 'header_search_button',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'            => 'text',
		'settings'        => 'header_search_posts_heading',
		'label'           => esc_html__( 'Heading of Posts', 'networker' ),
		'section'         => 'header',
		'default'         => esc_html__( '[[Hand-Picked]] Top-Read Stories', 'networker' ),
		'priority'        => 10,
		'active_callback' => array(
			array(
				'setting'  => 'header_layout',
				'operator' => '!=',
				'value'    => 'cs-header-two',
			),
			array(
				'setting'  => 'header_layout',
				'operator' => '!=',
				'value'    => 'cs-header-three',
			),
			array(
				'setting'  => 'header_search_button',
				'operator' => '==',
				'value'    => true,
			),
			array(
				'setting'  => 'header_search_posts',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'            => 'select',
		'settings'        => 'header_search_image_orientation',
		'label'           => esc_html__( 'Image Orientation', 'networker' ),
		'section'         => 'header',
		'default'         => 'square',
		'choices'         => array(
			'original'       => esc_html__( 'Original', 'networker' ),
			'landscape'      => esc_html__( 'Landscape 4:3', 'networker' ),
			'landscape-3-2'  => esc_html__( 'Landscape 3:2', 'networker' ),
			'landscape-16-9' => esc_html__( 'Landscape 16:9', 'networker' ),
			'portrait'       => esc_html__( 'Portrait 3:4', 'networker' ),
			'portrait-2-3'   => esc_html__( 'Portrait 2:3', 'networker' ),
			'square'         => esc_html__( 'Square', 'networker' ),
		),
		'priority'        => 10,
		'active_callback' => array(
			array(
				'setting'  => 'header_layout',
				'operator' => '!=',
				'value'    => 'cs-header-two',
			),
			array(
				'setting'  => 'header_layout',
				'operator' => '!=',
				'value'    => 'cs-header-three',
			),
			array(
				'setting'  => 'header_search_button',
				'operator' => '==',
				'value'    => true,
			),
			array(
				'setting'  => 'header_search_posts',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'            => 'select',
		'settings'        => 'header_search_image_size',
		'label'           => esc_html__( 'Image Size', 'networker' ),
		'section'         => 'header',
		'default'         => 'csco-small',
		'choices'         => csco_get_list_available_image_sizes(),
		'priority'        => 10,
		'active_callback' => array(
			array(
				'setting'  => 'header_layout',
				'operator' => '!=',
				'value'    => 'cs-header-two',
			),
			array(
				'setting'  => 'header_layout',
				'operator' => '!=',
				'value'    => 'cs-header-three',
			),
			array(
				'setting'  => 'header_search_button',
				'operator' => '==',
				'value'    => true,
			),
			array(
				'setting'  => 'header_search_posts',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'            => 'dimension',
		'settings'        => 'header_search_image_border_radius',
		'label'           => esc_html__( 'Image Border Radius', 'networker' ),
		'section'         => 'header',
		'default'         => '',
		'priority'        => 10,
		'output'          => array(
			array(
				'element'  => '.cs-search__posts',
				'property' => '--cs-image-border-radius',
				'suffix'   => '!important',
			),
		),
		'active_callback' => array(
			array(
				'setting'  => 'header_layout',
				'operator' => '!=',
				'value'    => 'cs-header-two',
			),
			array(
				'setting'  => 'header_layout',
				'operator' => '!=',
				'value'    => 'cs-header-three',
			),
			array(
				'setting'  => 'header_search_button',
				'operator' => '==',
				'value'    => true,
			),
			array(
				'setting'  => 'header_search_posts',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'            => 'multicheck',
		'settings'        => 'header_search_posts_meta',
		'label'           => esc_html__( 'Post Meta', 'networker' ),
		'section'         => 'header',
		'default'         => array( 'views', 'shares' ),
		'priority'        => 10,
		'choices'         => apply_filters(
			'csco_post_meta_choices',
			array(
				'category'     => esc_html__( 'Category', 'networker' ),
				'date'         => esc_html__( 'Date', 'networker' ),
				'author'       => esc_html__( 'Author', 'networker' ),
				'views'        => esc_html__( 'Views', 'networker' ),
				'shares'       => esc_html__( 'Shares', 'networker' ),
				'comments'     => esc_html__( 'Comments', 'networker' ),
				'reading_time' => esc_html__( 'Reading Time', 'networker' ),
			)
		),
		'active_callback' => array(
			array(
				'setting'  => 'header_layout',
				'operator' => '!=',
				'value'    => 'cs-header-two',
			),
			array(
				'setting'  => 'header_layout',
				'operator' => '!=',
				'value'    => 'cs-header-three',
			),
			array(
				'setting'  => 'header_search_button',
				'operator' => '==',
				'value'    => true,
			),
			array(
				'setting'  => 'header_search_posts',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'            => 'radio',
		'settings'        => 'header_search_posts_orderby',
		'label'           => esc_html__( 'Order posts by', 'networker' ),
		'section'         => 'header',
		'default'         => 'date',
		'priority'        => 10,
		'choices'         => array(
			'date' => esc_html__( 'Date', 'networker' ),
			'rand' => esc_html__( 'Random', 'networker' ),
			'name' => esc_html__( 'Name', 'networker' ),
			'id'   => esc_html__( 'ID', 'networker' ),
		),
		'active_callback' => array(
			array(
				'setting'  => 'header_layout',
				'operator' => '!=',
				'value'    => 'cs-header-two',
			),
			array(
				'setting'  => 'header_layout',
				'operator' => '!=',
				'value'    => 'cs-header-three',
			),
			array(
				'setting'  => 'header_search_button',
				'operator' => '==',
				'value'    => true,
			),
			array(
				'setting'  => 'header_search_posts',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'            => 'radio',
		'settings'        => 'header_search_posts_order',
		'label'           => esc_html__( 'Order posts', 'networker' ),
		'section'         => 'header',
		'default'         => 'DESC',
		'priority'        => 10,
		'choices'         => array(
			'ASC'  => esc_html__( 'ASC', 'networker' ),
			'DESC' => esc_html__( 'DESC', 'networker' ),
		),
		'active_callback' => array(
			array(
				'setting'  => 'header_layout',
				'operator' => '!=',
				'value'    => 'cs-header-two',
			),
			array(
				'setting'  => 'header_layout',
				'operator' => '!=',
				'value'    => 'cs-header-three',
			),
			array(
				'setting'  => 'header_search_button',
				'operator' => '==',
				'value'    => true,
			),
			array(
				'setting'  => 'header_search_posts',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'            => 'checkbox',
		'settings'        => 'header_search_tags',
		'label'           => esc_html__( 'Display search tags', 'networker' ),
		'description'     => esc_html__( 'Display tags in popup search form.', 'networker' ),
		'section'         => 'header',
		'default'         => true,
		'priority'        => 10,
		'active_callback' => array(
			array(
				'setting'  => 'header_layout',
				'operator' => '!=',
				'value'    => 'cs-header-two',
			),
			array(
				'setting'  => 'header_layout',
				'operator' => '!=',
				'value'    => 'cs-header-three',
			),
			array(
				'setting'  => 'header_search_button',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'            => 'text',
		'settings'        => 'header_search_tags_heading',
		'label'           => esc_html__( 'Heading of Tags', 'networker' ),
		'section'         => 'header',
		'default'         => esc_html__( '[[Trending]] Tags', 'networker' ),
		'priority'        => 10,
		'active_callback' => array(
			array(
				'setting'  => 'header_layout',
				'operator' => '!=',
				'value'    => 'cs-header-two',
			),
			array(
				'setting'  => 'header_layout',
				'operator' => '!=',
				'value'    => 'cs-header-three',
			),
			array(
				'setting'  => 'header_search_button',
				'operator' => '==',
				'value'    => true,
			),
			array(
				'setting'  => 'header_search_tags',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'            => 'number',
		'settings'        => 'header_search_tags_number',
		'label'           => esc_html__( 'Maximum Number of Tags', 'networker' ),
		'section'         => 'header',
		'default'         => 10,
		'priority'        => 10,
		'active_callback' => array(
			array(
				'setting'  => 'header_layout',
				'operator' => '!=',
				'value'    => 'cs-header-two',
			),
			array(
				'setting'  => 'header_layout',
				'operator' => '!=',
				'value'    => 'cs-header-three',
			),
			array(
				'setting'  => 'header_search_button',
				'operator' => '==',
				'value'    => true,
			),
			array(
				'setting'  => 'header_search_tags',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'            => 'radio',
		'settings'        => 'header_search_tags_orderby',
		'label'           => esc_html__( 'Order tags by', 'networker' ),
		'section'         => 'header',
		'default'         => 'date',
		'priority'        => 10,
		'choices'         => array(
			'date'  => esc_html__( 'Date', 'networker' ),
			'count' => esc_html__( 'Count of Posts', 'networker' ),
			'name'  => esc_html__( 'Name', 'networker' ),
			'id'    => esc_html__( 'ID', 'networker' ),
		),
		'active_callback' => array(
			array(
				'setting'  => 'header_layout',
				'operator' => '!=',
				'value'    => 'cs-header-two',
			),
			array(
				'setting'  => 'header_layout',
				'operator' => '!=',
				'value'    => 'cs-header-three',
			),
			array(
				'setting'  => 'header_search_button',
				'operator' => '==',
				'value'    => true,
			),
			array(
				'setting'  => 'header_search_tags',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'            => 'radio',
		'settings'        => 'header_search_tags_order',
		'label'           => esc_html__( 'Order tags', 'networker' ),
		'section'         => 'header',
		'default'         => 'DESC',
		'priority'        => 10,
		'choices'         => array(
			'ASC'  => esc_html__( 'ASC', 'networker' ),
			'DESC' => esc_html__( 'DESC', 'networker' ),
		),
		'active_callback' => array(
			array(
				'setting'  => 'header_layout',
				'operator' => '!=',
				'value'    => 'cs-header-two',
			),
			array(
				'setting'  => 'header_layout',
				'operator' => '!=',
				'value'    => 'cs-header-three',
			),
			array(
				'setting'  => 'header_search_button',
				'operator' => '==',
				'value'    => true,
			),
			array(
				'setting'  => 'header_search_tags',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

if ( csco_powerkit_module_enabled( 'social_links' ) ) {
	CSCO_Kirki::add_field(
		'csco_theme_mod',
		array(
			'type'     => 'collapsible',
			'settings' => 'header_collapsible_social_links',
			'section'  => 'header',
			'label'    => esc_html__( 'Social Links', 'networker' ),
			'priority' => 10,
		)
	);

	CSCO_Kirki::add_field(
		'csco_theme_mod',
		array(
			'type'     => 'checkbox',
			'settings' => 'header_social_links',
			'label'    => esc_html__( 'Display social links', 'networker' ),
			'section'  => 'header',
			'default'  => false,
			'priority' => 10,
		)
	);

	CSCO_Kirki::add_field(
		'csco_theme_mod',
		array(
			'type'            => 'select',
			'settings'        => 'header_social_links_scheme',
			'label'           => esc_html__( 'Color scheme', 'networker' ),
			'section'         => 'header',
			'default'         => 'light',
			'priority'        => 10,
			'choices'         => array(
				'light' => esc_html__( 'Light', 'networker' ),
				'bold'  => esc_html__( 'Bold', 'networker' ),
			),
			'active_callback' => array(
				array(
					'setting'  => 'header_social_links',
					'operator' => '==',
					'value'    => true,
				),
			),
		)
	);

	CSCO_Kirki::add_field(
		'csco_theme_mod',
		array(
			'type'            => 'number',
			'settings'        => 'header_social_links_maximum',
			'label'           => esc_html__( 'Maximum Number of Social Links', 'networker' ),
			'section'         => 'header',
			'default'         => 3,
			'priority'        => 10,
			'active_callback' => array(
				array(
					'setting'  => 'header_social_links',
					'operator' => '==',
					'value'    => true,
				),
			),
		)
	);

	CSCO_Kirki::add_field(
		'csco_theme_mod',
		array(
			'type'            => 'checkbox',
			'settings'        => 'header_social_links_counts',
			'label'           => esc_html__( 'Display social counts', 'networker' ),
			'section'         => 'header',
			'default'         => true,
			'priority'        => 10,
			'active_callback' => array(
				array(
					'setting'  => 'header_social_links',
					'operator' => '==',
					'value'    => true,
				),
			),
		)
	);
}

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'            => 'collapsible',
		'settings'        => 'header_collapsible_button',
		'section'         => 'header',
		'label'           => esc_html__( 'Custom Button', 'networker' ),
		'priority'        => 10,
		'active_callback' => array(
			array(
				'setting'  => 'header_layout',
				'operator' => '==',
				'value'    => 'cs-header-five',
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'            => 'text',
		'settings'        => 'header_button_link',
		'label'           => esc_html__( 'Button Link', 'networker' ),
		'section'         => 'header',
		'default'         => '',
		'priority'        => 10,
		'active_callback' => array(
			array(
				'setting'  => 'header_layout',
				'operator' => '==',
				'value'    => 'cs-header-five',
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'              => 'text',
		'settings'          => 'header_button_label',
		'label'             => esc_html__( 'Button Label', 'networker' ),
		'section'           => 'header',
		'default'           => esc_html__( 'Subscribe', 'networker' ),
		'priority'          => 10,
		'sanitize_callback' => 'wp_kses_post',
		'active_callback'   => array(
			array(
				'setting'  => 'header_layout',
				'operator' => '==',
				'value'    => 'cs-header-five',
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'     => 'collapsible',
		'settings' => 'header_collapsible_multi_column',
		'section'  => 'header',
		'label'    => esc_html__( 'Multi-Column Sub-Menu', 'networker' ),
		'priority' => 10,
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'     => 'checkbox',
		'settings' => 'header_multi_column_display',
		'label'    => esc_html__( 'Display multi-column sub-menu', 'networker' ),
		'section'  => 'header',
		'default'  => true,
		'priority' => 10,
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'     => 'collapsible',
		'settings' => 'header_collapsible_mega_menu',
		'section'  => 'header',
		'label'    => esc_html__( 'Mega Menu', 'networker' ),
		'priority' => 10,
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'     => 'select',
		'settings' => 'mega_menu_image_orientation',
		'label'    => esc_html__( 'Image Orientation', 'networker' ),
		'section'  => 'header',
		'default'  => 'original',
		'choices'  => array(
			'original'       => esc_html__( 'Original', 'networker' ),
			'landscape'      => esc_html__( 'Landscape 4:3', 'networker' ),
			'landscape-3-2'  => esc_html__( 'Landscape 3:2', 'networker' ),
			'landscape-16-9' => esc_html__( 'Landscape 16:9', 'networker' ),
			'portrait'       => esc_html__( 'Portrait 3:4', 'networker' ),
			'portrait-2-3'   => esc_html__( 'Portrait 2:3', 'networker' ),
			'square'         => esc_html__( 'Square', 'networker' ),
		),
		'priority' => 10,
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'     => 'select',
		'settings' => 'mega_menu_image_size',
		'label'    => esc_html__( 'Image Size', 'networker' ),
		'section'  => 'header',
		'default'  => 'csco-thumbnail',
		'choices'  => csco_get_list_available_image_sizes(),
		'priority' => 10,
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'     => 'multicheck',
		'settings' => 'mega_menu_post_meta',
		'label'    => esc_html__( 'Post Meta', 'networker' ),
		'section'  => 'header',
		'default'  => array( 'category', 'views', 'reading_time' ),
		'priority' => 10,
		'choices'  => apply_filters(
			'csco_post_meta_choices',
			array(
				'category'     => esc_html__( 'Category', 'networker' ),
				'date'         => esc_html__( 'Date', 'networker' ),
				'author'       => esc_html__( 'Author', 'networker' ),
				'views'        => esc_html__( 'Views', 'networker' ),
				'shares'       => esc_html__( 'Shares', 'networker' ),
				'reading_time' => esc_html__( 'Reading Time', 'networker' ),
				'comments'     => esc_html__( 'Comments', 'networker' ),
			)
		),
	)
);
