<?php


class Pronamic_Mail_Template {
    
    private $replacements = array();
    
    private $xml;
    
    public function load_template( $file_name ) {
        $file = WP_PRONAMIC_MAILER_DIR . "/xmltemplates/{$file_name}.xml";
        
        // Check the xml template exists
        if ( ! file_exists( $file ) )
            return false;
        
        $this->xml = simplexml_load_file( $file );
        
        
    }
    
    public function save_template() {
        
    }
    
    public function add_replacement( $needle, $value ) {
        $this->replacements[ $needle ] = $value;
    }
    
    public function remove_replacement( $needle ) {
        if ( array_key_exists( $needle ) )
            unset( $this->replacements[ $needle ] );
    }
    
}