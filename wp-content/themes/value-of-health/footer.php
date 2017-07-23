<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Value_of_Health
 */

?>
        </div> <!--.container-->
	</div><!-- #content -->

    <footer class="site-footer">
        <div class="site-footer__logoicon"><?php echo file_get_contents(get_template_directory_uri() . '/img/svg/voh_logo_icon.svg'); ?></div>
        <div class="site-footer__content">
	        <?php
	        wp_nav_menu( array(
		        'theme_location' => 'secondary',
		        'menu_id'        => 'secondary-menu',
		        'menu_class' => 'site-footer__nav__menu',

	        ) );
	        ?>
        </div>
    </footer>
    <div class="legal-footer">
        &copy; The Value of Health <?php echo date('Y'); ?>. All rights reserved.
    </div>


</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
