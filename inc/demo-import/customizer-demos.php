<?php
/**
 * Customizer theme demos.
 *
 * @package Networker
 */

/**
 * Register customizer control for rendering
 */
function register_csco_demos_control() {
	/**
	 * A customizer control for rendering the export/import form.
	 *
	 * @since 0.1
	 */
	final class CSCO_Demos_Control extends WP_Customize_Control {

		/**
		 * Renders the control content.
		 *
		 * @since 0.1
		 * @access protected
		 * @return void
		 */
		protected function render_content() {
			?>
				<h3><?php esc_html_e( 'Reset', 'networker' ); ?></h3>

				<p><?php esc_html_e( 'Click the button to reset the customization settings for this theme.', 'networker' ); ?></p>

				<p>
					<input type="submit" name="csco-demos-reset" class="button-secondary button" value="<?php esc_html_e( 'Reset', 'networker' ); ?>">
					<span class="spinner"></span>
				</p>

				<hr>

				<?php csco_license_notice(); ?>

				<?php $demos = apply_filters( csco_get_license_data( 'demos' ), array() ); ?>

				<?php if ( isset( $demos['demos'] ) && $demos['demos'] ) { ?>
					<h3><?php esc_html_e( 'Select Demo', 'networker' ); ?></h3>

					<div class="theme-browser rendered csco-theme-demos">
						<div class="themes wp-clearfix" style="padding: 0;">
							<?php
							foreach ( $demos['demos'] as $slug => $settings ) {
								?>
									<div class="theme csco-theme-demo" style="width: 100%;" data-demo="<?php echo esc_attr( $slug ); ?>">
										<?php if ( isset( $settings['preview_image_url'] ) ) { ?>
											<div class="screenshot">
												<img style="display:block" src="<?php echo esc_url( get_template_directory_uri() . $settings['preview_image_url'] ); ?>">
											</div>
										<?php } ?>

										<div class="theme-id-container">
											<?php if ( isset( $settings['name'] ) ) { ?>
												<h2 class="theme-name"><?php echo esc_html( $settings['name'] ); ?></h2>
											<?php } ?>

											<div class="theme-actions">
												<span class="spinner" style="float: none;"></span>
												<a class="button button-primary csco-demo-import" href="#"><?php esc_html_e( 'Activate', 'networker' ); ?></a>
											</div>
										</div>
									</div><br>
								<?php
							}
							?>
						</div>
					</div>
				<?php } ?>
			<?php
		}
	}
}
add_action( 'customize_register', 'register_csco_demos_control' );



/**
 * The main theme demos class.
 *
 * @since 0.1
 */
class CSCO_Demos_Core {

	/**
	 * WP_Customize_Manager
	 *
	 * @var array $wp_customize  WP_Customize_Manager.
	 */
	private $wp_customize;

	/**
	 * __construct
	 *
	 * This function will setup the field type data
	 */
	public function __construct() {
		add_action( 'customize_register', array( $this, 'register' ) );

		// Import Action.
		add_action( 'wp_ajax_customizer_import', array( $this, 'import_customizer_ajax' ) );
		add_action( 'customize_controls_print_scripts', array( $this, 'import_customizer_script' ) );

		// Reset Action.
		add_action( 'wp_ajax_customizer_reset', array( $this, 'reset_customizer_ajax' ) );
		add_action( 'customize_controls_print_scripts', array( $this, 'reset_customizer_script' ) );
	}

	/**
	 * Registers the control with the customizer.
	 *
	 * @since 0.1
	 * @param object $wp_customize An instance of WP_Customize_Manager.
	 * @return void
	 */
	public function register( $wp_customize ) {
		$this->wp_customize = $wp_customize;

		// Add the demos section.
		$wp_customize->add_section(
			'csco-section',
			array(
				'title'    => __( 'Theme Demos', 'networker' ),
				'priority' => 2,
			)
		);

		// Add the demos setting.
		$wp_customize->add_setting(
			'csco-setting',
			array(
				'default'           => '',
				'type'              => 'none',
				'sanitize_callback' => 'esc_html',
			)
		);

		// Add the demos control.
		$wp_customize->add_control(
			new CSCO_Demos_Control(
				$wp_customize,
				'csco-setting',
				array(
					'section'  => 'csco-section',
					'priority' => 1,
				)
			)
		);
	}


	/**
	 * ---------------------------------------------------------------------------------
	 * ---------------------------------------------------------------------------------
	 */

	/**
	 * Handler Import Customizer Ajax
	 */
	public function import_customizer_ajax() {
		if ( ! $this->wp_customize->is_preview() ) {
			wp_send_json_error( 'not_preview' );
		}

		if ( ! check_ajax_referer( 'customizer-import', 'nonce', false ) ) {
			wp_send_json_error( 'invalid_nonce' );
		}

		if ( ! isset( $_POST['demo'] ) ) { // Input var ok.
			wp_send_json_error( 'invalid_demo' );
		} else {
			$demo = sanitize_text_field( wp_unslash( $_POST['demo'] ) ); // Input var ok.
		}

		$this->reset_customizer();

		$this->import_customizer( $demo );

		wp_send_json_success();
	}

