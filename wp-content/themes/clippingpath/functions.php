<?php

/**
 * =============================================================================
 * To register main navigation. 
 * @return 
 * =============================================================================
 */
register_nav_menus(array(
    'primary' => __('Primary Menu', 'clipping_menu')
));

/**
 * =============================================================================
 * Making Custom Theme Options
 * =============================================================================
 */
include('themeoptions.php');



/**
 * =============================================================================
 * To support Post Thumbnail.
 * To support Excerpt for All.
 * @return
 * =============================================================================
 */
add_theme_support('post-thumbnails');
add_post_type_support( 'page', 'excerpt' );



/**
 * =============================================================================
 * To styling custom ui for wp-admin. 
 * @return
 * =============================================================================
 */
add_action('admin_enqueue_scripts', function() {
    wp_enqueue_style('admin_style', get_template_directory_uri() . '/css/admin_style.css', false, '1.0.0');
});



/**
 * =============================================================================
 * To ad widget.
 * @return 
 * =============================================================================
 */
add_action('widgets_init', function() {
    register_sidebar(array(
        'name' => __('History', 'clippingpath'),
        'id' => 'history',
        'description' => __('Primary Widget for website', 'clippingpath'),
        'before_widget' => '<div>',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
});
add_action('widgets_init', function() {
    register_sidebar(array(
        'name' => __('Vision', 'clippingpath'),
        'id' => 'primary_widget',
        'description' => __('Primary Widget for website', 'clippingpath'),
        'before_widget' => '<div>',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
});
add_action('widgets_init', function() {
    register_sidebar(array(
        'name' => __('Phyloshopy', 'clippingpath'),
        'id' => 'phyloshopy',
        'description' => __('Primary Widget for website', 'clippingpath'),
        'before_widget' => '<div>',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
});



/**
 * =============================================================================
 * To make custom post type for What We Offer.
 * @post_type what_we_offer
 * @slug what_we_offer
 * @supports title,thumbnail,editor
 * @add_meta_boxes is to add custom meta fields to team member.
 * @team_member_social_pages is to make user interface for custom fields.
 * @save_post is to save custom fields data.
 * =============================================================================
 */
add_action('init', function() {
    register_post_type('what_we_offer', array(
        'labels' => array(
            'name' => __('What We Offer'),
            'singular_name' => __('what_we_offer')
        ),
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'what_we_offer'),
        'menu_icon' => 'dashicons-tag',
        'supports' => array('title', 'thumbnail', 'editor')
    ));
});
add_action('add_meta_boxes', function() {
    add_meta_box(
            'test_meta_box', __('Our Offer Icon Class', 'what_we_offer'), 'what_we_offer_custom_fld', 'what_we_offer', 'normal', 'high'
    );
});

function what_we_offer_custom_fld() {
    global $post;
    require 'what_we_offer_custom_fld.php';
}

add_action('save_post', function($post_id) {
    global $post;
    if ($post->post_type == 'what_we_offer') {
        update_post_meta($post_id, 'class_name', $_POST['class_name']);
    }
});

/**
 * =============================================================================
 * To make custom post type for Testimonial.
 * @post_type testimonial
 * @slug testimonial
 * @supports title,editor,excerpt
 * =============================================================================
 */
add_action('init', function() {
    register_post_type('testimonial', array(
        'labels' => array(
            'name' => __('Testimonial'),
            'singular_name' => __('testimonial')
        ),
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'testimonial'),
        'menu_icon' => 'dashicons-format-quote',
        'supports' => array('title', 'editor', 'excerpt')
    ));
});



/**
 * =============================================================================
 * To make custom post type for Our Team Members.
 * @post_type our_team
 * @slug our_team
 * @supports title,thumbnail,editor
 * @add_meta_boxes is to add custom meta fields to team member.
 * @team_member_social_pages is to make user interface for custom fields.
 * @save_post is to save custom fields data.
 * =============================================================================
 */
add_action('init', function() {
    register_post_type('our_team', array(
        'labels' => array(
            'name' => __('Our Team'),
            'singular_name' => __('our_team_member')
        ),
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'our_team'),
        'menu_icon' => 'dashicons-admin-users',
        'supports' => array('title', 'thumbnail', 'editor')
    ));
});

add_action('add_meta_boxes', function() {
    add_meta_box(
            'test_meta_box', __('Member social pages link', 'our_team'), 'team_member_social_pages', 'our_team', 'normal', 'high'
    );
});

function team_member_social_pages() {
    global $post;
    require 'member_social.php';
}

add_action('save_post', function($post_id) {
    global $post;
    if ($post->post_type == 'our_team') {
        update_post_meta($post_id, 'designation', $_POST['designation']);
        update_post_meta($post_id, 'facebook', $_POST['facebook']);
        update_post_meta($post_id, 'twitter', $_POST['twitter']);
        update_post_meta($post_id, 'linked_in', $_POST['linked_in']);
        update_post_meta($post_id, 'instagram', $_POST['instagram']);
    }
});



/**
 * =============================================================================
 * To make custom post type for Our Recent Work.
 * @post_type recent_work
 * @slug recent_work
 * @supports title,thumbnail,editor
 * @MultiPostThumbnails is to add extra 4 post thumbnails.
 * =============================================================================
 */
add_action('init', function() {
    register_post_type('recent_work', array(
        'labels' => array(
            'name' => __('Our Recent Work'),
            'singular_name' => __('recent_work')
        ),
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'recent_work'),
        'menu_icon' => 'dashicons-hammer',
        'supports' => array('title', 'thumbnail', 'editor','excerpt')
    ));
});

require_once('library/multi-post-thumbnails.php');
if (class_exists('MultiPostThumbnails')) {
    new MultiPostThumbnails(array(
        'label' => '2nd Feature Image',
        'id' => 'feature-image-2',
        'post_type' => 'recent_work'
            )
    );
    new MultiPostThumbnails(array(
        'label' => '3rd Feature Image',
        'id' => 'feature-image-3',
        'post_type' => 'recent_work'
            )
    );
    new MultiPostThumbnails(array(
        'label' => '4th Feature Image',
        'id' => 'feature-image-4',
        'post_type' => 'recent_work'
            )
    );
    new MultiPostThumbnails(array(
        'label' => '5th Feature Image',
        'id' => 'feature-image-5',
        'post_type' => 'recent_work'
            )
    );
}



/**
 * To make inner pages.
 */
if (class_exists('MultiPostThumbnails')) {
    new MultiPostThumbnails(array(
        'label' => '2nd Feature Image',
        'id' => 'feature-image-2',
        'post_type' => 'page'
            )
    );
    new MultiPostThumbnails(array(
        'label' => '3rd Feature Image',
        'id' => 'feature-image-3',
        'post_type' => 'page'
            )
    );
    new MultiPostThumbnails(array(
        'label' => '4th Feature Image',
        'id' => 'feature-image-4',
        'post_type' => 'page'
            )
    );
    new MultiPostThumbnails(array(
        'label' => '5th Feature Image',
        'id' => 'feature-image-5',
        'post_type' => 'page'
            )
    );
}