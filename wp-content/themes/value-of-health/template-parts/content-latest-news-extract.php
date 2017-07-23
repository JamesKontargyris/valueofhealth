<div class="latest-news-extract">
    <h5 class="text--green">Latest News</h5>
    <div class="latest-news-extract__title"><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></div>
    <?php if(has_post_thumbnail()) : ?>
        <a href="<?php echo get_the_permalink(); ?>" class="latest-news-extract__image-link"><img src="<?php echo the_post_thumbnail_url('news-extract'); ?>" alt="<?php echo get_the_title(); ?>" title="<?php echo get_the_title(); ?>" class="latest-news-extract__image"></a>
        <div class="latest-news-extract__meta"><?php echo get_the_date('d F Y'); ?> in <?php echo inline_categories(wp_get_post_terms(get_the_ID(), 'category')); ?></div>
    <?php endif; ?>
    <div class="latest-news-extract__details">
		<div class="latest-news-extract__extract"><?php echo limit_text(get_field('extract'), 25); ?>
            <br><br><a href="<?php echo get_the_permalink(); ?>" class="button button--primary">Read more...</a></div>
	</div>
</div>