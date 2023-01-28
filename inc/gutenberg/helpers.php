<?php
/**
 * Helpers Gutenberg.
 *
 * @package Networker
 */

/**
 * Get hide fields array for posts
 */
function csco_get_gutenberg_posts_hide_fields() {
	return array(
		'imageSize',
		'postsCount',
		'showPagination',
		'showMetaCategory',
		'showMetaAuthor',
		'showMetaDate',
		'showMetaComments',
		'showMetaViews',
		'showMetaReadingTime',
		'showMetaShares',
		'showExcerpt',
		'showViewPostButton',
		'colorText',
		'colorHeading',
		'colorHeadingHover',
		'colorText',
		'colorMeta',
		'colorMetaHover',
		'colorMetaLinks',
		'colorMetaLinksHover',
	);
}

/**
 * Get fields array for pagination
 */
function csco_get_gutenberg_pagination_fields() {
	// Set fields.
	$fields = array(
		array(
			'key'             => 'paginationType',
			'label'           => esc_html__( 'Pagination type', 'networker' ),
			'section'         => 'general',
			'type'            => 'select',
			'multiple'        => false,
			'choices'         => array(
				'none'     => esc_html__( 'None', 'networker' ),
				'standard' => esc_html__( 'Standard', 'networker' ),
				'ajax'     => esc_html__( 'Load More', 'networker' ),
				'infinite' => esc_html__( 'Infinite Load', 'networker' ),
			),
			'default'         => 'none',
			'active_callback' => array(
				array(
					'field'    => 'relatedPosts',
					'operator' => '==',
					'value'    => false,
				),
				array(
					array(
						array(
							'field'    => 'query.categories',
							'operator' => '===',
							'value'    => '',
						),
						array(
							'field'    => 'query.tags',
							'operator' => '===',
							'value'    => '',
						),
						array(
							'field'    => 'query.orderby',
							'operator' => '===',
							'value'    => 'date',
						),
						array(
							'field'    => 'query.order',
							'operator' => '===',
							'value'    => 'DESC',
						),
						array(
							'field'    => 'query.posts_type',
							'operator' => '===',
							'value'    => 'post',
						),
						array(
							'field'    => 'query.formats',
							'operator' => '===',
							'value'    => '',
						),
						array(
							'field'    => 'query.posts',
							'operator' => '===',
							'value'    => '',
						),
						array(
							'field'    => 'query.offset',
							'operator' => '===',
							'value'    => '',
						),
						array(
							'field'    => 'avoidDuplicatePosts',
							'operator' => '===',
							'value'    => false,
						),
					),
					array(
						array(
							'field'    => 'query.categories',
							'operator' => '!==',
							'value'    => '',
						),
						array(
							'field'    => 'query.categories',
							'count'    => ',',
							'operator' => '==',
							'value'    => 0,
						),
						array(
							'field'    => 'query.tags',
							'operator' => '===',
							'value'    => '',
						),
						array(
							'field'    => 'query.orderby',
							'operator' => '===',
							'value'    => 'date',
						),
						array(
							'field'    => 'query.order',
							'operator' => '===',
							'value'    => 'DESC',
						),
						array(
							'field'    => 'query.posts_type',
							'operator' => '===',
							'value'    => 'post',
						),
						array(
							'field'    => 'query.formats',
							'operator' => '===',
							'value'    => '',
						),
						array(
							'field'    => 'query.posts',
							'operator' => '===',
							'value'    => '',
						),
						array(
							'field'    => 'query.offset',
							'operator' => '===',
							'value'    => '',
						),
						array(
							'field'    => 'avoidDuplicatePosts',
							'operator' => '===',
							'value'    => false,
						),
					),
					array(
						array(
							'field'    => 'query.tags',
							'count'    => ',',
							'operator' => '==',
							'value'    => 0,
						),
						array(
							'field'    => 'query.categories',
							'operator' => '===',
							'value'    => '',
						),
						array(
							'field'    => 'query.orderby',
							'operator' => '===',
							'value'    => 'date',
						),
						array(
							'field'    => 'query.order',
							'operator' => '===',
							'value'    => 'DESC',
						),
						array(
							'field'    => 'query.posts_type',
							'operator' => '===',
							'value'    => 'post',
						),
						array(
							'field'    => 'query.formats',
							'operator' => '===',
							'value'    => '',
						),
						array(
							'field'    => 'query.posts',
							'operator' => '===',
							'value'    => '',
						),
						array(
							'field'    => 'query.offset',
							'operator' => '===',
							'value'    => '',
						),
						array(
							'field'    => 'avoidDuplicatePosts',
							'operator' => '===',
							'value'    => false,
						),
					),
				),
			),
		),
		array(
			'key'             => 'paginationTypeAlt',
			'label'           => esc_html__( 'Pagination type', 'networker' ),
			'section'         => 'general',
			'type'            => 'select',
			'multiple'        => false,
			'choices'         => array(
				'none'     => esc_html__( 'None', 'networker' ),
				'ajax'     => esc_html__( 'Load More', 'networker' ),
				'infinite' => esc_html__( 'Infinite Load', 'networker' ),
			),
			'default'         => 'none',
			'active_callback' => array(
				array(
					'field'    => 'relatedPosts',
					'operator' => '==',
					'value'    => false,
				),
				array(
					array(
						'field'    => 'query.orderby',
						'operator' => '!==',
						'value'    => 'date',
					),
					array(
						'field'    => 'query.order',
						'operator' => '!==',
						'value'    => 'DESC',
					),
					array(
						'field'    => 'query.posts_type',
						'operator' => '!==',
						'value'    => 'post',
					),
					array(
						'field'    => 'query.formats',
						'operator' => '!==',
						'value'    => '',
					),
					array(
						'field'    => 'query.posts',
						'operator' => '!==',
						'value'    => '',
					),
					array(
						'field'    => 'query.offset',
						'operator' => '!==',
						'value'    => '',
					),
					array(
						'field'    => 'avoidDuplicatePosts',
						'operator' => '!==',
						'value'    => false,
					),
					array(
						array(
							'field'    => 'query.categories',
							'operator' => '!==',
							'value'    => '',
						),
						array(
							'field'    => 'query.tags',
							'operator' => '!==',
							'value'    => '',
						),
					),
					array(
						array(
							'field'    => 'query.categories',
							'operator' => '!==',
							'value'    => '',
						),
						array(
							'field'    => 'query.categories',
							'count'    => ',',
							'operator' => '>=',
							'value'    => 1,
						),
					),
					array(
						array(
							'field'    => 'query.tags',
							'operator' => '!==',
							'value'    => '',
						),
						array(
							'field'    => 'query.tags',
							'count'    => ',',
							'operator' => '>=',
							'value'    => 1,
						),
					),
				),
			),
		),
		array(
			'key'             => 'areaPostsCount',
			'label'           => esc_html__( 'Posts Count', 'networker' ),
			'section'         => 'general',
			'type'            => 'number',
			'default'         => 1,
			'min'             => 1,
			'max'             => 100,
			'active_callback' => array(
				array(
					array(
						array(
							'field'    => '$#paginationType',
							'operator' => '!=',
							'value'    => 'standard',
						),
						array(
							'field'    => 'query.categories',
							'operator' => '===',
							'value'    => '',
						),
						array(
							'field'    => 'query.tags',
							'operator' => '===',
							'value'    => '',
						),
						array(
							'field'    => 'query.orderby',
							'operator' => '===',
							'value'    => 'date',
						),
						array(
							'field'    => 'query.order',
							'operator' => '===',
							'value'    => 'DESC',
						),
						array(
							'field'    => 'query.posts_type',
							'operator' => '===',
							'value'    => 'post',
						),
						array(
							'field'    => 'query.formats',
							'operator' => '===',
							'value'    => '',
						),
						array(
							'field'    => 'query.posts',
							'operator' => '===',
							'value'    => '',
						),
						array(
							'field'    => 'query.offset',
							'operator' => '===',
							'value'    => '',
						),
						array(
							'field'    => 'avoidDuplicatePosts',
							'operator' => '===',
							'value'    => false,
						),
					),
					array(
						array(
							'field'    => '$#paginationType',
							'operator' => '!=',
							'value'    => 'standard',
						),
						array(
							'field'    => 'query.categories',
							'operator' => '!==',
							'value'    => '',
						),
						array(
							'field'    => 'query.categories',
							'count'    => ',',
							'operator' => '==',
							'value'    => 0,
						),
						array(
							'field'    => 'query.tags',
							'operator' => '===',
							'value'    => '',
						),
						array(
							'field'    => 'query.orderby',
							'operator' => '===',
							'value'    => 'date',
						),
						array(
							'field'    => 'query.order',
							'operator' => '===',
							'value'    => 'DESC',
						),
						array(
							'field'    => 'query.posts_type',
							'operator' => '===',
							'value'    => 'post',
						),
						array(
							'field'    => 'query.formats',
							'operator' => '===',
							'value'    => '',
						),
						array(
							'field'    => 'query.posts',
							'operator' => '===',
							'value'    => '',
						),
						array(
							'field'    => 'query.offset',
							'operator' => '===',
							'value'    => '',
						),
						array(
							'field'    => 'avoidDuplicatePosts',
							'operator' => '===',
							'value'    => false,
						),
					),
					array(
						array(
							'field'    => '$#paginationType',
							'operator' => '!=',
							'value'    => 'standard',
						),
						array(
							'field'    => 'query.tags',
							'count'    => ',',
							'operator' => '==',
							'value'    => 0,
						),
						array(
							'field'    => 'query.categories',
							'operator' => '===',
							'value'    => '',
						),
						array(
							'field'    => 'query.orderby',
							'operator' => '===',
							'value'    => 'date',
						),
						array(
							'field'    => 'query.order',
							'operator' => '===',
							'value'    => 'DESC',
						),
						array(
							'field'    => 'query.posts_type',
							'operator' => '===',
							'value'    => 'post',
						),
						array(
							'field'    => 'query.formats',
							'operator' => '===',
							'value'    => '',
						),
						array(
							'field'    => 'query.posts',
							'operator' => '===',
							'value'    => '',
						),
						array(
							'field'    => 'query.offset',
							'operator' => '===',
							'value'    => '',
						),
						array(
							'field'    => 'avoidDuplicatePosts',
							'operator' => '===',
							'value'    => false,
						),
					),
					array(
						'field'    => 'query.orderby',
						'operator' => '!==',
						'value'    => 'date',
					),
					array(
						'field'    => 'query.order',
						'operator' => '!==',
						'value'    => 'DESC',
					),
					array(
						'field'    => 'query.posts_type',
						'operator' => '!==',
						'value'    => 'post',
					),
					array(
						'field'    => 'query.formats',
						'operator' => '!==',
						'value'    => '',
					),
					array(
						'field'    => 'query.posts',
						'operator' => '!==',
						'value'    => '',
					),
					array(
						'field'    => 'query.offset',
						'operator' => '!==',
						'value'    => '',
					),
					array(
						'field'    => 'avoidDuplicatePosts',
						'operator' => '!==',
						'value'    => false,
					),
					array(
						array(
							'field'    => 'query.categories',
							'operator' => '!==',
							'value'    => '',
						),
						array(
							'field'    => 'query.tags',
							'operator' => '!==',
							'value'    => '',
						),
					),
					array(
						array(
							'field'    => 'query.categories',
							'operator' => '!==',
							'value'    => '',
						),
						array(
							'field'    => 'query.categories',
							'count'    => ',',
							'operator' => '>=',
							'value'    => 1,
						),
					),
					array(
						array(
							'field'    => 'query.tags',
							'operator' => '!==',
							'value'    => '',
						),
						array(
							'field'    => 'query.tags',
							'count'    => ',',
							'operator' => '>=',
							'value'    => 1,
						),
					),
				),
			),
		),
	);

	return $fields;
}

