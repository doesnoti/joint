<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Joint_Theme
 */
global $joint_settings;
?>
<!DOCTYPE html>
<html lang="he">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>
<body <?php body_class("page"); ?>>
	<?php wp_body_open(); ?>

	<header class="header">
		<div class="header__wrapper">
			<button class="button transp-button header__item burger-button">
				<span class="burger-line"></span>
				<span class="burger-line"></span>
				<span class="burger-line"></span>
			</button>
			<a href="<?php echo home_url(); ?>" class="logo-block header__logo-block">
				<img
					src="<?php echo $joint_settings['logo-left']['url']; ?>"
					alt="<?php echo get_post_meta($joint_settings['logo-left']['id'], '_wp_attachment_image_alt', TRUE); ?>"
					class="svg logo__left"
				>
				<span class="v-line logo__v-line"></span>
				<img
					src="<?php echo $joint_settings['logo-right']['url']; ?>"
					alt="<?php echo get_post_meta($joint_settings['logo-right']['id'], '_wp_attachment_image_alt', TRUE); ?>"
					class="svg logo__right"
				>
			</a>
			<div class="header__right">
				<nav class="header-nav">
					<?php
					wp_nav_menu(
						array(
							'theme_location' 	=> 'menu-1',
							'container' 		=> false,
							'depth'				=> 1,
							'menu_class' 		=> 'menu header__menu',
							'add_li_class'		=> 'menu__item header__menu-item',
							'link_class'		=> 'link menu__link hover-underline text text--fz-18'
						)
					);
					?>
				</nav>
				<?php get_search_form(array('search_class' => 'header__search-form')); ?>
				<button class="button transp-button border-button header__item to-search__button">
					<i class="joint-search icon"></i>
				</button>
				<?php if ( get_the_ID() != intval($joint_settings['activity_id']) ) {?>
				<div class="header__cat-button-block">
					<a
						href="<?php echo get_permalink($joint_settings['activity_id']); ?>"
						class="link button categories__button header__item"
					>
						<i class="joint-chevron--down icon block--mr-8"></i>
						<span class="button-text">
							<?php echo get_the_title($joint_settings['activity_id']); ?>
						</span>
					</a>
				</div>
				<?php
				}
				else { ?>
				<a href="<?php echo home_url(); ?>" class="link button to-main__button header__item">
					<i class="joint-close icon block--mr-8"></i>
					<span class="button-text">
						<?php echo get_the_title($joint_settings['activity_id']); ?>
					</span>
				</a>
				<?php } ?>
			</div>
		</div>
	</header>

	<?php
		get_template_part('parts/popup', 'categories');
		get_template_part('parts/popup', 'menu');
		get_template_part('parts/popup', 'search');
	?>