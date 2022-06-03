<?php
global $joint_settings;

$joint_success_title = 'joint_' . $args['joint_sucess_page'] . '_success_title';
$joint_success_text = 'joint_' . $args['joint_sucess_page'] . '_success_text';
$joint_success_img = 'joint_' . $args['joint_sucess_page'] . '_success_image';
?>
<div class="popup success__popup">
	<div class="popup__body success-popup__body">
		<p class="title text--fz-28 success__title">
			<?php echo get_post_meta( get_the_ID(), $joint_success_title, true ); ?>
		</p>
		<p class="text text--fz-18 success_text">
			<?php echo get_post_meta( get_the_ID(), $joint_success_text, true ); ?>
		</p>
		<?php joint_print_meta_img($joint_success_img, 'svg success__image') ?>
	</div>
</div>