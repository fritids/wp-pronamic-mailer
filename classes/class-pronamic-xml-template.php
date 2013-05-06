<?php

/**
 * Class to load the XML Configuration Templates
 * 
 * Functions:
 * -----------
 * add_replacement( $location, $needle, $value )
 * get_mail_template()
 * get_replacement_needles()
 * get_replacements()
 * load( $file_name )
 * remove_replacement( $needle )
 * save_template( $name )
 * set_mail_template( $template )
 * 
 * @package Pronamic/XML
 * @author Pronamic
 * @version 0.0.1
 */
class Pronamic_XML_Template {
    
    private $replacements = array();
    private $mail_template;
    
    private $xml;
    
    public function load( $file_name ) {
        $file = WP_PRONAMIC_MAILER_DIR . "/templates/xml_templates/{$file_name}.xml";
        
        // Check the xml template exists
        if ( ! file_exists( $file ) )
            return false;
        
        $this->xml = simplexml_load_file( $file );
        
        
    }
    
    /**
     * Saves this template to an XML file, with the chosen name
     * 
     * @since 0.0.1
     * 
     * @access public
     * @param string $name
     * @return bool | If successful or not
     */
    public function save_template( $name ) {
        
    }
    
    /**
     * Adds a replacement needle and value
     * to this XML template.
     * 
     * Needles do not require {{ }} around them.
     * This is a system default
     * 
     * @since 0.0.1
     * 
     * @access public
     * @param string $location
     * @param string $needle
     * @param string $value
     * @return \Pronamic_XML_Template
     */
    public function add_replacement( $location, $needle, $value ) {
        $this->replacements[ $needle ] = array(
            'location' => $location,
            'needle' => $needle,
            'value' => $value
        );
        return $this;
    }
    
    /**
     * Removes a replacement string. 
     * 
     * Needles do not require {{ }} around them.
     * This is a system default
     * 
     * @since 0.0.1
     * 
     * @access public
     * @param string $needle
     * @return void
     */
    public function remove_replacement( $needle ) {
        if ( array_key_exists( $needle, $this->replacements ) )
            unset( $this->replacements[ $needle ] );
    }
    
    /**
     * Returns an array of all replacement values.
     * 
     * @since 0.0.1
     * 
     * @access public
     * @return array
     */
    public function get_replacements() {
        return $this->replacements;
    }
    
    /**
     * Returns an array of all replacement needles.
     * 
     * @since 0.0.1
     * 
     * @access public
     * @return array
     */
    public function get_replacement_needles() {
        return array_keys( $this->replacements );
    }
    
    /**
     * Sets the mail template. Just file name located
     * inside /templates/mail_templates
     * 
     * @since 0.0.1
     * 
     * @access public
     * @param string $template
     * @return \Pronamic_XML_Template
     */
    public function set_mail_template( $template ) {
        $this->mail_template = $template;
        return $this;
    }
    
    /**
     * Returns the file name of the chosen template
     * from this XML configuration
     * 
     * @since 0.0.1
     * 
     * @access public
     * @return string
     */
    public function get_mail_template() {
        return $this->mail_template;
    }
    
}