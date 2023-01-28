<?php
/**
 * Filters
 *
 * Filtering native WordPress and third-party plugins' functions.
 *
 * @package Networker
 */

if ( ! function_exists( 'csco_body_class' ) ) {
	/**
	 * Adds classes to <body> tag
	 *
	 * @param array $classes is an array of all body classes.
	 */
	function csco_body_class( $classes ) {

		// Page Layout.
		$classes[] = 'cs-page-layout-' . csco_get_page_sidebar();

		// Sticky Navbar.
		if ( get_theme_mod( 'navbar_sticky', true ) ) {
			$classes[] = 'cs-navbar-sticky-enabled';
		} else {
			$classes[] = 'cs-navbar-sticky-disabled';
		}

		// Smart Navbar.
		if ( get_theme_mod( 'navbar_sticky', true ) && get_theme_mod( 'navbar_smart_sticky', true ) ) {
			$classes[] = 'cs-navbar-smart-enabled';
		}

		// Sticky Sidebar.
		if ( get_theme_mod( 'misc_sticky_sidebar', true ) ) {
			$classes[] = 'cs-sticky-sidebar-enabled';

			$classes[] = get_theme_mod( 'misc_sticky_sidebar_method', 'cs-stick-to-top' );
		} else {
			$classes[] = 'cs-sticky-sidebar-disabled';
		}

		return $classes;
	}
}
add_filter( 'body_class', 'csco_body_class' );

if ( ! function_exists( 'csco_sitecontent_class' ) ) {
	/**
	 * Adds the classes for the site-content element.
	 *
	 * @param array $classes Classes to add to the class list.
	 */
	function csco_sitecontent_class( $classes ) {

		// Page Sidebar.
		if ( 'disabled' !== csco_get_page_sidebar() ) {
			$classes[] = 'cs-sidebar-enabled cs-sidebar-' . csco_get_page_sidebar();
		} else {
			$classes[] = 'cs-sidebar-disabled';
		}

		// Post Metabar.
		if ( is_singular( 'post' ) && csco_powerkit_module_enabled( 'share_buttons' ) && powerkit_share_buttons_exists( 'metabar-post' ) ) {
			$classes[] = 'cs-metabar-enabled';
		} else {
			$classes[] = 'cs-metabar-disabled';
		}

		// Section Heading.
		$classes[] = 'section-heading-default-' . get_theme_mod( 'section_heading', 'style-1' );

		return $classes;
	}
}
add_filter( 'csco_site_content_class', 'csco_sitecontent_class' );

if ( ! function_exists( 'csco_sitesubmenu_class' ) ) {
	/**
	 * Adds the classes for the site-submenu element.
	 *
	 * @param array $classes Classes to add to the class list.
	 */
	function csco_sitesubmenu_class( $classes ) {

		$default = get_theme_mod( 'section_heading_submenu_default', true );

		// Section Heading.
		if ( $default ) {
			set_query_var( 'headinglocation', 'content' );

			$classes[] = 'section-heading-default-' . get_theme_mod( 'section_heading', 'style-1' );
		} else {
			set_query_var( 'headinglocation', 'submenu' );

			$classes[] = 'section-heading-default-' . get_theme_mod( 'section_heading_submenu', 'style-1' );
		}

		return $classes;
	}
}
add_filter( 'csco_site_submenu_class', 'csco_sitesubmenu_class' );

if ( ! function_exists( 'csco_set_allowed_post_meta' ) ) {
	/**
	 * Set allowed post meta.
	 *
	 * @param array $allowed The list meta.
	 */
	function csco_set_allowed_post_meta( $allowed ) {
		$allowed['shares'] = esc_html__( 'Shares', 'networker' );

		return $allowed;
	}
}
add_filter( 'powerkit_allowed_post_meta', 'csco_set_allowed_post_meta' );
add_filter( 'canvas_allowed_post_meta', 'csco_set_allowed_post_meta' );
add_filter( 'abr_allowed_post_meta', 'csco_set_allowed_post_meta' );

if ( ! function_exists( 'csco_set_convert_post_meta' ) ) {
	/**
	 * Convert allowed post meta.
	 *
	 * @param array $list The list meta.
	 */
	function csco_set_convert_post_meta( $list ) {
		$allowed['shares'] = 'display_meta_shares';

		return $list;
	}
}
add_filter( 'abr_convert_post_meta', 'csco_set_convert_post_meta' );

