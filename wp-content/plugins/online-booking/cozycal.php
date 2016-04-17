<?php
/**
 * Plugin Name: Online Booking and Appointment Scheduling by CozyCal
 * Plugin URI: https://cozycal.com
 * Description: This plugin adds CozyCal's online booking widget to your website.
 * Version: 1.1.0
 * Author: Chris Tan
 * Author URI: https://csytan.com
 * License: GPL2
 */


register_deactivation_hook(__FILE__, 'cozycal_remove');
add_action('admin_init', 'cozycal_admin_settings');
add_action('admin_menu', 'cozycal_admin_menu');
add_action('admin_enqueue_scripts', 'cozycal_admin_notice');
add_action('wp_footer', 'cozycal_embed_code');
add_shortcode('cozycal_button', 'cozycal_button_code');


function cozycal_remove() {
    // Remove database entries
    delete_option('cozycal_installed');
    delete_option('cozycal_page_id');
    delete_option('cozycal_widget_enabled');
}


function cozycal_admin_settings() {
    // Creates database entries
    add_option('cozycal_installed');
    add_option('cozycal_page_id');
    add_option('cozycal_widget_enabled', 1);
    
    // For form use
    register_setting('cozycal', 'cozycal_installed');
    register_setting('cozycal', 'cozycal_page_id');
    register_setting('cozycal', 'cozycal_widget_enabled');
}


function cozycal_admin_menu() {
    add_menu_page(
        'Online Booking by CozyCal', // Page title
        'Online Booking by CozyCal', // Menu title
        'administrator', // Capability
        'online-booking', // Menu slug
        'cozycal_admin_page', // Callback
        'dashicons-calendar-alt', // icon url
        null // position
    );
}


function cozycal_admin_notice($hook_suffix) {
    // Show menu notification on install
    if (strpos($hook_suffix, 'online-booking') === false &&
        !get_option('cozycal_installed') &&
        !get_option('cozycal_page_id')) {
        add_action('admin_notices', 'cozycal_admin_notice_html');
    }
    
    function cozycal_admin_notice_html() {
        ?>
        <div class="updated notice" style="position:relative">
            <form method="post" action="options.php">
                <?php settings_fields('cozycal'); ?>
                <input type="hidden" name="cozycal_installed" value="1"/>
                <p>
                    Online Booking by CozyCal installed. 
                    &nbsp;&nbsp;
                    <a class="button button-primary" href="admin.php?page=online-booking">
                        Setup plugin
                    </a> 
                </p>
                <button type="submit" class="notice-dismiss">
                    <span class="screen-reader-text">Dismiss this notice.</span>
                </button>
            </form>
        </div>
        <?php
    }
}


