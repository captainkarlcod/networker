( function( $ ) {
	'use strict';

	jQuery( document ).ready( function( $ ) {

		// Collapse all collapsibles.
		$( '.customize-collapsible' ).not( '.customize-collapsed' ).closest( 'li[id*="_collapsible_"]' ).toggleClass( 'customize-control-collapsed' );
		$( '.customize-collapsible' ).not( '.customize-collapsed' ).closest( 'li[id*="_collapsible_"]' ).nextUntil( 'li[id*="_collapsible_"]' ).toggleClass( 'customize-control-hidden' );

		// Expand on click.
		$( '.customize-collapsible' ).on( 'click', function() {
			$( this ).closest( 'li[id*="_collapsible_"]' ).toggleClass( 'customize-control-collapsed' );
			$( this ).closest( 'li[id*="_collapsible_"]' ).nextUntil( 'li[id*="_collapsible_"]' ).toggleClass( 'customize-control-hidden' );
		} );

	} );

} )( jQuery );
