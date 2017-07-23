<div class="download-extract">
	<?php if(has_post_thumbnail()) : ?>
		<img src="<?php echo the_post_thumbnail_url('download-cover'); ?>" alt="<?php echo get_the_title(); ?>" title="<?php echo get_the_title(); ?>" class="download-extract__image">
    <?php else : ?>
        <img src="<?php echo get_template_directory_uri(); ?>/img/download_cover_fallback.jpg" alt="<?php echo get_the_title(); ?>" title="<?php echo get_the_title(); ?>" class="download-extract__image">
	<?php endif; ?>
	<div class="download-extract__details">
        <div class="download-extract__details-col1">
            <div class="download-extract__title"><?php echo get_the_title(); ?></div>
            <div class="download-extract__meta"><?php echo get_field('file_type'); ?> &bull; <?php echo get_field('file_size'); ?>
                <br>Added: <?php echo get_the_date('d F Y'); ?></div>
            <a href="<?php echo get_field('file'); ?>" download="download" class="button button--primary"><?php echo get_field('button_text'); ?></a>
        </div>
        <div class="download-extract__details-col2">
            <div class="download-extract__description"><?php echo get_field('description'); ?></div>
        </div>

	</div>
</div>