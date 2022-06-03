<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Joint_Theme
 */

get_header();
?>

	<main class="main">
		<section class="section --404">
			<div class="wrapper">
				<div class="--404__block">
					<img
						src="<?php echo $joint_settings['404_image']['url']; ?>"
						alt="<?php echo get_post_meta($joint_settings['404_image']['id'], '_wp_attachment_image_alt', true); ?>"
						class="svg decoration --404__img"
					>
					<h1 class="title text--fz-46 --404__title">
						<?php echo $joint_settings['404_title']; ?>
					</h1>
					<p class="title text--fz-22 --404__sub-title">
						<?php echo $joint_settings['404_subtitle']; ?>
					</p>
					<a
						href="<?php echo $joint_settings['404_link_value']; ?>"
						class="link button border-button"
					>
						<span class="button-text">
							<?php echo $joint_settings['404_link_text']; ?>
						</span>
					</a>
				</div>
			</div>
		</section>
	</main>

<?php
get_footer();
