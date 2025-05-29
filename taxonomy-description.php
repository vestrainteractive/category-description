<?php
/**
 * Plugin Name: Taxonomy Description Shortcode
 * Description: Outputs the description of the current category or taxonomy term.
 * Version: 1.0
 * Author: Vestra Interactive
 */

if (!defined('ABSPATH')) exit;

function taxonomy_description_shortcode() {
    if (is_category() || is_tag() || is_tax()) {
        $term = get_queried_object();
        if (!empty($term) && !is_wp_error($term)) {
            return wpautop($term->description);
        }
    }
    return '';
}
add_shortcode('taxonomy_description', 'taxonomy_description_shortcode');
