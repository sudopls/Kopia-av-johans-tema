<?php
get_header();
?>

<div class="container">

	<h1>single.php</h1>

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
			<article>
				<h2><?php the_title(); ?></h2>

				<div class="card-meta text-muted small mb-2">
					Post published <?php echo get_the_date(); ?> at <?php the_time(); ?> by <?php the_author(); ?> in <?php the_category(); ?>
				</div>

				<div class="card-text">
					<?php the_content(); ?>
				</div>
			</article>
			<!-- End post -->
		<?php endwhile; ?>
	<?php else: ?>
		<p>Sorry, no post found.</p>
	<?php endif; ?>

</div>

<?php
get_footer();
