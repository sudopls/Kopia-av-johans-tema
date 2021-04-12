<?php
get_header();
?>

<div class="container">

	<h1>index</h1>

	<hr />

	<!-- Do we have any posts to display? -->
	<?php if (have_posts()) : ?>
		<!-- Yay, we has posts do display! -->
		<?php while (have_posts()) : ?>
			<!-- Start post -->
			<?php
				// Load next post to display
				the_post();
			?>
			<article class="card mb-4">
				<div class="card-body">
					<h2 class="card-title h4">
						<a href="<?php the_permalink(); ?>">
							<?php the_title(); ?>
						</a>
					</h2>
					<div class="card-meta text-muted small mb-2">
						Post published <?php echo get_the_date(); ?> at <?php the_time(); ?> by <?php the_author(); ?> in <?php the_category(); ?>
					</div>

					<div class="card-text">
						<?php the_content(); ?>
					</div>
				</div>
			</article>
			<!-- End post -->
		<?php endwhile; ?>
	<?php else: ?>
		<p>Sorry, no posts found.</p>
	<?php endif; ?>

</div>

<?php
get_footer();
