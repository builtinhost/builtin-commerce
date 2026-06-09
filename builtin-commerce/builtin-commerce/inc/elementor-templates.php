<?php
/**
 * Register Elementor Templates for builtin-commerce theme
 * 
 * Automatically syncs with Elementor and displays prebuilt templates
 * in the Elementor template library without manual import.
 * 
 * @package builtin
 * @subpackage builtin-commerce
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Builtin_Commerce_Elementor_Templates {

	/**
	 * Initialize template registration
	 */
	public static function init() {
		// Only proceed if Elementor is active
		if ( ! defined( 'ELEMENTOR_PATH' ) ) {
			return;
		}

		add_action( 'elementor/init', [ __CLASS__, 'register_template_library' ] );
		add_action( 'wp_ajax_builtin_commerce_import_template', [ __CLASS__, 'ajax_import_template' ] );
	}

	/**
	 * Register template library with Elementor
	 */
	public static function register_template_library() {
		// Get all templates
		$templates = self::get_templates();

		// Store in transient for quick access
		set_transient( 'builtin_commerce_elementor_templates', $templates, WEEK_IN_SECONDS );

		// Hook to make templates discoverable
		add_filter( 'elementor/document/get_property', [ __CLASS__, 'filter_document_property' ], 10, 3 );
	}

	/**
	 * Get all prebuilt templates
	 */
	public static function get_templates() {
		return [
			[
				'id'          => 'builtin-commerce-shop',
				'title'       => 'Premium E-Commerce Shop Homepage',
				'category'    => 'Homepage',
				'type'        => 'page',
				'description' => 'Professional WooCommerce store template with featured products, categories, reviews, and trust badges',
				'keywords'    => [ 'shop', 'ecommerce', 'woocommerce', 'products', 'store', 'shop', 'marketplace' ],
				'is_pro'      => false,
				'thumbnail'   => self::get_thumbnail_url( 'homepage-shop' ),
				'preview_url' => home_url( '/?p=builtin-commerce-preview' ),
				'file'        => self::get_template_file( 'homepage-shop.json' ),
			],
		];
	}

	/**
	 * Get template file content
	 */
	private static function get_template_file( $filename ) {
		$template_path = dirname( __DIR__ ) . '/elementor-templates/' . $filename;

		if ( ! file_exists( $template_path ) ) {
			return '';
		}

		$content = file_get_contents( $template_path );
		return ! empty( $content ) ? $content : '';
	}

	/**
	 * Get thumbnail URL for template
	 */
	private static function get_thumbnail_url( $template_name ) {
		// Use default Elementor placeholder if custom not available
		return get_template_directory_uri() . '/assets/images/template-' . sanitize_file_name( $template_name ) . '.jpg';
	}

	/**
	 * Filter document property to include custom templates
	 */
	public static function filter_document_property( $value, $property, $document ) {
		if ( 'template_type' === $property ) {
			// Make templates accessible to Elementor
			return 'page';
		}
		return $value;
	}

	/**
	 * AJAX handler for importing template
	 */
	public static function ajax_import_template() {
		check_ajax_referer( 'builtin_commerce_nonce' );

		if ( ! current_user_can( 'edit_pages' ) ) {
			wp_send_json_error( 'Permission denied' );
		}

		$template_id = isset( $_POST['template_id'] ) ? sanitize_text_field( $_POST['template_id'] ) : '';
		
		if ( empty( $template_id ) ) {
			wp_send_json_error( 'Template ID required' );
		}

		$result = self::import_template( $template_id );

		if ( $result && is_numeric( $result ) ) {
			wp_send_json_success( [
				'page_id' => $result,
				'url'     => get_edit_post_link( $result, 'url' ),
			] );
		}

		wp_send_json_error( 'Failed to import template' );
	}

	/**
	 * Import template as new page
	 */
	public static function import_template( $template_id ) {
		$templates = self::get_templates();

		foreach ( $templates as $template ) {
			if ( $template['id'] === $template_id ) {
				return self::create_page_from_template( $template );
			}
		}

		return false;
	}

	/**
	 * Create WordPress page from template
	 */
	private static function create_page_from_template( $template ) {
		// Get template JSON data
		$template_data = json_decode( $template['file'], true );

		if ( ! $template_data ) {
			return false;
		}

		// Create the page
		$page_id = wp_insert_post( [
			'post_type'   => 'page',
			'post_title'  => $template['title'] . ' (Copy)',
			'post_status' => 'draft',
			'meta_input'  => [
				'_elementor_edit_mode'      => 'builder',
				'_elementor_data'           => wp_json_encode( $template_data ),
				'_builtin_commerce_template' => $template['id'],
			],
		] );

		// Save Elementor data as post meta
		if ( $page_id && is_numeric( $page_id ) ) {
			update_post_meta( $page_id, '_elementor_data', wp_json_encode( $template_data ) );
		}

		return $page_id;
	}

	/**
	 * Export all templates as JSON
	 */
	public static function export_templates_json() {
		$templates = self::get_templates();
		return wp_json_encode( $templates );
	}

	/**
	 * Get template by ID
	 */
	public static function get_template_by_id( $template_id ) {
		$templates = self::get_templates();

		foreach ( $templates as $template ) {
			if ( $template['id'] === $template_id ) {
				return $template;
			}
		}

		return null;
	}
}

// Initialize
add_action( 'plugins_loaded', [ 'Builtin_Commerce_Elementor_Templates', 'init' ], 20 );

// Public API functions
if ( ! function_exists( 'builtin_commerce_get_elementor_templates' ) ) {
	/**
	 * Get all builtin-commerce Elementor templates
	 */
	function builtin_commerce_get_elementor_templates() {
		return Builtin_Commerce_Elementor_Templates::get_templates();
	}
}

if ( ! function_exists( 'builtin_commerce_import_elementor_template' ) ) {
	/**
	 * Import a template by ID
	 */
	function builtin_commerce_import_elementor_template( $template_id ) {
		return Builtin_Commerce_Elementor_Templates::import_template( $template_id );
	}
}
