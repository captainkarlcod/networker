<?php
/**
 * Powerkit Filters
 *
 * @package Networker
 */

/**
 * Register Social Links Templates
 *
 * @param array $templates List of Templates.
 */
function csco_powerkit_social_links_templates( $templates = array() ) {

	$new = array(
		'inline-alt' => array(
			'name' => 'Inline Alt',
		),
	);

	$templates = array_slice( $templates, 0, 1, true ) + $new + array_slice( $templates, 1, null, true );

	return $templates;
}

add_filter( 'powerkit_social_links_templates', 'csco_powerkit_social_links_templates', 99 );

/**
 * New Share Buttons Locations
 *
 * @param array $locations List of Locations.
 */
function csco_powerkit_new_share_buttons_locations( $locations = array() ) {

	$locations['after-post'] = array(
		'shares'         => array( 'facebook', 'twitter', 'pinterest' ),
		'name'           => esc_html__( 'After Post Content', 'networker' ),
		'location'       => 'after-post',
		'mode'           => 'mixed',
		'before'         => '',
		'after'          => '',
		'display'        => true,
		'fields'         => array(
			'display_total'   => true,
			'display_count'   => true,
			'schemes'         => array( 'default', 'bold', 'bold-bg', 'simple-light', 'bold-light' ),
			'count_locations' => array( 'inside' ),
		),
		'layout'         => 'simple',
		'scheme'         => 'simple-light',
		'count_location' => 'inside',
	);

	$locations['metabar-post'] = array(
		'shares'         => array( 'facebook', 'twitter', 'pinterest' ),
		'name'           => esc_html__( 'Entry Metabar', 'networker' ),
		'location'       => 'metabar-post',
		'mode'           => 'mixed',
		'before'         => '',
		'after'          => '',
		'display'        => true,
		'meta'           => array(
			'icons'  => true,
			'titles' => false,
			'labels' => false,
		),
		// Display only the specified layouts and color schemes.
		'fields'         => array(
			'display_total'   => true,
			'display_count'   => true,
			'layouts'         => array( 'simple' ),
			'schemes'         => array( 'simple-light', 'bold-light' ),
			'count_locations' => array( 'inside' ),
		),
		'layout'         => 'simple',
		'scheme'         => 'simple-light',
		'count_location' => 'inside',
	);

	$locations['post-meta'] = array(
		'shares'         => array( 'facebook', 'twitter', 'pinterest' ),
		'name'           => esc_html__( 'Post Meta', 'networker' ),
		'location'       => 'post-meta',
		'mode'           => 'cached',
		'before'         => '',
		'after'          => '',
		'display'        => true,
		'meta'           => array(
			'icons'  => true,
			'titles' => false,
			'labels' => false,
		),
		// Display only the specified layouts and color schemes.
		'fields'         => array(
			'layouts'         => array( 'simple' ),
			'schemes'         => array( 'simple-light', 'bold-light' ),
			'count_locations' => array( 'inside' ),
		),
		'display_total'  => false,
		'layout'         => 'simple',
		'scheme'         => 'simple-light',
		'count_location' => 'inside',
	);

	$locations['post-header'] = array(
		'shares'         => array( 'facebook', 'twitter', 'pinterest' ),
		'name'           => esc_html__( 'Post Header', 'networker' ),
		'location'       => 'post-header',
		'mode'           => 'mixed',
		'before'         => '',
		'after'          => '',
		'display'        => true,
		'meta'           => array(
			'icons'  => true,
			'titles' => false,
			'labels' => false,
		),
		// Display only the specified layouts and color schemes.
		'fields'         => array(
			'display_total'   => true,
			'display_count'   => true,
			'layouts'         => array( 'simple' ),
			'schemes'         => array( 'simple-light', 'bold-light' ),
			'count_locations' => array( 'inside' ),
		),
		'display_total'  => false,
		'layout'         => 'simple',
		'scheme'         => 'simple-light',
		'count_location' => 'inside',
	);

	return $locations;
}

add_filter( 'powerkit_share_buttons_locations', 'csco_powerkit_new_share_buttons_locations' );

/**
 * Change Share Buttons Locations
 *
 * @param array $locations List of Locations.
 */
function csco_powerkit_change_share_buttons_locations( $locations = array() ) {

	unset( $locations['before-content'] );
	unset( $locations['after-content'] );

	$locations['highlight-text'] = array(
		'shares'        => array( 'facebook', 'twitter', 'pinterest', 'mail' ),
		'name'          => '⚡ Highlight Text',
		'location'      => 'highlight-text',
		'mode'          => 'none',
		'before'        => '',
		'after'         => '',
		'meta'          => array(
			'icons'  => true,
			'titles' => false,
			'labels' => false,
		),
		'fields'        => array(
			'display_total'   => false,
			'display_count'   => false,
			'title_locations' => array(),
			'count_locations' => array(),
			'label_locations' => array(),
			'layouts'         => array( 'simple' ),
			'schemes'         => array( 'simple-light', 'bold-light' ),
		),
		'display_total' => false,
		'layout'        => 'simple',
		'scheme'        => 'simple-light',
		'attrs'         => 'data-scheme="default"',
	);

	$locations['blockquote'] = array(
		'shares'        => array( 'facebook', 'twitter' ),
		'name'          => '⭐ Blockquote',
		'location'      => 'blockquote',
		'mode'          => 'none',
		'before'        => '',
		'after'         => '',
		'meta'          => array(
			'icons'  => true,
			'titles' => false,
			'labels' => true,
		),
		'fields'        => array(
			'display_total'   => false,
			'display_count'   => false,
			'title_locations' => array(),
			'count_locations' => array(),
			'label_locations' => array(),
			'layouts'         => array( 'simple' ),
			'schemes'         => array( 'simple-light', 'bold-light' ),
		),
		'display_total' => false,
		'layout'        => 'simple',
		'scheme'        => 'simple-light',
	);

	$locations['mobile-share'] = array(
		'shares'   => array( 'facebook', 'pinterest', 'twitter', 'mail' ),
		'name'     => '📱 Mobile Share',
		'location' => 'mobile-share',
		'mode'     => 'none',
		'before'   => '',
		'after'    => '',
		'meta'     => array(
			'icons'  => true,
			'titles' => false,
			'labels' => false,
		),
		'fields'   => array(
			'display_total'   => false,
			'display_count'   => true,
			'title_locations' => array(),
			'count_locations' => array(),
			'label_locations' => array(),
			'schemes'         => array( 'default', 'simple-dark-back', 'bold-bg', 'bold' ),
			'layouts'         => array( 'horizontal', 'left-side', 'right-side', 'popup' ),
		),
		'layout'   => 'horizontal',
	);

	return $locations;
}

