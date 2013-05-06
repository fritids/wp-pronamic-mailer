<?php

class Pronamic_Mail {
    
    private $id;
    
    private $content_type;
    
    private $headers = array();
    
    private $to;
    
    /**
     * Holds the Pronamic_Mail_View class chosen
     * for this mail.
     * 
     * @var \Pronamic_Mail_View
     */
    private $view;
    
    private $sent = false;
    
    public function __construct() {
        
    }
    
    public function send() {
        // Require a view to be set, before preparing
        if ( empty( $this->view ) )
            return false;
        
        $this->view->prepare( $id );
    }
    
    /**
     * The associated post/page/whatever ID for this mail.
     * 
     * Will be used to get the settings that will make the values
     * of the replacement needles in the view
     * 
     * @since 0.0.1
     * 
     * @access public
     * @param int $id
     * @return \Pronamic_Mail
     */
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
    public function set_to( $to ) {
        $this->to = $to;
        return $this;
    }
    
    /**
     * Sets the mail view for this mail.  Will use 
     * the linked xml config to the view, to get
     * all the replacement needles and location for 
     * values
     * 
     * @since 0.0.1
     * 
     * @access public
     * @param Pronamic_Mail_View $view
     * @return \Pronamic_Mail
     */
    public function set_view( Pronamic_Mail_View $view ) {
        $this->view = $view;
        return $this;
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