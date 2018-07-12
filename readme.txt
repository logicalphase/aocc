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

== Frequently Asked Questions ==

= A question that someone might have =

An answer to that question.

= What about foo bar? =

Answer to foo bar dilemma.

== Screenshots ==

1. This screen shot description corresponds to screenshot-1.(png|jpg|jpeg|gif). Note that the screenshot is taken from
the /assets directory or the directory that contains the stable readme.txt (tags or trunk). Screenshots in the /assets
directory take precedence. For example, `/assets/screenshot-1.png` would win over `/tags/4.3/screenshot-1.png`
(or jpg, jpeg, gif).
2. This is the second screen shot

== Changelog ==

= 1.0 =
* A change since the previous version.
* Another change.

= 0.5 =
* List versions from most recent at top to oldest at bottom.

== Upgrade Notice ==

= 1.0 =
Upgrade notices describe the reason a user should upgrade.  No more than 300 characters.

= 0.5 =
This version fixes a security related bug.  Upgrade immediately.

== Arbitrary section ==

You may provide arbitrary sections, in the same format as the ones above.  This may be of use for extremely complicated
plugins where more information needs to be conveyed that doesn't fit into the categories of "description" or
"installation."  Arbitrary sections will be shown below the built-in sections outlined above.

== A brief Markdown Example ==

Ordered list:

1. Some feature
1. Another feature
1. Something else about the plugin

Unordered list:

* something
* something else
* third thing

Here's a link to [WordPress](https://wordpress.org/ "Your favorite software") and one to [Markdown's Syntax Documentation][markdown syntax].
Titles are optional, naturally.

[markdown syntax]: https://daringfireball.net/projects/markdown/syntax
            "Markdown is what the parser uses to process much of the readme file"

Markdown uses email style notation for blockquotes and I've been told:
> Asterisks for *emphasis*. Double it up  for **strong**.

`<?php code(); // goes in backticks ?>`
