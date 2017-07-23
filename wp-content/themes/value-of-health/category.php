<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Value_of_Health
 */

get_header(); ?>

<?php
    // Get current category info
    $category = $wp_query->get_queried_object();
    $cat_name      = $category->name;
    $cat_id        = $category->term_id;
    define('CAT_ID', $cat_id);
?>

    <div class="page-heading-group">
        <h1>News in category: <?php echo $cat_name; ?></h1>
    </div>

    <div id="primary" class="content-area">
        <main id="main" class="site-main">

		<?php if ( have_posts() ) : ?>

			<?php while ( have_posts() ) : the_post(); ?>

                <?php get_template_part( 'template-parts/content', 'news-extract' ); ?>

			<?php endwhile;

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

    <div id="secondary" class="widget-area">

		<?php get_template_part('template-parts/partials/partial', 'news-sidebar'); ?>

    </div><!-- #secondary -->

<?php
get_footer();