add_filter( 'powerkit_share_buttons_locations', 'csco_powerkit_change_share_buttons_locations', 9999 );

/**
 * Register Floated Share Buttons Location
 */
function csco_powerkit_widget_author_image_size() {
	return 'csco-thumbnail-uncropped';
}

add_filter( 'powerkit_widget_author_image_size', 'csco_powerkit_widget_author_image_size' );

/**
 * Change Contributors widget post author description length.
 */
function csco_powerkit_widget_contributors_description_length() {
	return 80;
}

add_filter( 'powerkit_widget_contributors_description_length', 'csco_powerkit_widget_contributors_description_length' );


/**
 * Change Default Template for featured posts
 *
 * @param array $templates The templates.
 */
function csco_powerkit_featured_posts_default( $templates = array() ) {

	$templates['list']['func']     = 'csco_powerkit_featured_default_template';
	$templates['numbered']['func'] = 'csco_powerkit_featured_default_template';
	$templates['large']['func']    = 'csco_powerkit_featured_default_template';

	$templates['tile'] = array(
		'name' => esc_html__( 'Tile', 'networker' ),
		'func' => 'csco_powerkit_featured_default_template',
	);

	return $templates;
}

add_filter( 'powerkit_featured_posts_templates', 'csco_powerkit_featured_posts_default' );

/**
 * Add new settings to Widget Posts
 *
 * @param array $settings The settings.
 */
function csco_powerkit_widget_posts_settings( $settings ) {

	$settings = array_merge(
		$settings,
		array(
			'image_orientation'  => 'square',
			'image_size'         => 'csco-smaller',
			'image_radius'       => '',
			'post_meta'          => array( 'category', 'author' ),
			'post_meta_category' => true,
		)
	);

	return $settings;
}

add_filter( 'powerkit_widget_posts_settings', 'csco_powerkit_widget_posts_settings' );

/**
 * Add new field to Widget Posts
 *
 * @param object $context  The context.
 * @param array  $params   The params.
 * @param array  $instance Current settings.
 */
function csco_powerkit_widget_posts_form_after( $context, $params, $instance ) {
	$image_sizes = csco_get_list_available_image_sizes();
	?>
	<!-- Image Orientation -->
	<p>
		<label for="<?php echo esc_attr( $context->get_field_id( 'image_orientation' ) ); ?>"><?php esc_html_e( 'Image Orientation', 'networker' ); ?>
			:</label>
		<select name="<?php echo esc_attr( $context->get_field_name( 'image_orientation' ) ); ?>" id="<?php echo esc_attr( $context->get_field_id( 'image_orientation' ) ); ?>" class="widefat">
			<option value="original" <?php selected( $params['image_orientation'], 'original' ); ?>><?php esc_html_e( 'Original', 'networker' ); ?></option>
			<option value="landscape" <?php selected( $params['image_orientation'], 'landscape' ); ?>><?php esc_html_e( 'Landscape', 'networker' ); ?></option>
			<option value="portrait" <?php selected( $params['image_orientation'], 'portrait' ); ?>><?php esc_html_e( 'Portrait', 'networker' ); ?></option>
			<option value="square" <?php selected( $params['image_orientation'], 'square' ); ?>><?php esc_html_e( 'Square', 'networker' ); ?></option>
		</select>
	</p>

	<!-- Images Size -->
	<p>
		<label for="<?php echo esc_attr( $context->get_field_id( 'image_size' ) ); ?>"><?php esc_html_e( 'Images Size', 'networker' ); ?>
			:</label>
		<select name="<?php echo esc_attr( $context->get_field_name( 'image_size' ) ); ?>" id="<?php echo esc_attr( $context->get_field_id( 'image_size' ) ); ?>" class="widefat">
			<?php foreach ( $image_sizes as $key => $size ) { ?>
				<option value="<?php echo esc_attr( $key ); ?>" <?php selected( $params['image_size'], $key ); ?>><?php echo esc_html( $size ); ?></option>
			<?php } ?>
		</select>
	</p>

	<!-- Image Border Radius -->
	<p>
		<label for="<?php echo esc_attr( $context->get_field_id( 'image_radius' ) ); ?>"><?php esc_html_e( 'Image Border Radius', 'networker' ); ?>
			:</label>
		<input class="widefat" id="<?php echo esc_attr( $context->get_field_id( 'image_radius' ) ); ?>" class="checkbox" name="<?php echo esc_attr( $context->get_field_name( 'image_radius' ) ); ?>" type="text" value="<?php echo esc_attr( $params['image_radius'] ); ?>"/>
	</p>
	<?php
}

