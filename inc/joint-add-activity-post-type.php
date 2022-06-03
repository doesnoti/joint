<?php
/**
 * Register a custom post type called "activity".
 */
function joint_activities_init() {
    register_post_type('activity',
        array(
            'labels'             => array(
                'name'                  => esc_html__( 'Activities', 'joint-theme' ),
                'singular_name'         => esc_html__( 'Activity', 'joint-theme' )
            ),
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'show_in_admin_bar'  => false,
            'show_in_rest'       => true,
            'query_var'          => true,
            'menu_position'      => 20,
            'menu_icon'          => 'dashicons-buddicons-activity',
            'capability_type'    => 'post',
            'hierarchical'       => true,
            'taxonomies'         => array( 'category', 'level' ),
            'has_archive'        => true,
            'supports'           => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields', 'page-attributes' ),
        )
    );
}
 
add_action( 'init', 'joint_activities_init' );