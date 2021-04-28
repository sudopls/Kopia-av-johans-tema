<?php

// don't output any HTML if header image is disabled in theme settings
if (!has_post_thumbnail() && !get_header_image()) {
	return;
}

$title = get_the_title();

// get genres for current movie review
$post_id = get_the_ID();
$genres = get_the_terms($post_id, 'mbt_movie_genre') ?: [];

$names = array_map(function($genre) {
	return $genre->name;
}, $genres);

$subtitle = implode(', ', $names);

?>

<div id="site-header">
	<img src="<?php header_image(); ?>"
		width="<?php echo absint(get_custom_header()->width); ?>"
		height="<?php echo absint(get_custom_header()->height); ?>"
		alt="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>"
		class="img-fluid"
	>
	<div class="header-text-wrapper">
		<div class="header-text">
			<div class="display-4"><?php echo $title; ?></div>
			<div class="h4"><?php echo $subtitle; ?></div>
		</div>
	</div>
</div>
