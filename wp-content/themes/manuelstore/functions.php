<?php

function register_styles() {
    wp_register_style('custom', get_template_directory_uri() . '/custom.css', array(), 1, 'all');
    wp_enqueue_style('custom');

    wp_register_style('fo','https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', array(), 1, 'all');
    wp_enqueue_style('fo');

    //wp_register_style('bs','https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css', array(), 1, 'all');
    //wp_enqueue_style('bs');
}

add_action('wp_enqueue_scripts', 'register_styles');

?>