<div class="news-extract">
	<?php if(has_post_thumbnail()) : ?>
		<a href="<?php echo get_the_permalink(); ?>" class="news-extract__image-link"><img src="<?php echo the_post_thumbnail_url('news-extract'); ?>" alt="<?php echo get_the_title(); ?>" title="<?php echo get_the_title(); ?>" class="news-extract__image"></a>
	<?php endif; ?>
	<div class="news-extract__details">
		<div class="news-extract__title"><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></div>
		<div class="news-extract__meta"><?php echo get_the_date('d F Y'); ?> in <?php echo inline_categories(wp_get_post_terms(get_the_ID(), 'category')); ?></div>
		<div class="news-extract__extract"><?php echo limit_text(get_field('extract'), 25); ?>
			<a href="#">Read more...</a></div>
	</div>
</div>