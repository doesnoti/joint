<?php
/*
 * Add views counter for Activities
*/
// Set number of views
function joint_set_activity_views($postID) {
    $count_key = 'joint_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

// Get number of views
function joint_get_activity_views($postID){
    $count_key = 'joint_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return esc_html__( "0 views", 'joint-theme' );
    }
    return esc_html__( $count.' views', 'joint-theme' );
}

// Display number of views in activities
add_filter('manage_activity_posts_columns', 'joint_activity_column_views');
add_action('manage_activity_posts_custom_column', 'joint_activity_custom_column_views',5,2);
function joint_activity_column_views($defaults){
    $defaults['post_views'] = __('Views');
    return $defaults;
}
function joint_activity_custom_column_views($column_name, $id){
    if($column_name === 'post_views'){
        echo joint_get_activity_views(get_the_ID());
    }
}