add_action( 'powerkit_widget_posts_form_after', 'csco_powerkit_widget_posts_form_after', 10, 3 );

/**
 * Featured Default Template Callback
 *
 * @param array $posts    Array of posts.
 * @param array $params   Array of params.
 * @param array $instance Widget instance.
 */
function csco_powerkit_featured_default_template( $posts, $params, $instance ) {

	$style = null;

	if ( $params['image_radius'] ) {
		$style = sprintf( '--cs-image-border-radius: %s;', $params['image_radius'] );
	}

	if ( 'list' === $params['template'] ) {
		?>
		<article <?php post_class(); ?> style="<?php echo esc_attr( $style ); ?>">
			<div class="cs-entry__outer">
				<?php if ( has_post_thumbnail() ) { ?>
					<div class="cs-entry__inner cs-entry__thumbnail cs-overlay-ratio cs-ratio-<?php echo esc_attr( $params['image_orientation'] ); ?>">
						<div class="cs-overlay-background cs-overlay-transparent">
							<?php the_post_thumbnail( $params['image_size'] ); ?>
						</div>

						<a class="cs-overlay-link" href="<?php echo esc_url( get_permalink() ); ?>"></a>
					</div>
				<?php } ?>

				<div class="cs-entry__inner cs-entry__content">
					<?php csco_get_post_meta( array( 'category' ), (bool) $params['post_meta_compact'], true, $params['post_meta'] ); ?>

					<h3 class="cs-entry__title">
						<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					</h3>

					<?php csco_get_post_meta( array( 'author', 'date', 'views', 'shares', 'reading_time', 'comments' ), (bool) $params['post_meta_compact'], true, $params['post_meta'] ); ?>
				</div>
			</div>
		</article>
		<?php

	} elseif ( 'numbered' === $params['template'] ) {
		?>
		<article <?php post_class(); ?> style="<?php echo esc_attr( $style ); ?>">
			<div class="cs-entry__outer">
				<?php if ( has_post_thumbnail() ) { ?>
					<div class="cs-entry__inner cs-entry__thumbnail cs-overlay-ratio cs-ratio-<?php echo esc_attr( $params['image_orientation'] ); ?>">
						<div class="cs-overlay-background cs-overlay-transparent">
							<?php the_post_thumbnail( $params['image_size'] ); ?>
						</div>

						<a class="cs-overlay-link" href="<?php echo esc_url( get_permalink() ); ?>"></a>
					</div>
				<?php } ?>

				<div class="cs-entry__inner cs-entry__content">
					<?php csco_get_post_meta( array( 'category' ), (bool) $params['post_meta_compact'], true, $params['post_meta'] ); ?>

					<h3 class="cs-entry__title">
						<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					</h3>

					<?php csco_get_post_meta( array( 'author', 'date', 'views', 'shares', 'reading_time', 'comments' ), (bool) $params['post_meta_compact'], true, $params['post_meta'] ); ?>
				</div>
			</div>
		</article>
		<?php
	} elseif ( 'large' === $params['template'] ) {
		?>
		<article <?php post_class(); ?> style="<?php echo esc_attr( $style ); ?>">
			<div class="cs-entry__outer">
				<?php
				if ( has_post_thumbnail() ) {
					$params['thumbnail_meta'] = csco_get_post_meta( array( 'views', 'comments', 'shares', 'reading_time' ), false, false, $params['post_meta'] );
					?>
					<div class="cs-entry__inner cs-entry__thumbnail cs-entry__overlay cs-overlay-ratio cs-ratio-<?php echo esc_attr( $params['image_orientation'] ); ?>" data-scheme="inverse">

						<?php if ( $params['thumbnail_meta'] ) { ?>
							<div class="cs-overlay-background">
								<?php the_post_thumbnail( $params['image_size'] ); ?>
							</div>

							<div class="cs-overlay-content">
								<?php csco_get_post_meta( array( 'views', 'comments', 'shares', 'reading_time' ), $params['post_meta_compact'], true, $params['post_meta'] ); ?>
							</div>
						<?php } else { ?>
							<div class="cs-overlay-background cs-overlay-transparent">
								<?php the_post_thumbnail( $params['image_size'] ); ?>
							</div>
						<?php } ?>

						<?php csco_get_video_background( 'archive' ); ?>

						<?php csco_the_post_format_icon(); ?>

						<a href="<?php echo esc_url( get_permalink() ); ?>" class="cs-overlay-link"></a>
					</div>
				<?php } ?>

				<div class="cs-entry__inner cs-entry__content">

					<?php csco_get_post_meta( array( 'category' ), false, true, $params['post_meta'] ); ?>

					<?php the_title( '<h2 class="cs-entry__title"><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' ); ?>

					<?php csco_entry_details( $params['post_meta'], true ); ?>
				</div>
			</div>
		</article>
		<?php
	} elseif ( 'tile' === $params['template'] ) {
		$params['image_orientation'] = str_replace( 'original', 'default', $params['image_orientation'] );

		$meta_transform = csco_get_post_meta( array( 'views', 'comments', 'shares', 'reading_time' ), false, false, $params['post_meta'] );

		$meta_transform = $meta_transform ? 'cs-entry__data-transform' : null;
		?>
		<article <?php post_class(); ?> style="<?php echo esc_attr( $style ); ?>">
			<div class="cs-entry__outer cs-entry__overlay cs-overlay-ratio cs-ratio-<?php echo esc_attr( $params['image_orientation'] ); ?>" data-scheme="inverse">
				<?php if ( has_post_thumbnail() ) { ?>
					<div class="cs-entry__inner cs-entry__thumbnail">
						<div class="cs-overlay-background">
							<?php the_post_thumbnail( $params['image_size'] ); ?>
						</div>
					</div>
				<?php } ?>

				<div class="cs-entry__inner cs-overlay-content cs-entry__content">
					<?php csco_entry_details( $params['post_meta'], null, false ); ?>

					<div class="cs-entry__data <?php echo esc_attr( $meta_transform ); ?>">
						<?php csco_get_post_meta( array( 'category' ), false, true, $params['post_meta'] ); ?>

						<?php the_title( '<h2 class="cs-entry__title">', '</h2>' ); ?>

						<div class="cs-entry__bottom">
							<?php csco_get_post_meta( array( 'views', 'comments', 'shares', 'reading_time' ), $params['post_meta_compact'], true, $params['post_meta'] ); ?>
						</div>

						<a href="<?php echo esc_url( get_permalink() ); ?>" class="cs-overlay-link"></a>
					</div>

				</div>

				<a href="<?php echo esc_url( get_permalink() ); ?>" class="cs-overlay-link"></a>
			</div>
		</article>
		<?php
	}
}

