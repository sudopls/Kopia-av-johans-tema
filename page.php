<?php
get_header();
?>

<main class="container">

	<pre>page.php</pre>

	<hr />

	<!-- Do we have any posts to display? -->
	<?php if (have_posts()) : ?>
		<!-- Yay, we has posts do display! -->
		<?php while (have_posts()) : ?>
			<!-- Start post -->
			<?php
				// Load next post to display
				the_post();
				get_template_part('template-parts/content', 'page'); // template-parts/content-page.php
			?>
			<!-- End post -->
		<?php endwhile; ?>
	<?php else: ?>
		<p>Sorry, page not found.</p>
	<?php endif; ?>

</main>

<?php
get_footer();
