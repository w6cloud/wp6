<?php
/**
 * Functions
 */

namespace WP6;

// wp6/inc folder full path
use const \WP6\INC as INC_PATH;

/**
 * Autoload
 *
 * @param string $class Class name.
 */
function init () {
	// Register AutoLoad
    spl_autoload_register( '\WP6\autoload' );
}

/**
 * Autoload
 *
 * @param string $class Class name.
 */
function autoload( string $class ) {

	// Prefix lookup
	if ( false === strpos( $class, 'WP6\\' ) ) {
		return;
	}

	// Guess filename from $class
	$parts = explode( '\\', $class );
	$pathParts = array_filter( $parts );
	$relativePath = implode( '/', $pathParts );
	$fullPath = str_replace( 'WP6', INC_PATH, $relativePath ) . '.php';

	// Include file
    if ( file_exists( $fullPath ) ) {
        require_once $fullPath;
    }

}