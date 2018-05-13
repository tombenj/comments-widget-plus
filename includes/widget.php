<?php
/**
 * The Widget
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

class Comments_Widget_Plus_Widget extends WP_Widget {

	/**
	 * Sets up the widgets
	 */
	function __construct() {

		// Set up the widget options.
		$widget_options = array(
			'classname'   => 'widget_recent_comments comments_widget_plus',
			'description' => __( 'A custom recent comments widget with extra features.', 'comments-widget-plus' )
		);

		// Control the width and height
		$control_options = array(
			'width' => 450
		);

		// Create the widget
		parent::__construct(
			'cwp-widget',                                         // $this->id_base
			__( 'Recent Comments Plus', 'comments-widget-plus' ), // $this->name
			$widget_options,                                      // $this->widget_options
			$control_options                                      // $this->control_options
		);
		$this->alt_option_name = 'cwp_widget';

		// Inline default style
		if ( is_active_widget( false, false, $this->id_base ) ) {
			add_action( 'wp_head', array( $this, 'cwp_style' ) );
		}

		// Flush cache
		add_action( 'comment_post', array( $this, 'flush_widget_cache' ) );
		add_action( 'edit_comment', array( $this, 'flush_widget_cache' ) );
		add_action( 'transition_comment_status', array( $this, 'flush_widget_cache' ) );

	}

	/**
	 * Default style
	 */
	public function cwp_style() {
		/**
		 * Filter the default widget styles.
		 */
		if ( ! current_theme_supports( 'widgets' ) || ! apply_filters( 'cwp_use_default_style', true, $this->id_base ) )
			return;
		?>
			<style type="text/css">.cwp-li {overflow: hidden;}.cwp-avatar {float: left;margin-top: .2em;margin-right: 1em;}.cwp-avatar.rounded .avatar{border-radius:50%;}.cwp-avatar.square .avatar{border-radius:0;}.cwp-comment-excerpt {display: block;color:#787878;}</style>
		<?php
	}

	/**
	 * Flush cache
	 */
	public function flush_widget_cache() {
		wp_cache_delete( 'cwp_widget', 'widget' );
	}

	/**
	 * Outputs the widget based on the arguments input through the widget controls
	 */
	function widget( $args, $instance ) {
		extract( $args );

		/**
		 * Widget cache
		 */
		$cache = array();
		if ( ! $this->is_preview() ) {
			$cache = wp_cache_get( 'cwp_widget', 'widget' );
		}
		if ( ! is_array( $cache ) ) {
			$cache = array();
		}
		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}
		if ( isset( $cache[ $args['widget_id'] ] ) ) {
			echo $cache[ $args['widget_id'] ];
			return;
		}

		// Get the recent comments.
		$comments = cwp_get_recent_comments( $instance, $this->id );

		// Check if comments exist
		if ( $comments ) {

			// Output the theme's $before_widget wrapper.
			echo $before_widget;

				// If both title and title url is not empty, display it.
				if ( ! empty( $instance['title_url'] ) && ! empty( $instance['title'] ) ) {
					echo $before_title . '<a href="' . esc_url( $instance['title_url'] ) . '" title="' . esc_attr( $instance['title'] ) . '">' . apply_filters( 'widget_title',  $instance['title'], $instance, $this->id_base ) . '</a>' . $after_title;

				// If the title not empty, display it.
				} elseif ( ! empty( $instance['title'] ) ) {
					echo $before_title . apply_filters( 'widget_title',  $instance['title'], $instance, $this->id_base ) . $after_title;
				}

				// Get the recent comments.
				echo $comments;

			// Close the theme's widget wrapper.
			echo $after_widget;

		}

		if ( ! $this->is_preview() ) {
			$cache[ $args['widget_id'] ] = $comments;
			wp_cache_set( 'cwp_widget', $cache, 'widget' );
		}

	}

	/**
	 * Updates the widget control options for the particular instance of the widget
	 */
	function update( $new_instance, $old_instance ) {

		$instance                  = $old_instance;
		$instance['title']         = strip_tags( $new_instance['title'] );
		$instance['title_url']     = esc_url_raw( $new_instance['title_url'] );
		$instance['limit']         = (int)( $new_instance['limit'] );
		$instance['offset']        = (int)( $new_instance['offset'] );
		$instance['order']         = esc_attr( $new_instance['order'] );
		$instance['post_type']     = esc_attr( $new_instance['post_type'] );
		$instance['exclude_pings'] = isset( $new_instance['exclude_pings'] ) ? (bool) $new_instance['exclude_pings'] : 0;
		$instance['avatar']        = isset( $new_instance['avatar'] ) ? (bool) $new_instance['avatar'] : 0;
		$instance['avatar_size']   = (int)( $new_instance['avatar_size'] );
		$instance['avatar_type']   = esc_attr( $new_instance['avatar_type'] );
		$instance['excerpt']       = isset( $new_instance['excerpt'] ) ? (bool) $new_instance['excerpt'] : false;
		$instance['excerpt_limit'] = (int)( $new_instance['excerpt_limit'] );
		$instance['css_class']     = sanitize_html_class( $new_instance['css_class'] );

		$this->flush_widget_cache();

		$alloptions = wp_cache_get( 'alloptions', 'options' );
		if ( isset( $alloptions['cwp_widget'] ) ) {
			delete_option('cwp_widget');
		}

		return $instance;

	}

	/**
	 * Displays the widget control options in the Widgets admin screen.
	 */
	function form( $instance ) {

		// Merge the user-selected arguments with the defaults.
		$instance = wp_parse_args( (array) $instance, cwp_get_default_args() );

		// Extract the array to allow easy use of variables.
		extract( $instance );

		// Loads the widget form.
		include( CWP_INCLUDES . 'form.php' );

	}

}