<?php
/**
 * Primary sidebar.
 *
 * @package WordPress
 * @subpackage Controlled_Chaos_Theme
 * @since  1.0.0
 */

namespace MPS_Framework;

// No direct access, please
if ( ! defined( 'ABSPATH' ) ) exit;

register_sidebar( array(
    'name'          => __( 'Primary Sidebar', 'mps-framework' ),
    'id'            => 'primary-sidebar',
    'description'   => __( 'Sidebar that displays on the default template and on the Two Sidebars template', 'mps-framework' ),
    'before_widget' => '<div id="%1$s" class="widget primary-sidebar-widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
) );