<article class="card mb-4">

	<?php if (has_post_thumbnail()) : ?>
		<div class="row g-0">
			<div class="col-md-4">
				<?php the_post_thumbnail('featured-image-thumb', ['class' => 'img-fluid']); ?>
			</div><!-- /.col-md-4 -->

			<div class="col-md-8">
	<?php endif; ?>
				<div class="card-body">
					<h2 class="card-title h4">
						<a href="<?php the_permalink(); ?>">
							<?php the_title(); ?>
						</a>
					</h2>
					<div class="card-meta text-muted small mb-2">
						Post published <?php echo get_the_date(); ?> at <?php the_time(); ?> by <?php the_author(); ?> in <?php the_category(', '); ?>
					</div>

					<div class="card-text">
						<!-- before the_excerpt(); -->
						<?php the_excerpt(); ?>
						<!-- after the_excerpt(); -->
					</div>
				</div>
	<?php if (has_post_thumbnail()) : ?>
			</div><!-- /.col-md-8 -->

		</div><!-- /.row -->
	<?php endif; ?>

</article>
