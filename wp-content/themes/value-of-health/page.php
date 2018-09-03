<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Value_of_Health
 */

get_header(); ?>

    <div class="page-heading-group">
		<?php if(! is_front_page()) the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		<?php if(get_field('lead_paragraph')) : ?>
            <h4><?php echo get_field('lead_paragraph'); ?></h4>
		<?php endif; ?>
    </div>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
