<?php
/*
 * Initialise all custom widgets
*/

// register Column_Widget widget
function joint_register_widgets() {
    register_widget( 'Joint_Column_Widget' );
    register_widget( 'Joint_Activities_Widget' );
}
add_action( 'widgets_init', 'joint_register_widgets' );


function joint_widget_script( $hook ) {
    if ( 'widgets.php' != $hook ) {
        return;
    }
    wp_enqueue_script( 'joint_widget_script', get_template_directory_uri() . '/widgets/joint-widget-column-script.js' );
}
add_action( 'admin_enqueue_scripts', 'joint_widget_script', 99 );