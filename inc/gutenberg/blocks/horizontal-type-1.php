<?php
/**
 * Register Horizontal Type 1.
 *
 * @package Networker
 */

/**
 * Register New Layout
 *
 * @param array $layouts List of layouts.
 */
function csco_canvas_register_layout_horizontal_type_1( $layouts = array() ) {

	$layout = 'horizontal-type-1';

	// Add new layout.
	$layouts[ $layout ] = array(
		'location'    => array(),
		'name'        => esc_html__( 'Horizontal 1', 'networker' ),
		'template'    => get_template_directory() . '/template-parts/blocks/posts-area.php',
		'icon'        => '<svg fill="none" height="44" viewBox="0 0 52 44" width="52" xmlns="http://www.w3.org/2000/svg"><g stroke="#000"><rect height="42" rx="2" stroke-width="1.5" width="50" x="1" y="1"/><g stroke-linecap="round" stroke-linejoin="round"><path d="m21 6h12"/><path d="m21 18h12"/><path d="m21 30h12"/><path d="m21 10h17"/><path d="m21 22h17"/><path d="m21 34h17"/><path d="m21 12h7"/><path d="m21 24h10"/><path d="m21 36h7"/><path d="m21 8h26"/><path d="m21 20h26"/><path d="m21 32h26"/></g><rect height="8" rx="1" stroke-width="1.5" width="12" x="5" y="6"/><rect height="8" rx="1" stroke-width="1.5" width="12" x="5" y="18"/><rect height="8" rx="1" stroke-width="1.5" width="12" x="5" y="30"/></g></svg>',
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
				array(
					'key'        => 'content_padding',
					'label'      => esc_html__( 'Content Padding', 'networker' ),
					'type'       => 'dimension',
					'section'    => 'general',
					'responsive' => true,
					'default'    => '0px',
					'output'     => array(
						array(
							'element'  => '$ .cs-posts-area__main',
							'property' => '--cs-post-area-content-padding',
							'suffix'   => '!important',
						),
					),
				),
				array(
					'key'        => 'content_border_radius',
					'label'      => esc_html__( 'Content Border Radius', 'networker' ),
					'type'       => 'dimension',
					'section'    => 'general',
					'responsive' => true,
					'default'    => '0px',
					'output'     => array(
						array(
							'element'  => '$ .cs-posts-area__main',
							'property' => '--cs-post-area-content-border-radius',
							'suffix'   => '!important',
						),
					),
				),
				array(
					'key'        => 'content_border_width',
					'label'      => esc_html__( 'Content Border Width', 'networker' ),
					'type'       => 'dimension',
					'section'    => 'general',
					'responsive' => true,
					'default'    => '0px',
					'output'     => array(
						array(
							'element'  => '$ .cs-posts-area__main',
							'property' => '--cs-post-area-content-border',
							'suffix'   => '!important',
						),
					),
				),
				array(
					'key'     => 'align_content',
					'label'   => esc_html__( 'Vertical Align Content', 'networker' ),
					'section' => 'general',
					'type'    => 'select',
					'default' => 'flex-start',
					'choices' => array(
						'flex-start'    => esc_html__( 'Top', 'networker' ),
						'center'        => esc_html__( 'Center', 'networker' ),
						'flex-end'      => esc_html__( 'Bottom', 'networker' ),
						'space-between' => esc_html__( 'Space Between', 'networker' ),
					),
					'output'  => array(
						array(
							'element'  => '$ .cs-posts-area__main',
							'property' => '--cs-post-area-align-content',
						),
					),
				),
				array(
					'key'     => 'align_image',
					'label'   => esc_html__( 'Vertical Align Image', 'networker' ),
					'section' => 'general',
					'type'    => 'select',
					'default' => 'flex-start',
					'choices' => array(
						'flex-start' => esc_html__( 'Top', 'networker' ),
						'center'     => esc_html__( 'Center', 'networker' ),
						'flex-end'   => esc_html__( 'Bottom', 'networker' ),
						'stretch'    => esc_html__( 'Stretch', 'networker' ),
					),
					'output'  => array(
						array(
							'element'  => '$ .cs-posts-area__main',
							'property' => '--cs-post-area-align-image',
						),
					),
				),
				array(
					'key'     => 'image_width',
					'label'   => esc_html__( 'Image Width', 'networker' ),
					'section' => 'general',
					'type'    => 'select',
					'default' => 'half',
					'choices' => array(
						'one-third' => esc_html__( 'One Third', 'networker' ),
						'half'      => esc_html__( 'Half', 'networker' ),
					),
				),
				array(
					'key'     => 'post_format',
					'label'   => esc_html__( 'Enable post format', 'networker' ),
					'section' => 'general',
					'type'    => 'toggle',
					'default' => true,
				),
				array(
					'key'     => 'video',
					'label'   => esc_html__( 'Enable video backgrounds', 'networker' ),
					'section' => 'general',
					'type'    => 'toggle',
					'default' => false,
				),
				array(
					'key'             => 'video_controls',
					'label'           => esc_html__( 'Enable video controls', 'networker' ),
					'section'         => 'general',
					'type'            => 'toggle',
					'default'         => false,
					'active_callback' => array(
						array(
							'field'    => '$#video',
							'operator' => '==',
							'value'    => true,
						),
					),
				),
				// Thumbnail.
				array(
					'key'     => 'image_orientation',
					'label'   => esc_html__( 'Image Orientation', 'networker' ),
					'section' => 'thumbnail',
					'type'    => 'select',
					'default' => 'original',
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
					'default' => 'medium_large',
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
				// Color Settings.
				array(
					'key'     => 'content_background_color',
					'label'   => esc_html__( 'Content Background', 'networker' ),
					'section' => 'color',
					'type'    => 'color',
					'output'  => array(
						array(
							'element'  => '$ .cs-posts-area',
							'property' => '--cs-post-area-content-background',
							'suffix'   => '!important',
						),
					),
				),
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
add_filter( 'canvas_block_layouts_canvas/posts', 'csco_canvas_register_layout_horizontal_type_1' );
