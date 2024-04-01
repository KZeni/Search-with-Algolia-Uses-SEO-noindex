<?php
/*
 * Plugin name: WP Search with Algolia Uses Yoast SEO noindex
 * Plugin URI: https://wordpress.org/plugins/wp-search-with-algolia-uses-yoast-seo-noindex/
 * Description: Makes it so setting content as noindex using Yoast SEO has it then not show in the site's search when using WP Search with Algolia.
 * Author: KZeni
 * Author URI: https://kzeni.com
 * License: GPLv3
 * Version: 1.0
 * Requires at least: 5.5
 * Tested up to: 6.4
 */

// NOTE: "kzeni_algolia_yoast_noindex" is used for scoping since "kzeni_wp_search_with_algolia_uses_yoast_seo_noindex" (use the plugin path's name) is a bit wordy.

define("KZENI_ALGOLIA_YOAST_NOINDEX_NAME", plugin_basename(__FILE__));

// Per https://github.com/WebDevStudios/wp-search-with-algolia/issues/105 + https://wordpress.org/support/topic/default-behavior-of-yoast-seos-noindex-status-and-indexing-via-algolia/ (based on https://stackoverflow.com/questions/43699035/how-to-stop-algolia-from-indexing-posts-with-noindex-in-wordpress)
/**
 * Don't have Algolia Search index pages where the robot index
 * option in the Yoast SEO plugin is set to noindex.
 * Via: https://github.com/algolia/algoliasearch-wordpress/blob/master/docs/src/indexing-flow.md
 *
 * @param bool    $should_index
 * @param WP_Post $post
 *
 * @return bool
 */
function kzeni_algolia_yoast_noindex_filter($should_index, WP_Post $post)
{
    if (false === $should_index) {
        return false;
    }
    return get_post_meta($post->ID, "_yoast_wpseo_meta-robots-noindex", true) ==
        1
        ? false
        : true;
}
// Hook into Algolia to manipulate the post that should be indexed.
add_filter(
    "algolia_should_index_searchable_post",
    "kzeni_algolia_yoast_noindex_filter",
    10,
    2
);
add_filter(
    "algolia_should_index_post",
    "kzeni_algolia_yoast_noindex_filter",
    10,
    2
);

function kzeni_algolia_yoast_noindex_plugin_extra_links($links, $plugin_name)
{
    if ($plugin_name != KZENI_ALGOLIA_YOAST_NOINDEX_NAME) {
        return $links;
    }
    $links[] =
        '<a href="https://github.com/KZeni/WP-Search-with-Algolia-Uses-Yoast-SEO-noindex" target="_blank">' .
        __("GitHub", "kzeni_algolia_yoast_noindex") .
        "</a>";
    $links[] =
        '<a href="https://wordpress.org/support/plugin/wp-search-with-algolia-uses-yoast-seo-noindex/reviews/" target="_blank">' .
        __("Reviews", "kzeni_algolia_yoast_noindex") .
        "</a>";
    $links[] =
        '<a href="https://wordpress.org/support/plugin/wp-search-with-algolia-uses-yoast-seo-noindex/" target="_blank">' .
        __("Support", "kzeni_algolia_yoast_noindex") .
        "</a>";
    return $links;
}
add_filter(
    "plugin_row_meta",
    "kzeni_algolia_yoast_noindex_plugin_extra_links",
    10,
    2
);