/**
 * Get fields array for Meta
 *
 * @param array $settings The settings.
 */
function csco_get_gutenberg_meta_fields( $settings ) {

	$settings = array_merge( array(
		'field_prefix'    => '',
		'section_name'    => '',
		'meta_compact'    => false,
		'active_callback' => array(),
	), $settings );

	$settings['field_prefix'] = $settings['field_prefix'] ? sprintf( '%s_', $settings['field_prefix'] ) : null;

	// Set fields.
	$fields = array(
		array(
			'key'             => $settings['field_prefix'] . 'display_meta_category',
			'label'           => esc_html__( 'Category', 'networker' ),
			'section'         => $settings['section_name'],
			'type'            => 'toggle',
			'default'         => true,
			'active_callback' => $settings['active_callback'],
		),
		array(
			'key'             => $settings['field_prefix'] . 'display_meta_author',
			'label'           => esc_html__( 'Author', 'networker' ),
			'section'         => $settings['section_name'],
			'type'            => 'toggle',
			'default'         => true,
			'active_callback' => $settings['active_callback'],
		),
		array(
			'key'             => $settings['field_prefix'] . 'display_meta_date',
			'label'           => esc_html__( 'Date', 'networker' ),
			'section'         => $settings['section_name'],
			'type'            => 'toggle',
			'default'         => true,
			'active_callback' => $settings['active_callback'],
		),
		array(
			'key'             => $settings['field_prefix'] . 'display_meta_comments',
			'label'           => esc_html__( 'Comments', 'networker' ),
			'section'         => $settings['section_name'],
			'type'            => 'toggle',
			'default'         => false,
			'active_callback' => $settings['active_callback'],
		),
		csco_post_views_enabled() ? array(
			'key'             => $settings['field_prefix'] . 'display_meta_views',
			'label'           => esc_html__( 'Views', 'networker' ),
			'section'         => $settings['section_name'],
			'type'            => 'toggle',
			'default'         => false,
			'active_callback' => $settings['active_callback'],
		) : array(),
		csco_powerkit_module_enabled( 'reading_time' ) ? array(
			'key'             => $settings['field_prefix'] . 'display_meta_reading_time',
			'label'           => esc_html__( 'Reading Time', 'networker' ),
			'section'         => $settings['section_name'],
			'type'            => 'toggle',
			'default'         => false,
			'active_callback' => $settings['active_callback'],
		) : array(),
		function_exists( 'powerkit_share_buttons_exists' ) && powerkit_share_buttons_exists( 'block-posts' ) ? array(
			'key'             => $settings['field_prefix'] . 'display_meta_shares',
			'label'           => esc_html__( 'Shares', 'networker' ),
			'section'         => $settings['section_name'],
			'type'            => 'toggle',
			'default'         => false,
			'active_callback' => $settings['active_callback'],
		) : array(),
		array(
			'key'             => uniqid(),
			'section'         => $settings['section_name'],
			'type'            => 'separator',
			'active_callback' => $settings['active_callback'],
		),
		array(
			'key'             => $settings['field_prefix'] . 'display_meta_compact',
			'label'           => esc_html__( 'Display compact post meta', 'networker' ),
			'section'         => $settings['section_name'],
			'type'            => 'toggle',
			'default'         => $settings['meta_compact'],
			'active_callback' => $settings['active_callback'],
		),
	);

	return $fields;
}

