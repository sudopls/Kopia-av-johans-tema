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
	return sprintf('<a href="%s">%s</a>', get_term_link($genre, 'mbt_movie_genre'), $genre->name);
}, $genres);

$subtitle = implode(', ', $names);

if (has_post_thumbnail()) {
	$post_thumbnail_id = get_post_thumbnail_id();
	$header_image_src = wp_get_attachment_image_src($post_thumbnail_id, 'full')[0] ?? '';
} else {
	$header_image_src = get_header_image();
}

?>

<div id="site-header">
	<img src="<?php echo $header_image_src; ?>"
		alt="<?php echo esc_attr($title); ?>"
		class="img-fluid"
	>
	<div class="header-text-wrapper">
		<div class="header-text">
			<div class="display-4 header-title"><?php echo $title; ?></div>
			<div class="h4 header-subtitle"><?php echo $subtitle; ?></div>
		</div>
	</div>
</div>
