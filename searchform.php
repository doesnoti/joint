<?php
/*
 * Template part for all site sliders
*/

global $joint_settings;

$joint_search_class = $args['search_class'] ? $args['search_class'] : '';
?>

<form role="search" action="<?php echo esc_url( home_url( '/' ) ); ?>" class="search-form <?php echo $joint_search_class; ?>">
	<input type="text" name="s" class="input input-text search__input header__item" placeholder="<?php echo $joint_settings['search-placeholder']; ?>">
	<button type="submit" class="button transp-button search__button">
		<i class="joint-search icon"></i>
	</button>
	<button class="button transp-button clear-button search__clear-button">
		<i class="joint-close icon"></i>
	</button>
</form>