/**
 * Get fields array for Excerpt
 *
 * @param array $settings The settings.
 */
function csco_get_gutenberg_excerpt_fields( $settings ) {

	$settings = array_merge( array(
		'field_prefix'    => '',
		'section_name'    => '',
		'active_callback' => array(),
		'sep'             => true,
		'default'         => false,
	), $settings );

	$settings['field_prefix'] = $settings['field_prefix'] ? sprintf( '%s_', $settings['field_prefix'] ) : null;

	// Set fields.
	$fields = array(
		$settings['sep'] ? array(
			'key'             => uniqid(),
			'section'         => $settings['section_name'],
			'type'            => 'separator',
			'active_callback' => $settings['active_callback'],
		) : array(),
		array(
			'key'             => $settings['field_prefix'] . 'display_excerpt',
			'label'           => esc_html__( 'Display post excerpt', 'networker' ),
			'section'         => $settings['section_name'],
			'type'            => 'toggle',
			'default'         => $settings['default'],
			'active_callback' => $settings['active_callback'],
		),
		array(
			'key'             => $settings['field_prefix'] . 'excerpt_length',
			'label'           => esc_html__( 'Excerpt length', 'networker' ),
			'section'         => $settings['section_name'],
			'type'            => 'toggle',
			'type'            => 'number',
			'step'            => 1,
			'min'             => 1,
			'max'             => 1000,
			'default'         => 100,
			'active_callback' => array_merge(
				array(
					array(
						'field'    => '$#' . $settings['field_prefix'] . 'display_excerpt',
						'operator' => '==',
						'value'    => true,
					),
				),
				$settings['active_callback']
			),
		),
	);

	return $fields;
}

