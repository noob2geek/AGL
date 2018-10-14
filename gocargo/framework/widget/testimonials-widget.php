<?php
/**
 * Testimonials widget
 *
 * @since 4.4.2
 */
// Creating the widget 
class gocargo_widget_testimonial extends WP_Widget {
	function __construct() {
		parent::__construct(
			// Base ID of your widget
			'widget_testimonial', 

			// Widget name will appear in UI
			esc_html__('Gocargo Testimonials Carousel', 'gocargo'), 

			// Widget description
			array( 'description' => esc_html__( 'Testimonials Carousel on Widget', 'gocargo' ), ) 
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
		$number = isset( $instance['number'] ) ? esc_attr( $instance['number'] ) : 3;	
		$id = uniqid( 'testi-carousel-' );	
	?>

        <div id="<?php echo esc_attr($id); ?>" class="testi-slider testi-carousel-2 wow fadeIn" data-wow-delay="0s" data-wow-duration="1s">
        	<?php
				$args1 = array(
					'post_type' => 'testimonial',
					'posts_per_page' => $number,
				);
				$testimonial = new WP_Query($args1);
				if($testimonial->have_posts()) : while($testimonial->have_posts()) : $testimonial->the_post();
				$job = get_post_meta(get_the_ID(),'_cmb_job_testi', true);
				$company = get_post_meta(get_the_ID(),'_cmb_company_testi', true);
			?>
                <div class="item">
                    <blockquote>
                        <?php the_content(); ?>
                    </blockquote>
                    <div class="arrow-down"></div>
                    <div class="testi-by">
                    	<?php the_post_thumbnail('full', array('class' => 'img-circle')); ?> 
                    	<span class="name">
	                    	<strong><?php the_title(); ?></strong>, <?php if($job != ''){ echo esc_attr($job); ?><br>
	                        <?php } echo esc_attr($company); ?>
                        </span>
                	</div>
                </div>
            <?php endwhile; wp_reset_postdata(); endif; ?>
        </div>

        <script type="text/javascript">
	        (function($) { "use strict";
	        	jQuery(document).ready(function () { 
					'use strict'; // use strict mode
					jQuery("#<?php echo esc_attr($id); ?>").owlCarousel({
				        singleItem: true,
				        lazyLoad: true,
				        navigation: false,
				        pagination: true
				    });
				});
			})(jQuery); 	
        </script>

	<?php
		echo $args['after_widget'];
	}
			
	// Widget Backend 
	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) || isset( $instance[ 'number' ] ) ) {
			$title = $instance[ 'title' ];
			$number = $instance['number'];
		}
		else {
			$title = esc_html__( 'Testimonials', 'gocargo' );
			$number = 3;
		}
		// Widget admin form
	?>		
		<p>
			<label for="<?php echo htmlspecialchars_decode($this->get_field_id( 'title' )); ?>"><?php esc_html_e( 'Title:', 'gocargo' ); ?></label> 
			<input class="widefat" id="<?php echo htmlspecialchars_decode($this->get_field_id( 'title' )); ?>" name="<?php echo htmlspecialchars_decode($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
		</p>
		<p>
			<label for="<?php echo htmlspecialchars_decode($this->get_field_id( 'number' )); ?>"><?php esc_html_e( 'Number:', 'gocargo' ); ?></label> 
			<input class="widefat" id="<?php echo htmlspecialchars_decode($this->get_field_id( 'number' )); ?>" name="<?php echo htmlspecialchars_decode($this->get_field_name( 'number' )); ?>" type="text" value="<?php echo esc_attr($number); ?>" />
		</p>
	<?php 
	}
		
	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['number'] = ( ! empty( $new_instance['number'] ) ) ? esc_attr( $new_instance['number'] ) : '';
		return $instance;
	}
} // Class gocargo_widget_contact_info ends here

// Register and load the widget
function testimonial_load_widget() {
	register_widget( 'gocargo_widget_testimonial' );
}
add_action( 'widgets_init', 'testimonial_load_widget' );
