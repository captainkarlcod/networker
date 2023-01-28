<?php
/**
 * Wrapper Class for kirki which also acts as a fallback for CSS generation
 * when the kirki plugin is disabled.
 *
 * @package Networker
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
/**
 * This is a wrapper class for Kirki.
 * If the Kirki plugin is installed, then all CSS & Google fonts
 * will be handled by the plugin.
 * In case the plugin is not installed, this acts as a fallback
 * ensuring that all CSS & fonts still work.
 * It does not handle the customizer options, simply the frontend CSS.
 */
class CSCO_Kirki {

	/**
	 * The config ID.
	 *
	 * @static
	 * @access protected
	 * @var array
	 */
	public static $config = array();

	/**
	 * The counter.
	 *
	 * @static
	 * @access protected
	 * @var array
	 */
	public static $counter = 0;

	/**
	 * An array of all our fields.
	 *
	 * @static
	 * @access protected
	 * @var array
	 */
	public static $fields = array();

	/**
	 * The class constructor
	 */
	public function __construct() {
		// If Kirki exists then there's no reason to proceed.
		if ( class_exists( 'Kirki' ) ) {
			return;
		}

		// Add our CSS.
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_styles' ), 20 );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_fonts' ) );
		// Enqueue styles to Gutenberg Editor.
		add_filter( 'admin_enqueue_scripts', array( $this, 'gutenberg_editor' ), 20 );
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_fonts' ) );
	}

	/**
	 * Get the value of an option from the db.
	 *
	 * @param string $config_id The ID of the configuration corresponding to this field.
	 * @param string $field_id  The field_id (defined as 'settings' in the field arguments).
	 * @return mixed            The saved value of the field.
	 */
	public static function get_option( $config_id = '', $field_id = '' ) {
		// if Kirki exists, use it.
		if ( class_exists( 'Kirki' ) ) {
			return Kirki::get_option( $config_id, $field_id );
		}
		// Kirki does not exist, continue with our custom implementation.
		// Get the default value of the field.
		$default = '';
		if ( isset( self::$fields[ $field_id ] ) && isset( self::$fields[ $field_id ]['default'] ) ) {
			$default = self::$fields[ $field_id ]['default'];
		}
		// Make sure the config is defined.
		if ( isset( self::$config[ $config_id ] ) ) {
			if ( 'option' === self::$config[ $config_id ]['option_type'] ) {
				// check if we're using serialized options.
				if ( isset( self::$config[ $config_id ]['option_name'] ) && ! empty( self::$config[ $config_id ]['option_name'] ) ) {
					// Get all our options.
					$all_options = get_option( self::$config[ $config_id ]['option_name'], array() );
					// If our option is not saved, return the default value.
					// If option was set, return its value unserialized.
					return ( ! isset( $all_options[ $field_id ] ) ) ? $default : maybe_unserialize( $all_options[ $field_id ] );
				}
				// If we're not using serialized options, get the value and return it.
				// We'll be using a dummy default here to check if the option has been set or not.
				// We'll be using md5 to make sure it's randomish and impossible to be actually set by a user.
				$dummy = md5( $config_id . '_UNDEFINED_VALUE' );
				$value = get_option( $field_id, $dummy );
				// setting has not been set, return default.
				return ( $dummy === $value ) ? $default : $value;
			}
			// We're not using options so fallback to theme_mod.
			return get_theme_mod( $field_id, $default );
		}
	}

	/**
	 * Create a new panel.
	 *
	 * @param string $id   The ID for this panel.
	 * @param array  $args The panel arguments.
	 */
	public static function add_panel( $id = '', $args = array() ) {
		if ( class_exists( 'Kirki' ) ) {
			Kirki::add_panel( $id, $args );
		}
		/* If Kirki does not exist then there's no reason to add any panels. */
	}

	/**
	 * Create a new section.
	 *
	 * @param string $id   The ID for this section.
	 * @param array  $args The section arguments.
	 */
	public static function add_section( $id, $args ) {
		if ( class_exists( 'Kirki' ) ) {
			Kirki::add_section( $id, $args );
		}
		/* If Kirki does not exist then there's no reason to add any sections. */
	}

	/**
	 * Sets the configuration options.
	 *
	 * @param string $config_id The configuration ID.
	 * @param array  $args      The configuration arguments.
	 */
	public static function add_config( $config_id, $args = array() ) {
		// if Kirki exists, use it.
		if ( class_exists( 'Kirki' ) ) {
			Kirki::add_config( $config_id, $args );
			return;
		}
		// Kirki does not exist, set the config arguments.
		self::$config[ $config_id ] = $args;
		// Make sure an option_type is defined.
		if ( ! isset( self::$config[ $config_id ]['option_type'] ) ) {
			self::$config[ $config_id ]['option_type'] = 'theme_mod';
		}
	}

	/**
	 * Create a new field
	 *
	 * @param string $config_id The configuration ID.
	 * @param array  $args      The field's arguments.
	 * @return null
	 */
	public static function add_field( $config_id, $args ) {

		self::$counter++;

		if ( is_array( $args ) ) {
			$args['priority'] = self::$counter;
		}

		// if Kirki exists, use it.
		if ( class_exists( 'Kirki' ) ) {
			Kirki::add_field( $config_id, $args );
			return;
		}
		// Kirki was not located, so we'll need to add our fields here.
		// Check that the "settings" & "type" arguments have been defined.
		if ( isset( $args['settings'] ) && isset( $args['type'] ) ) {
			// Make sure we add the config_id to the field itself.
			// This will make it easier to get the value when generating the CSS later.
			if ( ! isset( $args['kirki_config'] ) ) {
				$args['kirki_config'] = $config_id;
			}
			self::$fields[ $args['settings'] ] = $args;
		}
	}

	/**
	 * Enqueues the stylesheet.
	 *
	 * @access public
	 * @return null
	 */
	public function enqueue_styles() {
		// If Kirki exists there's no need to proceed any further.
		if ( class_exists( 'Kirki' ) ) {
			return;
		}
		// Get our inline styles.
		$styles = $this->get_styles();
		// If we have some styles to add, add them now.
		if ( ! empty( $styles ) ) {
			wp_add_inline_style( 'csco-styles', apply_filters( 'csco_kirki_dynamic_css', $styles ) );
		}
	}

	/**
	 * Enqueue styles to Gutenberg Editor.
	 *
	 * @access public
	 * @return null
	 */
	public function gutenberg_editor() {
		// If Kirki exists there's no need to proceed any further.
		if ( class_exists( 'Kirki' ) ) {
			return;
		}

		if ( is_admin() && ! is_customize_preview() ) {
			// Get our inline styles.
			$styles = $this->get_styles();

			// If we have some styles to add, add them now.
			if ( ! empty( $styles ) ) {
				wp_register_style( 'csco-kirki-gutenberg', false );

				wp_enqueue_style( 'csco-kirki-gutenberg' );

				wp_add_inline_style( 'csco-kirki-gutenberg', apply_filters( 'csco_kirki_dynamic_css', $styles ) );
			}
		}
	}

	/**
	 * Compares the 2 values given the condition
	 *
	 * @param mixed  $value1   The 1st value in the comparison.
	 * @param mixed  $value2   The 2nd value in the comparison.
	 * @param string $operator The operator we'll use for the comparison.
	 * @return boolean whether The comparison has succeded (true) or failed (false).
	 */
	public function compare_values( $value1, $value2, $operator ) {
		if ( '===' === $operator ) {
			return $value1 === $value2;
		}
		if ( '!==' === $operator ) {
			return $value1 !== $value2;
		}
		if ( ( '!=' === $operator || 'not equal' === $operator ) ) {
			return $value1 != $value2; // WPCS: loose comparison ok.
		}
		if ( ( '>=' === $operator || 'greater or equal' === $operator || 'equal or greater' === $operator ) ) {
			return $value2 >= $value1;
		}
		if ( ( '<=' === $operator || 'smaller or equal' === $operator || 'equal or smaller' === $operator ) ) {
			return $value2 <= $value1;
		}
		if ( ( '>' === $operator || 'greater' === $operator ) ) {
			return $value2 > $value1;
		}
		if ( ( '<' === $operator || 'smaller' === $operator ) ) {
			return $value2 < $value1;
		}
		if ( 'contains' === $operator || 'in' === $operator ) {
			if ( is_array( $value1 ) && is_array( $value2 ) ) {
				foreach ( $value2 as $val ) {
					if ( in_array( $val, $value1 ) ) { // phpcs:ignore WordPress.PHP.StrictInArray.MissingTrueStrict
						return true;
					}
				}
				return false;
			}
			if ( is_array( $value1 ) && ! is_array( $value2 ) ) {
				return in_array( $value2, $value1 ); // phpcs:ignore WordPress.PHP.StrictInArray.MissingTrueStrict
			}
			if ( is_array( $value2 ) && ! is_array( $value1 ) ) {
				return in_array( $value1, $value2 ); // phpcs:ignore WordPress.PHP.StrictInArray.MissingTrueStrict
			}
			return ( false !== strrpos( $value1, $value2 ) || false !== strpos( $value2, $value1 ) );
		}
		return $value1 == $value2; // WPCS: loose comparison ok.
	}

	/**
	 * Process the active_callback parameter.
	 *
	 * @param array $field The current field.
	 */
	public function active_callback( $field ) {

		if ( isset( $field['active_callback'] ) && is_array( $field['active_callback'] ) ) {
			if ( ! is_callable( $field['active_callback'] ) ) {

				// Bugfix for https://github.com/aristath/kirki/issues/1961.
				foreach ( $field['active_callback'] as $key => $val ) {
					if ( is_callable( $val ) ) {
						unset( $field['active_callback'][ $key ] );
					}
				}
				if ( isset( $field['active_callback'][0] ) ) {
					$field['required'] = $field['active_callback'];
				}
			}
		}

		// Only continue if field dependencies are met.
		if ( isset( $field['required'] ) && ! empty( $field['required'] ) ) {
			$valid = true;

			foreach ( $field['required'] as $requirement ) {
				if ( isset( $requirement['setting'] ) && isset( $requirement['value'] ) && isset( $requirement['operator'] ) ) {

					$controller_value = self::get_option( $field['kirki_config'], $requirement['setting'] );
					if ( ! $this->compare_values( $controller_value, $requirement['value'], $requirement['operator'] ) ) {
						$valid = false;
					}
				}
			}
			if ( ! $valid ) {
				return false;
			}
		}

		return true;
	}

	/**
	 * Sanitizes typography controls
	 *
	 * @param array $value The value.
	 */
	public static function typography_sanitize( $value ) {
		if ( ! is_array( $value ) ) {
			return array();
		}

		foreach ( $value as $key => $val ) {
			switch ( $key ) {
				case 'font-family':
					$value['font-family'] = sanitize_text_field( $val );
					break;
				case 'font-weight':
					if ( isset( $value['variant'] ) ) {
						break;
					}
					$value['variant'] = $val;
					if ( isset( $value['font-style'] ) && 'italic' === $value['font-style'] ) {
						$value['variant'] = ( '400' !== $val || 400 !== $val ) ? $value['variant'] . 'italic' : 'italic';
					}
					break;
				case 'variant':
					// Use 'regular' instead of 400 for font-variant.
					$value['variant'] = ( 400 === $val || '400' === $val ) ? 'regular' : $val;

					// Get font-weight from variant.
					$value['font-weight'] = filter_var( $value['variant'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION );
					$value['font-weight'] = ( 'regular' === $value['variant'] || 'italic' === $value['variant'] ) ? 400 : absint( $value['font-weight'] );

					// Get font-style from variant.
					if ( ! isset( $value['font-style'] ) ) {
						$value['font-style'] = ( false === strpos( $value['variant'], 'italic' ) ) ? 'normal' : 'italic';
					}
					break;
				case 'font-size':
				case 'letter-spacing':
				case 'word-spacing':
				case 'line-height':
					$value[ $key ] = '' === trim( $value[ $key ] ) ? '' : sanitize_text_field( $val );
					break;
				case 'text-align':
					if ( ! in_array( $val, array( '', 'inherit', 'left', 'center', 'right', 'justify' ), true ) ) {
						$value['text-align'] = '';
					}
					break;
				case 'text-transform':
					if ( ! in_array( $val, array( '', 'none', 'capitalize', 'uppercase', 'lowercase', 'initial', 'inherit' ), true ) ) {
						$value['text-transform'] = '';
					}
					break;
				case 'text-decoration':
					if ( ! in_array( $val, array( '', 'none', 'underline', 'overline', 'line-through', 'initial', 'inherit' ), true ) ) {
						$value['text-transform'] = '';
					}
					break;
				case 'color':
					$value['color'] = $value['color'];
					break;
			}
		}

		return $value;
	}

	/**
	 * Gets all our styles and returns them as a string.
	 *
	 * @param string $final_css The inline css.
	 */
	public function get_styles( $final_css = '' ) {

		// Get an array of all our fields.
		$fields = self::$fields;

		// Check if we need to exit early.
		if ( empty( self::$fields ) || ! is_array( $fields ) ) {
			return;
		}

		// Initially we're going to format our styles as an array.
		// This is going to make processing them a lot easier
		// and make sure there are no duplicate styles etc.
		$css = array();

		// Start parsing our fields.
		foreach ( $fields as $field ) {
			// No need to process fields without an output, or an improperly-formatted output.
			if ( ! isset( $field['output'] ) || empty( $field['output'] ) || ! is_array( $field['output'] ) ) {
				continue;
			}

			// Get the value of this field.
			$value = self::get_option( $field['kirki_config'], $field['settings'] );

			// Check active callback.
			if ( ! $this->active_callback( $field ) ) {
				continue;
			}

			// Start parsing the output arguments of the field.
			foreach ( $field['output'] as $output ) {

				if ( is_admin() && ! is_customize_preview() ) {
					// Check if this is an admin style.
					if ( ! isset( $output['context'] ) || ! in_array( 'editor', $output['context'], true ) ) {
						continue;
					}
				} elseif ( isset( $output['context'] ) && ! in_array( 'front', $output['context'], true ) ) {
					// Check if this is a frontend style.
					continue;
				}

				$output = wp_parse_args(
					$output, array(
						'element'       => '',
						'property'      => '',
						'media_query'   => 'global',
						'prefix'        => '',
						'units'         => '',
						'suffix'        => '',
						'value_pattern' => '$',
						'choice'        => '',
					)
				);
				// If element is an array, convert it to a string.
				if ( is_array( $output['element'] ) ) {
					$output['element'] = implode( ',', $output['element'] );
				}
				// Simple fields.
				if ( ! is_array( $value ) ) {
					$value_pattern = str_replace( '$', $value, $output['value_pattern'] );
					if ( ! empty( $output['element'] ) && ! empty( $output['property'] ) ) {
						$css[ $output['media_query'] ][ $output['element'] ][ $output['property'] ] = $output['prefix'] . $value_pattern . $output['units'] . $output['suffix'];
					}
				} else {
					if ( isset( $value['font-family'] ) || isset( $value['font-weight'] ) || isset( $value['variant'] ) ) {

						$value = $this::typography_sanitize( $value );

						$properties = array(
							'font-family',
							'font-size',
							'variant',
							'font-weight',
							'font-style',
							'letter-spacing',
							'word-spacing',
							'line-height',
							'text-align',
							'text-transform',
							'text-decoration',
							'color',
						);

						foreach ( $properties as $property ) {
							// Early exit if the value is not in the defaults.
							if ( ! isset( $field['default'][ $property ] ) ) {
								continue;
							}

							// Early exit if the value is not saved in the values.
							if ( ! isset( $value[ $property ] ) || ! $value[ $property ] ) {
								continue;
							}

							// Take care of variants.
							if ( 'variant' === $property && isset( $value['variant'] ) && ! empty( $value['variant'] ) ) {

								// Get the font_weight.
								$font_weight = str_replace( 'italic', '', $value['variant'] );
								$font_weight = in_array( $font_weight, array( '', 'regular' ), true ) ? '400' : $font_weight;

								$css[ $output['media_query'] ][ $output['element'] ]['font-weight'] = $font_weight;

								// Is this italic?
								$is_italic = ( false !== strpos( $value['variant'], 'italic' ) );
								if ( $is_italic ) {
									$css[ $output['media_query'] ][ $output['element'] ]['font-style'] = 'italic';
								}
								continue;
							}

							$css[ $output['media_query'] ][ $output['element'] ][ $property ] = $output['prefix'] . $value[ $property ] . $output['suffix'];
						}
					} else {
						foreach ( $value as $key => $subvalue ) {
							$property = $key;

							if ( false !== strpos( $output['property'], '%%' ) ) {

								$property = str_replace( '%%', $key, $output['property'] );

							} elseif ( ! empty( $output['property'] ) ) {

								$output['property'] = $output['property'] . '-' . $key;
							}

							if ( 'background-image' === $output['property'] && false === strpos( $subvalue, 'url(' ) ) {
								$subvalue = sprintf( 'url("%s")', set_url_scheme( $subvalue ) );
							}
							if ( $subvalue ) {
								$css[ $output['media_query'] ][ $output['element'] ][ $property ] = $subvalue;
							}
						}
					}
				}
			}
		}

		// Process the array of CSS properties and produce the final CSS.
		if ( ! is_array( $css ) || empty( $css ) ) {
			return null;
		}

		foreach ( $css as $media_query => $styles ) {
			$final_css .= ( 'global' !== $media_query ) ? $media_query . '{' : '';

			foreach ( $styles as $style => $style_array ) {
				$css_for_style = '';

				foreach ( $style_array as $property => $value ) {
					if ( is_string( $value ) && '' !== $value ) {
						$css_for_style .= sprintf( '%s:%s;', $property, $value );
					} elseif ( is_array( $value ) ) {
						foreach ( $value as $subvalue ) {
							if ( is_string( $subvalue ) && '' !== $subvalue ) {
								$css_for_style .= sprintf( '%s:%s;', $property, $subvalue );
							}
						}
					}
					$value = ( is_string( $value ) ) ? $value : '';
				}
				if ( '' !== $css_for_style ) {
					$final_css .= $style . sprintf( '{%s}', $css_for_style );
				}
			}

			$final_css .= ( 'global' !== $media_query ) ? '}' : '';
		}

		return $final_css;
	}

	/**
	 * Enqueue google fonts.
	 *
	 * @access public
	 * @return null
	 */
	public function enqueue_fonts() {
		// Check if we need to exit early.
		if ( empty( self::$fields ) || ! is_array( self::$fields ) ) {
			return;
		}

		foreach ( self::$fields as $field ) {
			// Check if we've got everything we need.
			if ( ! isset( $field['kirki_config'] ) || ! isset( $field['settings'] ) ) {
				continue;
			}

			$value = self::get_option( $field['kirki_config'], $field['settings'] );

			// Process typography fields.
			if ( isset( $value['font-family'] ) || isset( $value['font-weight'] ) || isset( $value['variant'] ) ) {

				// Check active callback.
				if ( ! $this->active_callback( $field ) ) {
					continue;
				}

				$variations = array();

				$googleapis = '//fonts.googleapis.com/css?family=';

				if ( isset( $value['font-family'] ) ) {

					$font_family = isset( $value['font-family'] ) ? trim( $value['font-family'] ) : null;

					// Current variant of font.
					if ( isset( $value['variant'] ) ) {
						$variations[] = trim( $value['variant'] );
					}

					// Add all possible variations from choices.
					if ( isset( $field['choices']['variant'] ) && $field['choices']['variant'] ) {
						foreach ( $field['choices']['variant'] as $variant ) {
							$variations[] = trim( $variant );
						}
					}

					// Set googleapis url.
					$url = $googleapis . str_replace( ' ', '+', $font_family );

					if ( $variations ) {
						$font_weight = implode( ',', $variations );

						$url .= ':' . $font_weight;
					}

					// If url empty.
					if ( $googleapis === $url ) {
						continue;
					}

					$key = md5( $font_family . $font_weight );

					// Check that the URL is valid. we're going to use transients to make this faster.
					$url_is_valid = get_transient( $key );

					// If transient does not exist.
					if ( false === $url_is_valid ) {
						$response = wp_remote_head( 'https:' . $url, array( 'timeout' => 1 ) );

						if ( is_wp_error( $response ) || wp_remote_retrieve_response_code( $response ) !== 200 ) {
							// The url was not properly formatted,
							// cache for 12 hours and continue to the next field.
							set_transient( $key, null, 12 * HOUR_IN_SECONDS );
							continue;
						}
						// Check the response headers.
						if ( wp_remote_retrieve_response_code( $response ) === 200 ) {
							// URL was ok. Set transient to true and cache for a week.
							set_transient( $key, true, 7 * 24 * HOUR_IN_SECONDS );
							$url_is_valid = true;
						}
					}
					// If the font-link is valid, enqueue it.
					if ( $url_is_valid ) {
						wp_enqueue_style( $key, $url, array(), csco_get_theme_data( 'Version' ) );
					}
				}
			}
		}
	}
}

/**
 * The main function responsible for returning the one true kirki Instance to functions everywhere.
 * Use this function like you would a global variable, except without needing to declare the global.
 *
 * Example: <?php $csco_kirki = csco_kirki_init(); ?>
 */
function csco_kirki_init() {

	// Globals.
	global $csco_kirki_instance;

	// Init.
	if ( ! isset( $csco_kirki_instance ) ) {
		$csco_kirki_instance = new CSCO_Kirki();
	}

	return $csco_kirki_instance;
}

// Initialize.
csco_kirki_init();
