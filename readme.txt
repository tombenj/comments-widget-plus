=== Comments Widget Plus ===
Contributors: themejunkie, satrya
Tags: recent comments, widget, recent comments widget, excerpt, avatar, sidebar, comments, pingback, trackback
Requires at least: 4.0
Tested up to: 4.8.2
Stable tag: 1.0.6
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Provides custom recent comments widget with extra features such as display avatar, comment excerpt and much more!

== Description ==

This plugin will enable a custom and advanced recent comments widget. Allows you to display a list of the most recent comments with avatar and excerpt, you can also choose which to show newer comments first or older comments first and choose comments from any post type.

Please take a look the plugin page for more details: [https://www.theme-junkie.com/plugins/comments-widget-plus/](https://www.theme-junkie.com/plugins/comments-widget-plus/)

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

= Languages =

* English
* French
* German

= Contribute =

If you want to contribute, we hosted the plugin on github: [https://github.com/themejunkie/comments-widget-plus](https://github.com/themejunkie/comments-widget-plus)

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

== Screenshots ==

1. Widgets output
2. General settings
3. Comments settings
4. Avatar settings
5. Excerpt settings

== Changelog ==

= 1.0.6 - Oct 19, 2017 =
* Support WordPress 4.8.2

= 1.0.5 - Sept 11, 2016 =
* Support WordPress 4.6.1

= 1.0.4 - Dec 19, 2015 =
* Support WordPress 4.4
* Added German translation

= 1.0.3 - Nov 06, 2015 =
- Improve the jQuery tabs performance
- Better security, sanitize all outputs
- Updated language file

= 1.0.2 - Oct 11, 2015 =
- Added French translation. Thanks [Adrien](https://github.com/Adrien-Luxey)
- Added flexible per widget hook for developer
- Updated language file
- New features: Exclude pingback & trackback
- New features: Avatar type, square / rounded

= 1.0.1 - Oct 7, 2015 =
- Added default color to the comment excerpt
- Added class `cwp-on-text` to the On text

= 1.0.0 - Sept 20, 2015 =
- Initial release
