# Autoclear Autoptimize Cache

[![Greenkeeper badge](https://badges.greenkeeper.io/hyperpress/aocc.svg)](https://greenkeeper.io/)

**Contributors:** jteague  
**Donate link:** https://watsi.org/  
**Tags:** cache, pagespeed, utilities  
**Requires at least:** 4.4  
**Tested up to:** 4.9  
**Stable tag:** 1.0  
**License:** GPLv2 or later  
**License URI:** https://www.gnu.org/licenses/gpl-2.0.html

Automatically clear Autoptimize cache if it grows larger then the allowed option.

## Description

Autoptimize is a popular performance plugin for WordPress. Among other features, Autoptimize creates and builds cached versions of optimized asset files descreasing page loading times.

But left unchecked, those cached files can become very large. That can slow page loading, increase web server load, and use unuecessary amounts of disk space.

This companion plugin provides a way to set the maximum allowable cache file size for your site and, if that size is exceeded, automatically clears your Autoptimize cache and allows it to rebuild itself. That's good.

## Installation

Via your WordPress admin dashboard, navigate to Plugins -> Add new and search for 'Autoclear Autoptimize Cache'. Then install the plugin and activate it in the usual way.

You cam also manually install the plugin by downloading a copy of the plugin from the WordPress plugins repository. Then:

1.  Unzip the downloaded autoclear-autoptimize-cache.zip file
2.  Upload the unzipped folder `autoclear-autoptimize-cache` directory to your `/wp-content/plugins/` directory
3.  Activate the plugin through the 'Plugins' menu in WordPress

## Plugin Settings

1.  Navigate to WordPress admin dashboard -> Settings -> Autoptimize Cache Settings
2.  Select from one of the available `Maximum cache file size` options from the select menu and press the `Save Changes` button
3.  Please note: You obviously must have Autoptimize plugin installed for this plugin to work

## Frequently Asked Questions

### But isn't clearing my cache going to slow my page loading speeds?

When you clear cache there will be a brief period where page loading time increases while it builds fresh cache. But the benefit is well worth it. Allowing Autoptimize cache to grow too large uses up unecessary disk space and actually degrades performance, especially on shared and small VPS hosting.

### What is the best maximum cache size setting option for my site?

That depends on a few factors, such as site traffic, using a theme with lots of options, and hosting resources available. You can experiment to find the best balance between performance and cache size. Generally, the following are good assumptions:

1.  128 MB for small blogging site on entry level shared hosting.
2.  512 MB for sites running complex themes and plugins on shared or small VPS.
3.  768 MB for sites running complex themes and plugins, e-commerce, memberships on med VPS.
4.  1 GB for large sites running complex themes, plugins, e-commerce, memberships on med to large VPS.

Again, experiment with different settings and find the best option for your particular WordPress site.

### Do I need to have the Autoptimize plugin installed on my site for this to work?

Yes. This companion plugin wouldn't be of any use without it and you'll see an admin warning notice if you try and use this plugin without first installing Autoptimize. 

### Something isn't working right. How can I get help?

We welcome your feedback and we're here to assist you. You can create a post in the Support Forum tab for this plugin, or you can open an issue at our Github repository at https://github.com/hyperpress/aocc/issues. Please help us better serve you by providing a concise but detailed description of the issue you need help with:

1.  Describe the symptoms of the issue (error, not clearing cache correctly, white screen, etc.)
2.  When did you first notice the problem?
3.  Did you change anything prior to noticing the problem (installed or updated another plugin or theme. Made some other change)
4.  What make and model of computer, tablet or smartphone were you using?
5.  What operating system (OSX, Windows 10, Android, IoS)?
6.  Steps to reproduce the problem.

### My site pages load so slowly. Can you help?

There are many factors that determine performance of web pages. More than ever, slow loading pages cost site owners search ranking, traffic, and revenue. We are experts on WordPress PageSpeed performance. So, if you need help, visit http://themesurgeons.com/contact. We make WordPress fast!

## Screenshots

### 1. Screenshot of settings screen located in Admin -> Settings -> Autoptimize Cache Settings.

![Screenshot of settings screen located in Admin -> Settings -> Autoptimize Cache Settings.](http://ps.w.org/autoclear-autoptimize-cache/assets/screenshot-1.png)

## Changelog

### 1.0.0

-   Initial release

## Roadmap

-   Release first stable versions
-   Add a time based WP_Cron setting that will clear cache every few days, week, month, etc.
-   Internationalization improvements
