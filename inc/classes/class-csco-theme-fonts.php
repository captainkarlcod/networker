<?php
/**
 * Class add support for custom fonts from the theme

 * @package Networker
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Custom fonts from the theme
 */
class CSCO_Theme_Fonts {

	/**
	 * The theme fonts.
	 *
	 * @static
	 * @access protected
	 * @var array
	 */
	public static $theme_fonts = array();

	/**
	 * The theme all variants.
	 *
	 * @static
	 * @access protected
	 * @var array
	 */
	public static $theme_variants = array();

	/**
	 * The class constructor
	 */
	public function __construct() {
		$this->init();

		// Hook a functions or methods to a specific filter actions.
		add_filter( 'admin_init', array( $this, 'get_stack_variants' ) );
		add_filter( 'template_redirect', array( $this, 'get_stack_variants' ) );
		add_filter( 'csco_kirki_dynamic_css', array( $this, 'dynamic_css_fonts_stack' ) );
		add_filter( 'kirki_global_dynamic_css', array( $this, 'dynamic_css_fonts_stack' ) );
		add_filter( 'kirki_csco_theme_mod_dynamic_css', array( $this, 'dynamic_css_fonts_stack' ) );
		add_filter( 'powerkit_fonts_choices', array( $this, 'customizer_fonts_choices' ), 999 );

		add_action( 'wp_enqueue_scripts', array( $this, 'wp_enqueue_scripts' ), 5 );
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue_scripts' ), 5 );
	}

	/**
	 * Initialization
	 */
	public function init() {
		self::$theme_fonts = apply_filters( 'csco_theme_fonts', array() );

		// Validation fonts.
		foreach ( self::$theme_fonts as $key => $font ) {
			if ( ! isset( $font['name'] ) || ! isset( $font['variants'] ) ) {
				unset( self::$theme_fonts[ $key ] );
			}
		}
	}

	/**
	 * Add new fonts for choices
	 *
	 * @param array $fonts List fonts.
	 */
	public function customizer_fonts_choices( $fonts ) {

		if ( is_customize_preview() ) {

			// Add new section.
			if ( self::$theme_fonts ) {
				$fonts['fonts']['families']['theme'] = array(
					'text'     => esc_html__( 'Theme Fonts', 'networker' ),
					'children' => array(),
				);
			}

			// Add new font.
			foreach ( self::$theme_fonts as $slug => $font ) {
				$fonts['fonts']['families']['theme']['children'][] = array(
					'text' => $font['name'],
					'id'   => $slug,
				);

				$fonts['fonts']['variants'][ $slug ] = $font['variants'];
			}
		}

		return $fonts;
	}

	/**
	 * Extend font stack for dynamic styles
	 *
	 * @param string $style The dynamic css.
	 */
	public function dynamic_css_fonts_stack( $style ) {

		foreach ( self::$theme_fonts as $slug => $font ) {
			$style = str_replace( sprintf( 'font-family:%s;', $slug ), sprintf( 'font-family:%s,-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";', $slug ), $style );
		}

		return $style;
	}

	/**
	 * Get font-weight from variant.
	 *
	 * @param string $variant The variant of font.
	 */
	public function get_font_weight( $variant = 'regular' ) {
		$font_weight = filter_var( $variant, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION );

		return ( 'regular' === $variant || 'italic' === $variant ) ? 400 : absint( $font_weight );
	}

	/**
	 * Get font-style from variant.
	 *
	 * @param string $variant The variant of font.
	 */
	public function get_font_style( $variant = 'regular' ) {
		return ( false === strpos( $variant, 'italic' ) ) ? 'normal' : 'italic';
	}

