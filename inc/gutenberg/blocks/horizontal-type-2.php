<?php
/**
 * Register Horizontal Type 2.
 *
 * @package Networker
 */

/**
 * Register New Layout
 *
 * @param array $layouts List of layouts.
 */
function csco_canvas_register_layout_horizontal_type_2( $layouts = array() ) {

	$layout = 'horizontal-type-2';

	// Add new layout.
	$layouts[ $layout ] = array(
		'location'    => array(),
		'name'        => esc_html__( 'Horizontal 2', 'networker' ),
		'template'    => get_template_directory() . '/template-parts/blocks/posts-area.php',
		'icon'        => '<svg fill="none" height="44" viewBox="0 0 52 44" width="52" xmlns="http://www.w3.org/2000/svg"><rect height="42" rx="2" stroke="#000" stroke-width="1.5" width="50" x="1" y="1"/><path d="m25 10h12" stroke="#000" stroke-linecap="round" stroke-linejoin="round"/><path d="m25 22h12" stroke="#000" stroke-linecap="round" stroke-linejoin="round"/><path d="m25 34h12" stroke="#000" stroke-linecap="round" stroke-linejoin="round"/><path d="m21.3516 13.0615c.2607 0 .4365-.1758.4365-.4424v-3.41598c0-.30468-.1875-.49511-.501-.49511-.1816 0-.3223.02637-.5273.16699l-.8379.58008c-.1377.09668-.1905.19629-.1905.33105 0 .1875.1319.31637.3106.31637.0908 0 .1523-.0205.2344-.0791l.6181-.43063h.0176v3.02633c0 .2666.1787.4424.4395.4424z" fill="#000"/><path d="m19.8984 25h2.3409c.2285 0 .3662-.1436.3662-.3516 0-.2138-.1377-.3515-.3662-.3515h-1.5938v-.0176l.9141-.8789c.6914-.6533.9433-.9756.9433-1.4912 0-.7266-.6035-1.2305-1.5-1.2305-.7998 0-1.33.4365-1.4736.9053-.0205.0615-.0322.123-.0322.1904 0 .2197.1406.3604.3779.3604.1904 0 .293-.0821.3926-.2578.1523-.3399.3867-.5098.7265-.5098.378 0 .6475.249.6475.5976 0 .3047-.1348.5098-.6562 1.0108l-1.2598 1.2041c-.1787.1641-.2432.2754-.2432.4424 0 .2226.1377.3779.416.3779z" fill="#000"/><path d="m20.9795 36.0938c.9814 0 1.6465-.5098 1.6465-1.2774 0-.583-.4072-.9521-1.0371-1.0107v-.0176c.498-.1026.8818-.4541.8818-.9902 0-.6768-.6035-1.1192-1.4971-1.1192-.747 0-1.2275.3457-1.415.7588-.044.0996-.0645.1846-.0645.2842 0 .2138.126.3574.3721.3574.1992 0 .3018-.0732.3984-.2725.1377-.2988.3545-.4482.712-.4482.4277 0 .6562.2256.6562.5654 0 .3457-.2871.586-.7295.586h-.1728c-.2139 0-.3369.1289-.3369.3134 0 .1905.123.3164.3369.3164h.1845c.5127 0 .8145.2286.8116.6387 0 .3516-.2989.6035-.7325.6035-.4394 0-.6679-.1757-.8173-.4716-.0879-.1612-.1993-.2315-.375-.2315-.2432 0-.3897.1436-.3897.3721 0 .0879.0205.1816.0674.2783.1992.416.6943.7647 1.5.7647z" fill="#000"/><g stroke="#000"><path d="m25 12h7" stroke-linecap="round" stroke-linejoin="round"/><path d="m25 24h7" stroke-linecap="round" stroke-linejoin="round"/><path d="m25 36h7" stroke-linecap="round" stroke-linejoin="round"/><path d="m25 8h22" stroke-linecap="round" stroke-linejoin="round"/><path d="m25 20h22" stroke-linecap="round" stroke-linejoin="round"/><path d="m25 32h22" stroke-linecap="round" stroke-linejoin="round"/><rect height="8" rx="1" stroke-width="1.5" width="12" x="5" y="6"/><rect height="8" rx="1" stroke-width="1.5" width="12" x="5" y="18"/><rect height="8" rx="1" stroke-width="1.5" width="12" x="5" y="30"/></g></svg>',
		'sections'    => array(
			'general'    => array(
				'title'    => esc_html__( 'Block Settings', 'networker' ),
				'priority' => 5,
				'open'     => true,
			),
			'post-meta'  => array(
				'title'    => esc_html__( 'Meta Settings', 'networker' ),
				'priority' => 10,
			),
			'typography' => array(
				'title'    => esc_html__( 'Typography Settings', 'networker' ),
				'priority' => 10,
			),
		),
		'hide_fields' => csco_get_gutenberg_posts_hide_fields(),
		'fields'      => array_merge(
			csco_get_gutenberg_pagination_fields(),

			array(
				array(
					'key'            => 'columns',
					'label'          => esc_html__( 'Number of Columns', 'networker' ),
					'section'        => 'general',
					'type'           => 'number',
					'min'            => 1,
					'max'            => 6,
					'default'        => 1,
					'default_tablet' => 1,
					'default_mobile' => 1,
					'responsive'     => true,
					'output'         => array(
						array(
							'element'  => '$ .cs-posts-area__main',
							'property' => '--cs-posts-area-grid-columns',
							'suffix'   => '!important',
						),
					),
				),
				array(
					'key'            => 'gap_posts',
					'label'          => esc_html__( 'Gap between Posts', 'networker' ),
					'type'           => 'dimension',
					'section'        => 'general',
					'responsive'     => true,
					'default'        => '40px',
					'default_tablet' => '40px',
					'default_mobile' => '40px',
					'output'         => array(
						array(
							'element'  => '$ .cs-posts-area__main',
							'property' => '--cs-posts-area-grid-gap',
							'suffix'   => '!important',
						),
					),
				),
				// Thumbnail.
				array(
					'key'     => 'image_orientation',
					'label'   => esc_html__( 'Image Orientation', 'networker' ),
					'section' => 'thumbnail',
					'type'    => 'select',
					'default' => 'square',
					'choices' => array(
						'original'       => esc_html__( 'Original', 'networker' ),
						'landscape'      => esc_html__( 'Landscape 4:3', 'networker' ),
						'landscape-3-2'  => esc_html__( 'Landscape 3:2', 'networker' ),
						'landscape-16-9' => esc_html__( 'Landscape 16:9', 'networker' ),
						'portrait'       => esc_html__( 'Portrait 3:4', 'networker' ),
						'portrait-2-3'   => esc_html__( 'Portrait 2:3', 'networker' ),
						'square'         => esc_html__( 'Square', 'networker' ),
					),
				),
				array(
					'key'     => 'image_size',
					'label'   => esc_html__( 'Images Size', 'networker' ),
					'section' => 'thumbnail',
					'type'    => 'select',
					'default' => 'csco-smaller',
					'choices' => csco_get_list_available_image_sizes(),
				),
				array(
					'key'     => 'image_border_radius',
					'label'   => esc_html__( 'Image Border Radius', 'networker' ),
					'section' => 'thumbnail',
					'type'    => 'dimension',
					'output'  => array(
						array(
							'element'  => '$',
							'property' => '--cs-image-border-radius',
						),
					),
				),
				// Typography.
				array(
					'key'        => 'typography_heading',
					'label'      => esc_html__( 'Heading Font Size', 'networker' ),
					'section'    => 'typography',
					'type'       => 'dimension',
					'default'    => '1.25rem',
					'responsive' => true,
					'output'     => array(
						array(
							'element'  => '$ .cs-entry__title a',
							'property' => 'font-size',
							'suffix'   => '!important',
						),
					),
				),
				array(
					'key'     => 'typography_heading_tag',
					'label'   => esc_html__( 'Heading Tag', 'networker' ),
					'section' => 'typography',
					'type'    => 'select',
					'default' => 'h2',
					'choices' => array(
						'h1'  => esc_html__( 'H1', 'networker' ),
						'h2'  => esc_html__( 'H2', 'networker' ),
						'h3'  => esc_html__( 'H3', 'networker' ),
						'h4'  => esc_html__( 'H4', 'networker' ),
						'h5'  => esc_html__( 'H5', 'networker' ),
						'h6'  => esc_html__( 'H6', 'networker' ),
						'p'   => esc_html__( 'P', 'networker' ),
						'div' => esc_html__( 'DIV', 'networker' ),
					),
				),
				array(
					'key'             => 'typography_excerpt',
					'label'           => esc_html__( 'Excerpt Font Size', 'networker' ),
					'section'         => 'typography',
					'type'            => 'dimension',
					'default'         => '0.875rem',
					'responsive'      => true,
					'output'          => array(
						array(
							'element'  => '$ .cs-entry__excerpt',
							'property' => 'font-size',
							'suffix'   => '!important',
						),
					),
					'active_callback' => array(
						array(
							'field'    => '$#display_excerpt',
							'operator' => '===',
							'value'    => true,
						),
					),
				),
				array(
					'key'        => 'typographyNumber',
					'label'      => esc_html__( 'Number Font Size', 'networker' ),
					'section'    => 'typography',
					'type'       => 'dimension',
					'default'    => '1rem',
					'responsive' => true,
					'output'     => array(
						array(
							'element'  => '$ .cs-entry__thumbnail:after',
							'property' => 'font-size',
							'suffix'   => '!important',
						),
					),
				),
				// Color Settings.
				array(
					'key'     => 'color_separator',
					'label'   => esc_html__( 'Separator Color', 'networker' ),
					'section' => 'color',
					'type'    => 'color',
					'output'  => array(
						array(
							'element'  => '$ .cs-posts-area',
							'property' => '--cs-post-area-separator-color',
							'suffix'   => '!important',
						),
					),
				),
				array(
					'key'     => 'color_heading',
					'label'   => esc_html__( 'Heading Color', 'networker' ),
					'section' => 'color',
					'type'    => 'color',
					'output'  => array(
						array(
							'element'  => '$ .cs-entry__content .cs-entry__title',
							'property' => '--cs-color-title',
							'suffix'   => '!important',
						),
					),
				),
				array(
					'key'     => 'color_heading_hover',
					'label'   => esc_html__( 'Heading Color Hover', 'networker' ),
					'section' => 'color',
					'type'    => 'color',
					'output'  => array(
						array(
							'element'  => '$ .cs-entry__content .cs-entry__title',
							'property' => '--cs-color-title-hover',
							'suffix'   => '!important',
						),
					),
				),
				array(
					'key'     => 'colorBasicNumber',
					'label'   => esc_html__( 'Post Number', 'networker' ),
					'section' => 'color',
					'type'    => 'color',
					'output'  => array(
						array(
							'element'  => '$ .cs-entry__thumbnail:after',
							'property' => 'color',
							'suffix'   => '!important',
						),
					),
				),
				array(
					'key'             => 'color_excerpt',
					'label'           => esc_html__( 'Excerpt', 'networker' ),
					'section'         => 'color',
					'type'            => 'color',
					'output'          => array(
						array(
							'element'  => '$ .cs-entry__content .cs-entry__excerpt',
							'property' => '--cs-color-excerpt',
							'suffix'   => '!important',
						),
					),
					'active_callback' => array(
						array(
							'field'    => '$#display_excerpt',
							'operator' => '===',
							'value'    => true,
						),
					),
				),
				array(
					'key'     => 'color_meta',
					'label'   => esc_html__( 'Post Meta', 'networker' ),
					'section' => 'color',
					'type'    => 'color',
					'output'  => array(
						array(
							'element'  => '$ .cs-entry__content .cs-entry__post-meta',
							'property' => '--cs-color-meta',
							'suffix'   => '!important',
						),
					),
				),
				array(
					'key'     => 'color_meta_links',
					'label'   => esc_html__( 'Post Meta Links', 'networker' ),
					'section' => 'color',
					'type'    => 'color',
					'output'  => array(
						array(
							'element'  => '$ .cs-entry__content .cs-entry__post-meta, $ .cs-entry__content .cs-entry__author-meta',
							'property' => '--cs-color-meta-links',
							'suffix'   => '!important',
						),
						array(
							'element'  => '$ .cs-entry__content .cs-entry__post-meta',
							'property' => '--cs-color-category',
							'suffix'   => '!important',
						),
					),
				),
				array(
					'key'     => 'color_meta_links_hover',
					'label'   => esc_html__( 'Post Meta Links Hover', 'networker' ),
					'section' => 'color',
					'type'    => 'color',
					'output'  => array(
						array(
							'element'  => '$ .cs-entry__content .cs-entry__post-meta, $ .cs-entry__content .cs-entry__author-meta',
							'property' => '--cs-color-meta-links-hover',
							'suffix'   => '!important',
						),
						array(
							'element'  => '$ .cs-entry__content .cs-entry__post-meta',
							'property' => '--cs-color-category-hover',
							'suffix'   => '!important',
						),
					),
				),
				array(
					'key'     => 'color_categories',
					'label'   => esc_html__( 'Post Meta Categories Color', 'networker' ),
					'section' => 'color',
					'type'    => 'color',
					'output'  => array(
						array(
							'element'  => '$ .cs-entry__content .cs-entry__post-meta',
							'property' => '--cs-color-category',
							'suffix'   => '!important',
						),
					),
				),
				array(
					'key'     => 'color_categories_hover',
					'label'   => esc_html__( 'Post Meta Categories Color Hover', 'networker' ),
					'section' => 'color',
					'type'    => 'color',
					'output'  => array(
						array(
							'element'  => '$ .cs-entry__content .cs-entry__post-meta',
							'property' => '--cs-color-category-hover',
							'suffix'   => '!important',
						),
					),
				),
			),
			// Primary Meta.
			csco_get_gutenberg_meta_fields(
				array(
					'section_name' => 'post-meta',
				)
			),
			csco_get_gutenberg_excerpt_fields(
				array(
					'section_name' => 'post-meta',
				)
			)
		),
	);

	return $layouts;
}
add_filter( 'canvas_block_layouts_canvas/posts', 'csco_canvas_register_layout_horizontal_type_2' );
