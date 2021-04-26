<?php
/**
 * Show movie reviews related to current review.
 */

$related_reviews = new WP_Query([
	'post_type' => 'mbt_movie_review',
	'posts_per_page' => 3,
	'orderby' => 'title',
	'order' => 'asc',
]);

if (!$related_reviews->have_posts()) {
	return;
}

?>

<hr class="my-4" />

<h2>Related Movie Reviews</h2>

<div class="row">
	<?php while ($related_reviews->have_posts()): $related_reviews->the_post(); ?>

		<div class="col-md-6 col-lg-4">
			<article class="card mb-4">
				<?php the_post_thumbnail('medium', ['class' => 'card-img-top img-fluid']); ?>

				<div class="card-body">
					<h3 class="h5 card-title">
						<a href="<?php the_permalink(); ?>">
							<?php the_title(); ?>
						</a>
					</h3>

					<p class="card-text">
						<?php the_excerpt(); ?>
					</p>

					<div>
						<a href="<?php the_permalink(); ?>" class="btn btn-secondary">Read more &raquo;</a>
					</div>
				</div>
			</article>
		</div>

	<?php endwhile; ?>

</div>

<?php
wp_reset_postdata();
