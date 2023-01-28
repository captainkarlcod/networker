<?php
/**
 * Mega Menu.
 *
 * @package Networker
 */

/**
 * Mega Menu Class
 */
class CSCO_Mega_Menu {

	/**
	 * Holds our custom fields
	 *
	 * @var    array
	 * @access protected
	 */
	protected static $fields = array();

	/**
	 * Menu Locations
	 *
	 * @var    array
	 * @access private
	 */
	private $locations = array();

	/**
	 * Constructor. Set up cacheable values and settings.
	 */
	public function __construct() {

		// Set post types.
		$this->post_types = apply_filters( 'csco_mega_menu_post_types', array( 'post', 'page' ) );

		// Set taxonomies.
		$this->taxonomies = apply_filters( 'csco_mega_menu_taxonomies', array( 'category', 'post_tag' ) );

		// Set locations.
		$this->locations = apply_filters( 'csco_mega_menu_locations', array( 'primary' ) );

		// Support secondary languages.
		$this->locations = $this->support_languages( (array) $this->locations );

		// Support output badges.
		add_filter( 'esc_html', array( $this, 'support_badge' ), 99, 2 );

		// Enqueue Scripts.
		add_action( 'admin_footer', array( $this, 'admin_enqueue_scripts' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'wp_enqueue_scripts' ) );

		// Admin Hooks.
		add_filter( 'wp_edit_nav_menu_walker', array( $this, 'admin_modify_menu_walker' ), 10, 2 );
		add_action( 'wp_nav_menu_item_data_fields', array( $this, 'admin_add_new_fields' ), 10, 4 );
		add_action( 'wp_update_nav_menu_item', array( $this, 'admin_save_new_fields' ), 10, 3 );
		add_filter( 'manage_nav-menus_columns', array( $this, 'admin_manage_columns' ), 99, 1 );

		// Frontend Hooks.
		add_filter( 'wp_nav_menu_objects', array( $this, 'mega_menu_modify_items' ), 10, 2 );
		add_filter( 'nav_menu_css_class', array( $this, 'mega_menu_classes' ), 10, 4 );
		add_filter( 'nav_menu_link_attributes', array( $this, 'mega_menu_attributes' ), 10, 4 );
		add_filter( 'walker_nav_menu_start_el', array( $this, 'mega_menu_output' ), 10, 4 );

		// Rest Api.
		add_action( 'rest_api_init', array( $this, 'rest_api_init' ) );

		// Ajax.
		add_action( 'wp_ajax_csco_reload_menu', array( $this, 'admin_reload_nav_menu' ) );
		add_action( 'wp_ajax_nopriv_csco_reload_menu', array( $this, 'admin_reload_nav_menu' ) );

		// Custom Fields.
		self::$fields = array(
			'cs-mega-menu' => array(
				'type'  => 'checkbox',
				'label' => esc_html__( 'Mega Menu', 'networker' ),
			),
		);

		// Fields Filter.
		self::$fields = apply_filters( 'csco_mega_menu_fields', self::$fields );

	}

	/**
	 * Add support powerkit badge.
	 *
	 * @param string $safe_text The text after it has been escaped.
	 * @param string $text      The text prior to being escaped.
	 */
	public function support_badge( $safe_text, $text ) {
		global $pagenow;

		if ( ! is_admin() || 'nav-menus.php' !== $pagenow ) {
			return $safe_text;
		}

		if ( preg_match( '/pk-badge/', $safe_text ) ) {
			$safe_text = $text;
		}

		return $safe_text;
	}

	/**
	 * Add support languages.
	 *
	 * @param array $locations List locations.
	 */
	public function support_languages( $locations ) {
		foreach ( $locations as $location ) {
			// Polylang.
			if ( function_exists( 'pll_languages_list' ) ) {
				$languages = pll_languages_list();
				if ( $languages ) {
					foreach ( $languages as $language ) {
						$locations[] = sprintf( '%s___%s', $location, $language );
					}
				}
			}
		}

		return $locations;
	}