/**
 * Get fields array for View Link
 *
 * @param array $settings The settings.
 */
function csco_get_gutenberg_view_link_fields( $settings ) {

	$settings = array_merge( array(
		'field_prefix'    => '',
		'section_name'    => '',
		'active_callback' => array(),
		'sep'             => true,
		'default'         => false,
	), $settings );

	$settings['field_prefix'] = $settings['field_prefix'] ? sprintf( '%s_', $settings['field_prefix'] ) : null;

	// Set fields.
	$fields = array(
		$settings['sep'] ? array(
			'key'             => uniqid(),
			'section'         => $settings['section_name'],
			'type'            => 'separator',
			'active_callback' => $settings['active_callback'],
		) : array(),
		array(
			'key'             => $settings['field_prefix'] . 'display_view_link',
			'label'           => esc_html__( 'Display view post link', 'networker' ),
			'section'         => $settings['section_name'],
			'type'            => 'toggle',
			'default'         => $settings['default'],
			'active_callback' => $settings['active_callback'],
		),
		array(
			'key'             => $settings['field_prefix'] . 'view_link_label',
			'label'           => esc_html__( 'View Post Link Label', 'networker' ),
			'section'         => $settings['section_name'],
			'type'            => 'text',
			'default'         => '',
			'active_callback' => array_merge(
				array(
					array(
						'field'    => '$#' . $settings['field_prefix'] . 'display_view_link',
						'operator' => '==',
						'value'    => true,
					),
				),
				$settings['active_callback']
			),
		),
	);

	return $fields;
}

