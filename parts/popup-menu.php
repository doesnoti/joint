<?php global $joint_settings; ?>
<div class="popup menu__popup">
	<div class="popup__body menu-popup__body">
		<div class="popup-menu__top">
			<p class="title text--fz-24 menu__title">
				<?php echo $joint_settings['menu_title']; ?>
			</p>
			<nav class="menu-nav">
				<?php
				wp_nav_menu(
					array(
						'theme_location' 	=> 'menu-1',
						'container' 		=> false,
						'depth'				=> 1,
						'menu_class' 		=> 'menu',
						'add_li_class'		=> 'menu__item',
						'link_class'		=> 'link menu__link hover-underline text text--fz-18'
					)
				);
				?>
			</nav>
		</div>
		<a href="<?php echo home_url(); ?>" class="logo-block">
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
	</div>
</div>