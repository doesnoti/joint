<?php
/*
 * Template part for all site sliders
*/

global $joint_settings;

$joint_sort_by = $args['joint_slider_sort'];
$joint_slide_count = $args['joint_slide_count'];
?>
<div class="slider">
	<button class="button arrow-button slider-button slider__left-button">
		<i class="joint-chevron--left icon"></i>
	</button>
	<div class="slider-body">
		<div class="slider-tape">
			<?php
			if ( $joint_sort_by == 'joint_popular') {
				$query = new WP_Query(
					array(
						'post_type'			=> 'activity',
						'posts_per_page' 	=> $joint_slide_count,
						'post_parent'		=> 0,
						'meta_key' 			=> 'joint_views_count',
						'orderby' 			=> 'meta_value_num',
						'order' 				=> 'DESC'
					)
				);
				wp_reset_query();

				if( $query->have_posts() ) {
					while( $query->have_posts() ) {
						$query->the_post();
						$lvls_arr = array();
						
						foreach (get_children(get_the_ID()) as $child) {
							$lvls_arr[] = get_the_terms($child->ID, 'level')[0]->slug;
						}
						$lvls_arr[] = get_the_terms(get_the_ID(), 'level')[0]->slug;
				?>
						<a href="<?php the_permalink(); ?>" class="link card slider__item">
							<img
								src="<?php echo the_post_thumbnail_url(); ?>"
								alt="<?php echo get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true); ?>"
								class="img card__img card__img--small"
							>
							<h4 class="title text--fz-22 card__title card__title--big">
								<?php the_title(); ?>
							</h4>
							<p class="text text--fz-16 card__text">
								<?php echo get_the_excerpt(); ?>
							</p>
							<div class="card__bot card__bot--big">
								<div class="card__lvls">
									<?php
									for ($i = 0; $i < count($lvls_arr); $i++) {
										$urlPath = get_template_directory_uri() . '/img/lvls/' . $lvls_arr[$i] . '-lvl.svg';
									?>
										<img
											src="<?php echo $urlPath; ?>"
											alt="<?php echo $lvls_arr[$i] . '-lvl'; ?>"
											class="svg card__lvl-img"
										>
									<?php } ?>
									<p class="text text--fz-16 card__lvl-text">
										<?php echo $joint_settings['lvl_group_title']; ?>
									</p>
								</div>
								<div
									class="card__category category--<?php echo get_the_category()[0]->slug; ?>"
								>
									<p class="sub-title text--fz-14 card__category-text">
										<?php echo get_the_category()[0]->name; ?>
									</p>
								</div>
							</div>
						</a>
					<?php
					}
				}
				?>
			<?php
			}
			else {
				$query = new WP_Query(
					array(
						'post_type'      	=> 'activity',
						'post_status'    	=> array('publish', 'inherit'),
						'posts_per_page' 	=> $joint_slide_count,
						'orderby' 			=> 'post_date',
						'order' 				=> 'DESC'
					)
				);
				wp_reset_query();

				if( $query->have_posts() ) {
					while( $query->have_posts() ) {
						$query->the_post();
			?>
						<a href="<?php the_permalink(); ?>" class="link card slider__item">
							<img
								src="<?php echo the_post_thumbnail_url(); ?>"
								alt="<?php echo get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true); ?>"
								class="img card__img card__img--small"
							>
							<p class="text text--fz-16 card__date">
								<?php echo get_the_date(); ?>
							</p>
							<h4 class="title text--fz-22 card__title card__title--big">
								<?php the_title(); ?>
							</h4>
							<p class="text text--fz-16 card__text">
								<?php echo get_the_excerpt(); ?>
							</p>
							<div class="card__bot card__bot--big">
								<div class="card__lvls card__lvls--big">
									<?php
										$post_lvl = get_the_terms(get_the_ID(), 'level')[0]->slug;
										$urlPath = get_template_directory_uri() . '/img/lvls/' . $post_lvl . '-lvl.svg';
									?>
									<p class="text text--fz-16 card__lvl-text">
										<?php echo get_the_terms(get_the_ID(), 'level')[0]->name; ?>
									</p>
									<img
										src="<?php echo $urlPath; ?>"
										alt="<?php echo $post_lvl . '-lvl'; ?>"
										class="svg card__lvl-img"
									>
								</div>
								<div
									class="card__category category--<?php echo get_the_category()[0]->slug; ?>"
								>
									<p class="sub-title text--fz-14 card__category-text">
										<?php echo get_the_category()[0]->name; ?>
									</p>
								</div>
							</div>
						</a>
					<?php
					}
				}
			}
			wp_reset_query();
			?>
		</div>
		<div class="slider__points-block"></div>
	</div>
	<button class="button arrow-button slider-button slider__right-button">
		<i class="joint-chevron--right icon"></i>
	</button>
</div>