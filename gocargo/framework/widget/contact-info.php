<?php
/**
 * Custom Contact Info widget
 *
 * @since 4.4.2
 */
// Creating the widget 
class gocargo_widget_contact_info extends WP_Widget {
	function __construct() {
		parent::__construct(
			// Base ID of your widget
			'contact_info', 

			// Widget name will appear in UI
			esc_html__('Gocargo Contact Info', 'gocargo'), 

			// Widget description
			array( 'description' => esc_html__( 'Custom Contact Info Box on Footer Widget', 'gocargo' ), ) 
		);
	}

	// Creating widget front-end
	// This is where the action happens
	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );
		// before and after widget arguments are defined by themes
		echo $args['before_widget'];
		if ( ! empty( $title ) ){
			echo $args['before_title'] . $title . $args['after_title'];
		}		
		$content = $instance['content'];
		$icon = $instance['icon'];
	?>

		<div class="feature-box icon-square">
            <i class="fa fa-<?php echo esc_attr($icon); ?>"></i>
            <div class="text">
                <?php echo htmlspecialchars_decode($content); ?>
            </div>
        </div>

	<?php
		echo $args['after_widget'];
	}
			
	// Widget Backend 
	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) || isset( $instance[ 'icon' ] ) || isset ($instance['content']) ) {
			$title = $instance[ 'title' ];
			$content = $instance['content'];
			$icon = $instance['icon'];
		}
		else {
			$title = esc_html__( 'Contact Us', 'gocargo' );
			$content = '';
			$icon = 'phone';
		}
		// Widget admin form
	?>		
		<p>
			<label for="<?php echo htmlspecialchars_decode($this->get_field_id( 'title' )); ?>"><?php esc_html_e( 'Title:', 'gocargo' ); ?></label> 
			<input class="widefat" id="<?php echo htmlspecialchars_decode($this->get_field_id( 'title' )); ?>" name="<?php echo htmlspecialchars_decode($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
		</p>
		<p>
			<label for="<?php echo htmlspecialchars_decode($this->get_field_id('content')); ?>"><?php esc_html_e('Content:', 'gocargo'); ?></label>
			<textarea class="widefat" id="<?php echo htmlspecialchars_decode($this->get_field_id('content')); ?>" name="<?php echo htmlspecialchars_decode($this->get_field_name('content')); ?>"><?php echo esc_attr($content); ?></textarea>
		</p>
		<p>
			<label for="<?php echo htmlspecialchars_decode($this->get_field_id( 'icon' )); ?>"><?php esc_html_e( 'Icon class name:', 'gocargo' ); ?><a target="_blank" href="https://fontawesome.com/v4.7.0/">View more</a></label> 
			<input class="widefat" id="<?php echo htmlspecialchars_decode($this->get_field_id( 'icon' )); ?>" name="<?php echo htmlspecialchars_decode($this->get_field_name( 'icon' )); ?>" type="text" value="<?php echo esc_attr($icon); ?>" />
		</p>
	<?php 
	}
		
	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['content'] = ( ! empty( $new_instance['content'] ) ) ? htmlspecialchars_decode( $new_instance['content'] ) : '';
		$instance['icon'] = ( ! empty( $new_instance['icon'] ) ) ? esc_attr( $new_instance['icon'] ) : '';
		return $instance;
	}
} // Class gocargo_widget_contact_info ends here

// Register and load the widget
function wpb_load_widget() {
	register_widget( 'gocargo_widget_contact_info' );
}
add_action( 'widgets_init', 'wpb_load_widget' );
