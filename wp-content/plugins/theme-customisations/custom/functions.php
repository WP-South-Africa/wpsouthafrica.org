<?php
/**
 * Functions.php
 *
 * @package  Theme_Customisations
 * @author   WooThemes
 * @since    1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

add_action( 'after_setup_theme', 'wpsa_mess_with_maranatha_widgets', 999 );
function wpsa_mess_with_maranatha_widgets () {

	remove_theme_support( 'ctfw-widget-section' );

	add_theme_support( 'ctfw-widget-section', array(
		'fields' => array(
			'title',
			'content',
			'image_id',
			'image_opacity',
			'link1_text',
			'link1_url',
			'link2_text',
			'link2_url',
			'link3_text',
			'link3_url',
			'link4_text',
			'link4_url',
			'link5_text',
			'link5_url',
			'link6_text',
			'link6_url',
			'link7_text',
			'link7_url',
			'link8_text',
			'link8_url',
			'link9_text',
			'link9_url',
			'link10_text',
			'link10_url',
		),
		'field_overrides' => array(
			'content' => array(
				'desc' => __( 'Provide no more than two sentences.', 'maranatha' ),
			),
			'image_id' => array( // tell user image is required with this theme
				'desc' => sprintf( __( 'Image cropped to <b>%s</b>. File size <b>under 200 KB</b> recommended.', 'maranatha' ), ctfw_image_size_dimensions( 'maranatha-section' ) ),
			),
			'image_opacity' => array(
				'desc' => __( 'Lower percentage makes color show through. Aim for easy to read text.', 'maranatha' ),
			),
		),
	) );
}

add_filter( 'wpsa_max_number_of_links', 'wpsa_max_number_of_links' );
function wpsa_max_number_of_links ( $n ) {
	return 10;
}

add_filter( 'ctfw_section_widget_fields', 'wpsa_ctfw_section_widget_fields', 1, 1 );
function wpsa_ctfw_section_widget_fields ( $fields ) {

	$extra_links = array( '5', '6', '7', '8', '9', '10' );

	foreach( $extra_links as $n ) {

		$fields['link' . $n . '_text'] = array (
			'name'				=> _x( 'Link ' . $n, 'section widget', 'church-theme-framework' ),
			'after_name'		=> '', // (Optional), (Required), etc.
			'desc'				=> '',
			'type'				=> 'text', // text, textarea, checkbox, radio, select, number, url, image, color
			'checkbox_label'	=> '', //show text after checkbox
			'radio_inline'		=> false, // show radio inputs inline or on top of each other
			'number_min'		=> '', // lowest possible value for number type
			'number_max'		=> '', // highest possible value for number type
			'options'			=> array(), // array of keys/values for radio or select
			'default'			=> '', // value to pre-populate option with (before first save or on reset)
			'no_empty'			=> false, // if user empties value, force default to be saved instead
			'allow_html'		=> false, // allow HTML to be used in the value (text, textarea)
			'attributes'		=> array(
									'placeholder' => _x( 'Text', 'section widget', 'church-theme-framework' )
								), // attributes to add to input element
			'class'				=> '', // class(es) to add to input
			'field_attributes'	=> array(), // attr => value array for field container
			'field_class'		=> 'ctfw-widget-no-bottom-margin', // class(es) to add to field container
			'custom_sanitize'	=> '', // function to do additional sanitization (or array( &$this, 'method' ))
			'custom_field'		=> '', // function for custom display of field input
			'taxonomies'		=> array(), // hide field if taxonomies are not supported
		);

		$fields['link' . $n . '_url'] = array(
			'name'				=> '',
			'after_name'		=> '', // (Optional), (Required), etc.
			'desc'				=> '',
			'type'				=> 'url', // text, textarea, checkbox, radio, select, number, url, image, color
			'checkbox_label'	=> '', //show text after checkbox
			'radio_inline'		=> false, // show radio inputs inline or on top of each other
			'number_min'		=> '', // lowest possible value for number type
			'number_max'		=> '', // highest possible value for number type
			'options'			=> array(), // array of keys/values for radio or select
			'default'			=> '', // value to pre-populate option with (before first save or on reset)
			'no_empty'			=> false, // if user empties value, force default to be saved instead
			'allow_html'		=> false, // allow HTML to be used in the value (text, textarea)
			'attributes'		=> array(
									'placeholder' => _x( 'URL', 'section widget', 'church-theme-framework' )
								), // attributes to add to input element
			'class'				=> '', // class(es) to add to input
			'field_attributes'	=> array(), // attr => value array for field container
			'field_class'		=> '', // class(es) to add to field container
			'custom_sanitize'	=> '', // function to do additional sanitization (or array( &$this, 'method' ))
			'custom_field'		=> '', // function for custom display of field input
			'taxonomies'		=> array(), // hide field if taxonomies are not supported
		);

	}

	return $fields;
}