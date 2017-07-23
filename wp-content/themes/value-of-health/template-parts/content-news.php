<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Value_of_Health
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content">

        <div class="page-heading-group">
            <div class="news__meta">
                Posted on <?php echo date('j F Y \a\t g:ia', strtotime(get_the_date() . ' ' . get_the_time())); ?> in <?php echo inline_categories(wp_get_post_terms(get_the_ID(), 'category')); ?>
            </div>
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			<?php if(get_field('lead_paragraph')) : ?>
                <h4><?php echo get_field('lead_paragraph'); ?></h4>
			<?php endif; ?>
			<?php if(has_post_thumbnail()) : ?>
                <div class="news__banner"><?php the_post_thumbnail('news-banner'); ?></div>
			<?php endif; ?>

        </div>

		<?php
			the_content();

		?>

		<?php get_template_part('template-parts/partials/partial', 'news-tags'); ?>
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
