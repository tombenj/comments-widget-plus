<?php
/**
 * The widget form
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;
?>

<script>
	jQuery( document ).ready( function( $ ) {

		// Cache selector in a variable
		// to improve speed.
		var $tabs = $( ".cwp-form-tabs" );

		// Initialize the jQuery UI tabs
		$tabs.tabs({
			active   : $.cookie( "activetab" ),
			activate : function( event, ui ){
				$.cookie( "activetab", ui.newTab.index(),{
					expires : 10
				});
			}
		}).addClass( "ui-tabs-vertical" );

		// Add custom class
		$tabs.closest( ".widget-inside" ).addClass( "cwp-bg" );

	});
</script>

<div class="cwp-form-tabs">

	<ul class="cwp-tabs">
		<li><a href="#tab-1"><?php _e( 'General', 'comments-widget-plus' ); ?></a></li>
		<li><a href="#tab-2"><?php _e( 'Comments', 'comments-widget-plus' ); ?></a></li>
		<li><a href="#tab-3"><?php _e( 'Avatar', 'comments-widget-plus' ); ?></a></li>
		<li><a href="#tab-4"><?php _e( 'Excerpt', 'comments-widget-plus' ); ?></a></li>
	</ul>

	<div class="cwp-tabs-content">

		<div id="tab-1" class="cwp-tab-content">
			<p>
				<label for="<?php echo $this->get_field_id( 'title' ); ?>">
					<?php _e( 'Title', 'comments-widget-plus' ); ?>
				</label>
				<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
			</p>

			<p>
				<label for="<?php echo $this->get_field_id( 'title_url' ); ?>">
					<?php _e( 'Title URL', 'comments-widget-plus' ); ?>
				</label>
				<input class="widefat" id="<?php echo $this->get_field_id( 'title_url' ); ?>" name="<?php echo $this->get_field_name( 'title_url' ); ?>" type="text" value="<?php echo esc_url( $instance['title_url'] ); ?>" />
			</p>

			<p>
				<label for="<?php echo $this->get_field_id( 'css_class' ); ?>">
					<?php _e( 'CSS Class', 'comments-widget-plus' ); ?>
				</label>
				<input class="widefat" id="<?php echo $this->get_field_id( 'css_class' ); ?>" name="<?php echo $this->get_field_name( 'css_class' ); ?>" type="text" value="<?php echo sanitize_html_class( $instance['css_class'] ); ?>"/>
			</p>

		</div><!-- #tab-1 -->

		<div id="tab-2" class="cwp-tab-content">

			<p>
				<label for="<?php echo $this->get_field_id( 'post_type' ); ?>">
					<?php _e( 'Post Type', 'comments-widget-plus' ); ?>
				</label>
				<select class="widefat" id="<?php echo $this->get_field_id( 'post_type' ); ?>" name="<?php echo $this->get_field_name( 'post_type' ); ?>">
					<option value=""><?php _e( 'All', 'comments-widget-plus' ); ?></option>
					<?php foreach ( get_post_types( array( 'public' => true ), 'objects' ) as $post_type ) { ?>
						<option value="<?php echo esc_attr( $post_type->name ); ?>" <?php selected( $instance['post_type'], $post_type->name ); ?>><?php echo esc_html( $post_type->labels->singular_name ); ?></option>
					<?php } ?>
				</select>
			</p>

			<p>
				<label for="<?php echo $this->get_field_id( 'limit' ); ?>">
					<?php _e( 'Number of comments to show', 'comments-widget-plus' ); ?>
				</label>
				<input class="widefat" id="<?php echo $this->get_field_id( 'limit' ); ?>" name="<?php echo $this->get_field_name( 'limit' ); ?>" type="number" step="1" min="-1" value="<?php echo (int)( $instance['limit'] ); ?>" />
			</p>

			<p>
				<label for="<?php echo $this->get_field_id( 'offset' ); ?>">
					<?php _e( 'Offset', 'comments-widget-plus' ); ?>
				</label>
				<input class="widefat" id="<?php echo $this->get_field_id( 'offset' ); ?>" name="<?php echo $this->get_field_name( 'offset' ); ?>" type="number" step="1" min="0" value="<?php echo (int)( $instance['offset'] ); ?>" />
				<small><?php _e( 'Number of comments to skip', 'comments-widget-plus' ); ?></small>
			</p>

			<p>
				<label for="<?php echo $this->get_field_id( 'order' ); ?>">
					<?php _e( 'Show', 'comments-widget-plus' ); ?>
				</label>
				<select class="widefat" id="<?php echo $this->get_field_id( 'order' ); ?>" name="<?php echo $this->get_field_name( 'order' ); ?>" style="width:100%;">
					<option value="DESC" <?php selected( $instance['order'], 'DESC' ); ?>><?php _e( 'Newer comments first', 'comments-widget-plus' ) ?></option>
					<option value="ASC" <?php selected( $instance['order'], 'ASC' ); ?>><?php _e( 'Older comments first', 'comments-widget-plus' ) ?></option>
				</select>
			</p>

			<p>
				<input id="<?php echo $this->get_field_id( 'exclude_pings' ); ?>" name="<?php echo $this->get_field_name( 'exclude_pings' ); ?>" type="checkbox" <?php checked( $instance['exclude_pings'] ); ?> />
				<label for="<?php echo $this->get_field_id( 'exclude_pings' ); ?>">
					<?php _e( 'Exclude pingback and trackback', 'comments-widget-plus' ); ?>
				</label>
			</p>

		</div><!-- #tab-2 -->

		<div id="tab-3" class="cwp-tab-content">

			<p>
				<input class="checkbox" type="checkbox" <?php checked( $instance['avatar'], 1 ); ?> id="<?php echo $this->get_field_id( 'avatar' ); ?>" name="<?php echo $this->get_field_name( 'avatar' ); ?>" />
				<label for="<?php echo $this->get_field_id( 'avatar' ); ?>">
					<?php _e( 'Display Avatar', 'comments-widget-plus' ); ?>
				</label>
			</p>

			<p>
				<label for="<?php echo $this->get_field_id( 'avatar_size' ); ?>">
					<?php _e( 'Avatar Size', 'comments-widget-plus' ); ?>
				</label>
				<input class="widefat" id="<?php echo $this->get_field_id( 'avatar_size' ); ?>" name="<?php echo $this->get_field_name( 'avatar_size' ); ?>" type="number" step="1" min="-1" value="<?php echo (int)( $instance['avatar_size'] ); ?>" />
			</p>

			<p>
				<label for="<?php echo $this->get_field_id( 'avatar_type' ); ?>">
					<?php _e( 'Avatar Type', 'comments-widget-plus' ); ?>
				</label>
				<select class="widefat" id="<?php echo $this->get_field_id( 'avatar_type' ); ?>" name="<?php echo $this->get_field_name( 'avatar_type' ); ?>" style="width:100%;">
					<option value="rounded" <?php selected( $instance['avatar_type'], 'rounded' ); ?>><?php _e( 'Rounded', 'comments-widget-plus' ) ?></option>
					<option value="square" <?php selected( $instance['avatar_type'], 'square' ); ?>><?php _e( 'Square', 'comments-widget-plus' ) ?></option>
				</select>
			</p>

		</div><!-- #tab-3 -->

		<div id="tab-4" class="cwp-tab-content">

			<p>
				<input id="<?php echo $this->get_field_id( 'excerpt' ); ?>" name="<?php echo $this->get_field_name( 'excerpt' ); ?>" type="checkbox" <?php checked( $instance['excerpt'] ); ?> />
				<label for="<?php echo $this->get_field_id( 'excerpt' ); ?>">
					<?php _e( 'Display Comment Excerpt', 'comments-widget-plus' ); ?>
				</label>
			</p>

			<p>
				<label for="<?php echo $this->get_field_id( 'excerpt_limit' ); ?>">
					<?php _e( 'Excerpt Length', 'comments-widget-plus' ); ?>
				</label>
				<input class="widefat" id="<?php echo $this->get_field_id( 'excerpt_limit' ); ?>" name="<?php echo $this->get_field_name( 'excerpt_limit' ); ?>" type="number" step="1" min="0" value="<?php echo (int)( $instance['excerpt_limit'] ); ?>" />
			</p>

		</div><!-- #tab-4 -->

	</div>

</div><!-- .cwp-form-tabs -->