function cozycal_admin_page() {
    ?>
    <script>
        jQuery(function($) {
            // Set redirection URLs
            $('.js-create-account')
                .attr('href', function() {
                    return this.href + '&wpredirect=' + 
                        encodeURIComponent(location.href);
                });
            
            $('.js-wordpress-setup')
                .attr('href', function() {
                    return this.href + encodeURIComponent(location.href);
                });
            
            // If there's a hash, the page id has been redirected back
            if (location.hash) {
                var page_id = location.hash.slice(1);
                $('input[name="cozycal_page_id"]')
                    .val(page_id)
                    .closest('form')
                    .submit();
            }
        });
    </script>
    
    <form method="POST" action="options.php" class="wrap">
        <?php settings_errors(); ?>
        <?php settings_fields('cozycal'); ?>
        <h2>Online Booking by CozyCal</h2>
        
        <div class="card">
            <h3>1. CozyCal Plugin Setup</h3>
                        
            <table class="form-table">
                <tr>
            		<th>
                        <label>Sign up for an account</label>
                    </th>
            		<td>
                        <a class="js-create-account button" 
                            href="https://cozycal.com/?ref=wordpress"
                            target="_blank">
                            Create an Account
                        </a>
                    </td>
            	</tr>
                
                <tr>
            		<th>
                        <label>
                            Next, set your CozyCal ID
                        </label>
                    </th>
            		<td>
                        <a class="js-wordpress-setup button button-secondary" 
                            href="https://cozycal.com/app/share/wordpress_setup/">
                            Set CozyCal ID
                        </a>                        
                    </td>
            	</tr>
                
                <tr>
                    <th>
                        <label>CozyCal ID</label>
                    </th>
                    <td>
                        <input name="cozycal_page_id" type="text"
                            class="regular-text"
                            style="width: 100%"
                            value="<?php echo get_option('cozycal_page_id'); ?>">
                    </td>
                </tr>
            </table>
                    
            <p>
                Need Help? 
                <a href="https://cozycal.com/help" target="_blank">Visit the FAQ</a> 
                or email us at 
                <a href="mailto:hello@cozycal.com">hello@cozycal.com</a>
            </p>
            <br>
            
            <p>
                <input class="button-primary" type="submit" value="<?php _e('Save Changes'); ?>" />
            </p>
        </div>


        <div class="card">
            <h3>2. Set up the Widget</h3>
            <table class="form-table">
                <tr>
                    <th>Widget</th>
                    <td>
                        <label>
                            <input name="cozycal_widget_enabled" 
                                type="checkbox" value="1" 
                                <?php echo (get_option('cozycal_widget_enabled') == 1 ? 'checked' : '') ?>>
                            Enable booking widget
                        </label>
                        <br><br>
                        <p class="description">
                            The widget shows up on every page of your site. 
                            Use the short code to enable booking for specific pages.
                        </p>
                    </td>
                </tr>
                <tr>
                    <th>Widget styling</th>
                    <td>
                        <a class="button"
                            href="https://cozycal.com/app/share/website"
                            target="_blank">
                            Edit my widget
                        </a>
                    </td>
                </tr>
            </table>
            <p class="submit">
                <input class="button-primary" type="submit" value="<?php _e('Save Changes'); ?>" />
            </p>
        </div>


        <div class="card">
            <h3>3. Use the Short code</h3>
            <table class="form-table">
                <tr>
                    <th>Short code</th>
                    <td>
                        To create a button that opens a booking modal use
                        <code>[cozycal_button]</code>
                    </td>
                </tr>
                <tr>
                    <th>Short code (title)</th>
                    <td>
                        Button with a custom title<br>
                        <code>[cozycal_button title="Schedule with me"]</code>
                    </td>
                </tr>
                <tr>
                    <th>Short code (class)</th>
                    <td>
                        Button with a custom CSS class<br>
                        <code>[cozycal_button class="my_class_name"]</code>
                    </td>
                </tr>
            </table>
        </div>
    </form>
    <?php
}


function cozycal_embed_code() {
    // http://scribu.net/wordpress/optimal-script-loading.html
    global $cozycal_shortcode_used;
    $page_id = get_option('cozycal_page_id');
    $widget_enabled = get_option('cozycal_widget_enabled');
    
    if (empty($page_id)) return;
    if ($widget_enabled || $cozycal_shortcode_used) {
        echo '<script class="cozycal_embed" async="async" ' 
            . ($widget_enabled ? 'data-widget="1" ' : '')
            . 'src="https://cozycal.com/' 
            . $page_id . '/embed.js"></script>';
    }
}


function cozycal_button_code($atts) {
    global $cozycal_shortcode_used;
	$cozycal_shortcode_used = true;
    
    $a = shortcode_atts(array(
        'class' => 'cozycal_button',
        'title' => 'Schedule an Appointment'
    ), $atts);
    $page_id = get_option('cozycal_page_id');
    return '<a href="https://cozycal.com/' . $page_id . 
        '" class="js-cozycal-modal ' . $a['class'] . '">'
        . $a['title']
        . '</a>';
}


?>
