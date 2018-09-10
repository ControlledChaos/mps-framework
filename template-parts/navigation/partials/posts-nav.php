<?php
/**
 * Blog pages standard navigation.
 *
 * @package WordPress
 * @subpackage Controlled_Chaos_Theme
 * @since  1.0.0
 */

namespace MPS_Framework;

// Restrict direct access
if ( ! defined( 'ABSPATH' ) ) exit;

if ( is_search() ) {
    $prev = __( 'Previous Results', 'mps-framework' );
    $next = __( 'More Results', 'mps-framework' );
} else {
    $prev = __( 'Previous Page', 'mps-framework' );
    $next = __( 'Next Page', 'mps-framework' );
}

$prev_posts = apply_filters( 'mps_prev_posts_label', sprintf( '<span>%1s</span>', $prev ) );
$next_posts = apply_filters( 'mps_next_posts_label', sprintf( '<span>%1s</span>', $next ) );
?>
<nav class="posts-nav">
	<span class="prev-page" rel="prev"><?php previous_posts_link( $prev_posts ); ?></span>
	<span class="next-page" rel="next"><?php next_posts_link( $next_posts ); ?></span>
</nav>