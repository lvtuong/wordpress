<?php
/**
 * @package Hello
 * @version 1.0
 */
/**
 * Plugin Name: Fr Hello
 * Plugin URL: http://wordpress.org/plugins/fr-hello/
 * Author: Lam Tuong
 * Version: 1.0
 * Author URI: http://hello.com
 */
register_activation_hook(__FILE__, 'fr_hello_active');
function fr_hello_active()
{
//    $fr_hello_version = 1.0;
//    add_option('_fr_hello_version', $fr_hello_version, '', 'yes');
    global $wpdb;
    $table_name = $wpdb->prefix . 'fr_hello_hello';

    if ($wpdb->get_var("SHOW TABLES LIKE '" . $table_name . "'") != $table_name) {
        $sql = "CREATE TABLE `" . $table_name . "` (`id` INT NULL AUTO_INCREMENT ,
                                                    `name` VARCHAR(50) NOT NULL,
                                                     PRIMARY KEY (`id`)) 
                                                     ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_general_ci";
        require_once ABSPATH .'wp-admin/includes/upgrade.php';
        dbDelta($sql);
    }

}

register_deactivation_hook(__FILE__, 'fr_hello_deactive');
function fr_hello_deactive()
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'options';
    $wpdb->update(
        $table_name,
        array('autoload' => 'no'),
        array('option_name' => '_fr_hello_version'),
        array('$s'),
        array('$s')
    );
}

register_deactivation_hook(__FILE__, 'fr_hello_uninstall');
function fr_hello_uninstall()
{
    global $wpdb;
    delete_option('_fr_hello_version');
    $table_name = $wpdb->prefix . 'fr_';
}