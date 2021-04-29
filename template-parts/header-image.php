<?php if (get_header_image()) : ?>
	<?php
		if (is_category()) {
			$title = single_cat_title(__('Category: ', 'mybasictheme'), false);

		} else if (is_tag()) {
			$title = single_tag_title(__('Tag: ', 'mybasictheme'), false);

		} else if (is_post_type_archive()) {
			$title = post_type_archive_title('', false);

		} else if (is_tax('mbt_movie_genre')) {
			$title = single_term_title(__('Genre: ', 'mybasictheme'), false);

		} else if (is_home()) {
			$title = __('Blog', 'mybasictheme');

		} else if (is_search()) {
			$title = sprintf(
				// translators: Search results for query %s
				__('Search results for "%s"', 'mybasictheme'),
				htmlspecialchars($_REQUEST['s'])
			);

		} else {
			$title = get_the_title();

		}
	?>
	<div id="site-header">
		<img src="<?php header_image(); ?>"
			width="<?php echo absint(get_custom_header()->width); ?>"
			height="<?php echo absint(get_custom_header()->height); ?>"
			alt="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>"
			class="img-fluid"
		>
		<div class="header-text-wrapper">
			<div class="header-text display-4"><?php echo $title; ?></div>
		</div>
	</div>
<?php endif; ?>
