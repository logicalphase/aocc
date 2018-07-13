=== Autoptimize Clear Cache ===
Contributors: jteague
Donate link: https://watsi.org/
Tags: cache, pagespeed, utilities
Requires at least: 4.4
Tested up to: 4.9.7
Stable tag: 1.0.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Automatically clears Autoptimize cache when cache reaches selected maximum cache file size.

== Description ==

Autoptimize is a popular performance plugin for WordPress. Among other features, Autoptimize creates and builds cached versions of optimized asset files descreasing pageloading times.

But left unchecked, those cached files can become very large. This degrades performance, increases web server loads, and uses unuecessary amounts of disk space. That's bad.

This companion plugin provides a way to set the maximum allowable cache file cache size for your site and, once that size is exceeded, automatically clear your Autoptimize cache and allow it to rebuild itself. That's good.

== Installation ==

Via your WordPress admin dashboard, navigate to Plugins -> Add new and search for 'Autoptimize Clear Cache'. Then install the plugin and activate it in the usual way.

You cam also manually install the plugin by downloading a copy of the plugin from the WordPress plugins repository. Then:

1. Unzip the 
2. Upload `autoptimize-clear-cache` directory to your `/wp-content/plugins/` directory
3. Activate the plugin through the 'Plugins' menu in WordPress
4. Navigate to WordPress admin dashboard -> Settings -> Autoptimize Cache Settings
5. Select from one of the available `Maximum cache file size` options from the select menu and press the Save Changes button
6. Please note: You obviously must have Autoptimize plugin installed for this plugin to work

== Frequently Asked Questions ==

= Where can I get support for plugin? =

We welcome your feedback and we're here to assist you. You can create an post in the Support Forum tab for this plugin, or you can open an issue at our Github repository at https://github.com/hyperpress/aocc/issues. Please help us better serve you by providing a concise but detailed description of the issue you need help with:

1. Describe the symptoms of the issue (error, not clearing cache correctly, white screen, etc.)
2. When did you first notice the problem?
3. Did you change anything prior to noticing the problem (installed or updated another plugin or theme. Made some other change)
4. What make and model of computer, tablet or smartphone were you using?
5. What operating system (OSX, Windows 10, Android, IoS)?
6. Steps to reproduce the problem.

== Screenshots ==

1. Screenshot of settings screen located in Admin -> Settings -> Autoptimize Cache Settings.

== Changelog ==

= 1.0.0 =
* Initial release

== Roadmap ==

* Release first stable versions
* Add a time based WP_Cron setting that will clear cache every few days, week, month, etc.