	/**
	 * Set Mega Menu Admin Walker
	 *
	 * @param string $class   The walker class to use. Default 'Walker_Nav_Menu_Edit'.
	 * @param int    $menu_id ID of the menu being rendered.
	 */
	public function admin_modify_menu_walker( $class, $menu_id ) {

		// Get Theme Locations.
		$theme_locations = get_nav_menu_locations();

		// Check Mega Menu.
		$has_mega_menu = false;

		foreach ( $theme_locations as $location => $location_menu ) {
			if ( $location_menu === $menu_id && in_array( $location, $this->locations, true ) ) {
				$has_mega_menu = true;
			}
		}

		// Set New Walker.
		if ( $has_mega_menu ) {
			$class = 'CSCO_Menu_Item_Walker';

			if ( ! class_exists( $class ) ) {
				csco_admin_modify_menu_walker();
			}
		}

		return $class;
	}

	/**
	 * Add new fields to menu
	 *
	 * @param int    $item_id  Menu item ID.
	 * @param object $item     Menu item data object.
	 * @param int    $depth    Depth of menu item. Used for padding.
	 * @param array  $args     Menu item args.
	 */
	public function admin_add_new_fields( $item_id, $item, $depth, $args ) {
		foreach ( self::$fields as $_key => $field ) {

			$key   = sprintf( 'menu-item-%s', $_key );
			$id    = sprintf( 'edit-%s-%s', $key, $item_id );
			$name  = sprintf( '%s[%s]', $key, $item_id );
			$class = sprintf( 'field-%s', $_key );

			$value = get_post_meta( $item_id, $key, true );

			switch ( $field['type'] ) {
				case 'checkbox':
					?>
						<p class="<?php echo esc_attr( $class ); ?> description description-wide">
							<?php
							printf(
								'<label for="%1$s"><input type="checkbox" id="%1$s" class="%1$s" name="%3$s" value="1" %4$s/>%2$s</label>',
								esc_attr( $id ),
								esc_html( $field['label'] ),
								esc_attr( $name ),
								checked( $value, 1, false )
							);
							?>
						</p>
					<?php
					break;

				case 'input':
					?>
						<p class="<?php echo esc_attr( $class ); ?> description description-wide">
							<?php
							printf(
								'<label for="%1$s">%2$s<br /><input type="text" id="%1$s" class="widefat %1$s" name="%3$s" value="%4$s" /></label>',
								esc_attr( $id ),
								esc_html( $field['label'] ),
								esc_attr( $name ),
								esc_attr( $value )
							);
							?>
						</p>
					<?php
					break;
			}
		}
	}

	/**
	 * Save value of new fields
	 *
	 * @param int   $menu_id         Nav menu ID.
	 * @param int   $menu_item_db_id Menu item ID.
	 * @param array $menu_item_args  Menu item data.
	 */
	public function admin_save_new_fields( $menu_id, $menu_item_db_id, $menu_item_args ) {

		// Check ajax.
		if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) {
			return;
		}

		// Security.
		check_admin_referer( 'update-nav_menu', 'update-nav-menu-nonce' );

