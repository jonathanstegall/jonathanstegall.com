<?php
/**
 * Enqueue scripts and styles
 *
 * @package jonathanstegall-2018
 */

/**
* Front end CSS
* This also handles whether the CSS should be served as minified based on WP_DEBUG value
* We can't use SCRIPT_DEBUG because our server fails to minify, so we have to keep that set to true, but these files are already minified.
*
*/
if ( ! function_exists( 'jonathanstegall_2018_add_remove_styles' ) ) :
	add_action( 'wp_print_styles', 'jonathanstegall_2018_add_remove_styles', 10 );
	function jonathanstegall_2018_add_remove_styles() {
		// add
		$suffix = ( defined( 'SCRIPT_DEBUG' ) && 'true' === WP_DEBUG ) ? '' : '.min';
		wp_enqueue_style( 'jonathanstegall-2018-style', get_theme_file_uri() . '/style' . $suffix . '.css', array(), filemtime( get_theme_file_path() . '/style' . $suffix . '.css' ), 'all' );
		// remove
		//wp_dequeue_style( 'largo-style' );
	}
endif;

/**
* Front end JavaScript
* This also handles whether the JavaScript should be served as minified based on WP_DEBUG value
* We can't use SCRIPT_DEBUG because our server fails to minify, so we have to keep that set to true, but these files are already minified.
*
*/
if ( ! function_exists( 'jonathanstegall_2018_add_remove_scripts' ) ) :
	add_action( 'wp_enqueue_scripts', 'jonathanstegall_2018_add_remove_scripts' );
	function jonathanstegall_2018_add_remove_scripts() {
		// add
		$suffix = ( defined( 'WP_DEBUG' ) && 'true' === WP_DEBUG ) ? '' : '.min';
		//wp_enqueue_script( 'modernizr', get_theme_file_uri() . '/assets/js/modernizr-custom' . $suffix . '.js', array(), '1.0', false );
		//wp_enqueue_script( 'jonathanstegall-2018', get_theme_file_uri() . '/assets/js/jonathanstegall-2018' . $suffix . '.js', array( 'jquery', 'modernizr' ), filemtime( get_theme_file_path() . '/assets/js/jonathanstegall-2018' . $suffix . '.js' ), true );
		// localize
		/*$params = array(
			'ajaxurl' => admin_url( 'admin-ajax.php' ),
		);
		wp_localize_script( 'jonathanstegall-2018', 'params', $params );*/
		// remove
		//wp_dequeue_script( 'largo-navigation' );
		//wp_dequeue_script( 'popular-widget' );
	}
endif;
