<article>
	<header class="mb-3">
		<?php if (!get_header_image()) : ?>
			<h1><?php the_title(); ?></h1>
		<?php endif; ?>
	</header>

	<div class="card-text">
		<?php the_content(); ?>
	</div>

	<footer>
		<div class="card-meta text-muted small mb-2">
			<?php mbt_movie_review_meta(); ?>
		</div>
	</footer>
</article>

<div class="d-flex">
	<a href="<?php echo get_post_type_archive_link('mbt_movie_review'); ?>" class="page-link">
		<?php _e('&laquo; All Movie Reviews', 'mybasictheme'); ?>
	</a>
</div>
