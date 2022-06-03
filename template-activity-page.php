<?php 
/*
* Template name: Template Activity page
*/

get_header();
get_template_part('parts/popup', 'mobile-form');
?>

<main class="main">
	<section class="section activity">
		<?php joint_print_meta_img('joint_activity_page_decor', 'svg decoration activity__img'); ?>
		<div class="activity-wrapper ">
			<div class="activity__body">
				<div class="activity__content">
					<div class="activity__top">
						<h1 class="title">
							<?php echo get_post_meta( get_the_ID(), 'joint_activity_page_title', true ); ?>
						</h1>
						<p class="text text--fz-18 activity__text">
							<?php echo get_post_meta( get_the_ID(), 'joint_activity_page_text', true ); ?>
						</p>
						<button class="button border-button activity__filter-button">
							<i class="joint-filter icon block--mr-8"></i>
							<span class="button-text">
								<?php echo get_post_meta( get_the_ID(), 'joint_activity_page_filter_text', true ); ?>
							</span>
						</button>
					</div>
					<div class="activity__cards">
						<?php
						$tax_query = array();
						$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

						if ( !isset($_GET['all-cat']) && isset($_GET['category']) ) {
							$tax_query[] = array(
								'taxonomy' => 'category',
								'field' => 'slug',
								'terms' => explode(',', esc_html($_GET['category']) )
							);
						}
						if ( isset($_GET['level']) ) {
							$tax_query[] = array(
								'taxonomy' => 'level',
								'field' => 'slug',
								'terms' => explode(',', esc_html($_GET['level']) )
							);
						}

						$args = array(
							'post_type'			=> 'activity',
							'meta_key' 			=> 'joint_views_count',
							'orderby' 			=> 'title',
							'order' 				=> 'ASC',
							'paged'				=> $paged,
							'tax_query' 		=> $tax_query,
						);

						$query = new WP_Query($args);

						if( $query->have_posts() ) {
							$added = [];
							while( $query->have_posts() ) {
								$query->the_post();

								$lvls_arr = array();
								$current_ID = 0;

								if (array_search(get_the_ID(), $added) !== false) continue;

								if ( has_post_parent(get_the_ID()) ) :
									$current_ID = wp_get_post_parent_id(get_the_ID());
								else:
									$current_ID = get_the_ID();
								endif;
								
								foreach (get_children($current_ID) as $child) {
									$lvls_arr[] = get_the_terms($child->ID, 'level')[0]->slug;
									$added[] = $child->ID;
								}
								$lvls_arr[] = get_the_terms($current_ID, 'level')[0]->slug;
								$added[] = $current_ID;
						?>
								<a
									href="<?php echo get_permalink($current_ID); ?>"
									class="link card"
								>
									<img
										src="<?php echo get_the_post_thumbnail_url($current_ID); ?>"
										alt="<?php echo get_post_meta(get_post_thumbnail_id($current_ID), '_wp_attachment_image_alt', true); ?>"
										class="img card__img card__img--small"
									>
									<h4 class="title text--fz-22 card__title card__title">
										<?php echo get_the_title($current_ID); ?>
									</h4>
									<div class="card__bot card__bot">
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
						wp_reset_query();
						?>
					</div>
					<?php
					$GLOBALS['wp_query'] = $query;
					if ( !empty(get_the_posts_pagination()) ):
						$args = array(
							'end_size'     => 2,
							'prev_next'		=> true,
							'prev_text'    => '<',
							'next_text'    => '>'
						)
					?>
						<div class="pagination-block activity__pagination">
							<?php the_posts_pagination($args); ?>
						</div>
					<?php
					endif;
					wp_reset_query();
					?>
				</div>
				<div class="cat__body activity__cat-body">
					<?php if (!empty($_GET)): ?>
						<a
							href="<?php echo get_permalink( get_the_ID() ); ?>"
							class="link button border-button reset-button"
						>
							<i class="joint-close icon block--mr-16"></i>
							<span class="button-text">
								<?php echo get_post_meta( get_the_ID(), 'joint_activity_page_reset_text', true ); ?>
							</span>
						</a>
					<?php endif; ?>
					<form action="" method="GET" class="filter-form cat__lvls-block">
						<p class="title text--fz-18 cat__title">
							<?php echo $joint_settings['lvl-title']; ?>
						</p>
						<?php
						$terms = get_terms(
							array(
								'taxonomy' 	=> 'level',
								'orderby'	=> 'id',
								'order'		=> 'ASC',
							)
						);
						$current_filters = $_GET['level'] ?
							explode( ',', joint_wc_clean( wp_unslash($_GET['level']) ) ) :
							[];
						foreach( $terms as $term ) : ?>
							<input
								id="page__lvl-<?php echo $term->slug; ?>"
								type="checkbox"
								value="<?php echo $term->slug; ?>"
								class="checkbox cat__checkbox"
								<?php
								if (array_search($term->slug, $current_filters) !== false) {
									echo "checked";
								}
								?>
							>
							<label for="page__lvl-<?php echo $term->slug; ?>" class="label cat__label">
								<span class="text text--fz-16 cat__text cat-label__item">
									<?php echo $term->name; ?>
								</span>
								<?php
								$urlPath = get_template_directory_uri() . '/img/lvls/' . $term->slug . '-lvl.svg';
								?>
								<img
									src="<?php echo $urlPath; ?>"
									alt="<?php echo $term->slug . '-lvl'; ?>"
									class="svg cat__lvl-img cat-label__item"
								>
								<span class="checkmark cat-label__item">
									<i class="joint-check icon"></i>
								</span>
							</label>
						<?php
							endforeach;
							wp_reset_query();
						?>
						<input
							type="hidden"
							name="level"
							value="<?php echo esc_attr( implode(',', $current_filters) ); ?>"
						>

						<?php echo joint_wc_query_string(null, ['level'], '', true); ?>
					</form>
					<form action="" method="GET" class="filter-form cat__cat-block">
						<p class="title text--fz-18 cat__title">
							<?php echo $joint_settings['cat-title']; ?>
						</p>
						<?php
						$current_filters = $_GET['category'] ?
							explode( ',', joint_wc_clean( wp_unslash($_GET['category']) ) ) :
							[];
						foreach ( get_categories() as $category ) : ?>
							<input
								id="page__cat-<?php echo $category->slug; ?>"
								type="checkbox"
								value="<?php echo $category->slug; ?>"
								class="checkbox cat__checkbox"
								<?php
								if (array_search($category->slug, $current_filters) !== false) {
									echo "checked";
								}
								?>
							>
							<label for="page__cat-<?php echo $category->slug; ?>" class="label cat__label">
								<span class="text text--fz-16 cat__text cat-label__item">
									<?php echo $category->name; ?>
								</span>
								<span class="checkmark cat-label__item">
									<i class="joint-check icon"></i>
								</span>
							</label>
						<?php endforeach; ?>
						<input
							type="hidden"
							name="category"
							value="<?php echo esc_attr( implode(',', $current_filters) ); ?>"
						>

						<?php echo joint_wc_query_string(null, ['category'], '', true); ?>
					</form>
				</div>
				<script>
					const forms = document.querySelectorAll('.filter-form')
					forms.forEach((form) => form.addEventListener('change', () => {
						let field = form.querySelector('input[type="hidden"]')
						let val = ''
						let i = 0

						form.querySelectorAll('input:checked').forEach((item) => {
							if (i === 0) {
								val += item.value
							}
							else {
								val += ',' + item.value
							}
							i++
						})

						if (val !== '') {
							field.value = val
						}
						else {
							field.disabled= true
						}

						form.submit()
					}))
				</script>
			</div>
		</div>
	</section>
</main>

<?php get_footer(); ?>