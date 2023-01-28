<?php
/**
 * Networker functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Networker
 */
/*
 require '/home/admin/web/gadgetlab.space/public_html/wp-content/plugins/plugin-update-checker-master/plugin-update-checker.php';
 use YahnisElsts\PluginUpdateChecker\v5\PucFactory;
 
 $myUpdateChecker = PucFactory::buildUpdateChecker(
	 'https://github.com/captainkarlcod/networker',
	 __FILE__,
	 'networker-main'
 );
*/


update_option( 'networker_license_data', [
	'status'          => 'active',
	'count'           => '1',
	'sold_at'         => 'now',
	'supported_until' => 'now',
	'demos'           => 'csco_theme_demos',
	'ocdi'            => [
		'parent_slug' => 'themes.php',
		'page_title' => 'Demo Content',
		'menu_title' => 'Demo Content',
		'capability' => 'import',
		'menu_slug' => 'csco-demo-content',
	],
] );

if ( ! function_exists( 'csco_setup' ) ) {
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function csco_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Networker, use a find and replace
		 * to change 'networker' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'networker', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'primary'        => esc_html__( 'Primary', 'networker' ),
				'additional'     => esc_html__( 'Additional', 'networker' ),
				'mobile'         => esc_html__( 'Mobile', 'networker' ),
				'footer'         => esc_html__( 'Footer', 'networker' ),
				'footer_columns' => esc_html__( 'Footer Columns', 'networker' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, comments, etc.
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'script',
				'style',
			)
		);

		// Add support for responsive embeds.
		add_theme_support( 'responsive-embeds' );

		// Add support for custom line height controls.
		add_theme_support( 'custom-line-height' );

		// Add support for experimental cover block spacing.
		add_theme_support( 'custom-spacing' );

		// Supported Formats.
		add_theme_support( 'post-formats', array( 'gallery', 'video', 'audio' ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Restoring the classic Widgets Editor.
		remove_theme_support( 'widgets-block-editor' );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

		// Canvas: Disable section responsive.
		add_theme_support( 'canvas-disable-section-responsive' );

		// Canvas: Enable data scheme.
		add_theme_support( 'canvas-enable-data-scheme' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// Register custom thumbnail sizes.
		add_image_size( 'csco-smaller', 80, 80, true );
		add_image_size( 'csco-small', 110, 110, true );
		add_image_size( 'csco-thumbnail', 380, 250, true );
		add_image_size( 'csco-thumbnail-alt', 230, 150, true );
		add_image_size( 'csco-thumbnail-small', 260, 170, true );
		add_image_size( 'csco-thumbnail-uncropped', 380, 0, false );
		add_image_size( 'csco-intermediate', 550, 350, true );
		add_image_size( 'csco-intermediate-uncropped', 550, 0, true );
		add_image_size( 'csco-medium', 800, 500, true );
		add_image_size( 'csco-medium-uncropped', 800, 0, true );
		add_image_size( 'csco-large', 1160, 680, true );
		add_image_size( 'csco-large-uncropped', 1160, 0, true );
		add_image_size( 'csco-extra-large', 1920, 1024, true );
	}
}
add_action( 'after_setup_theme', 'csco_setup' );

/**
* Theme Activation.
*/
require get_template_directory() . '/inc/classes/class-csco-theme-activation.php';

/**
* Assets.
*/
require get_template_directory() . '/inc/assets.php';

/**
* Widgets Init.
*/
require get_template_directory() . '/inc/widgets-init.php';

/**
*
* Template Functions.
*/
require get_template_directory() . '/inc/template-functions.php';

/**
* Filters.
*/
require get_template_directory() . '/inc/filters.php';

/**
* Gutenberg.
*/
require get_template_directory() . '/inc/gutenberg.php';

/**
* Woocommerce.
*/
require get_template_directory() . '/inc/woocommerce.php';

/**
* Customizer Functions.
*/
require get_template_directory() . '/inc/customizer.php';

/**
* Actions.
*/
require get_template_directory() . '/inc/actions.php';

/**
* Partials.
*/
require get_template_directory() . '/inc/partials.php';

/**
* Custom template tags for this theme.
*/
require get_template_directory() . '/inc/template-tags.php';

/**
* Custom post meta function.
*/
require get_template_directory() . '/inc/post-meta.php';

/**
* Mega menu.
*/
require get_template_directory() . '/inc/mega-menu.php';

/**
* Load More.
*/
require get_template_directory() . '/inc/load-more.php';

/**
* Load Nextpost.
*/
require get_template_directory() . '/inc/load-nextpost.php';

/**
* Custom Content.
*/
require get_template_directory() . '/inc/custom-content.php';

/**
* Powerkit fuctions.
*/
require get_template_directory() . '/inc/powerkit.php';

/**
* Plugins.
*/
require get_template_directory() . '/inc/plugins.php';

/**
* Deprecated.
*/
require get_template_directory() . '/inc/deprecated.php';

/**
* One Click Demo Import.
*/
require get_template_directory() . '/inc/demo-import/ocdi-filters.php';

/**
* Customizer demos.
*/
require get_template_directory() . '/inc/demo-import/customizer-demos.php';

/**
* Theme demos.
*/
require get_template_directory() . '/inc/demo-import/theme-demos.php';
require get_template_directory() . '/inc/demo-import/theme-homepages.php';

/**
* Theme sections.
*/
require get_template_directory() . '/inc/demo-import/theme-sections.php';
