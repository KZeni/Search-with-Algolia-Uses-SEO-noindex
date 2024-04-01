=== WP Search with Algolia Uses Yoast SEO noindex ===
Contributors: KZeni
Donate link: https://www.paypal.me/KZeni
License: GPLv3
Tags: algolia, search, yoast, seo, noindex, integration
Stable tag: 1.0
Requires at least: 5.5
Tested up to: 6.4
Requires PHP: 5.4

Makes it so setting content as noindex using Yoast SEO has it then not show in the site's search when using WP Search with Algolia.

== Description ==

Makes it so setting content as noindex using Yoast SEO has it then not show in the site's search when using WP Search with Algolia.

This is a simple & lightweight plugin that simply uses & integrates/connects the official filters made available by the [WP Search with Algolia](https://wordpress.org/plugins/wp-search-with-algolia/) plugin and the post meta values from the [Yoast SEO](https://wordpress.org/plugins/wordpress-seo/) plugin to make it so any content where Yoast SEO has it set to noindex then doesn't get indexed by the Algolia plugin upon activation of this plugin.

Check things out on GitHub at [https://github.com/KZeni/WP-Search-with-Algolia-Uses-Yoast-SEO-noindex](https://github.com/KZeni/WP-Search-with-Algolia-Uses-Yoast-SEO-noindex). Also, thanks goes out to [@rayrutjes](https://profiles.wordpress.org/rayrutjes/) (from Algolia) for putting the initial functionality together.

== Frequently Asked Questions ==

= What else needs to be done? Is there a settings screen to enable/configure it? =

You can simply enable this to have content set to noindex via Yoast SEO then not be indexed by WP Search with Algolia. Deactivating the plugin then has it resume default behavior. A simple implementation that's quick & easy to utilize. Consider enabling/disabling the plugin the setting for whether or not this integration/connection/behavior is enabled.

Keep in mind that you may want/need to have WP Search with Algolia re-index the site's content after enabling/disabling this plugin to make sure the search results use the newly-updated behavior (didn't want to force a re-index of a site upon enabling/disabling this plugin as that could get in the way depending on a particular setup so this is just something to keep in mind to have up-to-date search results.)

== Screenshots ==

1. While part of the Yoast SEO plugin rather than this plugin (since this plugin doesn't have any user interface of its own), here's the setting to enable "noindex" on a page/post/etc. (set the "Allow search engines to show this content within search results" dropdown to "No" within the Advanced section of the Yoast SEO box when editing a page/post/etc. where also then having this plugin enabled will have it not show in the site's Algolia search results either.)
2. Also part of the Yoast SEO plugin, when "noindex" is enabled for a page/post/etc., you should see the SEO Score column in the page/post/etc. list view show a blue circle with a label of "Post is set to noindex".

== Changelog ==

= 1.0 =

Released April 1st, 2024

* Initial release.
