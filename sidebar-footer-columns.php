<?php
/**
 * The sidebar containing the footer widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Joint_Theme
 */

if ( ! is_active_sidebar( 'joint_footer_widgets' ) ) {
	return;
}
?>

<div class="footer__links-block">
	<?php dynamic_sidebar( 'joint_footer_widgets' ); ?>
</div>