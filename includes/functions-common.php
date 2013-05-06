<?php

function wp_pronamic_mail_builder_url() {
    return add_query_arg( array(
        'page' => 'pronamic-mailer',
        'xml_template' => filter_input( INPUT_GET, 'xml_template', FILTER_SANITIZE_STRING ),
        'query_string' => filter_input( INPUT_GET, 'query_string', FILTER_SANITIZE_STRING )
    ), admin_url( 'admin.php' ) );
}

function wp_pronamic_mailer_get_mail_template( $file, $arguments = array() ) {
    extract( $arguments );
    include( WP_PRONAMIC_MAILER_DIR . "/templates/mail_templates/{$file}.php" );
}

function wp_pronamic_mailer_get_shared_header() {
    include( WP_PRONAMIC_MAILER_DIR . '/templates/mail_shared/email-header.php' );
}

function wp_pronamic_mailer_get_shared_footer() {
    include( WP_PRONAMIC_MAILER_DIR . '/templates/mail_shared/email-footer.php' );
}

function wp_pronamic_mailer_iframe_mail_example() {
    echo '<iframe src="' . add_query_arg( array( 'xml_template' => $_GET['xml_template'], 'iframe_view' => true ), admin_url() ) . '" width="100%" height="100%"></iframe>';
}