/**
 * Get fields array for More Button
 *
 * @param array $settings The settings.
 */
function csco_get_gutenberg_more_button_fields( $settings ) {

	$settings = array_merge( array(
		'field_prefix'    => '',
		'section_name'    => '',
		'active_callback' => array(),
		'sep'             => true,
		'default'         => false,
	), $settings );

	$settings['field_prefix'] = $settings['field_prefix'] ? sprintf( '%s_', $settings['field_prefix'] ) : null;

	// Set fields.
	$fields = array(
		$settings['sep'] ? array(
			'key'             => uniqid(),
			'section'         => $settings['section_name'],
			'type'            => 'separator',
			'active_callback' => $settings['active_callback'],
		) : array(),
		array(
			'key'             => $settings['field_prefix'] . 'display_more_button',
			'label'           => esc_html__( 'Display read more button', 'networker' ),
			'section'         => $settings['section_name'],
			'type'            => 'toggle',
			'default'         => $settings['default'],
			'active_callback' => $settings['active_callback'],
		),
		array(
			'key'             => $settings['field_prefix'] . 'more_button_label',
			'label'           => esc_html__( 'More Button Label', 'networker' ),
			'section'         => $settings['section_name'],
			'type'            => 'text',
			'default'         => '',
			'active_callback' => array_merge(
				array(
					array(
						'field'    => '$#' . $settings['field_prefix'] . 'display_more_button',
						'operator' => '==',
						'value'    => true,
					),
				),
				$settings['active_callback']
			),
		),
	);

	return $fields;
}

