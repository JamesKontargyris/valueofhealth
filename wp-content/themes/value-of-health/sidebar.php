<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Value_of_Health
 */

if ( is_active_sidebar( 'main-sidebar' ) || is_active_sidebar('home-sidebar')) :
?>

<div id="secondary" class="widget-area">
	<?php if(is_active_sidebar('main-sidebar') && ! is_front_page()) dynamic_sidebar( 'main-sidebar' ); ?>
	<?php if(is_active_sidebar('home-sidebar') && is_front_page()) dynamic_sidebar( 'home-sidebar' ); ?>
</div><!-- #secondary -->

<?php endif; ?>
