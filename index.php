<?php get_header(); ?>

<main class="main">
	<section class="section activity">
		<div class="wrapper ">
			<h1 class="title sections__title">
				<?php the_title(); ?>
			</h1>
			<?php if ( have_posts() ) : ?>
				<div class="activity__cards">
				<?php while ( have_posts() ) : the_post(); ?>
					<a href="<?php the_permalink(); ?>" class="link card">
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
							<div class="card__lvls card__lvls--big">
								<p class="text text--fz-16 card__lvl-text">
									<?php echo $joint_settings['lvl_single_title']; ?>
								</p>
								<?php
									$post_lvl = get_the_terms(get_the_ID(), 'level')[0]->slug;
									$urlPath = get_template_directory_uri() . '/img/lvls/' . $post_lvl . '-lvl.svg';
								?>
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
				endwhile; ?>
				</div>
			<?php else : ?>
				<p class="sub-title">
					<?php echo $joint_settings['no_posts']; ?>
				</p>
			<?php endif; ?>
		</div>
	</section>
</main>

<?php get_footer();
