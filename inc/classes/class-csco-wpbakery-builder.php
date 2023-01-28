<?php
/**
 * Support WPBakery Builder.
 *
 * @package Networker
 */

if ( ! class_exists( 'CSCO_WPBakery_Builder' ) && defined( 'WPB_VC_VERSION' ) ) {

	/**
	 * This class to activate your theme and open up new opportunities.
	 */
	class CSCO_WPBakery_Builder {

		/**
		 * Constructor.
		 */
		public function __construct() {
			add_action( 'wp_enqueue_scripts', array( $this, 'load_nextpost_enqueue_scripts' ), 100 );
			add_action( 'csco_load_nextpost_before', array( $this, 'load_nextpost_mapped_shortcodes' ) );
			add_action( 'csco_load_nextpost_after', array( $this, 'load_nextpost_custom_css' ) );
		}

		/**
		 * Load Nextpost Enqueue Style.
		 */
		public function load_nextpost_enqueue_scripts() {
			if ( csco_get_state_load_nextpost() ) {
				wp_enqueue_style( 'js_composer_front' );
				wp_enqueue_style( 'js_composer_custom_css' );
			}
		}
		/**
		 * Load Nextpost Mapped Shortcodes.
		 */
		public function load_nextpost_mapped_shortcodes() {
			WPBMap::addAllMappedShortcodes();
		}

		/**
		 * Load Nextpost Include Custom CSS.
		 */
		public function load_nextpost_custom_css() {
			$custom_css = get_post_meta( get_the_ID(), '_wpb_shortcodes_custom_css', true );

			if ( $custom_css ) {
				?>
				<style><?php echo (string) strip_tags( $custom_css ); // XSS. ?></style>
				<?php
			}
		}
	}

	new CSCO_WPBakery_Builder();
}