if ( ! function_exists( 'csco_set_post_meta_handler' ) ) {
	/**
	 * Set post meta handler.
	 */
	function csco_set_post_meta_handler() {
		return 'csco_get_post_meta';
	}
}
add_filter( 'powerkit_get_post_meta_handler', 'csco_set_post_meta_handler' );
add_filter( 'canvas_get_post_meta_handler', 'csco_set_post_meta_handler' );
add_filter( 'abr_get_post_meta_handler', 'csco_set_post_meta_handler' );

if ( ! function_exists( 'csco_set_block_post_meta_handler' ) ) {
	/**
	 * Set post meta handler.
	 */
	function csco_set_block_post_meta_handler() {
		return 'csco_block_post_meta';
	}
}
add_filter( 'powerkit_get_block_post_meta_handler', 'csco_set_block_post_meta_handler' );
add_filter( 'canvas_get_block_post_meta_handler', 'csco_set_block_post_meta_handler' );
add_filter( 'abr_get_block_post_meta_handler', 'csco_set_block_post_meta_handler' );

if ( ! function_exists( 'csco_filter_label_more' ) ) {
	/**
	 * Output label for more link / button.
	 *
	 * @param string $label The label of button.
	 */
	function csco_filter_label_more( $label ) {

		if ( ! $label ) {
			$label = get_theme_mod( 'misc_label_more', esc_html__( 'Read More', 'networker' ) );
		}

		return $label;
	}
}
add_filter( 'csco_filter_label_more', 'csco_filter_label_more' );

if ( ! function_exists( 'csco_add_entry_class' ) ) {
	/**
	 * Add entry class to post_class
	 *
	 * @param array $classes One or more classes to add to the class list.
	 */
	function csco_add_entry_class( $classes ) {
		array_push( $classes, 'cs-entry', 'cs-video-wrap' );

		return $classes;
	}
}
add_filter( 'post_class', 'csco_add_entry_class' );

if ( ! function_exists( 'csco_remove_hentry_class' ) ) {
	/**
	 * Remove hentry from post_class
	 *
	 * @param array $classes One or more classes to add to the class list.
	 */
	function csco_remove_hentry_class( $classes ) {
		return array_diff( $classes, array( 'hentry' ) );
	}
}
add_filter( 'post_class', 'csco_remove_hentry_class' );

if ( ! function_exists( 'csco_theme_typography' ) ) {
	/**
	 * Output theme typography
	 */
	function csco_theme_typography() {
		require get_template_directory() . '/inc/typography.php';
	}
}
add_filter( 'admin_head', 'csco_theme_typography' );
add_filter( 'wp_head', 'csco_theme_typography' );

if ( ! function_exists( 'csco_overwrite_sidebar' ) ) {
	/**
	 * Overwrite Default Sidebar
	 *
	 * @param string $sidebar Sidebar slug.
	 */
	function csco_overwrite_sidebar( $sidebar ) {
		// Check Nonce.
		wp_verify_nonce( null );

		if ( isset( $_REQUEST['action'] ) && 'csco_ajax_load_nextpost' === $_REQUEST['action'] ) { // Input var ok.
			if ( is_active_sidebar( 'sidebar-loaded' ) ) {
				$sidebar = 'sidebar-loaded';
			}
		}
		return $sidebar;
	}
}
add_filter( 'csco_sidebar', 'csco_overwrite_sidebar' );

if ( ! function_exists( 'csco_tiny_mce_refresh_cache' ) ) {
	/**
	 * TinyMCE Refresh Cache.
	 *
	 * @param array $settings An array with TinyMCE config.
	 */
	function csco_tiny_mce_refresh_cache( $settings ) {

		$theme = wp_get_theme();

		$settings['cache_suffix'] = sprintf( 'v=%s', $theme->get( 'Version' ) );

		return $settings;
	}
}
add_filter( 'tiny_mce_before_init', 'csco_tiny_mce_refresh_cache' );

if ( ! function_exists( 'csco_max_srcset_image_width' ) ) {
	/**
	 * Changes max image width in srcset attribute
	 *
	 * @param int   $max_width  The maximum image width to be included in the 'srcset'. Default '1600'.
	 * @param array $size_array Array of width and height values in pixels (in that order).
	 */
	function csco_max_srcset_image_width( $max_width, $size_array ) {
		return 3840;
	}
}
add_filter( 'max_srcset_image_width', 'csco_max_srcset_image_width', 10, 2 );

