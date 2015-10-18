<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package livewell
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'salient-2015' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="wrap">
			<div class="site-branding">
				<?php if ( get_theme_mod( 'themeslug_logo' ) ) : ?>
					<div class='site-logo'>
						<h1 class="site-title"><a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><img src='<?php echo esc_url( get_theme_mod( 'themeslug_logo' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'></a></h1>
					</div>
					<?php else : ?>
					<hgroup>
						<h1 class='site-title'><a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><?php bloginfo( 'name' ); ?></a></h1>
					</hgroup>
				<?php endif; ?>
					
				<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
			</div><!-- .site-branding -->
	
			<nav id="site-navigation" class="main-navigation" role="navigation">
				<button class="menu-toggle" aria-controls="menu" aria-expanded="false"><?php _e( 'Primary Menu', 'salient-2015' ); ?></button>
				<?php wp_nav_menu( array( 'theme_location' => 'main-left' ) ); ?><?php wp_nav_menu( array( 'theme_location' => 'main-right' ) ); ?>
			</nav><!-- #site-navigation -->
		</div><!--.wrap-->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
