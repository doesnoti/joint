<?php 
/*
* Template name: Template homepage
*/

get_header();
?>

<main class="main">
	<section class="section mainscreen">
		<?php joint_print_meta_img('joint_mainscreen_big_image', 'svg decoration cloud--big mainscreen__big-cloud') ?>
		<?php joint_print_meta_img('joint_mainscreen_small_image', 'svg decoration cloud--small mainscreen__small-cloud') ?>
		<?php joint_print_meta_img('joint_mainscreen_image', 'svg decoration mainscreen__img') ?>
		<div class="wrapper">
			<a href="<?php echo home_url(); ?>" class="logo-block mainscreen__logo-block">
				<img
					src="<?php echo $joint_settings['logo-left']['url']; ?>"
					alt="<?php echo get_post_meta($joint_settings['logo-left']['id'], '_wp_attachment_image_alt', true); ?>"
					class="svg logo__left mainscreen__logo-left"
				>
				<span class="v-line logo__v-line"></span>
				<img
					src="<?php echo $joint_settings['logo-right']['url']; ?>"
					alt="<?php echo get_post_meta($joint_settings['logo-right']['id'], '_wp_attachment_image_alt', true); ?>"
					class="svg logo__right mainscreen__logo-right"
				>
			</a>
			<h1 class="title text--fz-46 block--mb-15">
				<?php echo nl2br( get_post_meta( get_the_ID(), 'joint_main_title', true ) ); ?>
			</h1>
			<div class="grid-2">
				<div class="empty"></div>
				<div class="mainscreen__right">
					<p class="title text--fz-28 block--mb-20">
						<?php echo get_post_meta( get_the_ID(), 'joint_main_subtitle', true ); ?>
					</p>
					<p class="text sections__text">
						<?php echo nl2br( get_post_meta( get_the_ID(), 'joint_mainscreen_text', true ) ); ?>
					</p>
					<div class="mainscreen__buttons-block">
						<a
							href="<?php echo get_permalink( get_post_meta(get_the_ID(), 'joint_mainscreen_left_link_value', true )); ?>"
							class="link button border-button mainscreen__to-steps"
						>
							<span class="button-text">
								<?php echo get_post_meta( get_the_ID(), 'joint_mainscreen_left_link_name', true ); ?>
							</span>
						</a>
						<a
							href="<?php echo get_permalink( get_post_meta(get_the_ID(), 'joint_mainscreen_right_link_value', true )); ?>"
							class="link button mainscreen__to-proposal"
						>
							<span class="button-text">
								<?php echo get_post_meta( get_the_ID(), 'joint_mainscreen_right_link_name', true ); ?>
							</span>
						</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="section about">
		<div class="wrapper">
			<div class="grid-2">
				<div class="about__text-block">
					<h2 class="title about__title">
						<?php echo get_post_meta( get_the_ID(), 'joint_about_title', true ); ?>
					</h2>
					<p class="text sections__text">
						<?php echo nl2br( get_post_meta( get_the_ID(), 'joint_about_text', true ) ); ?>
					</p>
					<a
						href="<?php echo get_permalink( get_post_meta(get_the_ID(), 'joint_about_link_value', true )); ?>"
						class="link button"
					>
						<i class="joint-chevron--left icon block--mr-16"></i>
						<span class="button-text">
							<?php echo get_post_meta( get_the_ID(), 'joint_about_link_name', true ); ?>
						</span>
					</a>
				</div>
				<div class="empty"></div>
			</div>
		</div>
		<?php joint_print_meta_img('joint_about_image', 'svg decoration about__img') ?>
	</section>
	<section class="section new-activities">
		<?php joint_print_meta_img('joint_first_slider_top_img', 'svg decoration new-activities__top-img') ?>
		<div class="wrapper">
			<h2 class="title sections__title">
				<?php echo get_post_meta( get_the_ID(), 'joint_first_slider_title', true ); ?>
			</h2>
			<?php
				get_template_part( 'parts/joint-slider', null, array(
					'joint_slider_sort' => get_post_meta( get_the_ID(), 'joint_first_slider_sort', true ),
					'joint_slide_count' => get_post_meta( get_the_ID(), 'joint_first_slider_count', true )
				) );
			?>
		</div>
		<?php joint_print_meta_img('joint_first_slider_top_img', 'svg decoration new-activities__bot-img') ?>
	</section>
	<section class="section popular">
		<div class="wrapper">
			<h2 class="title sections__title">
				<?php echo get_post_meta( get_the_ID(), 'joint_second_slider_title', true ); ?>
			</h2>
			<?php
				get_template_part( 'parts/joint-slider', null, array(
					'joint_slider_sort' => get_post_meta( get_the_ID(), 'joint_second_slider_sort', true ),
					'joint_slide_count' => get_post_meta( get_the_ID(), 'joint_second_slider_count', true )
				) );
			?>
		</div>
		<?php joint_print_meta_img('joint_second_slider_img', 'svg decoration popular__img') ?>
	</section>
	<section class="section category-cards">
		<!-- Start middle-section__block -->
		<div class="middle-section__block homepage__middle-block">
			<a
				href="<?php echo get_permalink( get_post_meta(get_the_ID(), 'joint_homepage_middle_block_link_value', true )); ?>"
				class="link button"
			>
				<i class="joint-chevron--left icon block--mr-16"></i>
				<span class="button-text">
					<?php echo get_post_meta( get_the_ID(), 'joint_homepage_middle_block_link_name', true ); ?>
				</span>
			</a>
			<h2 class="title text--fz-28">
				<?php echo get_post_meta( get_the_ID(), 'joint_homepage_middle_block_text', true ); ?>
			</h2>
		</div>
		<!-- End middle-section__block -->
		<div class="wrapper">
			<h2 class="title category-cards__title">
				<?php echo get_post_meta( get_the_ID(), 'joint_category_card_title', true ); ?>
			</h2>
			<div class="category-cards__cards">
				<?php
				$cat_imgs = new WP_Query(
					array(
						'post_type'      => 'attachment',
						'post_mime_type' => 'image',
						'post_status'    => 'inherit',
						'posts_per_page' => - 1,
						'meta_query'     => array(
							array(
								'value'    => '.*-category', // with regex stuff
								'compare'  => 'REGEXP',
							),
						)
					)
				);
				$cat_imgs = $cat_imgs->posts;

				foreach ( get_categories() as $category ) : ?>
					<a
						href="<?php echo get_category_link($category->cat_ID); ?>"
						class="link category-card"
					>
						<?php
							$key = array_search($category->slug . '-category', array_column($cat_imgs, 'post_name'));
							$img_ID = $cat_imgs[$key]->ID;
						?>
						<img
							src="<?php echo wp_get_attachment_url($img_ID); ?>"
							alt="<?php echo get_post_meta($img_ID, '_wp_attachment_image_alt', true); ?>"
							class="svg"
						>
						<div class="category-card__text-block">
							<p class="title text--fz-24">
								<?php echo $category->name; ?>
							</p>
							<p class="sub-title text--fz-18 category-card__text">
								<?php
								echo
									$category->count .
									' ' .
									get_post_meta( get_the_ID(), 'joint_category_card_count_text', true );
								?>
							</p>
						</div>
					</a>
				<?php
				endforeach;
				wp_reset_query();
				?>
			</div>
		</div>
		<?php joint_print_meta_img('joint_category_card_img', 'svg decoration categories-cards__img') ?>
	</section>
</main>

<?php get_footer(); ?>