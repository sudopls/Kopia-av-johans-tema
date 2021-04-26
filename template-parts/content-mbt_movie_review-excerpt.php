<article class="movie-review card mb-4">

	<?php if (has_post_thumbnail()) : ?>
		<div class="row g-0">
			<div class="col-md-4">
				<a href="<?php the_permalink(); ?>">
					<?php the_post_thumbnail('featured-image-thumb', ['class' => 'img-fluid']); ?>
				</a>
			</div><!-- /.col-md-4 -->

			<div class="col-md-8">
	<?php endif; ?>
				<div class="card-body">
					<header>
						<h2 class="card-title h4">
							<a href="<?php the_permalink(); ?>">
								<?php the_title(); ?>
							</a>
						</h2>
					</header>

					<div class="card-text">
						<!-- before the_excerpt(); -->
						<?php the_excerpt(); ?>
						<!-- after the_excerpt(); -->
					</div>

					<footer>
						<div class="card-meta text-muted small mb-2">
							<?php mbt_movie_review_meta(); ?>
						</div>
					</footer>
				</div>
	<?php if (has_post_thumbnail()) : ?>
			</div><!-- /.col-md-8 -->

		</div><!-- /.row -->
	<?php endif; ?>

</article>
