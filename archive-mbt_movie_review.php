<?php
get_header();
?>

<main class="container mt-3">

	<?php if (!get_header_image()) : ?>
		<h1><?php post_type_archive_title(''); ?></h1>
	<?php endif; ?>

	<pre>archive-mbt_movie_review.php</pre>

	<hr />

	<div class="row">
		<div class="col-md-9 content">
			<!-- Do we have any posts to display? -->
			<?php if (have_posts()) : ?>
				<!-- Yay, we has posts do display! -->
				<?php while (have_posts()) : ?>
					<!-- Start post -->
					<?php
						// Load next post to display
						the_post();
						get_template_part('template-parts/content', 'excerpt');
					?>
					<!-- End post -->
				<?php endwhile; ?>

				<!-- Pagination start -->
				<?php get_template_part('template-parts/posts-pagination'); ?>
				<!-- Pagination end -->
			<?php else: ?>
				<p>Sorry, no movie reviews found.</p>
			<?php endif; ?>
		</div><!-- /.col-md-9 -->

		<aside class="col-md-3 sidebar">
			<?php get_sidebar('movie_review'); ?>
		</aside><!-- /.col-md-3 -->

	</div><!-- /.row -->
</main><!-- /.container -->

<?php
get_footer();
