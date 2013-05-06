<?php

function wp_pronamic_mail_builder_url() {
    return add_query_arg( array(
        'page' => 'pronamic-mailer',
        'xml_template' => filter_input( INPUT_GET, 'xml_template', FILTER_SANITIZE_STRING ),
        'query_string' => filter_input( INPUT_GET, 'query_string', FILTER_SANITIZE_STRING )
    ), admin_url( 'admin.php' ) );
}