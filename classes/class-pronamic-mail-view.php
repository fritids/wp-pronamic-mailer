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
        
        $raw_mail_content = $this->get_content();
        
        // Replace all the content with the XML templates replacements
        $this->content = str_replace( 
            $this->template->get_replacement_needles(), 
            $this->template->get_replacements(), 
            $raw_mail_content 
        );
    }
    
    public function get_subject() {
        $subject = $this->template->get_mail_subject();
        
        return $subject;
    }
    
    public function get_content() {
        // Get the chosen mail template
        $mail_template = $this->template->get_mail_template();
        
        // Start the buffer
        ob_start();
        
        // Load the mail template
        wp_pronamic_mailer_get_mail_template( $mail_template );
        
        // Return the contents
        return ob_get_clean();
    }
}