<?php global $joint_settings; ?>
<div class="popup categories__popup">
	<div class="popup__body cat-popup__block">
		<form action="<?php echo get_permalink($joint_settings['activity_id']); ?>" method="GET" class="cat__body">
			<div class="cat__lvls-block">
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
				foreach( $terms as $term ) : ?>
					<input id="lvl-<?php echo $term->slug; ?>" type="checkbox" name="level" value="<?php echo $term->slug; ?>" class="checkbox cat__checkbox" onChange="submit()">
					<label for="lvl-<?php echo $term->slug; ?>" class="label cat__label">
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
			</div>
			<div class="cat__cat-block">
				<p class="title text--fz-18 cat__title">
					<?php echo $joint_settings['cat-title']; ?>
				</p>
				<?php foreach ( get_categories() as $category ) : ?>
					<input
						id="cat-<?php echo $category->slug; ?>"
						type="checkbox"
						name="category"
						value="<?php echo $category->slug; ?>"
						class="checkbox cat__checkbox"
						onChange="submit()"
					>
					<label for="cat-<?php echo $category->slug; ?>" class="label cat__label">
						<span class="text text--fz-16 cat__text cat-label__item">
							<?php echo $category->name; ?>
						</span>
						<span class="checkmark cat-label__item">
							<i class="joint-check icon"></i>
						</span>
					</label>
				<?php endforeach; ?>
			</div>
		</form>
	</div>
</div>