<?php
/*
 * Adds activities widget.
*/
class Joint_Activities_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'joint_activities_widget', // Base ID
			esc_html__( 'Activities List', 'joint-theme' ) // Name
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
		global $joint_settings;
		?>

		<p class="title text--fz-28 single-aside__title">
			<?php esc_html_e($instance['joint_title'], 'joint-theme'); ?>
		</p>
		<div class="single-aside__body">
		<?php
		if ( $instance['joint_sort'] == 'popular') {
			$query = new WP_Query(
				array(
					'post_type'			=> 'activity',
					'posts_per_page' 	=> $instance['joint_count'],
					'post_parent'		=> 0,
					'post__not_in'		=> array(get_the_ID()),
					'meta_key' 			=> 'joint_views_count',
					'orderby' 			=> 'meta_value_num',
					'order' 				=> 'DESC'
				)
			);
			wp_reset_query();
			if( $query->have_posts() ) {
				while( $query->have_posts() ) {
					$query->the_post();
					$lvls_arr = array();
					
					foreach (get_children(get_the_ID()) as $child) {
						$lvls_arr[] = get_the_terms($child->ID, 'level')[0]->slug;
					}
					$lvls_arr[] = get_the_terms(get_the_ID(), 'level')[0]->slug;
			?>
					<a href="<?php the_permalink(); ?>" class="link card">
						<img
							src="<?php echo the_post_thumbnail_url(); ?>"
							alt="<?php echo get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true); ?>"
							class="img card__img card__img--small"
						>
						<h4 class="title text--fz-22 card__title">
							<?php the_title(); ?>
						</h4>
						<div class="card__bot">
							<div class="card__lvls">
								<?php
								for ($i = 0; $i < count($lvls_arr); $i++) {
									$urlPath = get_template_directory_uri() . '/img/lvls/' . $lvls_arr[$i] . '-lvl.svg';
								?>
									<img
										src="<?php echo $urlPath; ?>"
										alt="<?php echo $lvls_arr[$i] . '-lvl'; ?>"
										class="svg card__lvl-img"
									>
								<?php } ?>
								<p class="text text--fz-16 card__lvl-text">
									<?php echo $joint_settings['lvl_group_title']; ?>
								</p>
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
				}
			}
			?>
		<?php
		}
		else {
			$query = new WP_Query(
				array(
					'post_type'      	=> 'activity',
					'post_status'    	=> array('publish', 'inherit'),
					'post__not_in'		=> array(get_the_ID()),
					'posts_per_page' 	=> $instance['joint_count'],
					'orderby' 			=> 'post_date',
					'order' 				=> 'DESC'
				)
			);
			wp_reset_query();
			if( $query->have_posts() ) {
				while( $query->have_posts() ) {
					$query->the_post();
		?>
					<a href="<?php the_permalink(); ?>" class="link card">
						<img
							src="<?php echo the_post_thumbnail_url(); ?>"
							alt="<?php echo get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true); ?>"
							class="img card__img card__img--small"
						>
						<p class="text text--fz-16 card__date">
							<?php echo get_the_date(); ?>
						</p>
						<h4 class="title text--fz-22 card__title">
							<?php the_title(); ?>
						</h4>
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
				}
			}
		}
		wp_reset_query();
		?>
		</div>

		<?php echo $args['after_widget'];
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
		$count = isset($instance['joint_count']) ? $instance['joint_count'] : '';
		$sort = isset($instance['joint_sort']) ? $instance['joint_sort'] : '';

		?>
		<label for="<?php echo esc_attr( $this->get_field_id( 'joint_title' ) ); ?>">
			<?php esc_attr_e( 'List title:', 'joint-theme' ); ?>
		</label> 
		<input
			style="margin-bottom: 10px;"
			id="<?php echo esc_attr( $this->get_field_id( 'joint_title' ) ); ?>"
			name="<?php echo esc_attr( $this->get_field_name( 'joint_title' ) ); ?>"
			type="text"
			value="<?php echo esc_attr__( $title ); ?>"
		>

		<table class="joint_activity_params" width="100%">
			<tbody>
				<tr style="vertical-align: baseline;">
					<td>
						<label for="<?php echo esc_attr( $this->get_field_id( 'joint_count' ) ); ?>">
							<?php esc_html_e( 'Enter the number of activities to be displayed:', 'joint-theme' ); ?>
						</label> 
						<input
							style="margin-bottom: 10px;"
							id="<?php echo esc_attr( $this->get_field_id( 'joint_count' ) ); ?>"
							name="<?php echo esc_attr( $this->get_field_name( 'joint_count' ) ); ?>"
							type="number"
							value="<?php echo esc_attr__( $count ); ?>"
						>
					</td>
					<td>
						<label for="<?php echo esc_attr( $this->get_field_id( 'joint_count' ) ); ?>">
							<?php esc_html_e( 'Select the parameter by which they should be displayed:', 'joint-theme' ); ?>
						</label> 
						<select
							id="<?php echo esc_attr( $this->get_field_id( 'joint_sort' ) ); ?>"
							name="<?php echo esc_attr( $this->get_field_name( 'joint_sort' ) ); ?>"
						>
							<option
								value="popular"
								<?php echo ("popular" == $sort) ? 'selected' : ''; ?>
							>
								<?php esc_html_e('Popular', 'joint-theme'); ?>
							</option>
							<option
								value="new"
								<?php echo ("new" == $sort) ? 'selected' : ''; ?>
							>
								<?php esc_html_e('New', 'joint-theme'); ?>
							</option>
						</select>
					</td>
				</tr>
			</tbody>
		</table>

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
		$instance['joint_count'] = ( ! empty( $new_instance['joint_count'] ) ) ? sanitize_text_field( $new_instance['joint_count'] ) : '';
		$instance['joint_sort'] = ( ! empty( $new_instance['joint_sort'] ) ) ? sanitize_text_field( $new_instance['joint_sort'] ) : '';

		return $instance;
	}
}