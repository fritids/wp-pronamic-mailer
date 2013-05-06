<?php

class Pronamic_Mail_Template_Factory {
    public static function get_all_xml_templates() {
        $xml_templates = array();
        
        foreach ( glob( WP_PRONAMIC_MAILER_DIR . '/templates/xml_templates/*.xml' ) as $xml_template ) {
            $xml_templates[$xml_template] = str_replace( '.xml', '', basename( $xml_template ) );
        }
        
        return $xml_templates;
    }
    
    public static function get_all_mail_templates() {
        $mail_templates = array();
        
        foreach ( glob( WP_PRONAMIC_MAILER_DIR . '/templates/mail_templates/*.php' ) as $mail_template ) {
            $mail_templates[$mail_template] = str_replace( '.php', '', basename( $mail_template ) );
        }
        
        return $mail_templates;
    }
}