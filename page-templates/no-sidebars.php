<?php
/**
 * No Sidebars template.
 * 
 * Template Name: No Sidebars
 * Template Post Type: post, page
 * Description: Does not load the primary or secondary sidebars.
 *
 * @package WordPress
 * @subpackage Controlled_Chaos_Theme
 * @since Controlled Chaos 1.0.0
 */
namespace MPS_Framework;

// Restrict direct access.
if ( ! defined( 'ABSPATH' ) ) exit;

class No_Sidebars {

	/**
	 * Constructor magic method.
	 */
	public function __construct() {

		// Begin HTML and get <head> section.
		get_header();
		
		// Add a page content wrapper.
		add_action( 'mps_before_post', [ $this, 'open_wrapper' ] );

		// Page content wrapper hook.
		do_action( 'mps_before_post' );

		/**
		 * The get_siderbar function is still needed for other widget areas.
		 * 
		 * Sidebar conditionally excluded in sidebar.php.
		 */
		get_sidebar();

		// Content templates.
		require get_theme_file_path( '/template-parts/content/content.php' );

		// The post loop.
		if ( have_posts() ) {

			while ( have_posts() ) {

				the_post();

				$content = new Content;
				echo $content->partials();
				
			}

		} else {

			include_once get_theme_file_path( '/template-parts/content/partials/content-none.php' );

		}
		
		// End the page content wrapper.
		add_action( 'mps_after_post', [ $this, 'close_wrapper' ] );

		// End page content wrapper hook.
		do_action( 'mps_after_post' );

		// Load scripts and close HTML.
		get_footer();

	}

	/**
	 * Open content wrapper.
	 */
	public function open_wrapper() {

		echo '<div id="content" class="site-content wrapper">';

	}

	/**
	 * Close content wrapper.
	 */
	public function close_wrapper() {

		echo '</div><!-- site-content -->';
		
	}

}

new No_Sidebars;