<?php
/**
 * @package Hello
 * @version 1.0
 */
/**
 * Plugin Name: Fr Hello
 * Description: newbie-wordpress..loading 60%
 * Plugin URL: http://wordpress.org/plugins/fr-hello/
 * Author: Lam Tuong
 * Version: 1.0
 * Author URI: http://google.com
 */
register_activation_hook(__FILE__, 'fr_hello_active');
function fr_hello_active()
{

    $fr_hello_version = 1.0;
    add_option('_fr_hello_version', $fr_hello_version, '', 'yes');

    global $wpdb;
    $table_name = $wpdb->prefix . 'fr_hello_hello';

    if ($wpdb->get_var("SHOW TABLES LIKE '" . $table_name . "'") != $table_name) {
        $sql = "CREATE TABLE `" . $table_name . "` (`id` INT NULL AUTO_INCREMENT ,
                                                    `name` VARCHAR(50) NOT NULL,
                                                     PRIMARY KEY (`id`)) 
                                                     ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_general_ci";
        require_once ABSPATH . 'wp-admin/includes/upgrade.php';
        dbDelta($sql);
    } else {
        return update_option('_fr_hello_version', 1, 'yes');
    }

}

register_deactivation_hook(__FILE__, 'fr_hello_deactive');
function fr_hello_deactive()
{
    update_option('_fr_hello_version', 1, 'no');
}

register_uninstall_hook(__FILE__, 'fr_hello_uninstall');
function fr_hello_uninstall()
{
    global $wpdb;
    delete_option('_fr_hello_version');

    $table_name = $wpdb->prefix . 'fr_hello_hello';
    $sql = 'DROP TABLE EXISTS ' . $table_name;
    $wpdb->query($sql);
}


/** code plugin chuyển từ có dấu sang không dấu cho title  */
add_filter('the_title', 'stripUnicode');
function stripUnicode($str)
{

    if (!$str)

        return false;

    $unicode = array(

        'a' => 'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',

        'd' => 'đ',

        'e' => 'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',

        'i' => 'í|ì|ỉ|ĩ|ị',

        'o' => 'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',

        'u' => 'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',

        'y' => 'ý|ỳ|ỷ|ỹ|ỵ',

    );

    foreach ($unicode as $nonUnicode => $uni)

        $str = preg_replace("/($uni)/i", $nonUnicode, $str);

    return $str;

}


/** end plugin */

