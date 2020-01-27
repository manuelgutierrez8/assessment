<?php
/*
Plugin Name: Assessment Custom API
Plugin URI: 
Description: API for Products, Brands and Product Categories
Version: 1.0
Author: Manuel Gutiérrez Rojas
Author URI: https://github.com/manuelgutierrez8/
License: 
Text Domain: 
*/

//API actions
add_action('rest_api_init', 'productRegisterGet');
add_action('rest_api_init', 'brandRegisterGet');
add_action('rest_api_init', 'productCategoriesRegisterGet');

//Register Routes
function productRegisterGet() {
    register_rest_route( 'api/v1', 'products', array(
        'methods' => 'GET', 
        'callback' => 'getAllPosts'
    ) );

    register_rest_route( 'api/v1', 'products/featured', array(
        'methods' => 'GET', 
        'callback' => 'getFeaturedProducts'
    ) );

    register_rest_route( 'api/v1', 'products/brand/(?P<brand>\d+)', array(
        'methods' => 'GET', 
        'callback' => 'getProductsByBrand'
    ) );

    register_rest_route( 'api/v1', 'products/top-rated/', array(
        'methods' => 'GET', 
        'callback' => 'getTopRatedProducts'
    ) );
}

function brandRegisterGet() {
    register_rest_route( 'api/v1', 'brands', array(
        'methods' => 'GET', 
        'callback' => 'getAllBrands'
    ) );
}

function productCategoriesRegisterGet() {
    register_rest_route( 'api/v1', 'productCategories', array(
        'methods' => 'GET', 
        'callback' => 'getProductCategories'
    ) );
}

//Product Methods
function getProductsByBrand($params) {
    $args = [
        'numberposts' => 9999,
        'post_type' => 'product',
    ];

    $posts = get_posts($args);
    $data = [];

    foreach ($posts as $post) {
        if(get_post_meta( $post->ID, 'brand', true ) == $params['brand']) {
            $post_info = getPostFields($post);
            array_push($data, $post_info);
        } 
    }

    return $data;
}

function getFeaturedProducts() {
    $args = [
        'numberposts' => 9999,
        'post_type' => 'product',
    ];

    $posts = get_posts($args);
    $data = [];

    foreach ($posts as $post) {
        if(get_post_meta( $post->ID, 'featured', true ) != null) {
            $post_info = getPostFields($post);
            array_push($data, $post_info);
        }  
    }

    return $data;
}

function getTopRatedProducts() {
    $args = [
        'numberposts' => 9999,
        'post_type' => 'product',
    ];

    $posts = get_posts($args);
    $data = [];

    foreach ($posts as $post) {
        $post_info = getPostFields($post);
        array_push($data, $post_info);
    }

    usort($data, 'sorter'); 

    return $data;
}

function getAllPosts() {
    $args = [
        'numberposts' => 9999,
        'post_type' => 'product',
    ];

    $posts = get_posts($args);
    $data = [];

    foreach ($posts as $post) {
        $post_info = getPostFields($post);
        array_push($data, $post_info);
    }

    return $data;
}

function getPostFields($post) {
    $post_info = [];

    $post_info['id'] = $post->ID;
    $post_info['title'] = get_the_title( $post->ID );
    $post_info['slug'] = $post->post_name;
    $post_info['rating'] = get_post_meta( $post->ID, 'rating', true );
    $post_info['featured'] = get_post_meta( $post->ID, 'featured', true ) != null;
    
    //Category
    $post_info['category'] = [];        
    $post_info['category']['id'] = get_post_meta( $post->ID, 'product_category', true );
    $post_info['category']['name'] = get_term_by('id', $post_info['category']['id'], 'product-category')->name; 

    //Brand Information
    $post_info['brand'] = [];
    $post_info['brand']['id'] = get_post_meta( $post->ID, 'brand', true );
    $post_info['brand']['title'] = get_the_title( $post_info['brand']['id'] );

    return $post_info;
}

function sorter($a, $b) {
 return (int) $b['rating'] - (int) $a['rating'];
}

//Brand Methods 
function getAllBrands() {
    $args = [
        'numberposts' => 9999,
        'post_type' => 'brand',
    ];

    $posts = get_posts($args);
    $data = [];

    foreach ($posts as $post) {
        $post_info = getBrandFields($post);
        array_push($data, $post_info);
    }

    return $data;
}

function getBrandFields($brand) {
    $brand_info = [];

    $brand_info['id'] = $brand->ID;
    $brand_info['title'] = get_the_title( $brand->ID );
    $brand_info['slug'] = $brand->post_name;

    return $brand_info;
}

//Product Categories Methods
function getProductCategories() {
    $taxonomies = get_terms([
        'taxonomy' => 'product-category',
        'hide_empty' => false,
    ]);

    $data = [];

    foreach($taxonomies as $taxonomy) {
        $taxonomy_data = [];

        $taxonomy_data['id'] = $taxonomy->term_id;
        $taxonomy_data['name'] = $taxonomy->name;

        array_push($data, $taxonomy_data);
    }

    return $data;
}

?>