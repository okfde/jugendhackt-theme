<?php
// Register Custom Post Type
function events() {

	$labels = array(
		'name'                => 'Events',
		'singular_name'       => 'Event',
		'menu_name'           => 'Events',
		'parent_item_colon'   => 'Parent Item:',
		'all_items'           => 'All Events',
		'view_item'           => 'View Event',
		'add_new_item'        => 'Add New Event',
		'add_new'             => 'Add New',
		'edit_item'           => 'Edit Event',
		'update_item'         => 'Update Event',
		'search_items'        => 'Search Event',
		'not_found'           => 'Not found',
		'not_found_in_trash'  => 'Not found in Trash',
	);
	$args = array(
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'custom-fields', 'page-attributes', 'post-formats', ),
		'hierarchical'        => true,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'events', $args );

}

// Hook into the 'init' action
add_action( 'init', 'events', 0 );
?>