if ( ! function_exists( 'csco_get_the_archive_title' ) ) {
	/**
	 * Archive Title
	 *
	 * Removes default prefixes, like "Category:" from archive titles.
	 *
	 * @param string $title Archive title.
	 */
	function csco_get_the_archive_title( $title ) {
		if ( is_category() ) {

			$title = single_cat_title( '', false );

		} elseif ( is_tag() ) {

			$title = single_tag_title( '', false );

		} elseif ( is_author() ) {

			$title = get_the_author( '', false );

		}
		return $title;
	}
}
add_filter( 'get_the_archive_title', 'csco_get_the_archive_title' );

if ( ! function_exists( 'csco_excerpt_length' ) ) {
	/**
	 * Excerpt Length
	 *
	 * @param string $length of the excerpt.
	 */
	function csco_excerpt_length( $length ) {
		return 18;
	}
}
add_filter( 'excerpt_length', 'csco_excerpt_length' );

if ( ! function_exists( 'csco_strip_shortcode_from_excerpt' ) ) {
	/**
	 * Strip shortcodes from excerpt
	 *
	 * @param string $content Excerpt.
	 */
	function csco_strip_shortcode_from_excerpt( $content ) {
		$content = strip_shortcodes( $content );
		return $content;
	}
}
add_filter( 'the_excerpt', 'csco_strip_shortcode_from_excerpt' );

if ( ! function_exists( 'csco_strip_tags_from_excerpt' ) ) {
	/**
	 * Strip HTML from excerpt
	 *
	 * @param string $content Excerpt.
	 */
	function csco_strip_tags_from_excerpt( $content ) {
		$content = strip_tags( $content );
		return $content;
	}
}
add_filter( 'the_excerpt', 'csco_strip_tags_from_excerpt' );

if ( ! function_exists( 'csco_excerpt_more' ) ) {
	/**
	 * Excerpt Suffix
	 *
	 * @param string $more suffix for the excerpt.
	 */
	function csco_excerpt_more( $more ) {
		return '&hellip;';
	}
}
add_filter( 'excerpt_more', 'csco_excerpt_more' );

if ( ! function_exists( 'csco_post_meta_process' ) ) {
	/**
	 * Pre processing post meta choices
	 *
	 * @param array $data Post meta list.
	 */
	function csco_post_meta_process( $data ) {
		if ( ! csco_powerkit_module_enabled( 'share_buttons' ) && isset( $data['shares'] ) ) {
			unset( $data['shares'] );
		}
		if ( ! csco_powerkit_module_enabled( 'reading_time' ) && isset( $data['reading_time'] ) ) {
			unset( $data['reading_time'] );
		}
		if ( ! csco_post_views_enabled() && isset( $data['views'] ) ) {
			unset( $data['views'] );
		}
		return $data;
	}
}
add_filter( 'csco_post_meta_choices', 'csco_post_meta_process' );

if ( ! function_exists( 'csco_wrap_post_gallery' ) ) {
	/**
	 * Alignment of Galleries in Classic Block
	 *
	 * @param string $html     The current output.
	 * @param array  $attr     Attributes from the gallery shortcode.
	 * @param int    $instance Numeric ID of the gallery shortcode instance.
	 */
	function csco_wrap_post_gallery( $html, $attr, $instance ) {
		switch ( get_theme_mod( 'misc_classic_gallery_alignment', 'default' ) ) {
			case 'wide':
				$wrap = 'alignwide';
				break;
			case 'large':
				$wrap = 'alignfull';
				break;
		}

		if ( ! isset( $attr['wrap'] ) && isset( $wrap ) ) {
			$attr['wrap'] = $wrap;

			// Our custom HTML wrapper.
			$html = sprintf( '<div class="%s">%s</div>', esc_attr( $wrap ), gallery_shortcode( $attr ) );
		}

		return $html;
	}
	add_filter( 'post_gallery', 'csco_wrap_post_gallery', 99, 3 );
}

