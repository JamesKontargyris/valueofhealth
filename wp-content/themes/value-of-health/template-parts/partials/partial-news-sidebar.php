<?php if( ! is_archive()) : ?>
    <div class="news-sidebar-block">

        <h4>More News</h4>
        <?php
        $news_stories = get_latest_news(3, 0, [get_the_ID()]);
        if($news_stories->have_posts()) : while($news_stories->have_posts()) : $news_stories->the_post();
            ?>

            <div class="news-sidebar-extract">
                <?php if(has_post_thumbnail()) : ?>
                    <a href="<?php echo get_the_permalink(); ?>" class="news-sidebar-extract__image-link">
                        <img src="<?php echo the_post_thumbnail_url('news-extract'); ?>" alt="<?php echo get_the_title(); ?>" title="<?php echo get_the_title(); ?>" class="news-sidebar-extract__image">
                    </a>
                <?php endif; ?>
                <div class="news-sidebar-extract__details">
                    <div class="news-sidebar-extract__title"><a href="<?php echo get_the_permalink(); ?>"><?php the_title(); ?></a></div>
                    <div class="news-sidebar-extract__meta"><?php echo get_the_date('d F Y'); ?></div>
                </div>
            </div>

        <?php endwhile; ?>
        <?php else : ?>
            No more news stories.
        <?php endif; wp_reset_postdata(); ?>
    </div>
    <hr>
<?php endif; ?>

<aside class="sidebar-block">
	<div class="sidebar-block__content">
		<h6 class="sidebar-block__title highlight">Categories</h6>
		<?php $news_categories = get_categories(); ?>
		<ul class="vertical-menu">
			<?php if( ! is_post_type_archive('news') || is_date()) : ?>
				<li class="vertical-menu__item"><a href="/news" class="vertical-menu__link">All News</a></li>
			<?php endif; ?>
			<?php foreach($news_categories as $category) : ?>
				<li class="vertical-menu__item"><a href="<?php echo get_category_link($category->term_id); ?>" class="vertical-menu__link <?php if(defined('CAT_ID') && CAT_ID == $category->term_id) : ?> active <?php endif; ?>"><?php echo $category->name; ?></a></li>
			<?php endforeach; ?>
		</ul>
	</div>
</aside>

<aside class="sidebar-block">
	<div class="sidebar-block__content">
		<h6 class="sidebar-block__title highlight">Tags</h6>
		<?php $news_tags = get_tags(); ?>
		<?php foreach($news_tags as $tag) : ?>
			<a href="<?php echo get_tag_link($tag->term_id); ?>" class="news__tag <?php if(defined('TAG_ID') && TAG_ID == $tag->term_id) : ?> active <?php endif; ?>"><?php echo $tag->name; ?></a>
		<?php endforeach; ?>
	</div>
</aside>
    <hr>

<?php dynamic_sidebar('main-sidebar'); ?>