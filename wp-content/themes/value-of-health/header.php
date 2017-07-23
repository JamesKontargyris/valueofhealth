<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Value_of_Health
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'value-of-health' ); ?></a>
    <div class="container">
    <header class="site-header">

            <div class="site-header__logo" title="The Value of Health">
                <a href="/"><?php echo file_get_contents(get_template_directory_uri() . '/img/svg/voh_logo.svg'); ?></a>
            </div>
            <nav class="site-header__nav">
                <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><i class="fa fa-bars"></i></button>
	            <?php
	            wp_nav_menu( array(
		            'theme_location' => 'primary',
		            'menu_id'        => 'primary-menu',
                    'menu_class' => 'site-header__nav__menu',

	            ) );
	            ?>
            </nav>
    </header>
    </div>

	<div id="content" class="site-content">

        <div class="container">
