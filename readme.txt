# Autoptimize Clear Cache

**Contributors:** jteague  
**Donate link:** https://watsi.org/  
**Tags:** cache, pagespeed, utilities  
**Requires at least:** 4.4  
**Tested up to:** 4.9  
**Stable tag:** 1.0  
**License:** GPLv2 or later  
**License URI:** https://www.gnu.org/licenses/gpl-2.0.html

Automatically clears Autoptimize cache if it grows larger then the selected size.

## Description

Autoptimize is a popular performance plugin for WordPress. Among other features, Autoptimize creates and builds cached versions of optimized asset files descreasing page loading times.

But left unchecked, those cached files can become very large. That can slow page loading, increase web server load, and use unuecessary amounts of disk space.

This companion plugin provides a way to set the maximum allowable cache file size for your site and, if that size is exceeded, automatically clears your Autoptimize cache and allows it to rebuild itself. That's good.

## Installation

Via your WordPress admin dashboard, navigate to Plugins -> Add new and search for 'Autoptimize Clear Cache'. Then install the plugin and activate it in the usual way.

You cam also manually install the plugin by downloading a copy of the plugin from the WordPress plugins repository. Then:

1.  Unzip the downloaded autoptimize-clear-cache.zip file
2.  Upload the unzipped folder `autoptimize-clear-cache` directory to your `/wp-content/plugins/` directory
3.  Activate the plugin through the 'Plugins' menu in WordPress

Then:

4.  Navigate to WordPress admin dashboard -> Settings -> Autoptimize Cache Settings
5.  Select from one of the available `Maximum cache file size` options from the select menu and press the `Save Changes` button
6.  Please note: You obviously must have Autoptimize plugin installed for this plugin to work

## Frequently Asked Questions

### But isn't clearing my cache going to slow my page loading speeds?

Actually, it's good practice to occasionally clear object cache because letting the cache size become too large uses unecessary disk space and actually degrades performance, especially on shared and small VPS hosting. When you clear cache there will be a brief period where page loading time increases while it builds fresh cache. But the benefit is well worth it.

### What is the best maximum cache size setting option for my site?

That depends on a few factors, such as site traffic, using a theme with lots of options, and hosting resources available. You can experiment to find the best balance between performance and cache size. But, generally speaking, the following is a good rule of thumb:

1.  128 MB - A good choice for small, low traffic site, on inexpensive shared hosting plans. Think entry level plans from Go Daddy, Hostgator, Bluehost, etc.
2.  512 MB - If you run a small business site or a site using complex themes and plugins on mid-level shared or small VPS hosting like Webfaction or Theme Surgeons.
3.  764 MB - If you run a WordPress Woocommerce site running a large kitchen sink theme from Envato, on a medium sized VPS Cloud hosting service, this might be a good choice.
4.  1 GB - If you are running a process intensive, high traffic site on a large high CPU, high RAM dedicated or cloud VPS with lots of disk space, this might be just the ticket.

Again, experiment with different settings and find the best option for your particular WordPress site.

### Do I need to have the Autoptimize plugin installed on my site for this to work?

Yes. This companion plugin wouldn't be of any use without it.

### Where can I get support for plugin?

We welcome your feedback and we're here to assist you. You can create a post in the Support Forum tab for this plugin, or you can open an issue at our Github repository at https://github.com/hyperpress/aocc/issues. Please help us better serve you by providing a concise but detailed description of the issue you need help with:

1.  Describe the symptoms of the issue (error, not clearing cache correctly, white screen, etc.)
2.  When did you first notice the problem?
3.  Did you change anything prior to noticing the problem (installed or updated another plugin or theme. Made some other change)
4.  What make and model of computer, tablet or smartphone were you using?
5.  What operating system (OSX, Windows 10, Android, IoS)?
6.  Steps to reproduce the problem.

## Screenshots

### 1. Screenshot of settings screen located in Admin -> Settings -> Autoptimize Cache Settings.

![Screenshot of settings screen located in Admin -> Settings -> Autoptimize Cache Settings.](http://ps.w.org/autoptimize-clear-cache/assets/screenshot-1.png)

## Changelog

### 1.0.0

-   Initial release

## Roadmap

-   Release first stable versions
-   Add a time based WP_Cron setting that will clear cache every few days, week, month, etc.
-   Internationalization improvements
