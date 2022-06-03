<?php

function joint_query_activity($query) {
	if ( is_category() && ( ! isset( $query->query_vars['suppress_filters'] ) || false == $query->query_vars['suppress_filters'] ) ) {
			$query->set( 'post_type', array( 'post', 'activity' ) );
			return $query;
	}
}
add_filter('pre_get_posts', 'joint_query_activity');