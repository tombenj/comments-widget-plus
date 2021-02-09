=== Recent Comments Widget Plus ===
Contributors: idenovasi, satrya
Donate link: https://paypal.me/satrya
Tags: recent comments, widget, recent comments widget, excerpt, avatar, sidebar, comments, pingback, trackback
Requires at least: 4.8
Tested up to: 5.6.1
Requires PHP: 7.2
Stable tag: 1.1.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Provides custom recent comments widget with extra features such as display avatar, comment excerpt and much more!

== Description ==

This plugin will enable a custom and advanced [recent comments widget](https://idenovasi.com/projects/comments-widget-plus/). Allows you to display a list of the most recent comments with avatar and excerpt, you can also choose which to show newer comments first or older comments first and choose comments from any post type.

= Features Include =

* Display avatar with customizable size.
* Display comment excerpt with customizable length.
* Exclude pingback & trackback
* Post type option.
* Offset option.
* Option to choose the comments order.
* Allows you to set title url.
* Custom CSS class.
* Multiple widgets.

= Support this project =

* [Translate to your language](https://translate.wordpress.org/projects/wp-plugins/comments-widget-plus/).
* Contribute on [Github](https://github.com/satrya/comments-widget-plus).
* [Donate](https://paypal.me/satrya).

== Installation ==

**Through Dashboard**

1. Log in to your WordPress admin panel and go to Plugins -> Add New
2. Type **comments widget plus** in the search box and click on search button.
3. Find **Comments Widget Plus** plugin.
4. Then click on Install Now after that activate the plugin.
5. Go to the widgets page **Appearance -> Widgets**.
6. Find **Recent Comments Plus** widget.

**Installing Via FTP**

1. Download the plugin to your hardisk.
2. Unzip.
3. Upload the **comments-widget-plus** folder into your plugins directory.
4. Log in to your WordPress admin panel and click the Plugins menu.
5. Then activate the plugin.
6. Go to the widgets page **Appearance -> Widgets**.
6. Find **Recent Comments Plus** widget.

== Frequently Asked Questions ==

= How to disable default style =
This plugin add a small css code to your website, to remove it please add the code below in your theme `functions.php`
`
add_filter( 'cwp_use_default_style', '__return_false' );
`

= Widget does not update with last comments =
If you use cache plugin, please try to clear the cache or re-save the widget.

== Screenshots ==

1. Widgets output
2. General settings
3. Comments settings
4. Avatar settings
5. Excerpt settings

== Changelog ==

= 1.0.9 - Feb 09, 2021 =
* Maintenance update
