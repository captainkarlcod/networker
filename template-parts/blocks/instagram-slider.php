<?php
/**
 * Instagram slider template
 *
 * @var        $attributes - block attributes
 * @var        $options - layout options
 *
 * @link       https://codesupply.co
 * @since      1.0.0
 *
 * @package    PowerKit
 * @subpackage PowerKit/templates
 */

$params = array(
	'user_id'     => $attributes['userID'],
	'header'      => $attributes['showHeader'],
	'button'      => $attributes['showFollowButton'],
	'number'      => $attributes['number'],
	'size'        => $attributes['size'],
	'target'      => $attributes['target'],
	'template'    => 'slider',
	'cache_time'  => apply_filters( 'powerkit_instagram_cache_time', 60 ),
	'is_block'    => true,
	'block_attrs' => $attributes,
);

echo '<div class="' . esc_attr( $attributes['className'] ) . '" ' . ( isset( $attributes['anchor'] ) ? ' id="' . esc_attr( $attributes['anchor'] ) . '"' : '' ) . '>';

// Instagram output.
if ( $attributes['userID'] ) {
	powerkit_instagram_get_recent( $params );
} else {
	powerkit_alert_warning( 'Instagram data is not set, please check the User ID.' );
}

echo '</div>';