/**
 * Change tiles featured categories
 *
 * @param string $locations List locations.
 */
function csco_powerkit_featured_categories_locations( $locations ) {
	$image_sizes = powerkit_get_list_available_image_sizes();

	$locations['tiles'] = array(
		'name'        => esc_html__( 'Tiles', 'networker' ),
		'icon'        => '<svg width="52" height="44" xmlns="http://www.w3.org/2000/svg"><g transform="translate(1 1)" stroke="#2D2D2D" fill="none" fill-rule="evenodd"><rect stroke-width="1.5" width="50" height="42" rx="3"/><g transform="translate(7 9)"><rect stroke-width="1.5" width="36" height="24" rx="1"/><path d="M11 10.5h14m-11 3h9" stroke-linecap="round" stroke-linejoin="round"/></g></g></svg>',
		'location'    => array(),
		'template'    => get_template_directory() . '/template-parts/blocks/categories-tiles.php',
		'sections'    => array(
			'general'    => array(
				'title'    => esc_html__( 'Block Settings', 'networker' ),
				'priority' => 5,
				'open'     => true,
			),
			'typography' => array(
				'title'    => esc_html__( 'Typography Settings', 'networker' ),
				'priority' => 10,
			),
		),
		'hide_fields' => array(
			'number',
			'bgOverlay',
			'bgOpacityOverlay',
		),
		'fields'      => array(
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
						'element'  => '$ .cs-tiles-categories__wrap',
						'property' => '--cs-categories-grid-columns',
						'suffix'   => '!important',
					),
				),
			),
			array(
				'key'            => 'gap_posts',
				'label'          => esc_html__( 'Gap between Categories', 'networker' ),
				'type'           => 'dimension',
				'section'        => 'general',
				'responsive'     => true,
				'default'        => '40px',
				'default_tablet' => '40px',
				'default_mobile' => '40px',
				'output'         => array(
					array(
						'element'  => '$ .cs-tiles-categories__wrap',
						'property' => '--cs-categories-grid-gap',
						'suffix'   => '!important',
					),
				),
			),
			array(
				'key'     => 'descriptionLength',
				'label'   => esc_html__( 'Description length', 'networker' ),
				'section' => 'general',
				'type'    => 'number',
				'step'    => 1,
				'min'     => 0,
				'max'     => 1000,
				'default' => 200,
			),
			array(
				'key'      => 'orientation',
				'label'    => esc_html__( 'Image Orientation', 'networker' ),
				'section'  => 'general',
				'type'     => 'select',
				'multiple' => false,
				'choices'  => array(
					'landscape'      => esc_html__( 'Landscape 4:3', 'networker' ),
					'landscape-3-2'  => esc_html__( 'Landscape 3:2', 'networker' ),
					'landscape-16-9' => esc_html__( 'Landscape 16:9', 'networker' ),
					'portrait'       => esc_html__( 'Portrait 3:4', 'networker' ),
					'portrait-2-3'   => esc_html__( 'Portrait 2:3', 'networker' ),
					'square'         => esc_html__( 'Square', 'networker' ),
				),
				'default'  => 'square',
			),
			array(
				'key'     => 'image_size',
				'label'   => esc_html__( 'Image Size', 'networker' ),
				'section' => 'general',
				'type'    => 'select',
				'default' => 'large',
				'choices' => $image_sizes,
			),
			// Typography.
			array(
				'key'        => 'typography_heading',
				'label'      => esc_html__( 'Heading Font Size', 'networker' ),
				'section'    => 'typography',
				'type'       => 'dimension',
				'default'    => '1.5rem',
				'responsive' => true,
				'output'     => array(
					array(
						'element'  => '$ .cs-tiles-categories__name',
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
		),
	);

	return $locations;
}

add_filter( 'powerkit_featured_categories_locations', 'csco_powerkit_featured_categories_locations' );

/**
 * Simplify widget title
 *
 * @param string $widget_title Widget title.
 * @param string $title        Title.
 */
function csco_powerkit_simplify_widget_title( $widget_title, $title ) {
	$title = csco_add_support_subheadings_style( $title );

	$widget_title = sprintf( '<h5 class="pk-main-title">%s</h5>', $title );

	return $widget_title;
}

add_filter( 'powerkit_widget_about_title', 'csco_powerkit_simplify_widget_title', 10, 2 );
add_filter( 'powerkit_widget_author_title', 'csco_powerkit_simplify_widget_title', 10, 2 );

/**
 * Add exclude selectors of TOC
 *
 * @param string $list List selectors.
 */
