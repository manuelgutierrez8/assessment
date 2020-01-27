<?php
/*
Plugin Name: Assessment Custom Fields
Plugin URI: 
Description: This plugin will create two custom post types (Products and Brands) and a new taxonomy (Product Category).
Version: 1.0
Author: Manuel Gutiérrez Rojas
Author URI: https://github.com/manuelgutierrez8/
License: 
Text Domain: 
*/

add_action('init','register_product_cpt');
function register_product_cpt() {
    $labels = array(
		'name'                => __( 'Products' ),
		'singular_name'       => __( 'Product'),
		'menu_name'           => __( 'Products'),
		'parent_item_colon'   => __( 'Parent Product'),
		'all_items'           => __( 'All Products'),
		'view_item'           => __( 'View Product'),
		'add_new_item'        => __( 'Add New Product'),
		'add_new'             => __( 'Add New Product'),
		'edit_item'           => __( 'Edit Product'),
		'update_item'         => __( 'Update Product'),
		'search_items'        => __( 'Search Product'),
		'not_found'           => __( 'Not Found'),
		'not_found_in_trash'  => __( 'Not found in Trash')
    );
    $args = array(
        'label' => 'Products', 
        'labels' => $labels,
        'public' => true, 
		'capability_type' => 'post',
		'show_in_rest' => true
    );

    register_post_type( 'product', $args);
}

add_action('init','register_brand_cpt');
function register_brand_cpt() {
    $labels = array(
		'name'                => __( 'Brands' ),
		'singular_name'       => __( 'Brand'),
		'menu_name'           => __( 'Brands'),
		'parent_item_colon'   => __( 'Parent Brand'),
		'all_items'           => __( 'All Brands'),
		'view_item'           => __( 'View Brand'),
		'add_new_item'        => __( 'Add New Brand'),
		'add_new'             => __( 'Add New Brand'),
		'edit_item'           => __( 'Edit Brand'),
		'update_item'         => __( 'Update Brand'),
		'search_items'        => __( 'Search Brand'),
		'not_found'           => __( 'Not Found'),
		'not_found_in_trash'  => __( 'Not found in Trash')
	);
	$args = array(
		'label'               => __( 'brands'),
		'description'         => __( 'Product Brand'),
		'labels'              => $labels,
		'supports'            => array( 'title', 'thumbnail', 'page-attributes'),
		'public'              => true,
		'hierarchical'        => true,
		'capability_type'     => 'page',
		'show_in_rest' => true
);
	register_post_type( 'brand', $args );
}

add_action( 'init', 'register_product_category_taxonomy');
function register_product_category_taxonomy() {
  $labels = array(
    'name' => _x( 'Product Categories', 'taxonomy general name' ),
    'singular_name' => _x( 'Category', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Product Categories' ),
    'all_items' => __( 'All Categories' ),
    'parent_item' => __( 'Parent Category' ),
    'parent_item_colon' => __( 'Parent Category:' ),
    'edit_item' => __( 'Edit Category' ), 
    'update_item' => __( 'Update Category' ),
    'add_new_item' => __( 'Add New Category' ),
    'new_item_name' => __( 'New Category Name' ),
    'menu_name' => __( 'Categories' ),
  ); 	
 
  register_taxonomy('product-category',array('product'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
	'rewrite' => array( 'slug' => 'product-categories'),
	'show_in_rest' => true,
  ));
}
?>