<?php

/**
 * The widget form
 */

// Exit if accessed directly
if (!defined('ABSPATH')) exit;
?>

<div class="cwp-options">

    <div class="cwp-options__wrapper">

        <div class="cwp-options__option">
            <p>
                <label for="<?php echo $this->get_field_id('title'); ?>">
                    <?php esc_html_e('Title', 'comments-widget-plus'); ?>
                </label>
                <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($instance['title']); ?>" />
            </p>

            <p>
                <label for="<?php echo $this->get_field_id('title_url'); ?>">
                    <?php esc_html_e('Title URL', 'comments-widget-plus'); ?>
                </label>
                <input class="widefat" id="<?php echo $this->get_field_id('title_url'); ?>" name="<?php echo $this->get_field_name('title_url'); ?>" type="text" value="<?php echo esc_url($instance['title_url']); ?>" />
            </p>

            <p>
                <label for="<?php echo $this->get_field_id('css_class'); ?>">
                    <?php esc_html_e('CSS Class', 'comments-widget-plus'); ?>
                </label>
                <input class="widefat" id="<?php echo $this->get_field_id('css_class'); ?>" name="<?php echo $this->get_field_name('css_class'); ?>" type="text" value="<?php echo sanitize_html_class($instance['css_class']); ?>" />
            </p>

        </div>

        <div class="cwp-options__option">

            <p>
                <label for="<?php echo $this->get_field_id('post_type'); ?>">
                    <?php esc_html_e('Post Type', 'comments-widget-plus'); ?>
                </label>
                <select class="widefat" id="<?php echo $this->get_field_id('post_type'); ?>" name="<?php echo $this->get_field_name('post_type'); ?>">
                    <option value=""><?php esc_html_e('All', 'comments-widget-plus'); ?></option>
                    <?php foreach (get_post_types(array('public' => true), 'objects') as $post_type) { ?>
                        <option value="<?php echo esc_attr($post_type->name); ?>" <?php selected($instance['post_type'], $post_type->name); ?>><?php echo esc_html($post_type->labels->singular_name); ?></option>
                    <?php } ?>
                </select>
            </p>

            <p>
                <label for="<?php echo $this->get_field_id('limit'); ?>">
                    <?php esc_html_e('Number of comments to show', 'comments-widget-plus'); ?>
                </label>
                <input class="widefat" id="<?php echo $this->get_field_id('limit'); ?>" name="<?php echo $this->get_field_name('limit'); ?>" type="number" step="1" min="-1" value="<?php echo (int)($instance['limit']); ?>" />
            </p>

            <p>
                <label for="<?php echo $this->get_field_id('offset'); ?>">
                    <?php esc_html_e('Offset', 'comments-widget-plus'); ?>
                </label>
                <input class="widefat" id="<?php echo $this->get_field_id('offset'); ?>" name="<?php echo $this->get_field_name('offset'); ?>" type="number" step="1" min="0" value="<?php echo (int)($instance['offset']); ?>" />
                <small><?php esc_html_e('Number of comments to skip', 'comments-widget-plus'); ?></small>
            </p>

            <p>
                <label for="<?php echo $this->get_field_id('order'); ?>">
                    <?php esc_html_e('Show', 'comments-widget-plus'); ?>
                </label>
                <select class="widefat" id="<?php echo $this->get_field_id('order'); ?>" name="<?php echo $this->get_field_name('order'); ?>" style="width:100%;">
                    <option value="DESC" <?php selected($instance['order'], 'DESC'); ?>><?php esc_html_e('Newer comments first', 'comments-widget-plus') ?></option>
                    <option value="ASC" <?php selected($instance['order'], 'ASC'); ?>><?php esc_html_e('Older comments first', 'comments-widget-plus') ?></option>
                </select>
            </p>

            <p>
                <input id="<?php echo $this->get_field_id('exclude_pings'); ?>" name="<?php echo $this->get_field_name('exclude_pings'); ?>" type="checkbox" <?php checked($instance['exclude_pings']); ?> />
                <label for="<?php echo $this->get_field_id('exclude_pings'); ?>">
                    <?php esc_html_e('Exclude pingback and trackback', 'comments-widget-plus'); ?>
                </label>
            </p>

        </div>

        <div class="cwp-options__option">

            <p>
                <input class="checkbox" type="checkbox" <?php checked($instance['avatar'], 1); ?> id="<?php echo $this->get_field_id('avatar'); ?>" name="<?php echo $this->get_field_name('avatar'); ?>" />
                <label for="<?php echo $this->get_field_id('avatar'); ?>">
                    <?php esc_html_e('Display Avatar', 'comments-widget-plus'); ?>
                </label>
            </p>

            <p>
                <label for="<?php echo $this->get_field_id('avatar_size'); ?>">
                    <?php esc_html_e('Avatar Size', 'comments-widget-plus'); ?>
                </label>
                <input class="widefat" id="<?php echo $this->get_field_id('avatar_size'); ?>" name="<?php echo $this->get_field_name('avatar_size'); ?>" type="number" step="1" min="-1" value="<?php echo (int)($instance['avatar_size']); ?>" />
            </p>

            <p>
                <label for="<?php echo $this->get_field_id('avatar_type'); ?>">
                    <?php esc_html_e('Avatar Type', 'comments-widget-plus'); ?>
                </label>
                <select class="widefat" id="<?php echo $this->get_field_id('avatar_type'); ?>" name="<?php echo $this->get_field_name('avatar_type'); ?>" style="width:100%;">
                    <option value="rounded" <?php selected($instance['avatar_type'], 'rounded'); ?>><?php esc_html_e('Rounded', 'comments-widget-plus') ?></option>
                    <option value="square" <?php selected($instance['avatar_type'], 'square'); ?>><?php esc_html_e('Square', 'comments-widget-plus') ?></option>
                </select>
            </p>

        </div>

        <div class="cwp-options__option">

            <p>
                <input id="<?php echo $this->get_field_id('excerpt'); ?>" name="<?php echo $this->get_field_name('excerpt'); ?>" type="checkbox" <?php checked($instance['excerpt']); ?> />
                <label for="<?php echo $this->get_field_id('excerpt'); ?>">
                    <?php esc_html_e('Display Comment Excerpt', 'comments-widget-plus'); ?>
                </label>
            </p>

            <p>
                <label for="<?php echo $this->get_field_id('excerpt_limit'); ?>">
                    <?php esc_html_e('Excerpt Length', 'comments-widget-plus'); ?>
                </label>
                <input class="widefat" id="<?php echo $this->get_field_id('excerpt_limit'); ?>" name="<?php echo $this->get_field_name('excerpt_limit'); ?>" type="number" step="1" min="0" value="<?php echo (int)($instance['excerpt_limit']); ?>" />
            </p>

        </div>

        <div class="cwp-options__option cwp-info">
            <p>If you want to support this plugin, please consider donating to help keep it going. I truly appreciate any contribution.</p>
            <p>
                <a href="https://paypal.me/satrya" target="_blank" rel="noreferrer noopener" class="button-primary" style="color: #fff;">Donate Now</a>
            </p>
        </div>

    </div>

</div><!-- .cwp-options -->