function csco_powerkit_toc_exclude_selectors( $list ) {
	$list .= '|.cs-entry__title';

	return $list;
}

add_filter( 'pk_toc_exclude', 'csco_powerkit_toc_exclude_selectors' );

/**
 * Register instagram layouts
 *
 * @param array $layouts List of layouts.
 */
function csco_canvas_register_instagram_layouts( $layouts ) {
	$layouts['default'] = array(
		'name' => esc_html__( 'Default', 'networker' ),
		'icon' => '
			<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
				<path d="M12 4.622c2.403 0 2.688.01 3.637.052.877.04 1.354.187 1.67.31.42.163.72.358 1.036.673.315.315.51.615.673 1.035.123.317.27.794.31 1.67.043.95.052 1.235.052 3.638s-.01 2.688-.052 3.637c-.04.877-.187 1.354-.31 1.67-.163.42-.358.72-.673 1.036-.315.315-.615.51-1.035.673-.317.123-.794.27-1.67.31-.95.043-1.234.052-3.638.052s-2.688-.01-3.637-.052c-.877-.04-1.354-.187-1.67-.31-.42-.163-.72-.358-1.036-.673-.315-.315-.51-.615-.673-1.035-.123-.317-.27-.794-.31-1.67-.043-.95-.052-1.235-.052-3.638s.01-2.688.052-3.637c.04-.877.187-1.354.31-1.67.163-.42.358-.72.673-1.036.315-.315.615-.51 1.035-.673.317-.123.794-.27 1.67-.31.95-.043 1.235-.052 3.638-.052M12 3c-2.444 0-2.75.01-3.71.054s-1.613.196-2.185.418c-.592.23-1.094.538-1.594 1.04-.5.5-.807 1-1.037 1.593-.223.572-.375 1.226-.42 2.184C3.01 9.25 3 9.555 3 12s.01 2.75.054 3.71.196 1.613.418 2.186c.23.592.538 1.094 1.038 1.594s1.002.808 1.594 1.038c.572.222 1.227.375 2.185.418.96.044 1.266.054 3.71.054s2.75-.01 3.71-.054 1.613-.196 2.186-.418c.592-.23 1.094-.538 1.594-1.038s.808-1.002 1.038-1.594c.222-.572.375-1.227.418-2.185.044-.96.054-1.266.054-3.71s-.01-2.75-.054-3.71-.196-1.613-.418-2.186c-.23-.592-.538-1.094-1.038-1.594s-1.002-.808-1.594-1.038c-.572-.222-1.227-.375-2.185-.418C14.75 3.01 14.445 3 12 3zm0 4.378c-2.552 0-4.622 2.07-4.622 4.622s2.07 4.622 4.622 4.622 4.622-2.07 4.622-4.622S14.552 7.378 12 7.378zM12 15c-1.657 0-3-1.343-3-3s1.343-3 3-3 3 1.343 3 3-1.343 3-3 3zm4.804-8.884c-.596 0-1.08.484-1.08 1.08s.484 1.08 1.08 1.08c.596 0 1.08-.484 1.08-1.08s-.483-1.08-1.08-1.08z" />
			</svg>
		',
	);

	$layouts['slider'] = array(
		'name'        => esc_html__( 'Slider', 'networker' ),
		'icon'        => '
			<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
				<path d="M12 4.622c2.403 0 2.688.01 3.637.052.877.04 1.354.187 1.67.31.42.163.72.358 1.036.673.315.315.51.615.673 1.035.123.317.27.794.31 1.67.043.95.052 1.235.052 3.638s-.01 2.688-.052 3.637c-.04.877-.187 1.354-.31 1.67-.163.42-.358.72-.673 1.036-.315.315-.615.51-1.035.673-.317.123-.794.27-1.67.31-.95.043-1.234.052-3.638.052s-2.688-.01-3.637-.052c-.877-.04-1.354-.187-1.67-.31-.42-.163-.72-.358-1.036-.673-.315-.315-.51-.615-.673-1.035-.123-.317-.27-.794-.31-1.67-.043-.95-.052-1.235-.052-3.638s.01-2.688.052-3.637c.04-.877.187-1.354.31-1.67.163-.42.358-.72.673-1.036.315-.315.615-.51 1.035-.673.317-.123.794-.27 1.67-.31.95-.043 1.235-.052 3.638-.052M12 3c-2.444 0-2.75.01-3.71.054s-1.613.196-2.185.418c-.592.23-1.094.538-1.594 1.04-.5.5-.807 1-1.037 1.593-.223.572-.375 1.226-.42 2.184C3.01 9.25 3 9.555 3 12s.01 2.75.054 3.71.196 1.613.418 2.186c.23.592.538 1.094 1.038 1.594s1.002.808 1.594 1.038c.572.222 1.227.375 2.185.418.96.044 1.266.054 3.71.054s2.75-.01 3.71-.054 1.613-.196 2.186-.418c.592-.23 1.094-.538 1.594-1.038s.808-1.002 1.038-1.594c.222-.572.375-1.227.418-2.185.044-.96.054-1.266.054-3.71s-.01-2.75-.054-3.71-.196-1.613-.418-2.186c-.23-.592-.538-1.094-1.038-1.594s-1.002-.808-1.594-1.038c-.572-.222-1.227-.375-2.185-.418C14.75 3.01 14.445 3 12 3zm0 4.378c-2.552 0-4.622 2.07-4.622 4.622s2.07 4.622 4.622 4.622 4.622-2.07 4.622-4.622S14.552 7.378 12 7.378zM12 15c-1.657 0-3-1.343-3-3s1.343-3 3-3 3 1.343 3 3-1.343 3-3 3zm4.804-8.884c-.596 0-1.08.484-1.08 1.08s.484 1.08 1.08 1.08c.596 0 1.08-.484 1.08-1.08s-.483-1.08-1.08-1.08z" />
			</svg>
		',
		'location'    => array(),
		'sections'    => array(),
		'hide_fields' => array(
			'columns',
		),
		'fields'      => array(),
		'template'    => get_template_directory() . '/template-parts/blocks/instagram-slider.php',
	);

	return $layouts;
}

