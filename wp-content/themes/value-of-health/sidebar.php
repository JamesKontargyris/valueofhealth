<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Value_of_Health
 */

if ( ! is_active_sidebar( 'main-sidebar' ) ) {
	return;
}
?>

<div id="secondary" class="widget-area">
	<?php dynamic_sidebar( 'main-sidebar' ); ?>
</div><!-- #secondary -->
