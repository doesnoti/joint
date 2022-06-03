<?php 
/*
* Template name: Template steps
*/

get_header();
?>

<main class="main">
	<section class="section steps-mainscreen">
		<?php joint_print_meta_img('joint_steps_mainscreen_big_image', 'svg decoration cloud--big steps-mainscreen__big-cloud') ?>
		<?php joint_print_meta_img('joint_steps_mainscreen_small_image', 'svg decoration cloud--small steps-mainscreen__small-cloud') ?>
		<?php joint_print_meta_img('joint_steps_mainscreen_image', 'svg decoration steps-mainscreen__img') ?>
		<div class="wrapper">
			<div class="grid-2">
				<div class="empty"></div>
				<div class="steps-mainscreen__right">
					<h1 class="title text--fz-46 sections__title">
						<?php echo get_post_meta( get_the_ID(), 'joint_steps_main_title', true ); ?>
					</h1>
					<p class="text">
						<?php echo nl2br( get_post_meta( get_the_ID(), 'joint_steps_mainscreen_text', true ) ); ?>
					</p>
				</div>
			</div>
		</div>
	</section>
	<section class="section steps">
		<div class="wrapper">
			<div class="steps__rows">
				<div class="steps__grid">
					<?php joint_print_meta_img('joint_steps_1_image', 'svg steps__img step-1__img') ?>
					<div class="steps__text-block">
						<h4 class="title">
							<?php echo get_post_meta( get_the_ID(), 'joint_steps_1_title', true ); ?>
						</h4>
						<p class="sub-title sections__title">
							<?php echo get_post_meta( get_the_ID(), 'joint_steps_1_subtitle', true ); ?>
						</p>
						<p class="text">
							<?php echo nl2br( get_post_meta( get_the_ID(), 'joint_steps_1_text', true ) ); ?>
						</p>
					</div>
				</div>
				<div class="steps__grid">
					<div class="steps__text-block">
						<h4 class="title">
							<?php echo get_post_meta( get_the_ID(), 'joint_steps_2_title', true ); ?>
						</h4>
						<p class="sub-title sections__title">
							<?php echo get_post_meta( get_the_ID(), 'joint_steps_2_subtitle', true ); ?>
						</p>
						<p class="text">
							<?php echo nl2br( get_post_meta( get_the_ID(), 'joint_steps_2_text', true ) ); ?>
						</p>
					</div>
					<?php joint_print_meta_img('joint_steps_2_image', 'svg steps__img step-2__img') ?>
				</div>
				<div class="steps__grid">
					<?php joint_print_meta_img('joint_steps_3_image', 'svg steps__img step-3__img') ?>
					<div class="steps__text-block">
						<h4 class="title">
							<?php echo get_post_meta( get_the_ID(), 'joint_steps_3_title', true ); ?>
						</h4>
						<p class="sub-title sections__title">
							<?php echo get_post_meta( get_the_ID(), 'joint_steps_3_subtitle', true ); ?>
						</p>
						<p class="text">
							<?php echo nl2br( get_post_meta( get_the_ID(), 'joint_steps_3_text', true ) ); ?>
						</p>
					</div>
				</div>
			</div>
			<p class="text steps__text">
				<?php echo nl2br( get_post_meta( get_the_ID(), 'joint_steps_footnote', true ) ); ?>
			</p>
		</div>
	</section>
	<section class="section popular">
		<div class="wrapper">
			<h2 class="title sections__title">
				<?php echo get_post_meta( get_the_ID(), 'joint_steps_slider_title', true ); ?>
			</h2>
			<?php
				get_template_part( 'parts/joint-slider', null, array(
					'joint_slider_sort' => get_post_meta( get_the_ID(), 'joint_steps_slider_sort', true ),
					'joint_slide_count' => get_post_meta( get_the_ID(), 'joint_steps_slider_count', true )
				) );
			?>
		</div>
		<?php joint_print_meta_img('joint_steps_slider_image', 'svg decoration popular__img') ?>
	</section>
</main>

<?php get_footer(); ?>