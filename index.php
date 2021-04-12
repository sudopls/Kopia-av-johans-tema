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
					<h2 class="card-title h4"><?php the_title(); ?></h2>

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
