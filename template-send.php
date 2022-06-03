<?php 
/*
* Template name: Template Send
*/

get_header();
get_template_part( 'parts/popup', 'success', array('joint_sucess_page' => 'send') );
?>

<main class="main">
	<section class="section send">
		<div class="wrapper">
			<form class="form form-send" enctype="multipart/form-data">
				<?php joint_print_meta_img('joint_send_main_image', 'svg decoration send__img') ?>
				<?php joint_print_meta_img('joint_send_decor_image', 'svg decoration send__decor') ?>
				<h1 class="title text--fz-28 send__title">
					<?php echo get_post_meta( get_the_ID(), 'joint_send_title', true ); ?>
				</h1>
				<div class="send__inputs-block">
					<div class="sliding-label__block send__textarea-block">
						<textarea name="comment" id="comment" class="input textarea send__textarea" placeholder=" "></textarea>
						<label for="comment" class="text text--fz-18 sliding-label">
							<?php echo get_post_meta( get_the_ID(), 'joint_send_comment_text', true ); ?>
						</label>
					</div>
					<div class="sliding-label__block">
						<input id="name" type="text" name="name" class="input input-text require" placeholder=" ">
						<button class="button transp-button clear-button">
							<i class="joint-close icon"></i>
						</button>
						<label for="name" class="text text--fz-18 sliding-label">
							<?php echo get_post_meta( get_the_ID(), 'joint_send_name_text', true ); ?>
						</label>
					</div>
					<div class="sliding-label__block">
						<input id="phone" type="tel" name="phone" class="input input-text" placeholder=" ">
						<button class="button transp-button clear-button">
							<i class="joint-close icon"></i>
						</button>
						<label for="phone" class="text text--fz-18 sliding-label">
							<?php echo get_post_meta( get_the_ID(), 'joint_send_phone_text', true ); ?>
						</label>
					</div>
				</div>
				<div class="send__file-block">
					<p class="text text--fz-18 send__file-text">
						<?php echo get_post_meta( get_the_ID(), 'joint_send_file_title', true ); ?>
					</p>
					<input id="file" type="file" name="file[]" class="input-file" multiple>
					<label for="file" class="label label-file">
						<i class="joint-upload icon"></i>
						<span class="text text--fz-14 upload__text">
							<?php echo get_post_meta( get_the_ID(), 'joint_send_file_text', true ); ?>
						</span>
						<span class="title text--fz-14 upload__text-fill">
							<?php echo get_post_meta( get_the_ID(), 'joint_send_file_fill_text', true ); ?>
						</span>
					</label>
				</div>
				<button type="submit" class="button form-button">
					<span class="button-text">
						<?php echo get_post_meta( get_the_ID(), 'joint_send_submit_text', true ); ?>
					</span>
				</button>
			</form>
		</div>
	</section>
</main>

<?php get_footer(); ?>