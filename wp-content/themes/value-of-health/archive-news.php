<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Value_of_Health
 */

$count = 0;
get_header(); ?>

    <div class="page-heading-group">
        <h1>News</h1>
    </div>

    <div id="primary" class="content-area">
        <main id="main" class="site-main">

		<?php if ( have_posts() ) : ?>

			<?php while ( have_posts() ) : the_post(); $count++; ?>

                <?php if($count == 1) : ?>
					<?php get_template_part( 'template-parts/content', 'latest-news-extract' ); ?>
				<?php elseif($count == 2) : ?>
                    <h5 class="text--green">More News</h5>
				<?php endif; ?>

                <?php if($count > 1 && $count <= 5) : ?>
				    <?php get_template_part( 'template-parts/content', 'news-extract' ); ?>
                <?php endif; ?>

                <?php if($count == 6) : ?>
                    <h5 class="text--green">Older News</h5>
                <?php endif; ?>

				<?php if($count > 5) : ?>
					<?php get_template_part( 'template-parts/content', 'news-extract-mini' ); ?>
				<?php endif; ?>


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
