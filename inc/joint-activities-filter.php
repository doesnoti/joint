<?php
add_action('pre_get_posts', 'joint_activity_query');
function joint_activity_query($query) {
	if (is_admin() || $query->is_main_query()) return;
	if (!$query->is_post_type_archive('activity')) return;

	if (isset($_GET['category'])) {
		$tax_query = $query->get('tax_query');
		$tax_query = is_array($tax_query) ? $tax_query : [];
		$tax_query[] = array(
			'relation' => 'OR',
			'taxonomy' => 'category',
			'field' => 'slug',
			'terms' => explode(',', $_GET['category'])
		);

		$query->set('tax_query', $tax_query);
	}

	if (isset($_GET['lvl'])) {
		$tax_query = $query->get('tax_query');
		$tax_query = is_array($tax_query) ? $tax_query : [];
		$tax_query[] = array(
			'relation' => 'OR',
			'taxonomy' => 'lvl',
			'field' => 'slug',
			'terms' => explode(',', $_GET['lvl'])
		);

		$query->set('tax_query', $tax_query);
	}
}