if ( ! function_exists( 'csco_wp_link_pages_args' ) ) {
	/**
	 * Paginated Post Pagination
	 *
	 * @param string $args Paginated posts pagination args.
	 */
	function csco_wp_link_pages_args( $args ) {
		if ( 'next_and_number' === $args['next_or_number'] ) {
			global $page, $numpages, $multipage, $more, $pagenow;
			$args['next_or_number'] = 'number';

			$prev = '';
			$next = '';
			if ( $multipage ) {
				if ( $more ) {
					$i = $page - 1;
					if ( $i && $more ) {
						$prev .= _wp_link_page( $i );
						$prev .= $args['link_before'] . $args['previouspagelink'] . $args['link_after'] . '</a>';
					}
					$i = $page + 1;
					if ( $i <= $numpages && $more ) {
						$next .= _wp_link_page( $i );
						$next .= $args['link_before'] . $args['nextpagelink'] . $args['link_after'] . '</a>';
					}
				}
			}
			$args['before'] = $args['before'] . $prev;
			$args['after']  = $next . $args['after'];
		}
		return $args;
	}
}
add_filter( 'wp_link_pages_args', 'csco_wp_link_pages_args' );

if ( ! function_exists( 'csco_post_header_avatar_size' ) ) {
	/**
	 * Set for post header avatar size.
	 *
	 * @param int $size Avatar size.
	 */
	function csco_post_header_avatar_size( $size ) {
		return 40;
	}
}

/**
 * -------------------------------------------------------------------------
 * [ Primary Menu ]
 * -------------------------------------------------------------------------
 */

if ( ! function_exists( 'csco_primary_menu_item_args' ) ) {
	/**
	 * Filters the arguments for a single nav menu item.
	 *
	 * @param object $args  An object of wp_nav_menu() arguments.
	 * @param object $item  (WP_Post) Menu item data object.
	 * @param int    $depth Depth of menu item. Used for padding.
	 */
	function csco_primary_menu_item_args( $args, $item, $depth ) {
		$args->link_before = '';
		$args->link_after  = '';
		if ( 'primary' === $args->theme_location && 0 === $depth ) {
			$args->link_before = '<span>';
			$args->link_after  = '</span>';
		}
		return $args;
	}
	add_filter( 'nav_menu_item_args', 'csco_primary_menu_item_args', 10, 3 );
}

