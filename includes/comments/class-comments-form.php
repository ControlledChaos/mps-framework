<?php
/**
 * Post comments form arguments.
 *
 * @package WordPress
 * @subpackage Controlled_Chaos_Theme
 * @since  1.0.0
 */

namespace MPS_Framework;

// Restrict direct access
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Post comments form arguments.
 */
class Controlled_Chaos_Theme_Comments_Form {

    /**
	 * Constructor magic method.
	 */
    public function __construct() {

        // Comments form args.
        $this->args();

    }

    /**
     * Comments form args.
     * 
     * @since  1.0.0
     */
    public static function args() {

        global $user_identity;

        $commenter = wp_get_current_commenter();
        $req_email = get_option( 'require_name_email' );
        if ( $req_email ) {
            $aria_req = ' aria-required="true" ';
            $required = ' <span class="required">*</span>';
        } else {
            $aria_req = '';
            $required = '';
        }

        $fields =  apply_filters( 'mps_comments_signup_fields', [
            'author' => sprintf( '<p class="comment-form-author"><label for="author">%1s</label> %2s<input id="author" name="author" type="text" value="%3s"' . $aria_req . ' /></p>', __( 'Name', 'mps-framework' ), $required, esc_attr( $commenter['comment_author'] ) ),
            'email'  => sprintf( '<p class="comment-form-email"><label for="email">%1s</label> %2s<input id="email" name="email" type="text" value="%3s"' . $aria_req . ' /></p>', __( 'Email', 'mps-framework' ), $required, esc_attr(  $commenter['comment_author_email'] ) ),
            'url'    => sprintf( '<p class="comment-form-url"><label for="url">%1s</label><input id="url" name="url" type="text" value="%2s" /></p>',  __( 'Website', 'mps-framework' ), esc_attr( $commenter['comment_author_url'] ) ),
        ] );

        $comments_args = apply_filters( 'mps_comments_labels', [
            'id_form'              => 'comment-form',
            'id_submit'            => 'comment-submit',
            'class_submit'         => 'comment-submit',
            'name_submit'          => 'submit',
            'title_reply'          => __( 'Comments', 'mps-framework' ),
            'title_reply_to'       => __( 'Reply to %s', 'mps-framework' ),
            'cancel_reply_link'    => __( 'Cancel reply', 'mps-framework' ),
            'label_submit'         => __( 'Submit', 'mps-framework' ),
            'format'               => 'html5',
            'comment_field'        =>  sprintf( '<div class="comment-form-comment"><label for="comment">%1s</label><textarea id="comment" name="comment" aria-required="true"></textarea></div>', __( 'Leave a comment:', 'mps-framework' ) ),
            'must_log_in'          => sprintf( '<p class="comment-form-log-in">%1s <a href="%2s">%3s</a> %4s.</p>', __( 'You must be', 'mps-framework' ), wp_login_url(), __( 'logged in', 'mps-framework' ), __( 'to post a comment', 'mps-framework' ) ),
            'logged_in_as'         => sprintf( '<p class="comment-form-logged-in">%1s <a href="%2s">%3s</a>. <a class="comment-form-log-out" href="%4s" title="Log out of this account">%5s?</a></p>', __( 'Logged in as', 'mps-framework' ), admin_url( 'profile.php' ), $user_identity, wp_logout_url(), __( 'Log out', 'mps-framework' ) ),
            'comment_notes_before' => '<p class="comment-form-notes">' . __( 'Your email address will not be published.', 'mps-framework' ) . '</p>',
            'fields'               => $fields,
        ] );

        return $comments_args;

    }

}

$controlled_chaos_comments_form = new Controlled_Chaos_Theme_Comments_Form;