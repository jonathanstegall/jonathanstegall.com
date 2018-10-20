<?php
/**
 * Sidebars and widget regions
 *
 * @package jonathanstegall-2018
 */

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
if ( ! function_exists( 'jonathanstegall_2018_widgets_init' ) ) :
	add_action( 'widgets_init', 'jonathanstegall_2018_widgets_init' );
	function jonathanstegall_2018_widgets_init() {
		register_sidebar( array(
			'name'          => esc_html__( 'Sidebar', 'jonathanstegall-2018' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'jonathanstegall-2018' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );
	}
endif;
