<?php

function cptui_register_my_cpts() {

	/**
	 * Post Type: Movie Reviews.
	 */

	$labels = [
		"name" => __( "Movie Reviews", "mybasictheme" ),
		"singular_name" => __( "Movie Review", "mybasictheme" ),
		"menu_name" => __( "Movie Reviews", "mybasictheme" ),
		"all_items" => __( "All Reviews", "mybasictheme" ),
		"add_new" => __( "Add new", "mybasictheme" ),
		"add_new_item" => __( "Add new Review", "mybasictheme" ),
		"edit_item" => __( "Edit Review", "mybasictheme" ),
		"new_item" => __( "New Review", "mybasictheme" ),
		"view_item" => __( "View Review", "mybasictheme" ),
		"view_items" => __( "View Reviews", "mybasictheme" ),
		"search_items" => __( "Search Reviews", "mybasictheme" ),
		"not_found" => __( "No Movie Reviews found", "mybasictheme" ),
		"not_found_in_trash" => __( "No Movie Reviews found in trash", "mybasictheme" ),
		"parent" => __( "Parent Movie Review:", "mybasictheme" ),
		"featured_image" => __( "Featured image for this Movie Review", "mybasictheme" ),
		"set_featured_image" => __( "Set featured image for this Movie Review", "mybasictheme" ),
		"remove_featured_image" => __( "Remove featured image for this Movie Review", "mybasictheme" ),
		"use_featured_image" => __( "Use as featured image for this Movie Review", "mybasictheme" ),
		"archives" => __( "Movie Review archives", "mybasictheme" ),
		"insert_into_item" => __( "Insert into Movie Review", "mybasictheme" ),
		"uploaded_to_this_item" => __( "Upload to this Movie Review", "mybasictheme" ),
		"filter_items_list" => __( "Filter Movie Reviews list", "mybasictheme" ),
		"items_list_navigation" => __( "Movie Reviews list navigation", "mybasictheme" ),
		"items_list" => __( "Movie Reviews list", "mybasictheme" ),
		"attributes" => __( "Movie Reviews attributes", "mybasictheme" ),
		"name_admin_bar" => __( "Movie Review", "mybasictheme" ),
		"item_published" => __( "Review published", "mybasictheme" ),
		"item_published_privately" => __( "Review published privately.", "mybasictheme" ),
		"item_reverted_to_draft" => __( "Review reverted to draft.", "mybasictheme" ),
		"item_scheduled" => __( "Review scheduled", "mybasictheme" ),
		"item_updated" => __( "Review updated.", "mybasictheme" ),
		"parent_item_colon" => __( "Parent Movie Review:", "mybasictheme" ),
	];

	$args = [
		"label" => __( "Movie Reviews", "mybasictheme" ),
		"labels" => $labels,
		"description" => "Movie Reviews 🎬🍿",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => [ "slug" => "movie-reviews", "with_front" => true ],
		"query_var" => true,
		"menu_icon" => "dashicons-editor-video",
		"supports" => [ "title", "editor", "thumbnail", "excerpt", "author" ],
		"show_in_graphql" => false,
	];

	register_post_type( "mbt_movie_review", $args );
}
add_action( 'init', 'cptui_register_my_cpts' );
