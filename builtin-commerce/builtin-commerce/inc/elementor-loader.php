<?php
/**
 * Load Elementor template registration for builtin-commerce
 * 
 * @package builtin
 * @subpackage builtin-commerce
 */

// Load Elementor templates
require_once get_template_directory() . '/inc/elementor-templates.php';

/**
 * Display available templates in WordPress admin
 */
function builtin_commerce_register_template_post_type() {
	// Note: Templates are handled by the elementor-templates.php file
	// This function is here for documentation purposes
}
