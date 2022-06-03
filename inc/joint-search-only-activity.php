<?php

function SearchFilter($query) {
	if ($query->is_search) {
		$query->set('post_type', 'activity');
	}
	return $query;
}
add_filter('pre_get_posts','SearchFilter');