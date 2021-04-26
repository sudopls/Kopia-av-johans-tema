<?php

function cptui_register_my_taxes() {

	/**
	 * Taxonomy: Genres.
	 */

	$labels = [
		"name" => __( "Genres", "mybasictheme" ),
		"singular_name" => __( "Genre", "mybasictheme" ),
		"menu_name" => __( "Genres", "mybasictheme" ),
		"all_items" => __( "All Genres", "mybasictheme" ),
		"edit_item" => __( "Edit Genre", "mybasictheme" ),
		"view_item" => __( "View Genre", "mybasictheme" ),
		"update_item" => __( "Update Genre name", "mybasictheme" ),
		"add_new_item" => __( "Add new Genre", "mybasictheme" ),
		"new_item_name" => __( "New Genre name", "mybasictheme" ),
		"parent_item" => __( "Parent Genre", "mybasictheme" ),
		"parent_item_colon" => __( "Parent Genre:", "mybasictheme" ),
		"search_items" => __( "Search Genres", "mybasictheme" ),
		"popular_items" => __( "Popular Genres", "mybasictheme" ),
		"separate_items_with_commas" => __( "Separate Genres with commas", "mybasictheme" ),
		"add_or_remove_items" => __( "Add or remove Genres", "mybasictheme" ),
		"choose_from_most_used" => __( "Choose from the most used Genres", "mybasictheme" ),
		"not_found" => __( "No Genres found", "mybasictheme" ),
		"no_terms" => __( "No Genres", "mybasictheme" ),
		"items_list_navigation" => __( "Genres list navigation", "mybasictheme" ),
		"items_list" => __( "Genres list", "mybasictheme" ),
		"back_to_items" => __( "Back to Genres", "mybasictheme" ),
	];


	$args = [
		"label" => __( "Genres", "mybasictheme" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'movie-genres', 'with_front' => true, ],
		"show_admin_column" => false,
		"show_in_rest" => true,
		"rest_base" => "mbt_movie_genre",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => false,
		"show_in_graphql" => false,
	];
	register_taxonomy( "mbt_movie_genre", [ "mbt_movie_review" ], $args );
}
add_action( 'init', 'cptui_register_my_taxes' );
