<?php global $joint_settings; ?>
<div class="popup filter-popup">
	<div class="popup__body cat-popup__block">
		<div class="cat__body">
			<a
				href="<?php echo get_permalink( get_the_ID() ); ?>"
				class="link button border-button reset-button"
			>
				<i class="joint-close icon block--mr-16"></i>
				<span class="button-text">
					<?php echo get_post_meta( get_the_ID(), 'joint_activity_page_reset_text', true ); ?>
				</span>
			</a>
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
						id="mob__lvl-<?php echo $term->slug; ?>"
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
						id="mob__cat-<?php echo $category->slug; ?>"
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
	</div>
</div>