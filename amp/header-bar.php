<?php
/**
 * Header bar template part.
 *
 * @package AMP
 */

$scheme_name = csco_detect_color_scheme( get_theme_mod( 'color_header_background', '#ffffff' ) );

$logo_mod = 'logo';

if ( 'dark' === $scheme_name ) {
	$logo_mod = $logo_mod . '_dark';
}
?>

<header id="top" class="amp-wp-header <?php echo esc_attr( 'dark' === $scheme_name ? ' cs-bg-dark' : null ); ?>" style="background-color:<?php echo esc_attr( get_theme_mod( 'color_header_background', '#ffffff' ) ); ?>;">
	<div class="navbar-content">
		<?php
		$logo_id = get_theme_mod( $logo_mod );
		if ( $logo_id ) {
			?>
			<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
				<?php csco_get_retina_image( $logo_id, array( 'alt' => get_bloginfo( 'name' ) ), 'amp-img' ); ?>
			</a>
			<?php
		} else {
			?>
			<a class="navbar-brand site-title" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
			<?php
		}
		$description = get_bloginfo( 'description' );
		if ( $description ) {
			?>
			<p class="navbar-text site-description"><?php echo wp_kses( $description, 'post' ); ?></p>
			<?php
		}
		?>
	</div>
</header>
