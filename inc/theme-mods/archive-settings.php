<?php
/**
 * Archive Settings
 *
 * @package Networker
 */

CSCO_Kirki::add_section(
	'archive_settings',
	array(
		'title'    => esc_html__( 'Archive Settings', 'networker' ),
		'priority' => 50,
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'     => 'radio',
		'settings' => 'archive_layout',
		'label'    => esc_html__( 'Layout', 'networker' ),
		'section'  => 'archive_settings',
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
		'settings' => 'archive_sidebar',
		'label'    => esc_html__( 'Sidebar', 'networker' ),
		'section'  => 'archive_settings',
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
		'settings'        => 'archive_columns_desktop',
		'label'           => esc_html__( 'Number of Columns Desktop', 'networker' ),
		'section'         => 'archive_settings',
		'default'         => 2,
		'choices'         => array(
			'min'  => 1,
			'max'  => 4,
			'step' => 1,
		),
		'priority'        => 10,
		'output'          => array(
			array(
				'element'  => '.cs-posts-area__archive.cs-posts-area__grid',
				'property' => '--cs-posts-area-grid-columns-const',
				'suffix'   => '!important',
			),
			array(
				'element'  => '.cs-posts-area__archive.cs-posts-area__grid',
				'property' => '--cs-posts-area-grid-columns',
				'suffix'   => '!important',
			),
		),
		'active_callback' => array(
			array(
				array(
					'setting'  => 'archive_layout',
					'operator' => '==',
					'value'    => 'grid',
				),
				array(
					'setting'  => 'archive_layout',
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
		'settings'        => 'archive_columns_tablet',
		'label'           => esc_html__( 'Number of Columns Tablet', 'networker' ),
		'section'         => 'archive_settings',
		'default'         => 2,
		'choices'         => array(
			'min'  => 1,
			'max'  => 4,
			'step' => 1,
		),
		'priority'        => 10,
		'output'          => array(
			array(
				'element'     => '.cs-posts-area__archive.cs-posts-area__grid',
				'property'    => '--cs-posts-area-grid-columns',
				'media_query' => '@media (max-width: 1019px)',
				'suffix'      => '!important',
			),
		),
		'active_callback' => array(
			array(
				array(
					'setting'  => 'archive_layout',
					'operator' => '==',
					'value'    => 'grid',
				),
				array(
					'setting'  => 'archive_layout',
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
		'settings'        => 'archive_columns_mobile',
		'label'           => esc_html__( 'Number of Columns Mobile', 'networker' ),
		'section'         => 'archive_settings',
		'default'         => 1,
		'choices'         => array(
			'min'  => 1,
			'max'  => 4,
			'step' => 1,
		),
		'priority'        => 10,
		'output'          => array(
			array(
				'element'     => '.cs-posts-area__archive.cs-posts-area__grid',
				'property'    => '--cs-posts-area-grid-columns',
				'media_query' => '@media (max-width: 599px)',
				'suffix'      => '!important',
			),
		),
		'active_callback' => array(
			array(
				array(
					'setting'  => 'archive_layout',
					'operator' => '==',
					'value'    => 'grid',
				),
				array(
					'setting'  => 'archive_layout',
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
		'settings'        => 'archive_image_orientation',
		'label'           => esc_html__( 'Image Orientation', 'networker' ),
		'section'         => 'archive_settings',
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
					'setting'  => 'archive_layout',
					'operator' => '==',
					'value'    => 'list',
				),
				array(
					'setting'  => 'archive_layout',
					'operator' => '==',
					'value'    => 'grid',
				),
				array(
					'setting'  => 'archive_layout',
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
		'settings'        => 'archive_image_size',
		'label'           => esc_html__( 'Image Size', 'networker' ),
		'section'         => 'archive_settings',
		'default'         => 'csco-thumbnail',
		'choices'         => csco_get_list_available_image_sizes(),
		'priority'        => 10,
		'active_callback' => array(
			array(
				array(
					'setting'  => 'archive_layout',
					'operator' => '==',
					'value'    => 'list',
				),
				array(
					'setting'  => 'archive_layout',
					'operator' => '==',
					'value'    => 'grid',
				),
				array(
					'setting'  => 'archive_layout',
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
		'settings'        => 'archive_image_width',
		'label'           => esc_html__( 'Image Width', 'networker' ),
		'section'         => 'archive_settings',
		'default'         => 'half',
		'choices'         => array(
			'one-third' => esc_html__( 'One Third', 'networker' ),
			'half'      => esc_html__( 'Half', 'networker' ),
		),
		'priority'        => 10,
		'active_callback' => array(
			array(
				'setting'  => 'archive_layout',
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
		'settings'        => 'archive_overlay_image',
		'label'           => esc_html__( 'Display all posts with image overlay', 'networker' ),
		'section'         => 'archive_settings',
		'default'         => false,
		'priority'        => 10,
		'active_callback' => array(
			array(
				'setting'  => 'archive_layout',
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
		'settings' => 'archive_post_meta',
		'label'    => esc_html__( 'Post Meta', 'networker' ),
		'section'  => 'archive_settings',
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
		'settings'        => 'archive_compact_post_meta',
		'label'           => esc_html__( 'Display compact post meta', 'networker' ),
		'section'         => 'archive_settings',
		'default'         => false,
		'priority'        => 10,
		'active_callback' => array(
			array(
				'setting'  => 'archive_layout',
				'operator' => '!=',
				'value'    => 'full',
			),
			array(
				'setting'  => 'archive_layout',
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
		'settings' => 'archive_more_button',
		'label'    => esc_html__( 'Display read more button', 'networker' ),
		'section'  => 'archive_settings',
		'default'  => true,
		'priority' => 10,
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'            => 'radio',
		'settings'        => 'archive_media_preview',
		'label'           => esc_html__( 'Post Preview Image Size', 'networker' ),
		'section'         => 'archive_settings',
		'default'         => 'uncropped',
		'priority'        => 10,
		'choices'         => array(
			'cropped'   => esc_html__( 'Display Cropped Image', 'networker' ),
			'uncropped' => esc_html__( 'Display Preview in Original Ratio', 'networker' ),
		),
		'active_callback' => array(
			array(
				array(
					'setting'  => 'archive_layout',
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
		'settings'        => 'archive_summary',
		'label'           => esc_html__( 'Full Post Summary', 'networker' ),
		'section'         => 'archive_settings',
		'default'         => 'summary',
		'priority'        => 10,
		'choices'         => array(
			'summary' => esc_html__( 'Use Excerpts', 'networker' ),
			'content' => esc_html__( 'Use Read More Tag', 'networker' ),
		),
		'active_callback' => array(
			array(
				array(
					'setting'  => 'archive_layout',
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
		'settings' => 'archive_pagination_type',
		'label'    => esc_html__( 'Pagination', 'networker' ),
		'section'  => 'archive_settings',
		'default'  => 'load-more',
		'priority' => 10,
		'choices'  => array(
			'standard'  => esc_html__( 'Standard', 'networker' ),
			'load-more' => esc_html__( 'Load More Button', 'networker' ),
			'infinite'  => esc_html__( 'Infinite Load', 'networker' ),
		),
	)
);
