<?php
/**
 * Block Current Date
 *
 * @var $attributes - block attributes
 * @var $options - layout options
 *
 * @package Networker
 */

?>
<div class="<?php echo esc_attr( $attributes['className'] ); ?>">
	<?php echo esc_html( apply_filters( 'csco_current_date', wp_date( $attributes['format'] ) ) ); ?>
</div>
