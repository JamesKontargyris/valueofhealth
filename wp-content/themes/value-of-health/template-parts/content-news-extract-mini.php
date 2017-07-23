<div class="news-extract news-extract--mini">
	<div class="news-extract__details">
        <div class="news-extract__meta news-extract__meta--mini"><?php echo get_the_date('d F Y'); ?> in <?php echo inline_categories(wp_get_post_terms(get_the_ID(), 'category')); ?></div>
        <div class="news-extract__title news-extract__title--mini"><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></div>
	</div>
</div>