add_filter( 'canvas_block_layouts_canvas/instagram', 'csco_canvas_register_instagram_layouts' );

/**
 * Add Instagram placeholder containers
 *
 * @param array $containers The containers.
 */
function csco_powerkit_instagram_placeholder_containers( $containers = array() ) {
	$containers[] = 'pk-slider-instagram-items';
	$containers[] = 'pk-alt-instagram-items';

	return $containers;
}

add_filter( 'powerkit_instagram_placeholder_containers', 'csco_powerkit_instagram_placeholder_containers' );

/**
 * Add Instagram Slider Template
 *
 * @param array $templates The templates.
 */
function csco_slider_register_instagram_template( $templates = array() ) {
	$templates['slider'] = array(
		'name' => esc_html__( 'Slider', 'networker' ),
		'func' => 'csco_powerkit_instagram_slider_template',
	);

	return $templates;
}

add_filter( 'powerkit_instagram_templates', 'csco_slider_register_instagram_template' );

/**
 * Instagram Slider Callback Function Template
 *
 * @param array $feed      The instagram feed.
 * @param array $instagram The instagram items.
 * @param array $params    The user parameters.
 */
function csco_powerkit_instagram_slider_template( $feed, $instagram, $params ) {

	if ( is_array( $instagram ) && $instagram ) {
		?>

		<?php if ( $params['header'] ) { ?>
			<div class="pk-instagram-header">
				<div class="pk-instagram-container">
					<?php if ( $feed['avatar_1x'] ) { ?>
						<a href="<?php echo esc_url( sprintf( 'https://www.instagram.com/%s/', $feed['username'] ) ); ?>" class="pk-avatar-link" target="<?php echo esc_attr( $params['target'] ); ?>">
							<?php
							$image_avatar = sprintf(
								'<img src="%s" alt="avatar" class="pk-instagram-avatar">',
								esc_url( $feed['avatar_1x'] )
							);

							echo wp_kses_post( apply_filters( 'powerkit_lazy_process_images', $image_avatar ) );
							?>
						</a>
					<?php } ?>

					<?php $tag = apply_filters( 'powerkit_instagram_username_tag', 'h6' ); ?>

					<div class="pk-instagram-info">
						<?php if ( $feed['name'] !== $feed['username'] ) { ?>
						<<?php echo esc_html( $tag ); ?> class="pk-instagram-username pk-title pk-font-heading">
						<a href="<?php echo esc_url( sprintf( 'https://www.instagram.com/%s/', $feed['username'] ) ); ?>" target="<?php echo esc_attr( $params['target'] ); ?>">
							<?php echo wp_kses_post( $feed['username'] ); ?>
						</a>
					</<?php echo esc_html( $tag ); ?>>
				<?php } ?>

					<?php if ( $feed['name'] ) { ?>
						<span class="pk-instagram-name pk-color-secondary">
							<a href="<?php echo esc_url( sprintf( 'https://www.instagram.com/%s/', $feed['username'] ) ); ?>" target="<?php echo esc_attr( $params['target'] ); ?>">
								<?php echo esc_html( $feed['name'] ); ?>
							</a>
						</span>
					<?php } ?>
				</div>
			</div>

			<?php if ( is_int( $feed['following'] ) || is_int( $feed['followers'] ) ) { ?>
				<div class="pk-instagram-counters pk-color-secondary">
					<?php if ( is_int( $feed['following'] ) ) { ?>
						<div class="counter following">
							<span class="number"><?php echo esc_html( powerkit_abridged_number( $feed['following'], 0 ) ); ?></span> <?php esc_html_e( 'Following', 'networker' ); ?>
						</div>
					<?php } ?>

					<?php if ( is_int( $feed['followers'] ) ) { ?>
						<div class="counter followers">
							<span class="number"><?php echo esc_html( powerkit_abridged_number( $feed['followers'], 0 ) ); ?></span> <?php esc_html_e( 'Followers', 'networker' ); ?>
						</div>
					<?php } ?>
				</div>
			<?php } ?>
			</div>
		<?php } ?>

		<div class="pk-slider-instagram-items">
		<?php foreach ( $instagram as $key => $item ) { ?>

			<?php if ( 0 === $key % 2 ) { ?>
				<div class="pk-instagram-cell">

				<div class="pk-instagram-item first">
					<a class="pk-instagram-link" href="<?php echo esc_url( $item['user_link'] ); ?>" target="<?php echo esc_attr( $params['target'] ); ?>">
						<img src="<?php echo esc_attr( $item['user_image'] ); ?>" class="<?php echo esc_attr( $item['class'] ); ?>" alt="<?php echo esc_html( $item['description'] ); ?>" srcset="<?php echo esc_attr( $item['srcset'] ); ?>" sizes="<?php echo esc_attr( $item['sizes'] ); ?>">

						<?php if ( is_int( $item['likes'] ) || is_int( $item['comments'] ) ) { ?>
							<span class="pk-instagram-data">
										<span class="pk-instagram-meta">
											<?php if ( is_int( $item['likes'] ) ) { ?>
												<span class="pk-meta pk-meta-likes"><i class="pk-icon pk-icon-like"></i> <?php echo esc_attr( powerkit_abridged_number( $item['likes'] ) ); ?></span>
											<?php } ?>

											<?php if ( is_int( $item['comments'] ) ) { ?>
												<span class="pk-meta pk-meta-comments"><i class="pk-icon pk-icon-comment"></i> <?php echo esc_attr( powerkit_abridged_number( $item['comments'] ) ); ?></span>
											<?php } ?>
										</span>
									</span>
						<?php } ?>
					</a>
				</div>

			<?php } else { ?>

				<div class="pk-instagram-item second">
					<a class="pk-instagram-link" href="<?php echo esc_url( $item['user_link'] ); ?>" target="<?php echo esc_attr( $params['target'] ); ?>">
						<img src="<?php echo esc_attr( $item['user_image'] ); ?>" class="<?php echo esc_attr( $item['class'] ); ?>" alt="<?php echo esc_html( $item['description'] ); ?>" srcset="<?php echo esc_attr( $item['srcset'] ); ?>" sizes="<?php echo esc_attr( $item['sizes'] ); ?>">

						<?php if ( is_int( $item['likes'] ) || is_int( $item['comments'] ) ) { ?>
							<span class="pk-instagram-data">
										<span class="pk-instagram-meta">
											<?php if ( is_int( $item['likes'] ) ) { ?>
												<span class="pk-meta pk-meta-likes"><i class="pk-icon pk-icon-like"></i> <?php echo esc_attr( powerkit_abridged_number( $item['likes'] ) ); ?></span>
											<?php } ?>

											<?php if ( is_int( $item['comments'] ) ) { ?>
												<span class="pk-meta pk-meta-comments"><i class="pk-icon pk-icon-comment"></i> <?php echo esc_attr( powerkit_abridged_number( $item['comments'] ) ); ?></span>
											<?php } ?>
										</span>
									</span>
						<?php } ?>
					</a>
				</div>

				</div>
			<?php } ?>

			<?php if ( 0 !== count( $instagram ) % 2 ) { ?>
				</div>
			<?php } ?>

		<?php } ?>
		</div>

		<?php if ( $params['button'] ) { ?>
			<div class="pk-instagram-footer">
				<a class="pk-instagram-btn button" href="<?php echo esc_url( sprintf( 'https://www.instagram.com/%s/', $feed['username'] ) ); ?>" target="<?php echo esc_attr( $params['target'] ); ?>">
					<span class="pk-instagram-follow"><?php echo wp_kses( apply_filters( 'powerkit_instagram_follow', esc_html__( 'Follow', 'networker' ) ), 'post' ); ?></span>
				</a>
			</div>
		<?php } ?>

		<?php
	}
}

