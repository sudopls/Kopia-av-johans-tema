<?php

require_once('includes/Bootstrap_5_WP_Nav_Menu_Walker.php');

/**
 * Setup theme.
 *
 * @return void
 */
function mbt_theme_setup() {

	/**
	 * Declare support for title-tag.
	 */
	add_theme_support('title-tag');

	/**
	 * Declare support for post-thumbnails.
	 */
	add_theme_support('post-thumbnails');

	/**
	 * Declare support for custom logo.
	 */
	add_theme_support('custom-logo', [
		'height' => 50,
		'width' => 200,
	]);

	/**
	 * Declare support for custom header image.
	 */
	add_theme_support('custom-header', [
		// Display the header text along with the image
		'header-text' => true,

		// Header image width (in pixels)
		'width' => 2560,

		// Header image height (in pixels)
		'height' => 500,

		// Allow flexible image width
		'flex-width' => true,

		// Allow flexible image height
		'flex-height' => true,
	]);

	/**
	 * Declare our own image size for archives
	 */
	add_image_size('featured-image-thumb', 520, 9999);

}
add_action('after_setup_theme', 'mbt_theme_setup');

/**
 * Register theme modifications in WP Customizer
 *
 * @param WP_Customize_Manager $wp_customizer
 * @return void
 */
function mbt_customizer($wp_customizer) {
	// Header Textcolor
	$wp_customizer->add_setting('header_textcolor', [
		'default' => '#222222',
	]);
}
add_action('customize_register', 'mbt_customizer');

/**
 * Output neccessary CSS for our theme modifications in WP Customizer.
 *
 * @return void
 */
function mbt_wp_head_customizer_css() {
	?>
		<style>
			#site-header .header-text-wrapper {
				color: #<?php echo get_theme_mod('header_textcolor'); ?>;
			}
		</style>
	<?php
}
add_action('wp_head', 'mbt_wp_head_customizer_css');

/**
 * Output custom logo (if set, otherwise output site title).
 *
 * @return void
 */
function mbt_navbar_brand() {
	$custom_logo_id = get_theme_mod('custom_logo');
	$logo = wp_get_attachment_image_src($custom_logo_id, 'full');

	if ($logo) {
		echo '<img src="' . esc_url($logo[0]) . '" alt="' . get_bloginfo('name') . '">';
	} else {
		echo get_bloginfo('name');
	}
}

/**
 * Register neccessary scripts and styles.
 *
 * @return void
 */
function mbt_register_scripts_and_styles() {
	/**
	 * Styles
	 */
	// Bootstrap 5
	wp_enqueue_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css', [], '5.0.0-beta3', 'all');

	// Theme styles
	wp_enqueue_style('mbt', get_parent_theme_file_uri('style.css'), ['bootstrap'], '0.1', 'all');

	// Print styles
	wp_enqueue_style('mbt-print', get_parent_theme_file_uri('print.css'), ['bootstrap'], '0.1', 'print');

	/**
	 * Scripts
	 */
	// Bootstrap 5
	wp_enqueue_script('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js', [], '5.0.0-beta3', true);

	// Theme scripts
	wp_enqueue_script('mbt', get_parent_theme_file_uri('assets/js/scripts.js'), ['bootstrap'], '0.1', true);
}
add_action('wp_enqueue_scripts', 'mbt_register_scripts_and_styles');

/**
 * Change length of auto-generated excerpt.
 *
 * @param int $length
 * @return int
 */
function mybasictheme_excerpt_length($length) {
	return 10;
}
add_filter('excerpt_length', 'mybasictheme_excerpt_length', 10, 1);

/**
 * Change suffix on auto-generated excerpt.
 *
 * @param string $suffix
 * @return string
 */
function mbt_filter_excerpt_more($suffix) {
	return "...";
}
add_filter('excerpt_more', 'mbt_filter_excerpt_more');

/**
 * Append a 'Read more'-button to excerpts.
 *
 * @param string $excerpt
 * @return string
 */
function mbt_filter_the_excerpt($excerpt) {
	return $excerpt . '<div><a href="' . get_the_permalink() . '" class="btn btn-primary">Read more &raquo;</a></div>';
}
add_filter('the_excerpt', 'mbt_filter_the_excerpt');

/**
 * Filters content from bad words and replaces them with asterisk.
 *
 * @param string $content The content to be filtered
 * @return string The filtered content
 */
function mbt_filter_bad_words($content) {
	$bad_words_raw = file_get_contents(get_parent_theme_file_path('includes/bad_words.txt'));
	$bad_words_raw = trim($bad_words_raw);
	$bad_words = explode("\n", $bad_words_raw);
	$censored_words = [];

	foreach ($bad_words as $bad_word) {
		$len = strlen($bad_word);
		$censored_word = str_repeat('*', $len);
		array_push($censored_words, $censored_word);
	}

	return str_ireplace($bad_words, $censored_words, $content);
}
add_filter('the_content', 'mbt_filter_bad_words');
add_filter('the_excerpt', 'mbt_filter_bad_words');
add_filter('the_title', 'mbt_filter_bad_words');

/**
 * Register navigation menus.
 */
function mbt_register_nav_menus() {
	// register theme menu locations
	register_nav_menus([
		'header-menu' => 'Header Menu',
	]);
}
add_action('init', 'mbt_register_nav_menus');

/**
 * Register widget areas (a.k.a. sidebars).
 *
 * @return void
 */
function mbt_widgets_init() {
	// Blog widget area
	register_sidebar([
		'name' => 'Blog Sidebar',
		'id' => 'blog-sidebar',
		'description' => 'Sidebar on blog index, category archive and single blog posts.',
		'before_widget' => '<div id="%1$s" class="card mb-3 widget %2$s"><div class="card-body">',
		'after_widget' => '</div></div>',
		'before_title' => '<h3 class="widget-title h5">',
		'after_title' => '</h3>',
	]);

	// Page widget area
	register_sidebar([
		'name' => 'Page Sidebar',
		'id' => 'page-sidebar',
		'description' => 'Sidebar on pages.',
		'before_widget' => '<div id="%1$s" class="card mb-3 widget %2$s"><div class="card-body">',
		'after_widget' => '</div></div>',
		'before_title' => '<h3 class="widget-title h5">',
		'after_title' => '</h3>',
	]);

	// Footer widget area
	register_sidebar([
		'name' => 'Footer',
		'id' => 'sidebar-footer',
		'description' => 'Page Footer 📄🦶🏻.',
		'before_widget' => '<div id="%1$s" class="text-justify col widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title h5">',
		'after_title' => '</h3>',
	]);
}
add_action('widgets_init', 'mbt_widgets_init');
