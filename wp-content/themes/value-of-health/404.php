<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Value_of_Health
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

            <section class="no-results not-found">

                <div class="page-heading-group">
                    <h1 class="page-title"><?php esc_html_e( 'Page Not Found (404)', 'value-of-health' ); ?></h1>
                    <h4>Sorry, it seems we can&rsquo;t find what you&rsquo;re looking for.</h4>
                </div>

                <div class="page-content">
                    <p><?php esc_html_e( 'Please use the navigation links above to browse the site.', 'value-of-health' ); ?></p>
                </div><!-- .page-content -->
            </section><!-- .no-results -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
