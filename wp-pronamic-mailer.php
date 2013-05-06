<?php
/*
  Plugin Name: WP Pronamic Mailer
  Plugin URI: http://pronamic.nl
  Description: Pronamic Mailing System. With bridges between Orbis Plugins
  Version: 1.0.0
  Author: Pronamic
  Author URI: http://pronamic.nl
  License: GPLv2
 */

/*
  Copyright (C) 2013 Leon

  This program is free software; you can redistribute it and/or
  modify it under the terms of the GNU General Public License
  as published by the Free Software Foundation; either version 2
  of the License, or (at your option) any later version.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program; if not, write to the Free Software
  Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
 */


if ( ! class_exists( 'WP_Pronamic_Mailer' ) ) :

    define( 'WP_PRONAMIC_MAILER_DIR', dirname( __FILE__ ) );
    
    
    class WP_Pronamic_Mailer
    {

        public function __construct() {
            add_action( 'init', array( $this, 'init' ) );
            
            add_action( 'admin_menu', array( $this, 'menu_items' ) );
            add_action( 'admin_enqueue_scripts', array( $this, 'admin_scripts' ) );
            
            spl_autoload_register( array( $this, 'autoload' ) );
        }

        public function autoload( $class_name ) {
            $class_name = strtolower( $class_name );
            $class_name = str_replace( array( '_' ), '-', $class_name );

            $class_file = dirname( __FILE__ ) . '/classes/class-' . $class_name . '.php';

            if ( file_exists( $class_file ) )
                include_once( $class_file );
        }

        public function init() {
            
        }

        public function menu_items() {
            
            add_menu_page( 
                __( 'Pronamic Mail Builder', 'wp-pronamic-mailer'), 
                __( 'Pronamic Mailer Builder', 'wp-pronamic-mailer' ), 
                'manage_options', 
                'pronamic-mailer', 
                array( $this, 'pronamic_mail_builder_page' ) 
            );
        }
        
        public function admin_scripts() {
            if ( 'pronamic-mailer' == filter_input( INPUT_GET, 'page', FILTER_SANITIZE_STRING ) ) {
                wp_register_style( 'wp_pronamic_mailer_css', plugins_url( 'assets/wp_pronamic_mailer.css', __FILE__ ) );
                wp_enqueue_style( 'wp_pronamic_mailer_css' );
            }
        }
        
        public function pronamic_mail_builder_page() {
            
            $xml_templates = Pronamic_Mail_Template_Factory::get_all_xml_templates();
            
            include( dirname( __FILE__ ) . '/views/pronamic_mail_builder_page.php' );
            
        }

    }
    
    
    global $wp_pronamic_mailer;
    $wp_pronamic_mailer = new WP_Pronamic_Mailer();
    
endif;