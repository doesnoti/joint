<?php 
/*
* Template name: Template contacts
*/

get_header();
get_template_part( 'parts/popup', 'success', array('joint_sucess_page' => 'contacts') );
?>

<main class="main">
	<section class="section contacts">
		<div class="wrapper">
			<form class="form form-contacts">
				<?php joint_print_meta_img('joint_contacts_main_image', 'svg decoration contacts__img') ?>
				<?php joint_print_meta_img('joint_contacts_decor_image', 'svg decoration contacts__decor') ?>
				<h1 class="title text--fz-28 contacts__title">
					<?php echo get_post_meta( get_the_ID(), 'joint_contacts_title', true ); ?>
				</h1>
				<div class="contacts__inputs-block">
					<div class="sliding-label__block">
						<input id="name" type="text" name="name" class="input input-text" placeholder=" ">
						<button class="button transp-button clear-button">
							<i class="joint-close icon"></i>
						</button>
						<label for="name" class="text text--fz-18 sliding-label">
							<?php echo get_post_meta( get_the_ID(), 'joint_contacts_name_text', true ); ?>
						</label>
					</div>
					<div class="sliding-label__block">
						<input id="reason" type="text" name="reason" class="input input-text" placeholder=" ">
						<button class="button transp-button clear-button">
							<i class="joint-close icon"></i>
						</button>
						<label for="reason" class="text text--fz-18 sliding-label">
							<?php echo get_post_meta( get_the_ID(), 'joint_contacts_reason_text', true ); ?>
						</label>
					</div>
					<div class="sliding-label__block">
						<input id="phone" type="tel" name="phone" class="input input-text" placeholder=" ">
						<button class="button transp-button clear-button">
							<i class="joint-close icon"></i>
						</button>
						<label for="phone" class="text text--fz-18 sliding-label">
							<?php echo get_post_meta( get_the_ID(), 'joint_contacts_phone_text', true ); ?>
						</label>
					</div>
					<div class="sliding-label__block">
						<input id="email" type="email" name="email" class="input input-text require" placeholder=" ">
						<button class="button transp-button clear-button">
							<i class="joint-close icon"></i>
						</button>
						<label for="email" class="text text--fz-18 sliding-label">
							<?php echo get_post_meta( get_the_ID(), 'joint_contacts_email_text', true ); ?>
						</label>
					</div>
				</div>
				<div class="sliding-label__block contacts__bot">
					<textarea name="comment" id="comment" class="input textarea contacts__textarea" placeholder=" "></textarea>
					<label for="comment" class="text text--fz-18 sliding-label">
						<?php echo get_post_meta( get_the_ID(), 'joint_contacts_comment_text', true ); ?>
					</label>
				</div>
				<button type="submit" class="button form-button">
					<span class="button-text">
						<?php echo get_post_meta( get_the_ID(), 'joint_contacts_submit_text', true ); ?>
					</span>
				</button>
			</form>
		</div>
		<!-- Start middle-section__block -->
		<div class="middle-section__block contacts__middle-block">
			<a
				href="<?php echo get_permalink( get_post_meta(get_the_ID(), 'joint_contacts_link_value', true )); ?>"
				class="link button"
			>
				<i class="joint-chevron--left icon block--mr-16"></i>
				<span class="button-text">
					<?php echo get_post_meta( get_the_ID(), 'joint_contacts_link_name', true ); ?>
				</span>
			</a>
			<h2 class="title text--fz-28">
				<?php echo get_post_meta( get_the_ID(), 'joint_contacts_middle_block_text', true ); ?>
			</h2>
		</div>
		<!-- End middle-section__block -->
	</section>
</main>

<?php get_footer(); ?>