<?php
/**
 * Menus
 *
 * @package jonathanstegall-2018
 */

if ( ! function_exists( 'jonathanstegall_2018_menus' ) ) :
	add_action( 'init', 'jonathanstegall_2018_menus' );
	function jonathanstegall_2018_menus() {
		register_nav_menus(
			array(
				'primary_links' => __( 'Primary', 'jonathanstegall-2018' ), // main nav below logo
			)
		);
		unregister_nav_menu( 'menu-1' ); // we don't need whatever this is
	}
endif;