	/**
	 * Function Import Customizer Ajax
	 *
	 * @param string $slug Demo slug.
	 */
	public function import_customizer( $slug ) {
		global $wp_customize;

		$demos = apply_filters( 'csco_theme_demos', array() );

		// IMPORT.
		if ( $demos ) {
			// Call the customize_save action.
			do_action( 'customize_save', $wp_customize );

			// Import Mods.
			if ( isset( $demos['common_mods'] ) && $demos['common_mods'] ) {
				foreach ( $demos['common_mods'] as $key => $value ) {

					// Call the customize_save_ dynamic action.
					do_action( 'customize_save_' . $key, $wp_customize );

					// Save the mod.
					set_theme_mod( $key, $value );
				}
			}

			// Import Options.
			if ( isset( $demos['common_options'] ) && $demos['common_options'] ) {
				foreach ( $demos['common_options'] as $key => $value ) {
					update_option( $key, $value );
				}
			}

			// Specific demos.
			if ( isset( $demos['demos'] ) && $demos['demos'] ) {
				// Import Mods.
				if ( isset( $demos['demos'][ $slug ]['mods'] ) && $demos['demos'][ $slug ]['mods'] ) {
					foreach ( $demos['demos'][ $slug ]['mods'] as $key => & $value ) {
						// Call the customize_save_ dynamic action.
						do_action( 'customize_save_' . $key, $wp_customize );

						// Save the mod.
						set_theme_mod( $key, $value );
					}
				}
				// Import Mods Typekit.
				if ( isset( $demos['demos'][ $slug ]['mods_typekit'] ) && $demos['demos'][ $slug ]['mods_typekit'] ) {
					foreach ( $demos['demos'][ $slug ]['mods_typekit'] as $key => & $value ) {
						// Call the customize_save_ dynamic action.
						do_action( 'customize_save_' . $key, $wp_customize );

						$token = get_option( 'powerkit_typekit_fonts_token' );
						$kit   = get_option( 'powerkit_typekit_fonts_kit' );

						$kit_fonts  = get_option( 'pk_typekit_' . $kit . '_s' );
						$families   = ( $kit_fonts ) ? $kit_fonts['kit']['families'] : false;
						$font_found = false;

						// Search for the font slug from a theme_mod in the active Typekit font kit.
						if ( isset( $value['font-family'] ) && $families ) {
							foreach ( $families as $k => $v ) {
								if ( isset( $v['slug'] ) && $value['font-family'] === $v['slug'] ) {
									$font_found = true;
									break;
								}
							}
						}

						// Set default font family stack if Typekit font is not found, or Typekit module is disabled.
						if ( is_array( $value ) && ! ( csco_powerkit_module_enabled( 'typekit_fonts' ) && $token && $kit && $font_found ) ) {
							$value['font-family'] = '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif';
						}

						// Set value of mods fallback.
						if ( isset( $demos['demos'][ $slug ]['mods_fallback'][ $key ] ) ) {
							$fallback = $demos['demos'][ $slug ]['mods_fallback'][ $key ];
							if ( is_array( $value ) && is_array( $fallback ) ) {
								$value = array_merge( $value, $fallback );
							} else {
								$value = $fallback;
							}
						}

						// Save the mod.
						set_theme_mod( $key, $value );
					}
				}
				// Import Options.
				if ( isset( $demos['demos'][ $slug ]['options'] ) && $demos['demos'][ $slug ]['options'] ) {
					foreach ( $demos['demos'][ $slug ]['options'] as $key => $value ) {
						update_option( $key, $value );
					}
				}
			}

			$homepages = apply_filters( 'csco_theme_demo_homepages', array() );

			// Import homepages.
			if ( isset( $homepages[ $slug ] ) ) {

				$content = $homepages[ $slug ];

				$home_id = wp_insert_post( array(
					'post_title'   => esc_html__( 'Homepage', 'networker' ),
					'post_content' => $content,
					'post_type'    => 'page',
					'post_status'  => 'publish',
					'post_author'  => 1,
				) );

				// Set show_on_front.
				update_option( 'show_on_front', 'page' );

				// Set page_on_front.
				update_option( 'page_on_front', $home_id );

				// Update page template.
				update_post_meta( $home_id, '_wp_page_template', 'template-canvas-fullwidth.php' );
			}

			// Call the customize_save_after action.
			do_action( 'customize_save_after', $wp_customize );
		}
	}

