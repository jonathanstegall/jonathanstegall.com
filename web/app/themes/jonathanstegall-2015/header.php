<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package jonathanstegall_2015
 */
?><!doctype html>
<!--[if lt IE 7]><html class="no-js ie ie6 lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?> <![endif]-->
<!--[if IE 7]><html class="no-js ie ie7 lt-ie9 lt-ie8" <?php language_attributes(); ?> <![endif]-->
<!--[if IE 8]><html class="no-js ie ie8 lt-ie9" <?php language_attributes(); ?> <![endif]-->
<!--[if gt IE 8]><!--><html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
    <head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta name="HandheldFriendly" content="True">
        <meta name="MobileOptimized" content="320">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="apple-mobile-web-app-title" content="j S">

        <link rel="shortcut icon" href="/favicon.ico">
        <link rel="icon" href="<?php bloginfo('stylesheet_directory' ); ?>/images/favicon-32.png" sizes="32x32">
        <link rel="apple-touch-icon-precomposed" sizes="152x152" href="<?php bloginfo('stylesheet_directory' ); ?>/images/favicon-152.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php bloginfo('stylesheet_directory' ); ?>/images/favicon-144.png">
        <link rel="apple-touch-icon-precomposed" sizes="120x120" href="<?php bloginfo('stylesheet_directory' ); ?>/images/favicon-120.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php bloginfo('stylesheet_directory' ); ?>/images/favicon-114.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php bloginfo('stylesheet_directory' ); ?>/images/favicon-72.png">
        <link rel="apple-touch-icon-precomposed" href="<?php bloginfo('stylesheet_directory' ); ?>/images/favicon-57.png">
        <meta name="msapplication-TileImage" content="<?php bloginfo('stylesheet_directory' ); ?>/images/favicon-144.png">
        <meta name="msapplication-TileColor" content="#0e2221">

        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

        <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/style.css" media="screen" />
        <script src="//use.typekit.net/eup1xch.js"></script>
        <script>try{Typekit.load();}catch(e){}</script>
        
        <?php wp_head(); ?>

	</head>

<body <?php body_class(); ?>>

	<header class="cf" role="banner">
		<div class="grid cf">
			<h1 class="logo"><a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'description' ); ?></a></h1>
			<nav class="main-navigation" role="navigation">
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'items_wrap' => '<ul>%3$s</ul>', 'container' => false) ); ?>
			</nav>
		</div>
	</header>


	<main id="content" role="main">
