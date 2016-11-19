<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/*
 * Code for Site Navigation
 * asp_menu is for main menu.
 */
register_nav_menus(array(
    'primary' => __('Primary Menu', 'clipping_menu')
));

/**
 * Making Custom Theme Options
 */

include('themeoptions.php');



/*
 * External Stylsheet for styling admin pane.
 */
add_action('admin_enqueue_scripts', 'load_admin_styles');

function load_admin_styles() {
    wp_enqueue_style('admin_style', get_template_directory_uri() . '/css/admin_style.css', false, '1.0.0');
}



/*
 * Code for Create Widgets
 * our_mission is for Our Mission widget.
 */

function primary_widgets() {
    register_sidebar(array(
        'name' => __('Primary Widgets', 'clippingpath'),
        'id' => 'search',
        'description' => __('Primary Widget for website', 'clippingpath'),
        'before_widget' => '<div>',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
}

add_action('widgets_init', 'primary_widgets');