<?php
get_header();
joint_set_activity_views(get_the_ID());
?>

<main class="main">
	<article class="single-page">
		<img
			src="<?php echo $joint_settings['single_top_image']['url']; ?>"
			alt="<?php echo get_post_meta($joint_settings['single_top_image']['id'], '_wp_attachment_image_alt', true); ?>"
			class="svg decoration activity__img"
		>
		<div class="wrapper">
			<ul class="breadcrums single__breadcrums">
				<li class="breadcrums__item">
					<a href="<?php echo home_url(); ?>" class="default-link text--fz-16">
						<?php echo get_the_title( get_option('page_on_front') ); ?>
					</a>
				</li>
				<li class="breadcrums__item text text--fz-16">
					>
				</li>
				<li class="breadcrums__item">
					<a
						href="<?php echo get_permalink($joint_settings['activity_id']); ?>"
						class="default-link text--fz-16"
					>
						<?php echo get_the_title($joint_settings['activity_id']); ?>
					</a>
				</li>
				<li class="breadcrums__item text text--fz-16">
					>
				</li>
				<li class="breadcrums__item">
					<a
						href="<?php
							echo (
								get_permalink($joint_settings['activity_id']) . '?category=' . get_the_category()[0]->slug
							);
						?>"
						class="default-link text--fz-16"
					>
						<?php echo get_the_category()[0]->name; ?>
					</a>
				</li>
				<li class="breadcrums__item text text--fz-16">
					>
				</li>
				<li class="breadcrums__item text text--fz-16">
					<?php the_title(); ?>
				</li>
			</ul>
			<h1 class="title text--fz-46 single__title">
				<?php the_title(); ?>
			</h1>
			<div class="single__container">
				<?php get_sidebar(); ?>
				<div class="single__body">
					<img
						src="<?php echo $joint_settings['single_middle_image']['url']; ?>"
						alt="<?php echo get_post_meta($joint_settings['single_middle_image']['id'], '_wp_attachment_image_alt', true); ?>"
						class="svg decoration single__img">
					<div class="lvl-block single__lvl-block">
						<div class="lvl-block__lvls">
							<?php 
							$lvls_name = array();
							$lvls_id = array();

							if ( has_post_parent(get_the_ID()) ) :
								$parent_id = wp_get_post_parent_id(get_the_ID());
								foreach (get_children(get_the_ID()) as $child) :
									if ($child->ID == get_the_ID()) continue;

									$lvls_name[] = get_the_terms($child->ID, 'level')[0];
									$lvls_id[] = $child->ID;
								endforeach;

								$lvls_name[] = get_the_terms($parent_id, 'level')[0];
								$lvls_id[] = $parent_id;
							else : foreach (get_children(get_the_ID()) as $child) :
								$lvls_name[] = get_the_terms($child->ID, 'level')[0];
								$lvls_id[] = $child->ID;
							endforeach; endif;
							
							for ($i = 0; $i < count($lvls_name); $i++) : ?>
								<a href="<?php echo get_permalink($lvls_id[$i]); ?>" class="link lvl__item">
									<p class="text text--fz-16 text--c-inh">
										<?php echo $lvls_name[$i]->name; ?>
									</p>
									<div class="lvl__img-block">
										<?php
											$urlPath = get_template_directory_uri() . '/img/lvls/' . $lvls_name[$i]->slug . '-lvl.svg';
										?>
										<img
											src="<?php echo $urlPath; ?>"
											alt="<?php echo $lvls_name[$i]->slug . '-lvl'; ?>"
											class="svg"
										>
									</div>
								</a>
							<?php
							endfor;
							$lvl = get_the_terms(get_the_ID(), 'level')[0];
							?>
							<div class="lvl__item active">
								<p class="text text--fz-16 text--c-inh">
									<?php echo $lvl->name; ?>
								</p>
								<div class="lvl__img-block">
									<?php
										$urlPath = get_template_directory_uri() . '/img/lvls/' . $lvl->slug . '-lvl.svg';
									?>
									<img
										src="<?php echo $urlPath; ?>"
										alt="<?php echo $lvl->slug . '-lvl'; ?>"
										class="svg"
									>
								</div>
							</div>
						</div>
						<p class="sub-title text--fz-18">
							<?php echo $joint_settings['lvl_group_title']; ?>
						</p>
					</div>
					<div class="single__article">
						<div class="article__text-block">
							<h2 class="title text--fz-28 article__title">
								<?php echo $joint_settings['single_body_title']; ?>
							</h2>
							<p class="text text--fz-16">
								<?php echo nl2br( get_post_meta( get_the_ID(), 'joint_single_text', true ) ); ?>
							</p>
						</div>
						<?php
						$single_list_rep = get_post_meta(get_the_ID(), 'joint_re_single_list', true);
						if (!empty($single_list_rep)) : ?>
							<div class="materials-block">
								<p class="title text--fz-22 materials__title">
									<?php echo $joint_settings['single_list_title']; ?>
								</p>
								<ol class="o-list materials__list">
									<?php foreach ($single_list_rep as $arr) : ?>
										<li class="o-list__item text text--fz-16">
											<?php echo $arr['joint_single_list_text_field_id']; ?>
										</li>
									<?php endforeach; ?>
								</ol>
							</div>
						<?php
						endif;
						if ( !empty(get_the_content()) ) : ?>
							<div class="article__video-block">
								<h4 class="title text--fz-28 video-block__title">
									<?php echo $joint_settings['single_video_title']; ?>
								</h4>
								<div class="video ">
									<?php the_content(); ?>
								</div>
							</div>
						<?php
						endif;
						$single_steps_rep = get_post_meta(get_the_ID(), 'joint_re_single_steps', true);
						if (!empty($single_steps_rep)) : ?>
							<div class="article__content">
								<h4 class="title text--fz-28 article-content__title">
									<?php echo $joint_settings['single_steps_title']; ?>
								</h4>
								<?php
								$stepIdx = 1;
								foreach ($single_steps_rep as $arr) : ?>
									<div class="article-block">
										<p class="text text--fz-16 article-block__text">
											<span class="text--fw-700 text--fz-18">
												<?php echo count($single_steps_rep) > 1 ? '.' . $stepIdx : ''; ?>
											</span>
											<?php echo nl2br( $arr['joint_single_step_text_field_id'] ); ?>
										</p>
										<img
											src="<?php echo wp_get_attachment_image_url($arr['joint_single_step_image_field_id']['id'], 'full'); ?>"
											alt="<?php echo get_post_meta($arr['joint_single_step_image_field_id']['id'], '_wp_attachment_image_alt', true); ?>"
											class="img ">
									</div>
								<?php
									$stepIdx++;
								endforeach;
								?>
							</div>
						<?php endif; ?>
						<a href="<?php echo get_permalink($joint_settings['single_article_link_value']); ?>" class="link button border-button single__button">
							<i class="joint-chevron--left icon block--mr-8"></i>
							<span class="button-text">
								<?php echo $joint_settings['single_article_link_text']; ?>
							</span>
						</a>
					</div>
				</div>
			</div>
		</div>
	</article>
	<section class="section popular single__popular">
		<div class="middle-section__block single__middle-block">
			<a
				href="<?php echo get_permalink($joint_settings['single_link_value']); ?>"
				class="link button"
			>
				<i class="joint-chevron--left icon block--mr-16"></i>
				<span class="button-text">
					<?php echo $joint_settings['single_link_text']; ?>
				</span>
			</a>
			<h2 class="title text--fz-28">
				<?php echo $joint_settings['single_middle_title']; ?>
			</h2>
		</div>
		<div class="wrapper">
			<h2 class="title sections__title">
				<?php echo $joint_settings['single_slider_title']; ?>
			</h2>
			<?php
				get_template_part( 'parts/joint-slider', null, array(
					'joint_slider_sort' => $joint_settings['single_slider_sort'],
					'joint_slide_count' => $joint_settings['single_slider_count']
				) );
			?>
		</div>
		<img
			src="<?php echo $joint_settings['single_slider_image']['url']; ?>"
			alt="<?php echo get_post_meta($joint_settings['single_slider_image']['id'], '_wp_attachment_image_alt', true); ?>"
			class="svg decoration single-popular__img"
		>
	</section>
</main>

<?php get_footer();
