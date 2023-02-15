<?php

/*
 * Plugin Name:       PDF Receipts extender for GiveWP
 * Description:       This plugins extends the GiveWP PDF Receipts
 * Version:           0.0.1
 * Requires at least: 6.0
 * Requires PHP:      7.4
 * Author:            Matheus Martins
 * Author URI:        https://matheuswd.com.br
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       pdf-receipts-extender-for-givewp
 * Domain Path:       /languages
 */


function custom_pdf_tag_donor_title( $template_content, $args ) {	
	$donor_title  = isset( $args['buyer_info']['title'] ) && $args['buyer_info']['title'] !== '' ? $args['buyer_info']['title'] : __('', 'give');
	$template_content = str_replace( '{donor_title}', $donor_title, $template_content );
	return $template_content;
}

add_filter( 'give_pdf_compiled_template_content', 'custom_pdf_tag_donor_title', 999, 2 );

function pre_for_givewp( $pdf_tags ) {

	$pdf_tags['donor_title'] = __( 'The donor\'s title.', 'Ax explanation about the donor_title tag', 'pdf-receipts-extender-for-givewp' );

	return $pdf_tags;
}

add_filter( 'give_pdf_display_supported_pdf_tags', 'pre_for_givewp' );
