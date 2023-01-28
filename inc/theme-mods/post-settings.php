<?php
/**
 * Post Settings
 *
 * @package Networker
 */

CSCO_Kirki::add_section(
	'post_settings',
	array(
		'title'    => esc_html__( 'Post Settings', 'networker' ),
		'priority' => 50,
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'        => 'collapsible',
		'settings'    => 'post_collapsible_common',
		'section'     => 'post_settings',
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
		'settings' => 'post_sidebar',
		'label'    => esc_html__( 'Default Sidebar', 'networker' ),
		'section'  => 'post_settings',
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
		'type'     => 'multicheck',
		'settings' => 'post_meta',
		'label'    => esc_html__( 'Post Meta', 'networker' ),
		'section'  => 'post_settings',
		'default'  => array( 'category', 'date', 'author', 'views', 'shares', 'reading_time' ),
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

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'     => 'radio',
		'settings' => 'post_header_type',
		'label'    => esc_html__( 'Default Page Header Type', 'networker' ),
		'section'  => 'post_settings',
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
		'settings'        => 'post_media_preview',
		'label'           => esc_html__( 'Standard Page Header Preview', 'networker' ),
		'section'         => 'post_settings',
		'default'         => 'uncropped',
		'priority'        => 10,
		'choices'         => array(
			'cropped'   => esc_html__( 'Display Cropped Image', 'networker' ),
			'uncropped' => esc_html__( 'Display Preview in Original Ratio', 'networker' ),
		),
		'active_callback' => array(
			array(
				array(
					'setting'  => 'post_header_type',
					'operator' => '==',
					'value'    => 'standard',
				),
				array(
					'setting'  => 'post_header_type',
					'operator' => '==',
					'value'    => 'grid',
				),
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'     => 'checkbox',
		'settings' => 'post_subtitle',
		'label'    => esc_html__( 'Display excerpt as post subtitle', 'networker' ),
		'section'  => 'post_settings',
		'default'  => true,
		'priority' => 10,
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'     => 'checkbox',
		'settings' => 'post_author',
		'label'    => esc_html__( 'Display post author', 'networker' ),
		'section'  => 'post_settings',
		'default'  => false,
		'priority' => 10,
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'     => 'checkbox',
		'settings' => 'post_tags',
		'label'    => esc_html__( 'Display tags', 'networker' ),
		'section'  => 'post_settings',
		'default'  => true,
		'priority' => 10,
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'     => 'checkbox',
		'settings' => 'post_comments_simple',
		'label'    => esc_html__( 'Display comments without the View Comments button', 'networker' ),
		'section'  => 'post_settings',
		'default'  => false,
		'priority' => 10,
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'     => 'collapsible',
		'settings' => 'post_collapsible_prev_next',
		'section'  => 'post_settings',
		'label'    => esc_html__( 'Prev Next Links', 'networker' ),
		'priority' => 10,
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'     => 'checkbox',
		'settings' => 'post_prev_next',
		'label'    => esc_html__( 'Display prev next links', 'networker' ),
		'section'  => 'post_settings',
		'default'  => true,
		'priority' => 10,
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'            => 'radio',
		'settings'        => 'post_prev_next_layout',
		'label'           => esc_html__( 'Layout', 'networker' ),
		'section'         => 'post_settings',
		'default'         => 'type-1',
		'priority'        => 10,
		'choices'         => array(
			'type-1' => esc_html__( 'Type 1', 'networker' ),
			'type-2' => esc_html__( 'Type 2', 'networker' ),
		),
		'active_callback' => array(
			array(
				'setting'  => 'post_prev_next',
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
		'settings'        => 'post_prev_next_type1_image_orientation',
		'label'           => esc_html__( 'Image Orientation', 'networker' ),
		'section'         => 'post_settings',
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
				'setting'  => 'post_prev_next',
				'operator' => '==',
				'value'    => true,
			),
			array(
				'setting'  => 'post_prev_next_layout',
				'operator' => '==',
				'value'    => 'type-1',
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'            => 'select',
		'settings'        => 'post_prev_next_type1_image_size',
		'label'           => esc_html__( 'Image Size', 'networker' ),
		'section'         => 'post_settings',
		'default'         => 'csco-small',
		'choices'         => csco_get_list_available_image_sizes(),
		'priority'        => 10,
		'active_callback' => array(
			array(
				'setting'  => 'post_prev_next',
				'operator' => '==',
				'value'    => true,
			),
			array(
				'setting'  => 'post_prev_next_layout',
				'operator' => '==',
				'value'    => 'type-1',
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'            => 'select',
		'settings'        => 'post_prev_next_type2_image_orientation',
		'label'           => esc_html__( 'Image Orientation', 'networker' ),
		'section'         => 'post_settings',
		'default'         => 'landscape',
		'choices'         => array(
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
				'setting'  => 'post_prev_next',
				'operator' => '==',
				'value'    => true,
			),
			array(
				'setting'  => 'post_prev_next_layout',
				'operator' => '==',
				'value'    => 'type-2',
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'            => 'select',
		'settings'        => 'post_prev_next_type2_image_size',
		'label'           => esc_html__( 'Image Size', 'networker' ),
		'section'         => 'post_settings',
		'default'         => 'csco-thumbnail',
		'choices'         => csco_get_list_available_image_sizes(),
		'priority'        => 10,
		'active_callback' => array(
			array(
				'setting'  => 'post_prev_next',
				'operator' => '==',
				'value'    => true,
			),
			array(
				'setting'  => 'post_prev_next_layout',
				'operator' => '==',
				'value'    => 'type-2',
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'            => 'dimension',
		'settings'        => 'post_prev_next_image_border_radius',
		'label'           => esc_html__( 'Image Border Radius', 'networker' ),
		'section'         => 'post_settings',
		'default'         => '',
		'priority'        => 10,
		'output'          => array(
			array(
				'element'  => '.cs-entry__prev-next',
				'property' => '--cs-image-border-radius',
				'suffix'   => '!important',
			),
		),
		'active_callback' => array(
			array(
				'setting'  => 'post_prev_next',
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
		'settings'        => 'post_prev_next_meta',
		'label'           => esc_html__( 'Post Meta', 'networker' ),
		'section'         => 'post_settings',
		'default'         => array( 'category', 'date', 'author' ),
		'priority'        => 10,
		'choices'         => apply_filters(
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
		'active_callback' => array(
			array(
				'setting'  => 'post_prev_next',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

if ( csco_powerkit_module_enabled( 'opt_in_forms' ) ) {
	CSCO_Kirki::add_field(
		'csco_theme_mod',
		array(
			'type'     => 'collapsible',
			'settings' => 'post_collapsible_subscription_form',
			'section'  => 'post_settings',
			'label'    => esc_html__( 'Subscription Form', 'networker' ),
			'priority' => 10,
		)
	);

	CSCO_Kirki::add_field(
		'csco_theme_mod',
		array(
			'type'     => 'checkbox',
			'settings' => 'post_subscribe',
			'label'    => esc_html__( 'Display subscribe section', 'networker' ),
			'section'  => 'post_settings',
			'default'  => false,
			'priority' => 10,
		)
	);

	CSCO_Kirki::add_field(
		'csco_theme_mod',
		array(
			'type'            => 'checkbox',
			'settings'        => 'post_subscribe_name',
			'label'           => esc_html__( 'Display first name field', 'networker' ),
			'section'         => 'post_settings',
			'default'         => false,
			'priority'        => 10,
			'active_callback' => array(
				array(
					'setting'  => 'post_subscribe',
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
			'settings'        => 'post_subscribe_title',
			'label'           => esc_html__( 'Title', 'networker' ),
			'section'         => 'post_settings',
			'default'         => esc_html__( 'Subscribe to Our Newsletter', 'networker' ),
			'priority'        => 10,
			'active_callback' => array(
				array(
					'setting'  => 'post_subscribe',
					'operator' => '==',
					'value'    => true,
				),
			),
		)
	);

	CSCO_Kirki::add_field(
		'csco_theme_mod',
		array(
			'type'              => 'text',
			'settings'          => 'post_subscribe_text',
			'label'             => esc_html__( 'Text', 'networker' ),
			'section'           => 'post_settings',
			'default'           => esc_html__( 'Get notified of the best deals on our WordPress themes.', 'networker' ),
			'priority'          => 10,
			'sanitize_callback' => 'wp_kses_post',
			'active_callback'   => array(
				array(
					'setting'  => 'post_subscribe',
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
		'type'     => 'collapsible',
		'settings' => 'post_collapsible_related_posts',
		'section'  => 'post_settings',
		'label'    => esc_html__( 'Related Posts', 'networker' ),
		'priority' => 10,
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'     => 'checkbox',
		'settings' => 'related',
		'label'    => esc_html__( 'Display related section', 'networker' ),
		'section'  => 'post_settings',
		'default'  => true,
		'priority' => 10,
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'            => 'select',
		'settings'        => 'related_image_orientation',
		'label'           => esc_html__( 'Image Orientation', 'networker' ),
		'section'         => 'post_settings',
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
				'setting'  => 'related',
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
		'settings'        => 'related_image_size',
		'label'           => esc_html__( 'Image Size', 'networker' ),
		'section'         => 'post_settings',
		'default'         => 'csco-thumbnail',
		'choices'         => csco_get_list_available_image_sizes(),
		'priority'        => 10,
		'active_callback' => array(
			array(
				'setting'  => 'related',
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
		'settings'        => 'related_post_meta',
		'label'           => esc_html__( 'Post Meta', 'networker' ),
		'section'         => 'post_settings',
		'default'         => array( 'category', 'author', 'date', 'views', 'shares', 'reading_time' ),
		'priority'        => 10,
		'choices'         => apply_filters(
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
		'active_callback' => array(
			array(
				'setting'  => 'related',
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
		'settings'        => 'related_compact_post_meta',
		'label'           => esc_html__( 'Display compact post meta', 'networker' ),
		'section'         => 'post_settings',
		'default'         => true,
		'priority'        => 10,
		'active_callback' => array(
			array(
				'setting'  => 'related',
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
		'settings'        => 'related_number',
		'label'           => esc_html__( 'Maximum Number of Related Posts', 'networker' ),
		'section'         => 'post_settings',
		'default'         => 3,
		'priority'        => 10,
		'active_callback' => array(
			array(
				'setting'  => 'related',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

if ( csco_post_views_enabled() ) {

	CSCO_Kirki::add_field(
		'csco_theme_mod',
		array(
			'type'     => 'radio',
			'settings' => 'related_orderby',
			'label'    => esc_html__( 'Order posts by', 'networker' ),
			'section'  => 'post_settings',
			'default'  => 'rand',
			'priority' => 10,
			'choices'  => array(
				'rand'       => esc_html__( 'Rand', 'networker' ),
				'date'       => esc_html__( 'Date', 'networker' ),
				'post_views' => esc_html__( 'Views', 'networker' ),
			),
		)
	);

	CSCO_Kirki::add_field(
		'csco_theme_mod',
		array(
			'type'            => 'text',
			'settings'        => 'related_time_frame',
			'label'           => esc_html__( 'Time Frame', 'networker' ),
			'description'     => esc_html__( 'Add period of posts in English. For example: &laquo;2 months&raquo;, &laquo;14 days&raquo; or even &laquo;1 year&raquo;', 'networker' ),
			'section'         => 'post_settings',
			'default'         => '',
			'priority'        => 10,
			'active_callback' => array(
				array(
					'setting'  => 'related',
					'operator' => '==',
					'value'    => true,
				),
				array(
					'setting'  => 'related_orderby',
					'operator' => '==',
					'value'    => 'post_views',
				),
			),
		)
	);
}

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'     => 'collapsible',
		'settings' => 'post_collapsible_load_nextpost',
		'section'  => 'post_settings',
		'label'    => esc_html__( 'Auto Load Next Post', 'networker' ),
		'priority' => 10,
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'     => 'checkbox',
		'settings' => 'post_load_nextpost',
		'label'    => esc_html__( 'Enable the Auto Load Next Post feature', 'networker' ),
		'section'  => 'post_settings',
		'default'  => false,
		'priority' => 10,
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'            => 'checkbox',
		'settings'        => 'post_load_nextpost_same_category',
		'label'           => esc_html__( 'Auto load posts from the same category only', 'networker' ),
		'section'         => 'post_settings',
		'default'         => false,
		'priority'        => 10,
		'active_callback' => array(
			array(
				'setting'  => 'post_load_nextpost',
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
		'settings'        => 'post_load_nextpost_reverse',
		'label'           => esc_html__( 'Auto load previous posts instead of next ones', 'networker' ),
		'section'         => 'post_settings',
		'default'         => false,
		'priority'        => 10,
		'active_callback' => array(
			array(
				'setting'  => 'post_load_nextpost',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);
