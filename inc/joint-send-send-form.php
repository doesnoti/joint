<?php

add_action('wp_ajax_send', 'joint_send_send_form');
add_action('wp_ajax_nopriv_send', 'joint_send_send_form');
function joint_send_send_form() {
	global $joint_settings;

	$data = json_encode($_POST);
	$data = json_decode($data, true);

	$mailBody = '';

	foreach ($data as $key => $value) {
		if ($key === 'action' || $key === 'file') continue;
		if (!empty($data[$key]))
			$mailBody .= '<p><strong>' . ucfirst($key) . ':</strong> ' . esc_html($value) . '</p>';
	}

	$headers = array(
		'From: Joint Admin <' . SMTP_FROM . '>',
		'content-type: text/html'
	);

	$file = $_FILES['file'];
	// joint_array_flatten() - converts multi-dimensional array to a flat array
	$names = joint_array_flatten( $file['name'] );
	$tmp_names = joint_array_flatten( $file['tmp_name'] );

	$uploads = wp_get_upload_dir()['basedir'];
	$uploads_dir = path_join( $uploads, 'joint_uploads' );

	$uploaded_files = array();

	foreach ( $names as $key => $filename ) {
		$tmp_name = $tmp_names[$key];

		if ( empty( $tmp_name ) or ! is_uploaded_file( $tmp_name ) ) {
			continue;
		}

		// joint_antiscript_file_name() - converts a file name to one that is not executable as a script
		$filename = joint_antiscript_file_name( $filename );

		$filename = wp_unique_filename( $uploads_dir, $filename );
		$new_file = path_join( $uploads_dir, $filename );

		if ( false === @move_uploaded_file( $tmp_name, $new_file ) ) {
			wp_send_json_error( json_encode( array('message' => 'Upload error') ) );
			return;
		}

		// Make sure the uploaded file is only readable for the owner process
		chmod( $new_file, 0400 );

		$uploaded_files[] = $new_file;
	}

	wp_mail( $joint_settings['send_mail_to'], $joint_settings['send_mail_theme'], $mailBody, $headers, $uploaded_files );

	// Deletes sent files as they are on the email
	foreach ( $uploaded_files as $filepath ) {
		wp_delete_file( $filepath );
	}
}