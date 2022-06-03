<?php 
/*
* Template name: Template offer
*/

get_header();
?>

<main class="main">
	<section class="section offer__mainscreen">
		<?php joint_print_meta_img('joint_offer_mainscreen_image', 'svg decoration offer__img') ?>
		<div class="wrapper">
			<div class="grid-2">
				<div class="empty"></div>
				<div class="offer__right">
					<h1 class="title text--fz-46 offer__title">
						<?php echo nl2br( get_post_meta( get_the_ID(), 'joint_offer_main_title', true ) ); ?>
					</h1>
					<p class="text">
						<?php echo nl2br( get_post_meta( get_the_ID(), 'joint_offer_main_text', true ) ); ?>
					</p>
				</div>
			</div>
		</div>
	</section>
	<section class="section principle">
		<div class="wrapper">
			<div class="principle__title-block grid-2">
				<div class="empty"></div>
				<h2 class="title">
					<?php echo get_post_meta( get_the_ID(), 'joint_offer_principle_title', true ); ?>
				</h2>
			</div>
			<div class="principle__cards">
				<?php
				$offer_rep = get_post_meta(get_the_ID(), 'joint_re_offer', true);
				foreach ($offer_rep as $arr) :
				?>
					<div class="principle__card">
						<img
							src="<?php echo wp_get_attachment_image_url($arr['joint_offer_image_field_id']['id'], 'full'); ?>"
							alt="<?php echo get_post_meta($arr['joint_offer_image_field_id']['id'], '_wp_attachment_image_alt', true); ?>"
							class="svg principle-card__img"
						>
						<div class="principle-card__text-block">
							<p class="title text--fz-32">
								<?php echo nl2br( $arr['joint_offer_title_field_id'] ); ?>
							</p>
							<p class="text">
								<?php echo nl2br( $arr['joint_offer_text_field_id'] ); ?>
							</p>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
	<section class="section popular">
		<div class="wrapper">
			<h2 class="title sections__title">
				<?php echo get_post_meta( get_the_ID(), 'joint_offer_slider_title', true ); ?>
			</h2>
			<?php
				get_template_part( 'parts/joint-slider', null, array(
					'joint_slider_sort' => get_post_meta( get_the_ID(), 'joint_offer_slider_sort', true ),
					'joint_slide_count' => get_post_meta( get_the_ID(), 'joint_offer_slider_count', true )
				) );
			?>
		</div>
		<?php joint_print_meta_img('joint_offer_slider_img', 'svg decoration popular__img') ?>
	</section>
</main>

<?php get_footer(); ?>