/**
 * Footer Register Instagram Template
 *
 * @param array $templates List of Templates.
 *
 * @since    1.0.0
 * @access   private
 *
 */
function csco_footer_instagram_default( $templates = array() ) {

	$templates['default']['func'] = 'csco_footer_instagram_template';

	return $templates;
}

/**
 * Footer Instagram Template
 *
 * @param array $feed      The instagram feed.
 * @param array $instagram The instagram items.
 * @param array $params    The user parameters.
 */
function csco_footer_instagram_template( $feed, $instagram, $params ) {

	if ( is_array( $instagram ) && $instagram ) {
		?>
		<div class="cs-container">
		<?php if ( $params['header'] ) { ?>
			<div class="pk-instagram-header">
				<?php
				csco_section_heading( get_theme_mod( 'footer_instagram_title', esc_html__( '[[Our Latest]] Instagram Posts', 'networker' ) ) );
				?>

				<div class="pk-instagram-container">
					<?php if ( $feed['avatar_1x'] ) { ?>
						<a href="<?php echo esc_url( sprintf( 'https://www.instagram.com/%s/', $feed['username'] ) ); ?>" class="pk-avatar-link" target="<?php echo esc_attr( $params['target'] ); ?>">
							<?php
							$image_avatar = sprintf(
								'<img src="%s" alt="avatar" class="pk-instagram-avatar">',
								esc_url( $feed['avatar_1x'] )
							);

							echo wp_kses_post( apply_filters( 'powerkit_lazy_process_images', $image_avatar ) );
							?>
						</a>
					<?php } ?>

					<?php $tag = apply_filters( 'powerkit_instagram_username_tag', 'h6' ); ?>

					<div class="pk-instagram-info">
						<?php if ( $feed['name'] !== $feed['username'] ) { ?>
						<<?php echo esc_html( $tag ); ?> class="pk-instagram-username">
						<a href="<?php echo esc_url( sprintf( 'https://www.instagram.com/%s/', $feed['username'] ) ); ?>" target="<?php echo esc_attr( $params['target'] ); ?>">
							@<?php echo wp_kses_post( $feed['username'] ); ?>
						</a>
					</<?php echo esc_html( $tag ); ?>>
				<?php } ?>

					<?php if ( is_int( $feed['following'] ) || is_int( $feed['followers'] ) ) { ?>
						<div class="pk-instagram-counters pk-color-secondary">
							<?php if ( is_int( $feed['following'] ) ) { ?>
								<div class="counter following">
									<span class="number"><?php echo esc_html( powerkit_abridged_number( $feed['following'], 0 ) ); ?></span> <?php esc_html_e( 'Following', 'networker' ); ?>
								</div>
							<?php } ?>

							<?php if ( is_int( $feed['followers'] ) ) { ?>
								<div class="counter followers">
									<span class="number"><?php echo esc_html( powerkit_abridged_number( $feed['followers'], 0 ) ); ?></span> <?php esc_html_e( 'followers', 'networker' ); ?>
								</div>
							<?php } ?>
						</div>
					<?php } ?>
				</div>
			</div>
			</div>
		<?php } ?>

		<?php
		ob_start();
		?>
		<div class="pk-alt-instagram-items">
			<?php foreach ( $instagram as $item ) { ?>
				<div class="pk-alt-instagram-item">
					<a class="pk-alt-instagram-link" href="<?php echo esc_url( $item['user_link'] ); ?>" target="<?php echo esc_attr( $params['target'] ); ?>">
						<div class="pk-instagram-image-overlay">
							<img src="<?php echo esc_attr( $item['user_image'] ); ?>" class="<?php echo esc_attr( $item['class'] ); ?>" alt="<?php echo esc_attr( $item['description'] ); ?>" srcset="<?php echo esc_attr( $item['srcset'] ); ?>" sizes="<?php echo esc_attr( $item['sizes'] ); ?>">
						</div>

						<?php if ( is_int( $item['likes'] ) || is_int( $item['comments'] ) ) { ?>
							<span class="pk-alt-instagram-data">
										<span class="pk-alt-instagram-meta">
											<?php if ( is_int( $item['likes'] ) ) { ?>
												<span class="pk-alt-meta pk-meta-likes">
													<i class="pk-icon pk-icon-like"></i>
													<?php echo esc_attr( powerkit_abridged_number( $item['likes'], 0 ) ); ?>
													<?php esc_html_e( 'likes', 'networker' ); ?>
												</span>
											<?php } ?>

											<?php if ( is_int( $item['comments'] ) ) { ?>
												<span class="pk-alt-meta pk-meta-comments">
													<i class="pk-icon pk-icon-comment"></i> <?php echo esc_attr( powerkit_abridged_number( $item['comments'], 0 ) ); ?> <?php esc_html_e( 'comments', 'networker' ); ?>
												</span>
											<?php } ?>
										</span>
									</span>
						<?php } ?>

						<div class="pk-alt-instagram-desc">
							<?php echo esc_html( csco_str_truncate( $item['description'], 80 ) ); ?>
						</div>
					</a>
				</div>
			<?php } ?>
		</div>
		<?php
		$items_markup = ob_get_clean();

		if ( 'simple' === get_theme_mod( 'footer_instagram_type', 'simple' ) ) {
			?>
			<div class="pk-instagram-grid">
				<?php call_user_func( 'printf', '%s', $items_markup ); ?>
			</div>
		<?php } else { ?>
			<div class="pk-instagram-carousel">
				<div class="pk-instagram-wrap">
					<?php call_user_func( 'printf', '%s', $items_markup ); ?>
				</div>

				<div class="pk-instagram-sidebar">
					<div class="pk-instagram-arrows">
						<a href="#" class="carousel-arrow carousel-next"></a>
						<a href="#" class="carousel-arrow carousel-previous"></a>
					</div>
				</div>
			</div>
		<?php } ?>
		</div>
		<?php
	} else {
		?>
		<p><?php esc_html_e( 'Images Not Found!', 'networker' ); ?></p>
		<?php
	}
}

