<?php
/*
 * Add custom column 'slug' at page and activities list
*/

add_filter( 'manage_pages_columns', 'joint_add_page_column_title', 50 );
add_filter( 'manage_activity_posts_columns', 'joint_add_activity_column_title' );

function joint_add_page_column_title( $columns ) {
  $columns['joint_page_slug'] = esc_html__('Page slug', 'joint-theme');

  $columns = joint_move_post_columns( $columns, 'joint_page_slug', 'author' );

  return $columns;
}
function joint_add_activity_column_title( $columns ) {
	$columns['joint_activity_slug'] = esc_html__('Activity slug', 'joint-theme');

	$columns = joint_move_post_columns( $columns, 'joint_activity_slug', 'categories' );

	return $columns;
}

function joint_move_post_columns( $columns, $move, $before ) {
	$n_columns = array();

	foreach($columns as $key => $value) {
		if ($key == $before){
			$n_columns[$move] = $move;
		}
		$n_columns[$key] = $value;
	}

	return $n_columns;
}

add_action( 'manage_pages_custom_column', 'joint_add_page_column', 10, 2 );
add_action( 'manage_activity_posts_custom_column', 'joint_add_activity_column', 10, 2 );

/* Display custom column's content */
function joint_add_page_column( $column, $post_id ) {
	//We will check whether the column is our defined column above by name
	if ( 'joint_page_slug' === $column ) {
		//If yes, we will generate the html content here
		$post = get_post( $post_id );
		?>
			<p id="joint_page_slug-<?php echo esc_html( $post->ID, 'joint-theme' ); ?>"><?php echo $post->post_name; ?></p>
		<?php
	}
}
function joint_add_activity_column( $column, $post_id ) {
	//We will check whether the column is our defined column above by name
	if ( 'joint_activity_slug' === $column ) {
		//If yes, we will generate the html content here
		$post = get_post( $post_id );
		?>
			<p id="joint_activity_slug-<?php echo esc_html( $post->ID, 'joint-theme' ); ?>"><?php echo esc_html( $post->post_name, 'joint-theme' ); ?></p>
		<?php
	}
}