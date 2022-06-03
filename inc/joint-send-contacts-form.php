<?php

add_action('wp_ajax_contacts', 'joint_send_contacts_form');
add_action('wp_ajax_nopriv_contacts', 'joint_send_contacts_form');
function joint_send_contacts_form() {
	global $joint_settings;

	$data = json_encode($_POST);
	$data = json_decode($data, true);

	$mailBody = '';

	foreach ($data as $key => $value) {
		if ($key === 'action') continue;
		if (!empty($data[$key]))
			$mailBody .= '<p><strong>' . ucfirst($key) . ':</strong> ' . esc_html($value) . '</p>';
	}

	$headers = array(
		'From: Joint Admin <' . SMTP_FROM . '>',
		'content-type: text/html'
	);

	wp_mail( $joint_settings['contacts_mail_to'], $joint_settings['contacts_mail_theme'], $mailBody, $headers );
}