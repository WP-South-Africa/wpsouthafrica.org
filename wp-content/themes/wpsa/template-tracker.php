<?php
/**
 * Template Name: Slack Invite Redirect
 */

wp_safe_redirect( home_url( 'wp-login.php?action=slack-invitation' ) );
exit;