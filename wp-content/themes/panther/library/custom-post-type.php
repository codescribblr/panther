<?php

function investment_post_type() {
    $labels = array(
        'name'                => 'Investments',
        'singular_name'       => 'Investment',
        'menu_name'           => 'Investments',
        'name_admin_bar'      => 'Investments',
        'parent_item_colon'   => 'Parent Item:',
        'all_items'           => 'Investments',
        'add_new_item'        => 'Add New Investment',
        'add_new'             => 'Add New',
        'new_item'            => 'New Investment',
        'edit_item'           => 'Edit Investment',
        'update_item'         => 'Update Investment',
        'view_item'           => 'View Investment',
        'search_items'        => 'Search Investments',
        'not_found'           => 'No Investments Found',
        'not_found_in_trash'  => 'Investment Not found in Trash',
    );
    $args = array(
        'label'               => 'investments',
        'description'         => 'Custom post type for investments.',
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor', 'revisions', 'custom-fields' ),
        'hierarchical'        => true,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_position'       => 7,
        'menu_icon'           => 'dashicons-chart-line',
        'show_in_admin_bar'   => true,
        'show_in_nav_menus'   => true,
        'can_export'          => true,
        'rewrite'             => array( 'slug' => __('investment', 'panther') ),
        'has_archive'         => true,
        'exclude_from_search' => true,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
    );
    register_post_type( 'investment', $args );
}
// Hook into the 'init' action
// add_action( 'init', 'investment_post_type', 0 );
// add_action( 'pre_get_posts', 'custom_investment_query_vars' );
function custom_investment_query_vars( $query ) {
  if ( !is_admin() && $query->is_main_query() ) {
    if ( get_post_type() == 'investment' ) {
      $query->set( 'orderby', 'menu_order' );
    }
  }
  return $query;
}