/**
 * Output post thumbnail of layout.
 *
 * @param array  $options    The options.
 * @param array  $attributes The attributes.
 * @param string $prefix     The field prefix.
 * @param array  $meta       The meta.
 */
function cnvs_block_post_thumbnail( $options, $attributes, $prefix = null, $meta = array() ) {

	$prefix = $prefix ? sprintf( '%s_', $prefix ) : null;

	if ( has_post_thumbnail() ) {
		$options['thumbnail_meta']    = cnvs_block_post_meta( $options, $meta, false );
		$options['thumbnail_content'] = isset( $options['thumbnail_content'] ) ? $options['thumbnail_content'] : false;
		$options['video_template']    = isset( $options['video_template'] ) ? $options['video_template'] : 'default';
		$options['video_controls']    = isset( $options['video_controls'] ) ? $options['video_controls'] : false;
		$options['image_ratio']       = isset( $options[ $prefix . 'image_orientation' ] ) ? sprintf( 'cs-overlay-ratio cs-ratio-%s', $options[ $prefix . 'image_orientation' ] ) : false;
		?>

		<?php if ( $options['thumbnail_meta'] || $options['thumbnail_content'] ) { ?>
			<div class="cs-entry__inner cs-entry__thumbnail cs-entry__overlay <?php echo esc_attr( $options['image_ratio'] ); ?>" data-scheme="inverse">
		<?php } else { ?>
			<div class="cs-entry__inner cs-entry__thumbnail cs-entry__overlay <?php echo esc_attr( $options['image_ratio'] ); ?>">
		<?php } ?>

			<?php if ( $options['thumbnail_meta'] || $options['thumbnail_content'] ) { ?>
				<div class="cs-overlay-background">
					<?php the_post_thumbnail( $options[ $prefix . 'image_size' ] ); ?>
				</div>
			<?php } else { ?>
				<div class="cs-overlay-background cs-overlay-transparent">
					<?php the_post_thumbnail( $options[ $prefix . 'image_size' ] ); ?>
				</div>
			<?php } ?>

			<?php
			if ( isset( $options['video'] ) && $options['video'] ) {
				csco_get_video_background( null, null, $options['video_template'], $options['video_controls'], $options['video_controls'] );
			}
			?>

			<?php
			if ( isset( $options['post_format'] ) && $options['post_format'] ) {
				csco_the_post_format_icon();
			}
			?>

			<?php if ( $options['thumbnail_meta'] || $options['thumbnail_content'] ) { ?>
				<div class="cs-overlay-content">
					<?php cnvs_block_post_meta( $options, $meta ); ?>
				</div>
			<?php } ?>

			<a href="<?php echo esc_url( get_permalink() ); ?>" class="cs-overlay-link"></a>
		</div>
		<?php
	}
}

/**
 * Output post overlay thumbnail of layout.
 *
 * @param array  $options    The options.
 * @param array  $attributes The attributes.
 * @param string $prefix     The field prefix.
 */
function cnvs_block_post_overlay_thumbnail( $options, $attributes, $prefix = null ) {

	$prefix = $prefix ? sprintf( '%s_', $prefix ) : null;

	if ( has_post_thumbnail() ) {
		$options['video_template'] = isset( $options['video_template'] ) ? $options['video_template'] : 'default';
		$options['video_controls'] = isset( $options['video_controls'] ) ? $options['video_controls'] : false;
		?>
		<div class="cs-overlay-background">
			<?php the_post_thumbnail( $options[ $prefix . 'image_size' ] ); ?>

			<?php
			if ( isset( $options['video'] ) && $options['video'] ) {
				csco_get_video_background( null, null, $options['video_template'], $options['video_controls'], $options['video_controls'] );
			}
			?>
		</div>
		<?php
	}
}

