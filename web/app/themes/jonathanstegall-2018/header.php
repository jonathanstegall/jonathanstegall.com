<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package jonathanstegall-2018
 */

?>
<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>
	<head <?php do_action( 'add_head_attributes' ); ?>>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'jonathanstegall-2018' ); ?></a>

		<header id="masthead" class="o-header" role="banner">
			<div class="o-wrapper o-wrapper-site-header">
				<a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" class="a-logo">
					<?php bloginfo( 'description' ); ?>
				</a>
				<nav id="navigation-primary" class="m-navigation">
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'primary_links',
							'menu_id'        => 'primary-menu',
							'items_wrap' => '<ul>%3$s</ul>',
							'container' => false
						)
					);
					?>
				</nav>
			</div>
		</header><!-- #masthead -->

		<div id="content" class="o-wrapper o-wrapper-content">
