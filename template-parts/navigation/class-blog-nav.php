<?php
/**
 * Blog pages navigation.
 *
 * @package WordPress
 * @subpackage Controlled_Chaos_Theme
 * @since  1.0.0
 */

namespace MPS_Framework;

// Restrict direct access
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Blog pages navigation.
 */
class Blog_Nav {

    /**
	 * Constructor magic method.
	 */
	public function __construct() {
		
		add_action( 'mps_before_footer', [ $this, 'nav' ], 20 );

	}
	
	/**
	 * Get navigation style.
	 */
	public function nav() {

		if ( 'numeric' == mps_sanitize_blog_navigation_format( get_theme_mod( 'mps_blog_navigation_format' ) ) ) {
			get_template_part( 'template-parts/navigation/partials/numeric-nav' );
		} else {
			get_template_part( 'template-parts/navigation/partials/posts-nav' );
		}

	}

}

new Blog_Nav;