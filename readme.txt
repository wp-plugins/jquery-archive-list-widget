=== jQuery Archive List Widget ===
Contributors: Miguel Useche
Donate link: http://skatox.com/blog/jquery-archive-list-widget/
Tags: jquery, ajax, javacript, collapse, collapsible, archive, collapsible archive, widget
Requires at least: 2.8
Tested up to: 3.4.2
Stable tag: 1.3

A simple jQuery widget (can be called from posts) for displaying an archive list with some effects.

== Description ==

This plugin provides a widget and a filter to display a collapsible archive list in your sidebar or posts using the jQuery JS library.

= Features =
 1. Display a collapsed list of your archives to reduce space.
 2. Uses jQuery to add effects and to be compatible with most browsers.
 3. Select your expand/collapse symbol and date format.
 4. Support for archive filters.
 5. Auto expands current/select year from posts.
 6. Select the categories to exclude
 7. And more to come...

== Installation ==

1. Make a directory jquery-archive-list-widget under /wp-content/plugins/
1. Upload all downloaded files to /wp-content/plugins/jquery-archive-list-widget/
1. Activate plugin at the plugins section.
1. Go to Presentation -> Widgets and drag the jQuery Archive List to your sidebar and configure it, if you want to display it inside a post then write [jQuery Archive List] at the location where it will be shown and save it.

== Configuration ==

* Title: title of the widget.
* Trigger Symbol:  characters to be displayed as a bullet.
* jQuery Effect: jQuery's effect to use.
* Month Format:  month's display format of the month.
* Show number of posts: display how many post are published in the year or in the month.
* Show posts under months:  show post's title under months.
* Intially expand current year: expands current year at home screen.

== Frequently Asked Questions ==

= Why this plugin is not working? =

By support experience, like 99% of problems are due to: 
* There's a Javascript error caused by other plugin and it stops any further code execution, check your browser's logs to find the problem and deactivate the conflict plugin.
* Your template doesn't have a wp_footer() function, this plugin requires this function to load JS code at the end of the website to improve speed.

= How I can send you a translation? =

Send me the translated .mo file to migueluseche(a)skatox.com and indicate the language, I can read english or spanish,
so please write me on these languages.

= Can I use images as bullets or trigger symbols? =

Yes, select 'Empty Space' as trigger symbol and Save, then you can add any custom background using CSS, 
just play with the widget's classes .jaw_symbol, .jaw_years, .jaw_months.


= Can I show this list inside posts? =

Yes, only write [jQuery Archive List] anywhere inside a post or page's contest and it will be replaced for
the archive list when rendering the content.

= How I contribute to this plugin? =

By using it, recommending it to other users, giving it 5 starts at plugin's wordpress page, suggesting features
or coding new features and finally by DONATING using plugin's website's donate link.

= How can i add multiples instances? =

Since 1.1 there's a trick to do it, just add a new Text widget only with  [jQuery Archive List] as content (without quotes) then
when looking the site it will have a new copy of the widget. Due to the plugin architecture, there's no way to have
a single configuration for each instance (but you can edit source code and register and copy  widget functions to implement this).

== Screenshots ==

1. Here you can see a list of the archives, archives for each month are hidden under years.
2.  Here you can see a list of archives and its month archives expanded.

== Change Log ==
= 1.3 =
* Improved query performance and added option to exclude categories. (thanks to Michael Westergaard for the work)

= 1.2.3 =
* Fixing i18n bug due to new wordpress changes, now it loads your language (if it was translated) correctly.

= 1.2.2 =
* Fixed the bug of wrong year displaying on pages.
* JS code is not generated dynamically, now it generates in a separated file. For better performance and to support any minify plugins.

= 1.2.1 =
* Improved generated HTML code to be more compatible when JS is off, also helps to search engines to navigate through archives pages.
* Fixed a bug where in some cases a wrong year expanded at home page.
* Added Slovak translation

= 1.2 =
* Added option to automatically expand current year or post's year (thanks to Michael Westergaard for most of the work)
* Cleaned code and make it more readable for future hacks from developers.

= 1.1.2 =
* Changed plugin's JS file loading to the footer, so it doesn't affect your site's loading speed.
* Added default value for widget's title. And it is included in translation files, so this can be used in multi-language sites.
* Plugin translated to Czech (CZ) thanks to Tomas Valenta.

= 1.1.1 =
* Removed &nbsp; characters, all spacing should be done by CSS.

= 1.1 =
* Added support for multiples instances (by writing [jQuery Archive List] on any Text widget)
* Added support for Wordpress' reading filters, like reading permissions using Role Scoper plugin (thanks to Ramiro García for the patch)
* Improved compatibility with Wordpress 3.x

= 1.0 =
* Added support for month's format
* Now the jquery archive list can be printed from a post, just write [jQuery Archive List] anywhere inside the post.
* Added support for i18n, so you can translate widget configuration's text to your language.
* Separed JS code from HTML code, so browsers should cache JS content for faster processing.
* Automatic loading of jQuery JS library.
* Almost all code were rewritten for better maintainer and easy way to add new features.
* Improved code to be more Wordpress compatible.

= 0.1.3 ==
* Initial public version.