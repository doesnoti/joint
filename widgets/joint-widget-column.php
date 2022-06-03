<?php
/*
 * Adds column widget.
*/
class Joint_Column_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'joint_column_widget', // Base ID
			esc_html__( 'Column Links', 'joint-theme' ), // Name
			array( 'description' => esc_html__( 'Creates a column with a header and list of links', 'joint-theme' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		?>
		<div class="footer__links-column">
			<p class="title text--fz-18 footer-links__title">
				<?php
				if ( !empty( $instance['joint_title'] ) ) {
					echo apply_filters('widget_column_title', $instance['joint_title']);
				}
				?>
			</p>
			<ul class="footer__links-list">
			<?php
			if ( isset($instance['joint_texts']) ) {
				for ($i = 0; $i < count($instance['joint_texts']); $i++) {
				?>
					<li class="footer__links-item">
						<a
							href="<?php echo $instance['joint_values'][$i]; ?>"
							class="link hover-underline text text--fz-14"
						>
							<?php echo esc_html__($instance['joint_texts'][$i], 'joint-theme'); ?>
						</a>
					</li>
				<?php
				}
			}
			?>
			</ul>
		</div>
		<?php
		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$title = isset($instance['joint_title']) ? $instance['joint_title'] : '';
		$values = isset($instance['joint_values']) ? $instance['joint_values'] : array();
		$texts = isset($instance['joint_texts']) ? $instance['joint_texts'] : array();

		?>
		<label for="<?php echo esc_attr( $this->get_field_id( 'joint_title' ) ); ?>">
			<?php esc_html_e( 'Column title:', 'joint-theme' ); ?>
		</label> 
		<input
			style="margin-bottom: 10px;"
			id="<?php echo esc_attr( $this->get_field_id( 'joint_title' ) ); ?>"
			name="<?php echo esc_attr( $this->get_field_name( 'joint_title' ) ); ?>"
			type="text"
			value="<?php echo esc_attr__( $title ); ?>"
		>

		<table
			class="joint_widget_link_list"
			width="100%"
			style="border-collapse: collapse;margin-bottom: 10px;"
		>
			<tbody>
				<tr>
					<td style="width: 50%; border: 1px solid #000;">
						<p class="title text--fz-18"><?php echo esc_html__('Enter the page to which the link leads', 'joint-theme'); ?></p>
					</td>
					<td style="width: 50%; border: 1px solid #000;">
						<p class="title text--fz-18"><?php echo esc_html__('Enter link text', 'joint-theme'); ?></p>
					</td>
				</tr>
				<?php
				if ( $texts ) :
					for ($i = 0; $i < count($texts); $i++) {
						?>
						<tr>
							<td>
								<input
									type="text"
									name="<?php echo $this->get_field_name('joint_values') ?>[]"
									value="<?php echo esc_attr__( $values[$i] ); ?>"
									placeholder="<?php echo esc_attr__('Link value', 'joint-theme'); ?>"
								/>
							</td>
							<td>
								<input
									type="text"
									name="<?php echo $this->get_field_name('joint_texts') ?>[]"
									value="<?php echo esc_attr__( $texts[$i] ); ?>"
									placeholder="<?php echo esc_attr__('Link text', 'joint-theme'); ?>"
									/>
							</td>
							<td>
								<button class="button remove-row">
									<?php echo esc_html__('Remove', 'joint-theme'); ?>
								</button>
							</td>
						</tr>
						<?php
					}
				endif; ?>
				<template class="empty-row custom-repeter-text">
					<tr>
						<td>
							<input
								type="text"
								name="<?php echo $this->get_field_name('joint_values') ?>[]"
								placeholder="<?php echo esc_attr__('Link value', 'joint-theme'); ?>"
							/>
						</td>
						<td>
							<input
								type="text"
								name="<?php echo $this->get_field_name('joint_texts') ?>[]"
								placeholder="<?php echo esc_attr__('Link text', 'joint-theme'); ?>"
							/>
						</td>
						<td>
							<button class="button remove-row">
								<?php echo esc_html__('Remove', 'joint-theme'); ?>
							</button>
						</td>
					</tr>
				</template>
			</tbody>
		</table>
		<button class="button add-row">
			<?php echo esc_html__('Add', 'joint-theme'); ?>
		</button>

		<?php
	}

	/**
	 * Sanitize widget form values as they are saved. onclick="widgetColumnBtnsInit(event)"
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['joint_title'] = ( ! empty( $new_instance['joint_title'] ) ) ? sanitize_text_field( $new_instance['joint_title'] ) : '';

		if (!empty($new_instance['joint_texts'])) {
			for ($i = 0; $i < count($new_instance['joint_texts']); $i++) { 
				$instance['joint_texts'][$i] =
					( !empty($new_instance['joint_texts'][$i]) ) ?
					sanitize_text_field( $new_instance['joint_texts'][$i] ) :
					esc_html__('Empty', 'joint-theme');
				$instance['joint_values'][$i] =
					( !empty( $new_instance['joint_values'][$i]) ) ?
					sanitize_text_field( $new_instance['joint_values'][$i] ) :
					'/';
			}
		}

		return $instance;
	}
}