		// Mega Menu Fields.
		foreach ( self::$fields as $_key => $field ) {
			$key = sprintf( 'menu-item-%s', $_key );

			// Sanitize field.
			if ( isset( $_POST[ $key ][ $menu_item_db_id ] ) ) { // Input Var ok.
				$value = sanitize_text_field( wp_unslash( $_POST[ $key ][ $menu_item_db_id ] ) ); // Input Var ok.
			} else {
				$value = null;
			}

			// Update field.
			if ( ! is_null( $value ) ) {
				update_post_meta( $menu_item_db_id, $key, $value );
			} else {
				delete_post_meta( $menu_item_db_id, $key );
			}
		}
	}

	/**
	 * Add fields to the screen options toggle
	 *
	 * @param array $columns Menu item columns.
	 */
	public static function admin_manage_columns( $columns ) {
		$column_fields = array();

		foreach ( self::$fields as $_key => $field ) {
			$column_fields[ $_key ] = $field['label'];
		}
		$columns = array_merge( $columns, $column_fields );

		return $columns;
	}

	/**
	 * Refresh menu item fields
	 *
	 * @since   1.0.0
	 */
	public function admin_reload_nav_menu() {
		wp_verify_nonce( null );

		$nav_menu_selected_id = isset( $_REQUEST['menu_id'] ) ? (int) $_REQUEST['menu_id'] : 0; // Input var okay.

		$menu_name    = isset( $_REQUEST['menu_name'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['menu_name'] ) ) : false; // Input var okay.
		$menu_checked = isset( $_REQUEST['menu_checked'] ) ? (bool) $_REQUEST['menu_checked'] : false; // Input var okay.

		// Get Menu Location.
		preg_match( '/^menu-locations\[(.*?)\]/', $menu_name, $matches );

		$menu_location = isset( $matches[1] ) ? $matches[1] : false;

		if ( is_nav_menu( $nav_menu_selected_id ) && $menu_location ) {

			// Load WP Nav Menu.
			require_once ABSPATH . 'wp-admin/includes/nav-menu.php';

			// Get All Locations.
			$menu_locations = get_nav_menu_locations();

			// Set|Unset Menu to Locations List.
			if ( $menu_checked ) {
				$menu_locations[ $menu_location ] = $nav_menu_selected_id;
			} else {
				if ( isset( $menu_locations[ $menu_location ] ) ) {
					unset( $menu_locations[ $menu_location ] );
				}
			}

			// Set Edited Menu Locations.
			set_theme_mod( 'nav_menu_locations', $menu_locations );

			// Get Nav Menu HTML.
			$edit_markup = wp_get_nav_menu_to_edit( $nav_menu_selected_id );

			if ( ! is_wp_error( $edit_markup ) ) {
				echo (string) $edit_markup; // XSS.
			}
		}
	}

	/**
	 * Filter the sorted list of menu item objects before generating the menu's HTML.
	 *
	 * @param array    $sorted_menu_items The menu items, sorted by each menu item's menu order.
	 * @param stdClass $args              An object containing wp_nav_menu() arguments.
	 */
	public function mega_menu_modify_items( $sorted_menu_items, $args ) {
		foreach ( $sorted_menu_items as $key => $item ) {

			// Get Mega Menu Type.
			$menu_type = $this->is_mega_menu( $item, $args );

			// Create Mega menu Children.
			if ( 'mixed' === $menu_type && 0 === (int) $item->menu_item_parent ) {

				// Children Var.
				$item->mega_menu_children = array();

				// Children Var.
				$item->mega_menu_children = array();

				// Add Items to Children Args.
				foreach ( $sorted_menu_items as $_key => $_item ) {
					if ( $item->ID === (int) $_item->menu_item_parent ) {

						// Set Mega Menu Type.
						$_item->mega_menu_child = $_item->object;

						// Set as child.
						$item->mega_menu_children[] = $_item;

						unset( $sorted_menu_items[ $_key ] );
					}
				}
			}
		}

		return $sorted_menu_items;
	}

	/**
	 * Mega Menu Classes.
	 *
	 * @param array    $classes The CSS classes that are applied to the menu item's `<li>` element.
	 * @param WP_Post  $item    The current menu item.
	 * @param stdClass $args    An object of wp_nav_menu() arguments.
	 * @param int      $depth   Depth of menu item. Used for padding.
	 */
	public function mega_menu_classes( $classes, $item, $args, $depth ) {

		// Get Mega Menu Type.
		$menu_type = $this->is_mega_menu( $item, $args );

		// Add Mega Menu Classes.
		if ( $menu_type ) {

			$layout = $menu_type;

			if ( isset( $item->mega_menu_children ) && 'mixed' === $layout ) {
				$layout = $this->identify_mega_menu_layout( $item->mega_menu_children );
			}

			if ( 0 === $depth ) {
				$classes[] = 'cs-mega-menu';
			}

			$classes[] = 'cs-mega-menu-' . $layout;

			// Menu Item Arrow fix.
			if ( 'term' === $layout ) {
				$classes[] = 'menu-item-has-children';
			}

			// Child Class.
			if ( in_array( $layout, array( 'child-term', 'child-item' ), true ) ) {
				$classes[] = 'cs-mega-menu-child';
			}
		}

		return $classes;
	}

	/**
	 * Mega Menu Attributes
	 *
	 * @since 1.0.0
	 *
	 * @param array    $atts  The HTML attributes applied to the menu item's `<a>` element, empty strings are ignored.
	 * @param WP_Post  $item  The current menu item.
	 * @param stdClass $args  An object of wp_nav_menu() arguments.
	 * @param int      $depth Depth of menu item. Used for padding.
	 */
	public function mega_menu_attributes( $atts, $item, $args, $depth ) {

		// Get Mega Menu Type.
		$menu_type = $this->is_mega_menu( $item, $args );

		// Mega Menu attrs for terms.
		if ( in_array( $menu_type, array( 'term', 'child-term' ), true ) ) {
			$atts['data-term'] = $item->object_id;

			if ( 'term' === $menu_type ) {
				$atts['data-numberposts'] = 3;
			} elseif ( 'child-term' === $menu_type ) {
				$atts['data-numberposts'] = 3;
			}
		}

		// Mega Menu attrs for posts.
		if ( isset( $item->mega_menu_children ) && 'mixed' === $menu_type ) {
			$layout = $this->identify_mega_menu_layout( $item->mega_menu_children );

			if ( 'posts' === $layout ) {

				$posts = array();

				foreach ( $item->mega_menu_children as $_post ) {
					$posts[] = $_post->object_id;
				}

				$atts['data-posts'] = implode( '|', $posts );

				$atts['data-numberposts'] = 5;
			}
		}

		return $atts;
	}

	/**
	 * Mega Menu Additional Content.
	 *
	 * @param string   $item_output The menu item's starting HTML output.
	 * @param WP_Post  $item        Menu item data object.
	 * @param int      $depth       Depth of menu item. Used for padding.
	 * @param stdClass $args        An object of wp_nav_menu() arguments.
	 */
	public function mega_menu_output( $item_output, $item, $depth, $args ) {

		$scheme = csco_color_scheme(
			get_theme_mod( 'color_submenu_background', '#FFFFFF' ),
			get_theme_mod( 'color_submenu_background_dark', '#1c1c1c' )
		);

		// Get Mega Menu Type.
		$menu_type = $this->is_mega_menu( $item, $args );

		// Mega Menu Content.
		ob_start();

		switch ( $menu_type ) {
			case 'mixed':
				if ( isset( $item->mega_menu_children ) && ! empty( $item->mega_menu_children ) ) {

					$layout = $this->identify_mega_menu_layout( $item->mega_menu_children );

					if ( 'terms' === $layout ) {
						?>
						<div class="sub-menu" <?php echo wp_kses( $scheme, 'post' ); ?>>
							<div class="cs-mm__content">
								<ul class="cs-mm__categories">
									<?php
									foreach ( $item->mega_menu_children as $_item ) {

										$classes = empty( $_item->classes ) ? array() : (array) $_item->classes;

										$classes[] = 'menu-item-' . $_item->ID;

										// Filters the CSS class(es) applied to a menu item's list item element.
										$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $_item, $args, $depth + 1 ) );

										$atts = array();

										$atts['title']  = ! empty( $_item->attr_title ) ? $_item->attr_title : '';
										$atts['target'] = ! empty( $_item->target ) ? $_item->target : '';
										$atts['rel']    = ! empty( $_item->xfn ) ? $_item->xfn : '';
										$atts['href']   = ! empty( $_item->url ) ? $_item->url : '';

										// Filters the HTML attributes applied to a menu item's anchor element.
										$atts = apply_filters( 'nav_menu_link_attributes', $atts, $_item, $args, $depth + 1 );

										$attributes = '';
										foreach ( $atts as $attr => $value ) {
											if ( ! empty( $value ) ) {
												$value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );

												$attributes .= ' ' . $attr . '="' . $value . '"';
											}
										}

										// Link HTML.
										$link = '<a' . $attributes . '>' . apply_filters( 'the_title', $_item->title, $_item->ID ) . '</a>';

										$allowed_html = array(
											'a' => array(
												'href'   => true,
												'title'  => true,
												'target' => true,
												'rel'    => true,
												'href'   => true,
												'data-term' => true,
												'data-type' => true,
												'data-numberposts' => true,
											),
										);

										// Output Item.
										?>
											<li class="<?php echo esc_attr( $class_names ); ?>">
												<?php echo wp_kses( $link, $allowed_html ); ?>
											</li>
										<?php
									}
									?>
								</ul>

								<div class="cs-mm__posts-container cs-has-spinner">
									<?php
									foreach ( $item->mega_menu_children as $_item ) {
										if ( in_array( $_item->object, $this->taxonomies, true ) ) {
											?>
												<div class="cs-mm__posts" data-term="<?php echo esc_attr( $_item->object_id ); ?>"><span class="cs-spinner"></span></div>
											<?php
										}
									}
									?>
								</div>
							</div>
						</div>
						<?php
					} elseif ( 'posts' === $layout ) {
						?>
						<div class="sub-menu" <?php echo wp_kses( $scheme, 'post' ); ?>>
							<div class="cs-mm__posts mega-menu-posts"></div>
						</div>
						<?php
					}
				}
				break;

			case 'term':
				if ( in_array( $item->object, $this->taxonomies, true ) ) {
					?>
						<div class="sub-menu" <?php echo wp_kses( $scheme, 'post' ); ?>>
							<div class="cs-mm__posts mega-menu-term"></div>
						</div>
					<?php
				}

				break;

		}

		// Set Mega Menu Content.
		$item_output .= ob_get_clean();

		return $item_output;
	}

	/**
	 * Is Item is Mega Menu?
	 *
	 * @param  WP_Post  $item The current menu item.
	 * @param  stdClass $args An object of wp_nav_menu() arguments.
	 */
	public function is_mega_menu( $item, $args = null ) {

		// Check Mega Menu Location.
		if ( isset( $args->theme_location ) ) {
			if ( ! $args->theme_location || ! in_array( $args->theme_location, $this->locations, true ) ) {
				return false;
			}
		}

		// Classes.
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;

		// Is Item Mega Menu?
		$is_mega_menu = get_post_meta( $item->ID, 'menu-item-cs-mega-menu', true );

		if ( in_array( 'cs-mega-menu', $classes, true ) ) {
			$is_mega_menu = true;
		}

		// Mega Menu Type.
		$menu_type = false;

		if ( $is_mega_menu && in_array( 'menu-item-has-children', $classes, true ) ) {

			$menu_type = 'mixed';

		} elseif ( $is_mega_menu && in_array( $item->object, $this->taxonomies, true ) ) {

			$menu_type = 'term';

		} elseif ( isset( $item->mega_menu_child ) ) {

			if ( in_array( $item->mega_menu_child, $this->taxonomies, true ) ) {
				$menu_type = 'child-term';
			} elseif ( in_array( $item->mega_menu_child, $this->post_types, true ) ) {
				$menu_type = 'child-post';
			} else {
				$menu_type = 'child-item';
			}
		}

		// Result.
		return $menu_type;
	}

	/**
	 * Identify layout of Mega Menu
	 *
	 * @param array $items The children items.
	 */
	public function identify_mega_menu_layout( $items ) {

		$layout = false;

		$types = array();

		foreach ( $items as $key => $item ) {
			if ( in_array( $item->object, $this->taxonomies, true ) ) {

				$layout = 'terms';

				$types[ $layout ] = true;
			}
			if ( in_array( $item->object, $this->post_types, true ) ) {

				$layout = 'posts';

				$types[ $layout ] = true;
			}
		}

		if ( 1 === count( $types ) ) {
			return $layout;
		}
	}

	/**
	 * Get Mega Menu Posts
	 *
	 * @param array $request REST API Request.
	 */
	public function rest_api_callback( $request ) {

		wp_verify_nonce( null );

		// Default Data.
		$data = array(
			'status'  => 'error',
			'content' => '',
		);

		// Number of posts.
		$per_page = isset( $_GET['per_page'] ) ? (int) $_GET['per_page'] : 3;  // Input var ok; sanitization ok.

		// Term ID.
		$term_id = isset( $_GET['term'] ) ? (int) $_GET['term'] : 0;  // Input var ok; sanitization ok.

		// Posts.
		$posts = isset( $_GET['posts'] ) ? (string) $_GET['posts'] : 0;  // Input var ok; sanitization ok.

		if ( $term_id <= 0 && $posts <= 0 ) {
			return $data;
		}

		// Get Category Posts.
		$args = array(
			'ignore_sticky_posts' => true,
			'post_type'           => 'any',
			'posts_per_page'      => $per_page,
		);

		// Filter term.
		if ( $term_id ) {
			$term = get_term( $term_id );

			$args['tax_query'] = array(
				array(
					'taxonomy' => $term->taxonomy,
					'terms'    => $term_id,
					'field'    => 'id',
				),
			);
		}

		if ( $posts ) {
			$posts = explode( '|', $posts );

			$args['post__in'] = array_map( 'intval', $posts );
			$args['orderby']  = 'post__in';
		}

		$query = new WP_Query( $args );

		ob_start();

		if ( $query->have_posts() && isset( $query->posts ) ) {
			// Set options.
			$options = array(
				'image_orientation' => get_theme_mod( 'mega_menu_image_orientation', 'original' ),
				'image_size'        => get_theme_mod( 'mega_menu_image_size', 'csco-thumbnail' ),
			);

			// Each Posts.
			while ( $query->have_posts() ) {
				$query->the_post();
				?>
					<article <?php post_class( 'mega-menu-item menu-post-item' ); ?>>
						<div class="cs-entry__outer">
							<?php if ( has_post_thumbnail() ) { ?>
								<div class="cs-entry__inner cs-entry__overlay cs-entry__thumbnail cs-overlay-ratio cs-ratio-<?php echo esc_attr( $options['image_orientation'] ); ?>" data-scheme="inverse">

									<div class="cs-overlay-background">
										<?php the_post_thumbnail( $options['image_size'] ); ?>
									</div>

									<div class="cs-overlay-content">
										<?php csco_get_post_meta( array( 'reading_time' ), false, true, 'mega_menu_post_meta' ); ?>
									</div>

									<a href="<?php echo esc_url( get_permalink() ); ?>" class="cs-overlay-link"></a>
								</div>
							<?php } ?>

							<div class="cs-entry__inner cs-entry__content">

								<?php csco_get_post_meta( array( 'category' ), false, true, 'mega_menu_post_meta' ); ?>

								<?php the_title( '<h6 class="cs-entry__title"><a href="' . esc_url( get_permalink() ) . '">', '</a></h6>' ); ?>

								<?php csco_get_post_meta( array( 'author', 'date', 'views', 'shares', 'comments' ), false, true, 'mega_menu_post_meta' ); ?>
							</div>
						</div>
					</article>
				<?php
			}

			wp_reset_postdata();
		}

		$data = array(
			'status'  => 'success',
			'content' => ob_get_clean(),
		);

		// Return Result.
		return rest_ensure_response( $data );
	}

	/**
	 * Register REST MEga Menu Posts Routes
	 */
	public function rest_api_init() {

		register_rest_route(
			'csco/v1',
			'/menu-posts',
			array(
				'methods'             => WP_REST_Server::READABLE,
				'callback'            => array( $this, 'rest_api_callback' ),
				'permission_callback' => function() {
					return true;
				},
			)
		);
	}

	/**
	 * Localize mega menu scripts.
	 */
	public function wp_enqueue_scripts() {

		// Localize Script.
		$args = array(
			'rest_url' => esc_url( get_rest_url( null, '/csco/v1/menu-posts' ) ),
		);

		wp_localize_script( 'csco-scripts', 'csco_mega_menu', $args );
	}

	/**
	 * Output scripts & styles on the Admin Nav Menu Page
	 */
	public function admin_enqueue_scripts() {
		global $pagenow;

		if ( 'nav-menus.php' === $pagenow ) {

			?>
			<script>
				(function($) {

					/* On Document Ready */
					$( document ).ready( function() {

						// Ajax Menu Reload.
						$( '.menu-theme-locations input[type="checkbox"]' ).on( 'change', function( event ) {
							event.preventDefault();

							var cscoMenuID      = parseInt( $( this ).val() ),
								cscoMenuName    = $( this ).attr( 'name' ),
								cscoMenuChecked = $( this ).attr( 'checked' );

							if( cscoMenuID > 0 ) {
								$.ajax({
									type: 'POST',
									url: ajaxurl,
									data: { 'action': 'csco_reload_menu', 'menu_id': cscoMenuID, 'menu_name': cscoMenuName, 'menu_checked': cscoMenuChecked },
									beforeSend: function(){
										$( '#update-nav-menu' ).addClass( 'menu-ajax-reloading' );
									},
									success: function( result ) {

										if ( result.length > 0 && result != 0 ) {
											var resultHtml = $.parseHTML( result );

											if ( resultHtml ) {
												$.each( resultHtml, function( i, el ) {
													if ( $( el ).attr( 'id' ) == 'menu-to-edit' ) {
														$( '#menu-to-edit' ).html( $( el ).html() );
													}
												});

												// Refresh Item Buttons
												$( '#menu-to-edit .menu-item' ).hideAdvancedMenuItemFields();

												if ( typeof wpNavMenu !== 'undefined' ) {
													wpNavMenu.refreshKeyboardAccessibility();
													wpNavMenu.refreshAdvancedAccessibility();
												}
											}
										}
										$( '#update-nav-menu' ).removeClass( 'menu-ajax-reloading' );
									},
									error: function(e){
										$( '#update-nav-menu' ).removeClass( 'menu-ajax-reloading' );
									}
								});
							}
						});
					});
				})(jQuery);
			</script>

			<style type="text/css">
				#update-nav-menu.menu-ajax-reloading {
					position: relative;
					z-index: 12;
				}
				#update-nav-menu.menu-ajax-reloading:before {
					content: '';
					position: absolute;
					top: 0;
					left: 0;
					width: 100%;
					height: 100%;
					background: rgba( 255, 255, 255, 0.6 );
					z-index: 15;
				}
				#menu-to-edit li.menu-item:not( .menu-item-depth-0 ) .field-cs-mega-menu {
					display: none;
				}
			</style>
			<?php
		}
	}
}

