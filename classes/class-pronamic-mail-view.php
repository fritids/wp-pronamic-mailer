<?php

class Pronamic_Mail_View {
    
    private $template;
    
    private $subject;
    
    private $content;
    
    public function __construct( Pronamic_XML_Template $template ) {
        $this->template = $template;
    }
    
    public function prepare( $id ) {
        
        // Get the chosen mail view template
        $mail = $this->template->get_mail_template();
        
        // Get the subject
        $raw_subject = $this->template->get_subject();
        
        // Replace all the subject with the XML templates replacements
        $this->subject = str_replace(
            $this->template->get_replacement_needles(),
            $this->template->get_replacements(),
            $raw_subject
        );
        
        // Start the buffer
        ob_start();
        
        // Load the mail view from the XML Template
        wp_pronamic_mailer_get_mail_template( $mail );
        
        // Get the raw content from the buffer
        $raw_mail_content = ob_get_clean();
        
        // Replace all the content with the XML templates replacements
        $this->content = str_replace( 
            $this->template->get_replacement_needles(), 
            $this->template->get_replacements(), 
            $raw_mail_content 
        );
    }
    
    public function get_subject() {
        return $this->subject;
    }
    
    public function get_content() {
        return $this->content;
    }

    
}