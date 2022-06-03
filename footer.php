<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Joint_Theme
 */
global $joint_settings;
?>

	<footer id="footer" class="footer">
		<div class="wrapper">
			<?php get_sidebar('footer-columns'); ?>
			<div class="footer__bot">
				<a href="/" class="logo-block">
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
				<p class="text text--fz-16"><?php echo $joint_settings['copywriting']; ?></p>
			</div>
		</div>
	</footer>

	<?php wp_footer(); ?>
</body>
</html>