/**
 * Change settings of opt-in-form
 *
 * @param array $blocks All registered blocks.
 */
function csco_change_settings_opt_in_form( $blocks ) {

	foreach ( $blocks as $key => $block ) {

		if ( 'canvas/opt-in-form' === $block['name'] ) {
			csco_smart_array_push( $blocks[ $key ]['fields'], array(
				'key'     => 'colorBasicButtonBG',
				'label'   => esc_html__( 'Button Background', 'networker' ),
				'section' => 'general',
				'type'    => 'color',
				'output'  => array(
					array(
						'element'  => '$',
						'property' => '--cs-color-button',
						'suffix'   => '!important',
					),
				),
			), false, true );
			csco_smart_array_push( $blocks[ $key ]['fields'], array(
				'key'     => 'colorBasicButton',
				'label'   => esc_html__( 'Button Color', 'networker' ),
				'section' => 'general',
				'type'    => 'color',
				'output'  => array(
					array(
						'element'  => '$',
						'property' => '--cs-color-button-contrast',
						'suffix'   => '!important',
					),
				),
			), false, true );
			csco_smart_array_push( $blocks[ $key ]['fields'], array(
				'key'     => 'colorBasicButtonBGHover',
				'label'   => esc_html__( 'Button Background Hover', 'networker' ),
				'section' => 'general',
				'type'    => 'color',
				'output'  => array(
					array(
						'element'  => '$',
						'property' => '--cs-color-button-hover',
						'suffix'   => '!important',
					),
				),
			), false, true );
			csco_smart_array_push( $blocks[ $key ]['fields'], array(
				'key'     => 'colorBasicButtonHover',
				'label'   => esc_html__( 'Button Color Hover', 'networker' ),
				'section' => 'general',
				'type'    => 'color',
				'output'  => array(
					array(
						'element'  => '$',
						'property' => '--cs-color-button-hover-contrast',
						'suffix'   => '!important',
					),
				),
			), false, true );
		}
	}

	return $blocks;
}

add_filter( 'canvas_register_block_type', 'csco_change_settings_opt_in_form', 999 );

/**
 * Exclude Inline Posts posts from related posts block
 *
 * @param array $args Array of WP_Query args.
 */
function csco_related_posts_args( $args ) {
	global $powerkit_inline_posts;
	if ( ! $powerkit_inline_posts ) {
		return $args;
	}
	$post__not_in         = $args['post__not_in'];
	$post__not_in         = array_unique( array_merge( $post__not_in, $powerkit_inline_posts ) );
	$args['post__not_in'] = $post__not_in;

	return $args;
}
