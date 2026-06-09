<?php
/**
 * PAGE TEMPLATE BOILERPLATE
 * Use this as the standard template for all new pages
 * 
 * IMPORTANT: Always follow this structure for consistency across the theme
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// ALWAYS use get_header() for global header with navigation
get_header();

?>

<style>
/* Add page-specific styles here */
.page-title { 
    font-family: 'Playfair Display', serif; 
    font-size: 36px; 
    font-weight: 700; 
    margin-bottom: 30px; 
    color: #1a1a1a; 
}

/* Use .page-content wrapper for consistent max-width and padding (defined in elegant-global.css) */
</style>

<!-- Page content goes here -->
<div class="page-content">
    <h1 class="page-title"><?php the_title(); ?></h1>
    
    <!-- Your page content -->
    
</div>

<?php

// ALWAYS use get_footer() to match global footer
get_footer();
?>