/**
 * Init Mega Menu
 *
 * @since 1.0.0
 */
function csco_mega_menu_init() {
	new CSCO_Mega_Menu();
}
add_action( 'init', 'csco_mega_menu_init' );

/**
 * Mega Menu Admin Walker.
 *
 * @since 1.0.0
 *
 * @see Walker_Nav_Menu_Edit
 */
function csco_admin_modify_menu_walker() {

	/**
	 * Custom Walker for Nav Menu Editor
	 */
	class CSCO_Menu_Item_Walker extends Walker_Nav_Menu_Edit {

		/**
		 * Start the element output.
		 *
		 * We're injecting our custom fields after the div.submitbox
		 *
		 * @see Walker_Nav_Menu::start_el()
		 * @since 0.1.0
		 * @since 0.2.0 Update regex pattern to support WordPress 4.7's markup.
		 *
		 * @param string $output Passed by reference. Used to append additional content.
		 * @param object $item   Menu item data object.
		 * @param int    $depth  Depth of menu item. Used for padding.
		 * @param array  $args   Menu item args.
		 * @param int    $id     Nav menu ID.
		 */
		function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
			$item_output = '';

			parent::start_el( $item_output, $item, $depth, $args, $id );

			$output .= preg_replace(
				// NOTE: Check this regex from time to time!
				'/(?=<(fieldset|p)[^>]+class="[^"]*field-move)/',
				$this->get_fields( $item, $depth, $args ),
				$item_output
			);
		}

		/**
		 * Get custom fields
		 *
		 * @access protected
		 * @since 0.1.0
		 * @uses add_action() Calls 'menu_item_custom_fields' hook
		 *
		 * @param object $item   Menu item data object.
		 * @param int    $depth  Depth of menu item. Used for padding.
		 * @param array  $args   Menu item args.
		 * @param int    $id     Nav menu ID.
		 *
		 * @return string Form fields
		 */
		protected function get_fields( $item, $depth, $args = array(), $id = 0 ) {
			ob_start();

			/**
			 * Get menu item custom fields
			 *
			 * @since 0.1.0
			 * @since 1.0.0 Pass correct parameters.
			 *
			 * @param int    $item_id  Menu item ID.
			 * @param object $item     Menu item data object.
			 * @param int    $depth    Depth of menu item. Used for padding.
			 * @param array  $args     Menu item args.
			 *
			 * @return string Custom fields HTML.
			 */
			do_action( 'wp_nav_menu_item_data_fields', $item->ID, $item, $depth, $args );

			return ob_get_clean();
		}
	}
}
