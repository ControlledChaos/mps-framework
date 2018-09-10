<?php
/**
 * Footer HTML and content output.
 *
 * @package WordPress
 * @subpackage Controlled_Chaos_Theme
 * @since  1.0.0
 */

namespace MPS_Framework;

// Restrict direct access
if ( ! defined( 'ABSPATH' ) ) exit;

do_action( 'mps_before_footer_content' );

    echo '<div class="footer-content global-wrapper footer-wrapper">', "\r";

        $site_name      = esc_attr( get_bloginfo( 'name' ) );
        $copyright_text = sprintf( '<p class="copyright-text" itemscope="itemscope" itemtype="http://schema.org/CreativeWork">&copy; <span class="screen-reader-text">%1s</span><span itemprop="copyrightYear">%2s</span> <span itemprop="copyrightHolder">%3s.</span> %4s.</p>', esc_html__( 'Copyright ', 'mps-framework' ), get_the_time( 'Y' ), $site_name, esc_html__( 'All rights reserved', 'mps-framework' ) );

        $copyright = apply_filters( 'mps_copyright_text', $copyright_text );
        echo $copyright, "\r";
    
    echo '</div><!-- footer-content -->', "\r";

do_action( 'mps_after_footer_content' );