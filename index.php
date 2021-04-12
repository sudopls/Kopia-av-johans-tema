<?php
get_header();
?>

<h1>index</h1>

<!-- Do we have any posts to display? -->
<?php if (have_posts()) : ?>
	<!-- Yay, we has posts do display! -->
	<?php while (have_posts()) : ?>
		<!-- Start post -->
		<?php
			// Load next post to display
			the_post();
		?>
		<h2><?php the_title(); ?></h2>

		<?php the_content(); ?>
		<!-- End post -->
	<?php endwhile; ?>
<?php else: ?>
	<p>Sorry, no posts found.</p>
<?php endif; ?>

<?php
get_footer();
