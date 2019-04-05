<?php
/**
 * Template filters.
 *
 * @package WordPress
 * @subpackage Controlled_Chaos_Theme
 * @since  1.0.0
 */

namespace MPS_Framework;

// Restrict direct access
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Template filters.
 */
class Template_Filters {

	/**
	 * Constructor magic method.
	 */
	public function __construct() {

        add_filter( 'image_size_names_choose', [ $this, 'image_size_choose' ] );

    }

    /**
     * Image sizes to insert into posts.
     */
    public function image_size_choose( $size_names ) {

        global $_wp_additional_image_sizes;

		$sizes = [
            'thumbnail'    => esc_html__( 'Thumbnail', 'mps-framework' ),
            'thumb-large'  => esc_html__( 'Large Thumbn', 'mps-framework' ),
            'thumb-xlarge' => esc_html__( 'XL Thumb', 'mps-framework' ),
			'medium'       => esc_html__( 'Medium', 'mps-framework' ),
            'large'        => esc_html__( 'Large', 'mps-framework' ),
            'banner'       => esc_html__( 'Banner', 'mps-framework' ),
            'video'        => esc_html__( 'HD Video', 'mps-framework' )
		];

		$insert_sizes = apply_filters( 'mps_insert_image_sizes', $sizes );
		return $insert_sizes;

    }

}

new Template_Filters;