/**
 * Output post title of layout.
 *
 * @param array  $options The options.
 * @param string $prefix  The field prefix.
 * @param string $class   The title class.
 */
function cnvs_block_post_title( $options, $prefix = null, $class = '' ) {

	$prefix = $prefix ? sprintf( '%s_', $prefix ) : null;

	$tag = isset( $options[ $prefix . 'typography_heading_tag' ] ) ? $options[ $prefix . 'typography_heading_tag' ] : 'h2';
	?>
	<<?php echo esc_html( $tag ); ?> class="cs-entry__title <?php echo esc_html( $class ); ?>">
		<?php if ( isset( $options['withoutLink'] ) && $options['withoutLink'] ) { ?>
			<span><?php the_title(); ?></span>
		<?php } else { ?>
			<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		<?php } ?>
	</<?php echo esc_html( $tag ); ?>>
	<?php
}

/**
 * Output post excerpt of layout.
 *
 * @param array  $options The options.
 * @param string $prefix  The field prefix.
 */
function cnvs_block_post_excerpt( $options, $prefix = null ) {

	$prefix = $prefix ? sprintf( '%s_', $prefix ) : null;

	if ( isset( $options[ $prefix . 'display_excerpt' ] ) && $options[ $prefix . 'display_excerpt' ] ) {

		$content = csco_get_the_excerpt( (int) $options[ $prefix . 'excerpt_length' ] );

		if ( $content ) {
			?>
			<div class="cs-entry__excerpt">
				<?php echo esc_html( $content ); ?>
			</div>
			<?php
		}
	}
}

/**
 * Output post more of layout.
 *
 * @param array  $options The options.
 * @param string $prefix  The field prefix.
 */
function cnvs_block_post_more( $options, $prefix = null ) {

	$prefix = $prefix ? sprintf( '%s_', $prefix ) : null;

	if ( isset( $options[ $prefix . 'display_more_button' ] ) && $options[ $prefix . 'display_more_button' ] ) {
		?>
		<div class="cs-entry__read-more">
			<a href="<?php the_permalink(); ?>">
				<?php echo esc_html( apply_filters( 'csco_filter_label_more', $options[ $prefix . 'more_button_label' ] ) ); ?>
			</a>
		</div>
		<?php
	}
}

if ( ! function_exists( 'cnvs_block_post_details' ) ) {
	/**
	 * Output post details
	 *
	 * @param array  $options        The options.
	 * @param string $prefix         The field prefix.
	 * @param bool   $readmore       Display readmore.
	 * @param string $share_location The location share meta.
	 * @param array  $settings       The settings.
	 */
	function cnvs_block_post_details( $options = array(), $prefix = null, $readmore = null, $share_location = null, $settings = array() ) {
		$prefix = $prefix ? sprintf( '%s_', $prefix ) : null;

		$post_meta = array();

		if ( isset( $options[ $prefix . 'display_meta_author' ] ) && $options[ $prefix . 'display_meta_author' ] ) {
			$post_meta[] = 'author';
		}
		if ( isset( $options[ $prefix . 'display_meta_date' ] ) && $options[ $prefix . 'display_meta_date' ] ) {
			$post_meta[] = 'date';
		}
		if ( isset( $options[ $prefix . 'display_more_button' ] ) && $options[ $prefix . 'display_more_button' ] && null === $readmore ) {
			$readmore = true;
		}
		if ( isset( $options[ $prefix . 'more_button_label' ] ) && $options[ $prefix . 'more_button_label' ] ) {
			$settings['readmore_label'] = $options[ $prefix . 'more_button_label' ];
		}

		$readmore = null !== $readmore ? $readmore : false;

		csco_entry_details( $post_meta, $readmore, $share_location, $settings );
	}
}
