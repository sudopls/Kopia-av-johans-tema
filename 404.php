<?php
get_header();
?>

<main class="container mt-3">

	<h1>Page Not Found</h1>

	<pre>404.php</pre>

	<hr />

	<div class="text-center mb-5">
		<img src="https://http.cat/404" class="img-fluid" alt="A cat hiding under a stack of papers" title="Peek-a-boo!">

		<p class="display-6 w-50 ms-auto me-auto mt-5 mb-5">We looked and looked but we can't seem to find that page, sorry :(</p>

		<p>Maybe try searching?</p>

		<?php get_search_form(); ?>
	</div>
</main><!-- /.container -->

<?php
get_footer();
