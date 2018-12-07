<?php
/**
 * Template Name: Slack invite redirect
 */

wp_safe_redirect( home_url( 'wp-login.php?action=slack-invitation' ) );
exit;