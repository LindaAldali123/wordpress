<?php
/**
 * Social Media Widget
 *
 * @package Moral Themes
 * @subpackage Lawman
 * @since Lawman 1.0.0
 */

if ( ! class_exists( 'lawman_Social_Link' ) ) :
	/**
	 * Social Media class.
	 *
	 */
	class Lawman_Social_Link extends WP_Widget {
		/**
		 * Sets up the widgets name etc
		 */
		public function __construct() {
			$widget_ops = array(
				'classname'   => 'widget widget_social_icons',
				'description' => esc_html__( 'Enter the url only the icon will be displayed as per the links.', 'lawman' ),
			);
			parent::__construct( 'lawman_social_link', esc_html__('MT : Social Link','lawman'), $widget_ops );
		}

		/**
		 * Outputs the content of the widget
		 *
		 * @param array $args
		 * @param array $instance
		 */
		public function widget( $args, $instance ) {
			// outputs the content of the widget
			if ( ! isset( $args['widget_id'] ) ) {
				$args['widget_id'] = $this->id;
			}

			$title 	= ( ! empty( $instance['title'] ) ) ? $instance['title'] : '';
			$title  = apply_filters( 'widget_title', $title, $instance, $this->id_base );

			$open_link  = ! empty( $instance['open_link'] ) ? true : false;
			$target = ( empty( $open_link ) ) ? '' : 'target="_blank"';


			echo $args['before_widget'];
				if ( ! empty( $title ) ) {
                    echo "<div class='widget-header'>";
                    echo $args['before_title'] . esc_html( $instance['title'] ) . $args['after_title'];
                    echo "</div>";
                }
			$number = isset( $instance['number'] ) ? absint( $instance['number'] ) : 4; ?>
			   	<ul class="social-icons">
					<?php
					for ( $i=1; $i <= $number ; $i++ ) {
						$link = ( ! empty( $instance['link' . '-' . $i] ) ) ? $instance['link' . '-' . $i] : ''; 
						if ( ! empty( $link ) ) :
					?>
				        <li><a href="<?php echo esc_url( $link ) . '" ' . esc_attr( $target ); ?>><?php echo lawman_return_social_icon( $link ); ?></a></li>
					<?php endif;
					} ?>
	     		</ul>
			<?php
			echo $args['after_widget'];
		}

		/**
		 * Outputs the options form on admin
		 *
		 * @param array $instance The widget options
		 */
		public function form( $instance ) {
			$title     	= isset( $instance['title'] ) ? ( $instance['title'] ) : esc_html__( 'Follow Us', 'lawman' );
			$number 	= isset( $instance['number'] ) ? absint( $instance['number'] ) : 4;
			$open_link 	= isset( $instance['open_link'] ) ? $instance['open_link'] : false;
		   ?>

		   <p>
			   <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'lawman' ); ?></label>
			   <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		   </p>

		   <p>
		   	<label for="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>"><?php esc_html_e( 'Number of links to show:', 'lawman' ); ?></label>
		   	<input class="tiny-text" id="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number' ) ); ?>" type="number" step="1" min="1" max="6" value="<?php echo absint( $number ); ?>" size="3" />
		   </p>

		   <p>
		      <label for="<?php echo esc_attr( $this->get_field_id( 'open_link' ) ); ?>"><?php esc_html_e( 'Open in New Tab', 'lawman' ); ?>:</label>
		      <input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'open_link' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'open_link' ), 'lawman' ); ?>"  <?php checked( $open_link, true ); ?> />
		    </p>

		   <?php for ( $i=1; $i <= $number; $i++ ) {
		   	$link = isset( $instance['link'. '-' . $i ] ) ? $instance['link' . '-' . $i ] : '';?>
			   <p>
			   	<label for="<?php echo esc_attr( $this->get_field_id( 'link' . '-' . $i ) ); ?>"><?php printf( esc_html__( 'Link %s :', 'lawman' ), $i ); ?></label>
			   	<input type="url" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'link' . '-' . $i ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'link' . '-' . $i ) ); ?>" value="<?php echo esc_url( $link ); ?>"/>
			   </p>
		   <?php }?>

		   <?php
		}

		/**
		* Processing widget options on save
		*
		* @param array $new_instance The new options
		* @param array $old_instance The previous options
		*/
		public function update( $new_instance, $old_instance ) {
			// processes widget options to be saved
			$instance           			= $old_instance;
			$instance['title']  			= sanitize_text_field( $new_instance['title'] );
			$instance['number'] 			= absint( $new_instance['number'] );
			$instance['open_link']       	= lawman_sanitize_checkbox( $new_instance['open_link'] );
			for ( $i=1; $i <= $instance['number']; $i++ ) {
				$instance['link' . '-' . $i] = esc_url_raw( $new_instance['link' . '-' . $i] );
			}
			return $instance;
		}
	}
endif;