	/**
	 * Get stack the variants that are used in the theme.
	 */
	public function get_stack_variants() {
		$csco_kirki = csco_kirki_init();

		// Get all fields.
		if ( class_exists( 'Kirki' ) && property_exists( 'Kirki', 'all_fields' ) ) {
			$fields = Kirki::$all_fields;
		} elseif ( class_exists( 'Kirki' ) && property_exists( 'Kirki', 'fields' ) ) {
			$fields = Kirki::$fields;
		} elseif ( CSCO_Kirki::$fields ) {
			$fields = CSCO_Kirki::$fields;
		}

		$extra_variants = array();

		if ( is_array( $fields ) && $fields ) {
			foreach ( $fields as $field ) {
				// Check active callback.
				if ( ! $csco_kirki->active_callback( $field ) ) {
					continue;
				}

				if ( ! isset( $field['settings'] ) ) {
					continue;
				}

				$field_value = get_theme_mod( $field['settings'], isset( $field['default'] ) ? $field['default'] : array() );

				if ( ! isset( $field_value['font-family'] ) || ! $field_value['font-family'] ) {
					continue;
				}

				// Set font-family.
				$font_family = $field_value['font-family'];

				// Set font-weight.
				$font_weight = ( isset( $field_value['font-weight'] ) && $field_value['font-weight'] ) ? $field_value['font-weight'] : 400;

				$font_weight = ( 'regular' === $font_weight ) ? 400 : absint( $font_weight );

				// Set font-style.
				$font_style = ( isset( $field_value['font-style'] ) && $field_value['font-style'] ) ? $field_value['font-style'] : 'normal';

				// Add hash.
				array_push( $extra_variants, $font_family . $font_weight . $font_style );

				if ( ! isset( $field['choices']['variant'] ) || ! $field['choices']['variant'] ) {
					continue;
				}

				// Add all possible variations from choices.
				foreach ( $field['choices']['variant'] as $variant ) {
					// Get font-weight from variant.
					$font_weight = $this->get_font_weight( $variant );

					// Get font-style from variant.
					$font_style = $this->get_font_style( $variant );

					// Add hash of choices.
					array_push( $extra_variants, $font_family . $font_weight . $font_style );
				}
			}
		}

		self::$theme_variants = $extra_variants;
	}

	/**
	 * Gets all our styles and returns them as a string.
	 *
	 * @param string $method Webfonts Load Method.
	 */
	public function get_styles( $method = null ) {

		ob_start();
		foreach ( self::$theme_fonts as $slug => $font ) {

			foreach ( $font['variants'] as $variant ) {
				$font_family = $slug;

				// Get font-weight from variant.
				$font_weight = $this->get_font_weight( $variant );

				// Get font-style from variant.
				$font_style = $this->get_font_style( $variant );

				// Get font path.
				$font_path = sprintf( '%s/assets/static/fonts/%s-%s', get_template_directory_uri(), $slug, $variant );

				// Get hash from font.
				$hash = $font_family . $font_weight . $font_style;

				// Check whether the font is used in the theme.
				if ( ! in_array( $hash, self::$theme_variants, true ) ) {
					continue;
				}
				?>
				@font-face {
					font-family: <?php echo esc_html( $slug ); ?>;
					src: url('<?php echo esc_html( $font_path ); ?>.woff2') format('woff2'),
						url('<?php echo esc_html( $font_path ); ?>.woff') format('woff');
					font-weight: <?php echo esc_html( $font_weight ); ?>;
					font-display: <?php echo esc_html( 'async' === $method ? 'swap' : 'auto' ); ?>;
					font-style: <?php echo esc_html( $font_style ); ?>;
				}
				<?php
			}
		}

		$styles = ob_get_clean();

		// Remove extra characters.
		$styles = str_replace( array( "\t", "\r", "\n" ), '', $styles );

		return $styles;
	}

	/**
	 * Enqueue scripts and styles.
	 *
	 * @access public
	 */
	public function wp_enqueue_scripts() {
		wp_register_style( 'csco-theme-fonts', false );

		wp_enqueue_style( 'csco-theme-fonts' );

		if ( is_customize_preview() || 'async' === get_theme_mod( 'webfonts_load_method', 'async' ) ) {
			wp_add_inline_style( 'csco-theme-fonts', $this->get_styles( 'async' ) );
		} else {
			wp_add_inline_style( 'csco-theme-fonts', $this->get_styles() );
		}
	}

	/**
	 * Admin Enqueue scripts and styles.
	 *
	 * @access public
	 */
	public function admin_enqueue_scripts() {
		if ( ! is_customize_preview() ) {
			wp_register_style( 'csco-theme-fonts', false );

			wp_enqueue_style( 'csco-theme-fonts' );

			wp_add_inline_style( 'csco-theme-fonts', $this->get_styles() );
		}
	}
}

new CSCO_Theme_Fonts();
