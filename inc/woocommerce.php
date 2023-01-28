<?php
/**
 * WooCommerce compatibility functions.
 *
 * @package Networker
 */

if ( class_exists( 'WooCommerce' ) ) {

	/**
	 * Add support WooCommerce.
	 */
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );

	/**
	 * Get shop header type
	 *
	 * @param string $type Header type.
	 */
	function csco_wc_shop_header_type( $type ) {
		if ( ! is_shop() ) {
			return $type;
		}

		$shop_id = wc_get_page_id( 'shop' );

		$allow = array( 'none', 'standard', 'grid', 'large', 'title' );

		$page_header = get_post_meta( $shop_id, 'csco_page_header_type', true );

		if ( ! in_array( $page_header, $allow, true ) || 'default' === $page_header ) {
			$page_header = get_theme_mod( 'page_header_type', 'standard' );
		}

		if ( 'none' === $page_header ) {
			return 'none';
		}

		$no_paged = in_array( absint( get_query_var( 'paged' ) ), array( 0, 1 ), true );

		if ( ! $no_paged ) {
			$page_header = 'title';
		}

		return $page_header;
	}
	add_filter( 'csco_page_header_type', 'csco_wc_shop_header_type' );

	/**
	 * Remove page header from shop
	 */
	function csco_wc_remove_page_header() {
		if ( is_shop() || is_product_taxonomy() ) {
			remove_action( 'csco_site_content_before', 'csco_page_header', 100 );
		}
	}
	add_action( 'template_redirect', 'csco_wc_remove_page_header' );

	/**
	 * Disable shop page title.
	 */
	add_filter(
		'woocommerce_show_page_title',
		function( $default ) {
			return is_shop() ? false : $default;
		}
	);

	/**
	 * Add fields to WooCommerce.
	 */
	function csco_wc_add_fields_customizer() {
		CSCO_Kirki::add_section(
			'woocommerce_common_settings',
			array(
				'title'    => esc_html__( 'Common Settings', 'networker' ),
				'panel'    => 'woocommerce',
				'priority' => 1,
			)
		);

		CSCO_Kirki::add_field(
			'csco_theme_mod',
			array(
				'type'     => 'radio',
				'settings' => 'woocommerce_default_page_sidebar',
				'label'    => esc_html__( 'Default Page Sidebar', 'networker' ),
				'section'  => 'woocommerce_common_settings',
				'default'  => 'disabled',
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
				'type'     => 'checkbox',
				'settings' => 'woocommerce_product_catalog_cart',
				'label'    => esc_html__( 'Display add to cart buttom', 'networker' ),
				'section'  => 'woocommerce_product_catalog',
				'default'  => false,
				'priority' => 10,
			)
		);

		CSCO_Kirki::add_section(
			'woocommerce_product_page',
			array(
				'title'    => esc_html__( 'Product Page', 'networker' ),
				'panel'    => 'woocommerce',
				'priority' => 30,
			)
		);

		CSCO_Kirki::add_field(
			'csco_theme_mod',
			array(
				'type'     => 'radio',
				'settings' => 'woocommerce_product_page_sidebar',
				'label'    => esc_html__( 'Default Sidebar', 'networker' ),
				'section'  => 'woocommerce_product_page',
				'default'  => 'right',
				'priority' => 5,
				'choices'  => array(
					'right'    => esc_html__( 'Right Sidebar', 'networker' ),
					'left'     => esc_html__( 'Left Sidebar', 'networker' ),
					'disabled' => esc_html__( 'No Sidebar', 'networker' ),
				),
			)
		);

		CSCO_Kirki::add_section(
			'woocommerce_product_misc',
			array(
				'title'    => esc_html__( 'Miscellaneous', 'networker' ),
				'panel'    => 'woocommerce',
				'priority' => 50,
			)
		);

		CSCO_Kirki::add_field(
			'csco_theme_mod',
			array(
				'type'     => 'checkbox',
				'settings' => 'woocommerce_header_hide_icon',
				'label'    => esc_html__( 'Hide Cart Icon in Header', 'networker' ),
				'section'  => 'woocommerce_product_misc',
				'default'  => false,
				'priority' => 10,
			)
		);
	}
	add_action( 'init', 'csco_wc_add_fields_customizer' );

	/**
	 * Woocommerce loop add to cart
	 */
	function csco_wc_shop_loop_item() {
		if ( ! get_theme_mod( 'woocommerce_product_catalog_cart', false ) ) {
			remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart' );
		}
	}
	add_action( 'template_redirect', 'csco_wc_shop_loop_item' );

	/**
	 * Woocommerce gallery image width
	 */
	function csco_wc_gallery_thumbnail_image_width() {
		add_theme_support( 'woocommerce', array( 'gallery_thumbnail_image_width' => 300 ) );
	}
	add_action( 'template_redirect', 'csco_wc_gallery_thumbnail_image_width' );

	/**
	 * Enqueues WooCommerce assets.
	 */
	function csco_wc_enqueue_scripts() {
		$theme = wp_get_theme();

		$version = $theme->get( 'Version' );

		// Register WooCommerce styles.
		wp_register_style( 'csco_css_wc', csco_style( get_template_directory_uri() . '/assets/css/woocommerce.css' ), array(), $version );

		// Enqueue WooCommerce styles.
		wp_enqueue_style( 'csco_css_wc' );

		// Add RTL support.
		wp_style_add_data( 'csco_css_wc', 'rtl', 'replace' );

		// Remove selectWoo.
		wp_dequeue_style( 'selectWoo' );
		wp_dequeue_script( 'selectWoo' );
	}
	add_action( 'wp_enqueue_scripts', 'csco_wc_enqueue_scripts' );

	/**
	 * PinIt exclude selectors
	 *
	 * @param string $selectors List selectors.
	 */
	function csco_wc_pinit_exclude_selectors( $selectors ) {
		$selectors[] = '.woocommerce .products img';
		$selectors[] = '.woocommerce-product-gallery img';
		$selectors[] = '.woocommerce-cart-form .product-thumbnail img';
		$selectors[] = '.wc-block-featured-category';
		$selectors[] = '.wc-block-featured-product';
		$selectors[] = '.wp-block-handpicked-products';
		$selectors[] = '.wc-block-grid';

		return $selectors;
	}
	add_filter( 'powerkit_pinit_exclude_selectors', 'csco_wc_pinit_exclude_selectors' );

	/**
	 * Get Page Sidebar
	 *
	 * @param string $sidebar Page sidebar.
	 */
	function csco_wc_get_page_sidebar( $sidebar ) {

		if ( is_woocommerce() || is_product_category() || is_product_tag() || is_cart() || is_checkout() || is_account_page() ) {

			global $post;

			if ( is_shop() ) {
				$page_id = wc_get_page_id( 'shop' );
			} elseif ( is_product() || is_page() ) {
				$page_id = $post->ID;
			} else {
				$page_id = 0;
			}

			// Get sidebar for current post.
			$sidebar = get_post_meta( $page_id, 'csco_singular_sidebar', true );

			if ( ! $sidebar || 'default' === $sidebar ) {

				$sidebar = get_theme_mod( 'woocommerce_default_page_sidebar', 'disabled' );

				if ( is_product() ) {
					$sidebar = get_theme_mod( 'woocommerce_product_page_sidebar', 'right' );
				}
			}
		}

		return $sidebar;

	}
	add_filter( 'csco_page_sidebar', 'csco_wc_get_page_sidebar' );

	/**
	 * Register WooCommerce Sidebar
	 */
	function csco_wc_widgets_init() {
		register_sidebar(
			array(
				'name'          => esc_html__( 'WooCommerce', 'networker' ),
				'id'            => 'sidebar-woocommerce',
				'before_widget' => '<div class="widget %1$s %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => csco_section_heading( null, 'before', false, null ),
				'after_title'   => csco_section_heading( null, 'after', false, null ),
			)
		);
	}
	add_action( 'widgets_init', 'csco_wc_widgets_init' );

	/**
	 * Overwrite Default Sidebar
	 *
	 * @param string $sidebar Sidebar slug.
	 */
	function csco_wc_sidebar( $sidebar ) {
		if ( is_woocommerce() || is_cart() || is_checkout() || is_account_page() ) {
			return 'sidebar-woocommerce';
		}
		return $sidebar;
	}
	add_filter( 'csco_sidebar', 'csco_wc_sidebar' );

	/**
	 * Add cart to header
	 *
	 * @param array $settings The advanced settings.
	 */
	function csco_wc_header_cart( $settings = array() ) {

		if ( ! get_theme_mod( 'woocommerce_header_hide_icon', false ) ) {

			$quantity = intval( WC()->cart->get_cart_contents_count() );
			?>
			<a class="cs-header__cart" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'networker' ); ?>">
				<i class="cs-icon cs-icon-cart"></i>
				<?php if ( $quantity ) { ?>
					<span class="cs-header__cart-quantity"><?php echo esc_html( $quantity ); ?></span>
				<?php } ?>
			</a>
			<?php
		}
	}

	/**
	 * Add location for update nav cart
	 *
	 * @param array $fragments The cart fragments.
	 */
	function csco_wc_update_nav_cart( $fragments ) {

		ob_start();

		csco_wc_header_cart();

		$fragments['a.cs-header__cart'] = ob_get_clean();

		return $fragments;

	}
	add_filter( 'woocommerce_add_to_cart_fragments', 'csco_wc_update_nav_cart', 10, 1 );

	/**
	 * Toc exclude selectors.
	 *
	 * @param string $selectors The selectors.
	 */
	function csco_wc_toc_exclude( $selectors ) {
		$selectors .= '|.woocommerce-loop-product__title';

		return $selectors;
	}
	add_filter( 'pk_toc_exclude', 'csco_wc_toc_exclude' );

	/**
	 * WC Breadcrumbs
	 *
	 * @param bool $echo Output type.
	 */
	function csco_wc_breadcrumbs( $echo = true ) {
		$display_options = get_option( 'wpseo_titles' );

		if ( ! isset( $display_options['breadcrumbs-enable'] ) ) {
			$display_options['breadcrumbs-enable'] = false;
		}

		ob_start();
		if ( function_exists( 'yoast_breadcrumb' ) && $display_options['breadcrumbs-enable'] ) {
			yoast_breadcrumb( '<div class="cs-breadcrumbs" id="breadcrumbs">', '</div>' );
		} else {
			woocommerce_breadcrumb();
		}

		// Check the number of levels in breadcrumbs.
		preg_match_all( '/<\/a>/', ob_get_contents(), $matches );

		if ( ! isset( $matches[0] ) || count( $matches[0] ) <= 1 ) {
			ob_end_clean();

			return;
		}

		if ( $echo ) {
			return ob_end_flush();
		}

		return ob_get_clean();
	}

	/**
	 * WC Change Theme Breadcrumbs
	 *
	 * @param bool $enabled The enabled breadcrumbs.
	 */
	function csco_wc_theme_breadcrumbs( $enabled ) {
		if ( is_shop() || is_product_taxonomy() || is_product() || is_cart() || is_checkout() || is_account_page() ) {
			csco_wc_breadcrumbs();
			return false;
		}

		return $enabled;
	}
	add_filter( 'csco_breadcrumbs', 'csco_wc_theme_breadcrumbs' );

	/**
	 * Reassign default breadcrumbs
	 */
	function csco_wc_reassign_breadcrumbs() {
		remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
	}
	add_action( 'template_redirect', 'csco_wc_reassign_breadcrumbs' );

	/**
	 * Entry Media Large
	 */
	function csco_wc_entry_media_large() {
		global $post;

		if ( ! is_shop() ) {
			return;
		}

		$shop_id = wc_get_page_id( 'shop' );

		$post = get_post( $shop_id );

		setup_postdata( $post );

		if ( 'large' !== csco_get_page_header_type() ) {
			return;
		}

		get_template_part( 'template-parts/entry/entry-media-large' );

		wp_reset_postdata();
	}
	add_action( 'csco_site_content_start', 'csco_wc_entry_media_large', 10 );

	/**
	 * Entry Header Grid
	 */
	function csco_wc_entry_header_grid() {
		global $post;

		if ( ! is_shop() ) {
			return;
		}

		$shop_id = wc_get_page_id( 'shop' );

		$post = get_post( $shop_id );

		setup_postdata( $post );

		if ( 'grid' !== csco_get_page_header_type() ) {
			return;
		}

		get_template_part( 'template-parts/entry/entry-header' );

		wp_reset_postdata();
	}
	add_action( 'csco_main_content_before', 'csco_wc_entry_header_grid', 10 );

	/**
	 * Entry Header Standard
	 */
	function csco_wc_entry_header() {
		global $post;

		if ( ! is_shop() ) {
			return;
		}

		$shop_id = wc_get_page_id( 'shop' );

		$post = get_post( $shop_id );

		setup_postdata( $post );

		if ( 'none' === csco_get_page_header_type() ) {
			return;
		}
		if ( 'grid' === csco_get_page_header_type() ) {
			return;
		}

		get_template_part( 'template-parts/entry/entry-header' );

		wp_reset_postdata();
	}
	add_action( 'csco_wc_main_before', 'csco_wc_entry_header', 10 );

	/**
	 * Wrapper Start
	 */
	function csco_wc_wrapper_start() {
		?>
		<div id="primary" class="cs-content-area">

			<?php do_action( 'csco_wc_main_before' ); ?>

			<div class="woocommerce-area">
		<?php
	}
	add_action( 'woocommerce_before_main_content', 'csco_wc_wrapper_start', 1 );

	/**
	 * Wrapper End
	 */
	function csco_wc_wrapper_end() {
		?>
			</div>
		</div>
		<?php
	}
	add_action( 'woocommerce_after_main_content', 'csco_wc_wrapper_end', 999 );

	/**
	 * Related products heading
	 */
	function csco_wc_product_related_products_heading() {
		csco_section_heading( esc_html__( 'Related Products', 'networker' ) );

		return false;
	}
	add_action( 'woocommerce_product_related_products_heading', 'csco_wc_product_related_products_heading' );

	/**
	 * Description products heading
	 */
	function csco_wc_product_description_heading() {
		return false;
	}
	add_action( 'woocommerce_product_description_heading', 'csco_wc_product_description_heading' );
}
