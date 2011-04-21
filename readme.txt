=== jQuery Archive List Widget ===
Contributors: Miguel Useche
Donate link: http://skatox.com/blog/2009/12/26/jquery-archive-list-widget/
Tags: jquery, ajax, javacript, collapse, collapsible, archive, collapsible archive, widget
Requires at least: 2.8
Tested up to: 3.1.1
Stable tag: 1.1

A simple jQuery widget (can be called from posts) for displaying an archive list with some effects.

== Description ==

This plugin provides a widget and a filter to display a collapsible archive list in your sidebar or posts by using jQuery.

= Features =
 1. Display a collapsed list of your archives to reduce space.
 2. Uses jQuery to add effects and to be compatible with most browsers.
 3. Select your expand/collapse symbol and date format.
 4. Support for archive filters.
 5. And more to come...

== Installation ==

1. Make a directory `jquery-archive-list-widget` under `/wp-content/plugins/`
1. Upload  all downloaded files to `/wp-content/plugins/jquery-archive-list-widget/`
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Use your 'Presentation'/'Sidebar Widgets' settings to drag and configure, if you want to display it inside a post then write [jQuery Archive List] and save.

== Configuration ==

* Title: the title of the widget
* Trigger Symbol: The characters to be displayed as a bullet
* jQuery Effect: The jQuery effect to be used.
* Month Format: Display each post's title under the months.
* Show number of posts: Show how many post are published in the year or in the month
* Show posts under months: Display each post's title under the months.

== Frequently Asked Questions ==

= How I can send you a translation? =

Send me the translated .mo file to migueluseche(a)skatox.com and indicate the language, I can read english or spanish,
so please write me on these languages.

= Can I use images as bullets or trigger symbols? =

Yes, select 'Empty Space' as trigger symbol and Save, then you can add any custom background using CSS
to 'jaw_symbol' class or 'jaw_symbol' and 'expanded' for expanded items.

= Can I show this list inside posts? =

Yes, only write [jQuery Archive List] anywhere inside a post or page's contest and it will be replaced for
the archive list when rendering the content.

= How I contribute to this plugin? =

By using it, recommending it to other users, giving it 5 starts at this plugin's wordpress page, suggesting features
or coding new features and finally by DONATING using this plugin's website donate link.

= How can i add multiples instances? =

Since 1.1 there's a trick to do it, just add a new Text widget only with  [jQuery Archive List] as content (without quotes) then
when looking the site it will have a new copy of the widget. Due to plugin architecture, there's no way to have
a single configuration for each instance (but you can edit source code and register and copy  widget functions to implement this).

== Screenshots ==

1. Here you can see a list of the archives, archives for each month are hidden under years.
2.  Here you can see a list of archives and its month archives expanded.

== Change Log ==

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