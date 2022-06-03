<?php
/*
* Display the image on the screen with the set parameters/
*/

function joint_print_meta_img($joint_metaname, $joint_img_classes) {
	$img = get_post_meta( get_the_ID(), $joint_metaname, true );
	?>
	<img
		src="<?php echo wp_get_attachment_image_url($img['id'], 'full'); ?>"
		alt="<?php echo get_post_meta($img['id'], '_wp_attachment_image_alt', true); ?>"
		class="<?php echo $joint_img_classes ?>"
	>
	<?php
}