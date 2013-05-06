<?php

// Make a new mail
$mail = new Pronamic_Mail();
$mail->set_content_type( 'text/html' );

// Load the Mail XML Template
$template = new Pronamic_XML_Template();
$template->load( 'ftp' );

// Get the view
$view = new Pronamic_Mail_View( $template );

// Set the view to this mail
$mail->set_view( $view );

// Loop through recipients
$recipients = array( 'johnsmith@smiths.com' => 'John Smith' );
foreach ( $recipients as $recipient_mail => $recipient_name ) {
    // ID from looping through a post
    $id = 10;
    $mail->set_id( $id );
    
    // Set the to for this mail
    $mail->set_to( array( $recipient_mail => $recipient_name ) );
    
    // Attempt to send
    if ( $mail->send() ) {
        // sent
    }
    
}