if ( version_compare( get_bloginfo( 'version' ), '5.4', '>=' ) ) {
	/**
	 * Add badge custom fields to menu item
	 *
	 * @param int $id object id.
	 */
	function csco_menu_item_badge_fields( $id ) {

		wp_nonce_field( 'csco_menu_meta_nonce', 'csco_menu_meta_nonce_name' );
		$badge_color = get_post_meta( $id, '_csco_menu_badge_color', true );
		$badge_text  = get_post_meta( $id, '_csco_menu_badge_text', true );

		?>
		<p class="description description-thin">
			<label for="<?php echo esc_attr( $id ); ?>"><?php esc_html_e( 'Badge Style', 'networker' ); ?></label>
			<select class="widefat" name="csco_menu_badge_color[<?php echo esc_attr( $id ); ?>]">
				<option value="" <?php selected( $badge_color, 'primary' ); ?>><?php esc_html_e( 'Primary', 'networker' ); ?></option>
				<option value="secondary" <?php selected( $badge_color, 'secondary' ); ?>><?php esc_html_e( 'Secondary', 'networker' ); ?></option>
				<option value="dark" <?php selected( $badge_color, 'dark' ); ?>><?php esc_html_e( 'Dark', 'networker' ); ?></option>
				<option value="success" <?php selected( $badge_color, 'success' ); ?>><?php esc_html_e( 'Success', 'networker' ); ?></option>
				<option value="info" <?php selected( $badge_color, 'info' ); ?>><?php esc_html_e( 'Info', 'networker' ); ?></option>
				<option value="warning" <?php selected( $badge_color, 'warning' ); ?>><?php esc_html_e( 'Warning', 'networker' ); ?></option>
				<option value="danger" <?php selected( $badge_color, 'danger' ); ?>><?php esc_html_e( 'Danger', 'networker' ); ?></option>
			</select>
		</p>
		<p class="description description-thin">
			<label><?php esc_html_e( 'Badge Text', 'networker' ); ?><br>
				<input type="text" class="widefat <?php echo esc_attr( $id ); ?>" name="csco_menu_badge_text[<?php echo esc_attr( $id ); ?>]" value="<?php echo esc_attr( $badge_text ); ?>">
			</label>
		</p>
		<?php
	}
	add_action( 'wp_nav_menu_item_custom_fields', 'csco_menu_item_badge_fields' );

	/**
	 * Save the badge menu item meta
	 *
	 * @param int $menu_id menu id.
	 * @param int $menu_item_db_id menu item db id.
	 */
	function csco_menu_item_badge_fields_update( $menu_id, $menu_item_db_id ) {

		// Check ajax.
		if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) {
			return;
		}

		// Security.
		check_admin_referer( 'csco_menu_meta_nonce', 'csco_menu_meta_nonce_name' );

		// Save badge color.
		if ( isset( $_POST['csco_menu_badge_color'][ $menu_item_db_id ] ) ) {
			$sanitized_data = sanitize_text_field( $_POST['csco_menu_badge_color'][ $menu_item_db_id ] );
			update_post_meta( $menu_item_db_id, '_csco_menu_badge_color', $sanitized_data );
		} else {
			delete_post_meta( $menu_item_db_id, '_csco_menu_badge_color' );
		}

		// Save badge text.
		if ( isset( $_POST['csco_menu_badge_text'][ $menu_item_db_id ] ) ) {
			$sanitized_data = sanitize_text_field( $_POST['csco_menu_badge_text'][ $menu_item_db_id ] );
			update_post_meta( $menu_item_db_id, '_csco_menu_badge_text', $sanitized_data );
		} else {
			delete_post_meta( $menu_item_db_id, '_csco_menu_badge_text' );
		}
	}
	add_action( 'wp_update_nav_menu_item', 'csco_menu_item_badge_fields_update', 10, 2 );

	/**
	 * Displays badge text on the front-end.
	 *
	 * @param string  $title The menu item's title.
	 * @param WP_Post $item The current menu item.
	 * @return string
	 */
	function csco_badge_menu_item( $title, $item ) {
		// Add badge code after title text.
		if ( is_object( $item ) && isset( $item->ID ) ) {

			$badge_color = get_post_meta( $item->ID, '_csco_menu_badge_color', true );
			$badge_text  = get_post_meta( $item->ID, '_csco_menu_badge_text', true );

			if ( ! empty( $badge_text ) ) {
				$badge_class = $badge_color ? $badge_color : 'primary';
				$title      .= ' <span class="pk-badge pk-badge-' . esc_attr( $badge_class ) . '">' . esc_html( $badge_text ) . '</span>';
			}
		}
		return $title;
	}
	add_filter( 'nav_menu_item_title', 'csco_badge_menu_item', 8, 2 );
}

/**
 * -------------------------------------------------------------------------
 * [ SearchWP Live Ajax Search ]
 * -------------------------------------------------------------------------
 */

if ( ! function_exists( 'csco_searchwp_live_enqueue_scripts' ) ) {
	/**
	 * Enqueue scripts and styles.
	 */
	function csco_searchwp_live_enqueue_scripts() {

		$style = sprintf( '.searchwp-live-search-no-min-chars:after { content: "%s" }', esc_html__( 'Continue typing', 'networker' ) );

		wp_add_inline_style( 'csco-styles', $style );
	}
}
add_action( 'wp_enqueue_scripts', 'csco_searchwp_live_enqueue_scripts' );

/**
 * Remove Output the base styles.
 */
add_filter( 'searchwp_live_search_base_styles', '__return_false' );

/**
 * Change live search template dir location.
 */
function csco_searchwp_live_search_template_dir() {
	return 'template-parts';
}
add_filter( 'searchwp_live_search_template_dir', 'csco_searchwp_live_search_template_dir' );


/**
 * -------------------------------------------------------------------------
 * [ Absolute Reviews ]
 * -------------------------------------------------------------------------
 */

/**
 * Set the correct color scheme for post meta.
 *
 * @param string $scheme   Meta scheme.
 * @param array  $settings The advanced settings.
 */
function abr_csco_post_meta_scheme( $scheme, $settings ) {

	if ( isset( $settings['abr-params']['layout'] ) ) {
		$layout = $settings['abr-params']['layout'];

		if ( in_array( $layout, array( 'reviews-6', 'reviews-7', 'reviews-8' ), true ) ) {
			$scheme = 'data-scheme="inverse"';
		}
	}

	return $scheme;
}
add_filter( 'csco_post_meta_scheme', 'abr_csco_post_meta_scheme', 10, 2 );
