<?php
/**
 * Register a custom taxonomy called "level".
 */

function joint_level_init() {
    register_taxonomy('level', 'activity',
        array(
            'hierarchical'  => true,
            'labels'        => array(
                'name'                        => esc_html__( 'Levels', 'joint-theme' ),
                'singular_name'               => esc_html__( 'Level', 'joint-theme' ),
                'search_items'                => esc_html__( 'Search Levels', 'joint-theme' ),
                'popular_items'               => esc_html__( 'Popular Levels', 'joint-theme' ),
                'add_new_item'                => esc_html__( 'Add New Level', 'joint-theme' ),
            ),
            'query_var'     => true,
            'show_in_rest'  => true,
        )
    );
}
 
add_action( 'init', 'joint_level_init' );