	/**
	 * Enqueue Customizer Script for Import
	 */
	public function import_customizer_script() {
		?>
		<script>
			jQuery(function ($) {
				$('body').on('click', '.csco-demo-import', function (event) {
					event.preventDefault();

					var data = {
						wp_customize: 'on',
						action: 'customizer_import',
						demo:   $(this).closest('.csco-theme-demo').attr('data-demo'),
						nonce:  '<?php echo esc_attr( wp_create_nonce( 'customizer-import' ) ); ?>'
					};

					var r = confirm( "<?php esc_html_e( 'Warning: Activating a demo will reset all current customizations.', 'networker' ); ?>" );

					if (!r) return;

					$(this).attr('disabled', 'disabled');

					$(this).siblings('.spinner').addClass('is-active');

					$('#customize-preview').css( 'opacity', ' 0.6' );

					$.post(ajaxurl, data, function ( response ) {
						wp.customize.state('saved').set(true);

						try {
							var info = $.parseJSON( JSON.stringify(response) );

							if( typeof info.success != 'undefined' && info.success == true ){
								location.reload();
							} else {
								if( typeof info.data != 'undefined' ){
									alert( info.data );
								} else {
									alert( '<?php esc_html_e( 'Server error!', 'networker' ); ?>' );
								}
							}
						} catch (e) {
							alert( response );
						}
					});

					return false;
				});
			});
		</script>
		<?php
	}


	/**
	 * ---------------------------------------------------------------------------------
	 * ---------------------------------------------------------------------------------
	 */

	/**
	 * Handler Reset Customizer Ajax
	 */
	public function reset_customizer_ajax() {
		if ( ! $this->wp_customize->is_preview() ) {
			wp_send_json_error( 'not_preview' );
		}

		if ( ! check_ajax_referer( 'customizer-reset', 'nonce', false ) ) {
			wp_send_json_error( 'invalid_nonce' );
		}

		$this->reset_customizer();

		wp_send_json_success();
	}

	/**
	 * Function Reset Customizer Ajax
	 */
	public function reset_customizer() {
		$remove_ids = array();

		// Customize settings.
		$settings = $this->wp_customize->settings();

		// Get customize Ids.
		foreach ( $settings as $setting ) {
			if ( 'theme_mod' === $setting->type ) {
				$remove_ids[] = $setting->id;
			}
		}

		// CSCO Kirki settings.
		$settings = CSCO_Kirki::$fields;

		// Get customize Ids.
		foreach ( $settings as $id => $setting ) {
			$remove_ids[] = $id;
		}

		// Get demos data.
		$demos = apply_filters( 'csco_theme_demos', array() );

		// Remove theme_mod settings registered in customizer.
		foreach ( $remove_ids as $id ) {
			$exclude = array();
			if ( isset( $demos['reset_exclude_mods'] ) && $demos['reset_exclude_mods'] ) {
				$exclude = $demos['reset_exclude_mods'];
			}
			if ( ! in_array( $id, $exclude, true ) ) {
				remove_theme_mod( $id );
			}
		}

		// Remove option settings.
		if ( $demos ) {
			// Options imported with every demo.
			if ( isset( $demos['common_options'] ) && $demos['common_options'] ) {
				foreach ( $demos['common_options'] as $key => $value ) {

					$exclude = array();
					if ( isset( $demos['reset_exclude_options'] ) && $demos['reset_exclude_options'] ) {
						$exclude = $demos['reset_exclude_options'];
					}

					if ( ! in_array( $key, $exclude, true ) ) {
						delete_option( $key );
					}
				}
			}
			// Specific demos.
			if ( isset( $demos['demos'] ) && $demos['demos'] ) {
				foreach ( $demos['demos'] as $demo ) {
					if ( isset( $demo['options'] ) && $demo['options'] ) {
						foreach ( $demo['options'] as $key => $value ) {

							$exclude = array();
							if ( isset( $demos['reset_exclude_options'] ) && $demos['reset_exclude_options'] ) {
								$exclude = $demos['reset_exclude_options'];
							}

							if ( ! in_array( $key, $exclude, true ) ) {
								delete_option( $key );
							}
						}
					}
				}
			}
		}
	}

	/**
	 * Enqueue Customizer Script for Reset
	 */
	public function reset_customizer_script() {
		?>
		<script>
			jQuery(function ($) {
				$('body').on('click', 'input[name="csco-demos-reset"]', function (event) {
					event.preventDefault();

					var data = {
						wp_customize: 'on',
						action: 'customizer_reset',
						nonce: '<?php echo esc_attr( wp_create_nonce( 'customizer-reset' ) ); ?>'
					};

					var r = confirm( "<?php esc_html_e( 'Warning: This action will reset all current customizations.', 'networker' ); ?>" );

					if (!r) return;

					$(this).attr('disabled', 'disabled');

					$(this).siblings('.spinner').addClass('is-active');

					$('#customize-preview').css( 'opacity', ' 0.6' );

					$.post(ajaxurl, data, function ( response ) {
						wp.customize.state('saved').set(true);

						try {
							var info = $.parseJSON( JSON.stringify(response) );

							if( typeof info.success != 'undefined' && info.success == true ){
								location.reload();
							} else {
								if( typeof info.data != 'undefined' ){
									alert( info.data );
								} else {
									alert( '<?php esc_html_e( 'Error server!', 'networker' ); ?>' );
								}
							}
						} catch (e) {
							alert( response );
						}
					});
				});
			});
		</script>
		<?php
	}
}
new CSCO_Demos_Core();
