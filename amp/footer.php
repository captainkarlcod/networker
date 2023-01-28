<?php
/**
 * Footer template part.
 *
 * @package AMP
 */

/**
 * Context.
 *
 * @var AMP_Post_Template $this
 */
?>

<footer class="amp-wp-footer">
	<div class="site-info">
		<?php
		$logo_id = get_theme_mod( 'footer_logo_dark' );
		if ( $logo_id ) {
			?>
			<div class="site-title footer-title">
				<?php csco_get_retina_image( $logo_id, array( 'alt' => get_bloginfo( 'name' ) ), 'amp-img' ); ?>
			</div>
			<?php
		} else {
			?>
			<div class="site-title footer-title"><?php bloginfo( 'name' ); ?></div>
			<?php
		}
		?>

		<?php
		/* translators: %s: Author name. */
		$footer_text = get_theme_mod( 'footer_text', sprintf( esc_html__( 'Designed & Developed by %s', 'networker' ), '<a href="' . esc_url( csco_get_theme_data( 'AuthorURI' ) ) . '">Code Supply Co.</a>' ) );
		if ( $footer_text ) {
			?>
			<div class="footer-copyright">
				<?php echo wp_kses_post( $footer_text ); ?>
			</div>
			<?php
		}
		?>
	</div><!-- .site-info -->
</footer>
