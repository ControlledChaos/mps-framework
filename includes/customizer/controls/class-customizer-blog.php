<?php
/**
 * Customizer blog controls.
 *
 * @package WordPress
 * @subpackage Controlled_Chaos_Theme
 * @since  1.0.0
 */

// Do not namespace this class.

// Restrict direct access
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Customizer blog controls.
 */
class Customizer_Blog {

    /**
	 * Constructor magic method.
	 */
	public function __construct() {

        // Blog panel.
		add_action( 'customize_register', [ $this, 'blog' ] );

    }

    /**
     * Blog panel.
     */
    public function blog( $wp_customize ) {

        /**
		 * Framework settings panel.
		 */
		$wp_customize->add_section( 'mps_customizer_blog', [
			'priority'    => 35,
			'capability'  => 'edit_theme_options',
			'title'       => __( 'Blog & Archives', 'mps-framework' ),
			'description' => __( 'Content and navigation archives.', 'mps-framework' )
        ] );
        
        // Blog content format.
		$wp_customize->add_setting( 'mps_blog_content_format', [
			'default'	        => 'content',
			'sanitize_callback' => 'mps_sanitize_blog_content_format'
		] );

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'mps_blog_content_format', [
			'section'     => 'mps_customizer_blog',
			'settings'    => 'mps_blog_content_format',
			'label'       => __( 'Blog Content', 'mps-framework' ),
			'description' => __( 'Full content or excerpts', 'mps-framework' ),
			'type'        => 'select',
			'choices'     => [
				'content' => __( 'Full Content', 'mps-framework' ),
				'excerpt' => __( 'Excerpts', 'mps-framework' )
				]
			]
		) );
		
		// Archive content format.
		$wp_customize->add_setting( 'mps_archive_content_format', [
			'default'	        => 'content',
			'sanitize_callback' => 'mps_sanitize_archive_content_format'
		] );

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'mps_archive_content_format', [
			'section'     => 'mps_customizer_blog',
			'settings'    => 'mps_archive_content_format',
			'label'       => __( 'Archive Content', 'mps-framework' ),
			'description' => __( 'Full content or excerpts', 'mps-framework' ),
			'type'        => 'select',
			'choices'     => [
				'content' => __( 'Full Content', 'mps-framework' ),
				'excerpt' => __( 'Excerpts', 'mps-framework' )
				]
			]
        ) );
        
        // Blog/archive navigation format.
		$wp_customize->add_setting( 'mps_blog_navigation_format', [
			'default'	        => 'standard',
			'sanitize_callback' => 'mps_sanitize_blog_navigation_format'
		] );

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'mps_blog_navigation_format', [
			'section'     => 'mps_customizer_blog',
			'settings'    => 'mps_blog_navigation_format',
			'label'       => __( 'Blog Pages Navigation', 'mps-framework' ),
			'description' => __( 'Next/previous links or page count.', 'mps-framework' ),
			'type'        => 'select',
			'choices'     => [
				'standard' => __( 'Next/Previous', 'mps-framework' ),
				'numeric'  => __( 'Page Count', 'mps-framework' )
				]
			]
		) );

    }
    
}

new Customizer_Blog;