<?php
/**
 * Homepage Settings
 *
 * @package Networker
 */

/**
 * Removes default WordPress Static Front Page section
 * and re-adds it in our own panel with the same parameters.
 *
 * @param object $wp_customize Instance of the WP_Customize_Manager class.
 */
function csco_reorder_customizer_settings( $wp_customize ) {

	// Get current front page section parameters.
	$static_front_page = $wp_customize->get_section( 'static_front_page' );

	// Remove existing section, so that we can later re-add it to our panel.
	$wp_customize->remove_section( 'static_front_page' );

	// Re-add static front page section with a new name, but same description.
	$wp_customize->add_section(
		'static_front_page',
		array(
			'title'           => esc_html__( 'Static Front Page', 'networker' ),
			'priority'        => 20,
			'description'     => $static_front_page->description,
			'panel'           => 'home_panel',
			'active_callback' => $static_front_page->active_callback,
		)
	);
}
add_action( 'customize_register', 'csco_reorder_customizer_settings' );

CSCO_Kirki::add_panel(
	'home_panel',
	array(
		'title'    => esc_html__( 'Homepage Settings', 'networker' ),
		'priority' => 50,
	)
);

CSCO_Kirki::add_section(
	'home_settings',
	array(
		'title'    => esc_html__( 'Homepage Layout', 'networker' ),
		'priority' => 15,
		'panel'    => 'home_panel',
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'     => 'radio',
		'settings' => 'home_layout',
		'label'    => esc_html__( 'Layout', 'networker' ),
		'section'  => 'home_settings',
		'default'  => 'list',
		'priority' => 10,
		'choices'  => array(
			'list'  => esc_html__( 'List Layout', 'networker' ),
			'grid'  => esc_html__( 'Grid Layout', 'networker' ),
			'full'  => esc_html__( 'Full Post Layout', 'networker' ),
			'alt'   => esc_html__( 'Full Post Alt Layout', 'networker' ),
			'mixed' => esc_html__( 'Mixed Layout', 'networker' ),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'     => 'radio',
		'settings' => 'home_sidebar',
		'label'    => esc_html__( 'Sidebar', 'networker' ),
		'section'  => 'home_settings',
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
		'type'            => 'slider',
		'settings'        => 'home_columns_desktop',
		'label'           => esc_html__( 'Number of Columns Desktop', 'networker' ),
		'section'         => 'home_settings',
		'default'         => 2,
		'choices'         => array(
			'min'  => 1,
			'max'  => 4,
			'step' => 1,
		),
		'priority'        => 10,
		'output'          => array(
			array(
				'element'  => '.cs-posts-area__home.cs-posts-area__grid',
				'property' => '--cs-posts-area-grid-columns-const',
				'suffix'   => '!important',
			),
			array(
				'element'  => '.cs-posts-area__home.cs-posts-area__grid',
				'property' => '--cs-posts-area-grid-columns',
				'suffix'   => '!important',
			),
		),
		'active_callback' => array(
			array(
				array(
					'setting'  => 'home_layout',
					'operator' => '==',
					'value'    => 'grid',
				),
				array(
					'setting'  => 'home_layout',
					'operator' => '==',
					'value'    => 'mixed',
				),
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'            => 'slider',
		'settings'        => 'home_columns_tablet',
		'label'           => esc_html__( 'Number of Columns Tablet', 'networker' ),
		'section'         => 'home_settings',
		'default'         => 2,
		'choices'         => array(
			'min'  => 1,
			'max'  => 4,
			'step' => 1,
		),
		'priority'        => 10,
		'output'          => array(
			array(
				'element'     => '.cs-posts-area__home.cs-posts-area__grid',
				'property'    => '--cs-posts-area-grid-columns',
				'media_query' => '@media (max-width: 1019px)',
				'suffix'      => '!important',
			),
		),
		'active_callback' => array(
			array(
				array(
					'setting'  => 'home_layout',
					'operator' => '==',
					'value'    => 'grid',
				),
				array(
					'setting'  => 'home_layout',
					'operator' => '==',
					'value'    => 'mixed',
				),
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'            => 'slider',
		'settings'        => 'home_columns_mobile',
		'label'           => esc_html__( 'Number of Columns Mobile', 'networker' ),
		'section'         => 'home_settings',
		'default'         => 1,
		'choices'         => array(
			'min'  => 1,
			'max'  => 4,
			'step' => 1,
		),
		'priority'        => 10,
		'output'          => array(
			array(
				'element'     => '.cs-posts-area__home.cs-posts-area__grid',
				'property'    => '--cs-posts-area-grid-columns',
				'media_query' => '@media (max-width: 599px)',
				'suffix'      => '!important',
			),
		),
		'active_callback' => array(
			array(
				array(
					'setting'  => 'home_layout',
					'operator' => '==',
					'value'    => 'grid',
				),
				array(
					'setting'  => 'home_layout',
					'operator' => '==',
					'value'    => 'mixed',
				),
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'            => 'select',
		'settings'        => 'home_image_orientation',
		'label'           => esc_html__( 'Image Orientation', 'networker' ),
		'section'         => 'home_settings',
		'default'         => 'original',
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
				array(
					'setting'  => 'home_layout',
					'operator' => '==',
					'value'    => 'list',
				),
				array(
					'setting'  => 'home_layout',
					'operator' => '==',
					'value'    => 'grid',
				),
				array(
					'setting'  => 'home_layout',
					'operator' => '==',
					'value'    => 'mixed',
				),
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'            => 'select',
		'settings'        => 'home_image_size',
		'label'           => esc_html__( 'Image Size', 'networker' ),
		'section'         => 'home_settings',
		'default'         => 'csco-thumbnail',
		'choices'         => csco_get_list_available_image_sizes(),
		'priority'        => 10,
		'active_callback' => array(
			array(
				array(
					'setting'  => 'home_layout',
					'operator' => '==',
					'value'    => 'list',
				),
				array(
					'setting'  => 'home_layout',
					'operator' => '==',
					'value'    => 'grid',
				),
				array(
					'setting'  => 'home_layout',
					'operator' => '==',
					'value'    => 'mixed',
				),
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'            => 'select',
		'settings'        => 'home_image_width',
		'label'           => esc_html__( 'Image Width', 'networker' ),
		'section'         => 'home_settings',
		'default'         => 'half',
		'choices'         => array(
			'one-third' => esc_html__( 'One Third', 'networker' ),
			'half'      => esc_html__( 'Half', 'networker' ),
		),
		'priority'        => 10,
		'active_callback' => array(
			array(
				'setting'  => 'home_layout',
				'operator' => '==',
				'value'    => 'list',
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'            => 'checkbox',
		'settings'        => 'home_overlay_image',
		'label'           => esc_html__( 'Display all posts with image overlay', 'networker' ),
		'section'         => 'home_settings',
		'default'         => false,
		'priority'        => 10,
		'active_callback' => array(
			array(
				'setting'  => 'home_layout',
				'operator' => '==',
				'value'    => 'grid',
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'     => 'multicheck',
		'settings' => 'home_post_meta',
		'label'    => esc_html__( 'Post Meta', 'networker' ),
		'section'  => 'home_settings',
		'default'  => array( 'category', 'author', 'date', 'views', 'shares', 'reading_time', 'comments' ),
		'priority' => 10,
		'choices'  => apply_filters(
			'csco_post_meta_choices',
			array(
				'category'     => esc_html__( 'Category', 'networker' ),
				'author'       => esc_html__( 'Author', 'networker' ),
				'date'         => esc_html__( 'Date', 'networker' ),
				'views'        => esc_html__( 'Views', 'networker' ),
				'shares'       => esc_html__( 'Shares', 'networker' ),
				'reading_time' => esc_html__( 'Reading Time', 'networker' ),
				'comments'     => esc_html__( 'Comments', 'networker' ),
			)
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'            => 'checkbox',
		'settings'        => 'home_compact_post_meta',
		'label'           => esc_html__( 'Display compact post meta', 'networker' ),
		'section'         => 'home_settings',
		'default'         => true,
		'priority'        => 10,
		'active_callback' => array(
			array(
				'setting'  => 'home_layout',
				'operator' => '!=',
				'value'    => 'full',
			),
			array(
				'setting'  => 'home_layout',
				'operator' => '!=',
				'value'    => 'alt',
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'     => 'checkbox',
		'settings' => 'home_more_button',
		'label'    => esc_html__( 'Display read more button', 'networker' ),
		'section'  => 'home_settings',
		'default'  => true,
		'priority' => 10,
	)
);


CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'            => 'radio',
		'settings'        => 'home_media_preview',
		'label'           => esc_html__( 'Post Preview Image Size', 'networker' ),
		'section'         => 'home_settings',
		'default'         => 'uncropped',
		'priority'        => 10,
		'choices'         => array(
			'cropped'   => esc_html__( 'Display Cropped Image', 'networker' ),
			'uncropped' => esc_html__( 'Display Preview in Original Ratio', 'networker' ),
		),
		'active_callback' => array(
			array(
				array(
					'setting'  => 'home_layout',
					'operator' => '==',
					'value'    => 'full',
				),
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'            => 'radio',
		'settings'        => 'home_summary',
		'label'           => esc_html__( 'Full Post Summary', 'networker' ),
		'section'         => 'home_settings',
		'default'         => 'summary',
		'priority'        => 10,
		'choices'         => array(
			'summary' => esc_html__( 'Use Excerpts', 'networker' ),
			'content' => esc_html__( 'Use Read More Tag', 'networker' ),
		),
		'active_callback' => array(
			array(
				array(
					'setting'  => 'home_layout',
					'operator' => '==',
					'value'    => 'full',
				),
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'     => 'radio',
		'settings' => 'home_pagination_type',
		'label'    => esc_html__( 'Pagination', 'networker' ),
		'section'  => 'home_settings',
		'default'  => 'load-more',
		'priority' => 10,
		'choices'  => array(
			'standard'  => esc_html__( 'Standard', 'networker' ),
			'load-more' => esc_html__( 'Load More Button', 'networker' ),
			'infinite'  => esc_html__( 'Infinite Load', 'networker' ),
		),
	)
);
