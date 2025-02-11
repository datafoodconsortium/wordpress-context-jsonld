<?php
/*
 * Plugin Name:       WordPress Context Jsonld
 * Plugin URI:        https://github.com/datafoodconsortium/wordpress-context-jsonld
 * Description:       Adds an alternate link HTTP header to provide a JSON-LD context.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Maxime Lecoq
 * License:           MIT
 * License URI:       https://opensource.org/license/mit/
 * Update URI:        https://github.com/datafoodconsortium/wordpress-context-jsonld
 */

/**
 * Add the Link to the context and the CORS headers.
 */
add_filter('wp_headers', function ($headers, $wp) {
	if ($_SERVER["REQUEST_URI"] === '/') {
		$dir = "/wp-content/plugins/wordpress-context-jsonld/";
		$fileName = "context.jsonld";
		$context = $dir . $fileName;
		$headers['access-control-allow-origin'] = "*";
		$headers['access-control-expose-headers'] = "Link";
		$headers["Link"] = "<" . $context . '>; rel="alternate"; type="application/ld+json"';
	}

	return $headers;
}, 10, 2);

// Remove 
if ($_SERVER["REQUEST_URI"] === '/') {
	remove_action( 'xmlrpc_rsd_apis', 'rest_output_rsd' );
	remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
	remove_action( 'template_redirect', 'rest_output_link_header', 11 );
}
