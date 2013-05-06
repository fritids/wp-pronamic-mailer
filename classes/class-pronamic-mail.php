<?php

class Pronamic_Mail {
    
    private $id;
    
    private $content_type;
    
    private $headers = array();
    
    private $subject;
    
    private $content;

    private $recipients = array();
    
    public function __construct() {
        
        // Adds a default replacement
        $this->replacements[ '{{sitename}}' ] = get_bloginfo( 'name' );
    }
    
    public function set_id( $id ) {
        $this->id = $id;
        return $this;
    }
   
    
    /**
     * Used to add a recipient to this mail.
     * 
     * @since 0.0.1
     * 
     * @access public
     * @param string $recipient_mail
     * @param string $recipient_name
     * @return \Pronamic_Mail
     */
    public function add_recipient( $recipient_mail, $recipient_name ) {
        $this->recipients[$recipient_mail] = $recipient_name;
        return $this;
    }
    
    public function remove_recipient( $recipient_mail ) {
        if ( array_key_exists( $recipient_mail, $this->recipients ) )
            unset( $this->recipients[ $recipient_mail ] );
    }
    
    /**
     * Returns true or false depending on wether the mail
     * was successful sent.
     * @return boolean
     */
    public function was_successful() {
        return (bool) ( $this->mail_response );
    }
    
    /**
     * Can store the mail information in the database table.
     * 
     * @access public
     * @return \Pronamic_Mail
     */
    public function store_mail( $value ) {
        $this->store_mail = $value;
        return $this;
    }
    
    /**
     * Sets the content type for this mail.
     * 
     * @since 0.0.1
     * 
     * @access public
     * @param string $type
     * @return \Pronamic_Mail
     */
    public function set_content_type( $type ) {
        $this->content_type = $type;
        return $this;
    }
    
    /**
     * Returns the content type for this mail.
     * 
     * @since 0.0.1
     * 
     * @access public
     * @return string
     */
    public function get_content_type() {
        return $this->content_type;
    }
    
    /**
     * Adds a custom header to the headers entry to be used
     * in all mails sent with this instance.
     * 
     * @since 0.0.1
     * 
     * @access public
     * @param string $header_entry
     * @return int ( Key of entry )
     */
    public function add_header( $header_entry ) {
        $this->headers[] = $header_entry;
        return array_search( $header_entry, $this->headers );
    }
    
    /**
     * Removes an entry of the header. Can be passed either
     * the array key or the actual value.
     * 
     * Will search the array for either.
     * 
     * @since 0.0.1
     * 
     * @access public
     * @param int OR string $header_entry_key
     */
    public function remove_header( $header_entry_key ) {
        // A array key has been passed
        if ( is_numeric( $header_entry_key ) ) {
            
            if ( array_key_exists( $header_entry_key ) )
                unset( $this->headers[ $key ] );
            
        } else {
            $key = array_search ( $header_entry_key, $this->headers );
            
            if ( $key )
                unset( $this->headers[ $key ] );
        }
    }
    
}