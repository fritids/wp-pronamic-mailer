<?php

class Pronamic_Mail_Template_Factory {
    public static function get_all_xml_templates() {
        $xml_templates = array( '' => __( 'New' ) );
        get_post_meta( '_ftp_user' );
        
        foreach ( glob( WP_PRONAMIC_MAILER_DIR . '/templates/xml_templates/*.xml' ) as $xml_template ) {
            $xml_templates[$xml_template] = str_replace( '.xml', '', basename( $xml_template ) );
        }
        
        return $xml_templates;
    }
}