<?php if($tags = wp_get_post_tags(get_the_ID())) : ?>
	<div class="news__tags">
		<span class="text--green"><i class="fa fa-tag"></i> Tags:</span>
		<?php foreach($tags as $tag) : ?>
			<a href="<?php echo get_tag_link($tag->term_id); ?>" class="news__tag"><?php echo $tag->name; ?></a>
		<?php endforeach; ?>
	</div> <!-- / news-story__tags -->
<?php endif; ?>