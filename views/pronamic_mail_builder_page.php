<div class="wrap">
    <?php screen_icon(); ?>
    <h2 class="nav-tab-wrapper">
        <a href="" class="nav-tab nav-tab-active"><?php echo get_admin_page_title(); ?></a>
    </h2>
    <br/>
    <div class="pronamic-mail-builder-holder">
        
        <div class="pronamic-mail-builder-preview-holder">
            <div class="pronamic-mail-builder-target-panel">
                <form action="<?php echo wp_pronamic_mail_builder_url() ;?>" method="GET">
                    <input type="hidden" name="page" value="pronamic-mailer"/>
                    <label><?php _e( 'Example Query String', 'wp-pronamic-mailer' ); ?></label>
                    <input type="text" name="query_string" value=""/>
                    <button class="button" type="submit"><?php _e( 'Load', 'wp-pronamic-mailer' ); ?></button>
                </form>
            </div>
            <div class="pronamic-mail-builder-preview jMailPreview">
                <?php if ( ! empty( $example_content ) ) : ?>
                    <?php echo $example_content; ?>
                <?php endif; ?>
            </div>
        </div>
        
        <div class="pronamic-mail-builder-controls-holder">
            <h3><?php _e( 'Mail Template Settings', 'wp-pronamic-mailer' ); ?></h3>
            <div class="pronamic-mail-template-loader">
                <label><?php _e( 'Load or Make Template', 'wp-pronamic-mailer' ); ?></label>
                <p>
                <form action="<?php echo wp_pronamic_mail_builder_url(); ?>" method="GET">
                    <input type="hidden" name="page" value="pronamic-mailer"/>
                    <select name="xml_template" class="jXMLTemplate">
                        <?php foreach ( $xml_templates as $xml_template ) : ?>
                            <option value="<?php echo $xml_template; ?>"><?php echo $xml_template; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <button class="button button-primary"><?php _e( 'Load', 'wp-pronamic-mailer' ); ?></button>
                </form>
                </p>
            </div>
            <div class="pronamic-mail-template-replacements">
                <form action="" method="POST">
                    <table class="widefat">
                        <thead>
                            <tr>
                                <th><?php _e( 'Location', 'wp-pronamic-mailer' ); ?></th>
                                <th><?php _e( 'Needle', 'wp-pronamic-mailer' ); ?></th>
                                <th><?php _e( 'Value', 'wp-pronamic-mailer' ); ?></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <select name="replacement[1][location]">
                                        <?php foreach ( array( '', 'special', 'user_meta', 'post_meta', 'options' ) as $location ) : ?>
                                        <option value="<?php echo $location; ?>"><?php echo $location; ?></option>
                                        <?php endforeach ;?>
                                    </select>
                                </td>
                                <td><input type="text" name="replacement[1][needle]" value=""></td>
                                <td><input type="text" name="replacement[1][value]" value=""/></td>
                                <td><a href="#" class="jAddReplacement button" data-id="2">+</a></td>
                            </tr>
                        </tbody>
                    </table>
                    <br/>
                    <input type="submit" class="button button-primary" value="<?php _e( 'Save' ); ?>"/>
                </form>
            </div>
        </div>
    </div>
</div>