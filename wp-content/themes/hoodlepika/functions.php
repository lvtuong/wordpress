<?php
/**
 * @ khai bao hang gia tri
 * @ THEME_URL = lay duong dan thu muc them
 * @ CORE = lay duong dan thu muc core
 */
define('THEME_URL', get_stylesheet_directory());
define('CORE', THEME_URL . "/core");

/**
 * @ nhung file init.php
 */
require_once(CORE . "/init.php");

/**
 * thiet lap chieu rong noi dung
 */
if (!isset($content_with)) {
    $content_with = 620;
}

/**
 * khai bao chuc nang khac cua theme
 *
 */

if (!function_exists('pika_theme_setup')) {
    function pika_theme_setup()
    {
        /** thiet lap domain*/
        $language_folder = THEME_URL . "/language";
        load_theme_textdomain('pika', $language_folder);

        /**tu dong them link RSS len <head>**/
        add_theme_support('automatic-feed-links');

        /** them post thumbnail */
        add_theme_support('post-thumbnails');

        /** tao ra them kieu post can hien thi kieu gi <hinh anh,linl,audio...> */
        add_theme_support('post-formats', array(
            'image',
            'video',
            'gallery',
            'link'
        ));
        /** tu dong them the title vao <head> */
        add_theme_support('title-tag');
        /** them custom background */
        $default_background = array(
            'default-color' => '#e8e8e8'
        );
        add_theme_support('custom-background', $default_background);

        /** them menu */
        register_nav_menu('primary-menu', __('Primary Menu'), 'pika');

        /** tao sidebar */
        $sidebar = array(
            'name' => __('Main sidebar', 'pike'),
            'id' => 'main-sidebar',
            'description' => __('Default sidebar'),
            'class' => 'main-sidebar',
            'after_title' => '</h3>'
        );
        register_sidebar($sidebar);
    }

    /**thuc thi tu dong bang hook init. ap dung moi khi web tai lai trang */
    add_action('init', 'pika_theme_setup');
}
/** TEmLATE-FUNCTION pika_header */
if (!function_exists('pika_header')) {
    function pika_header()
    { ?>
        <div class="site-name">
            <?php
            if (is_home()) {
                printf('<h1><a href="%1$s" title="%2$s">%3$s</a></h1>',
                    get_bloginfo('url'),
                    get_bloginfo('description'),
                    get_bloginfo('sitename'));
            } else {
                printf('<p><a href="%1$s" title="%2$s">%3$s</a></p>',
                    get_bloginfo('url'),
                    get_bloginfo('description'),
                    get_bloginfo('sitename'));
            }
            ?>
        </div>
        <div class="site-description"><?php bloginfo('description') ?></div>


        <?php
    }
}

/** shortcode */

add_shortcode('bartag', 'wpdocs_bartag_func');
function wpdocs_bartag_func($atts)
{
    $atts = shortcode_atts(array(
        'foo' => 'no foo',
        'baz' => 'default baz'
    ), $atts, 'bartag');
    return "baz = {$atts['baz']}";
}

/** sap xep ngau nhien post va tick vao bai post nao  bai hien thi post day */
add_shortcode('view_post', 'view_post');
function view_post()
{
    $args = array(
        'post_type' => 'post',
        'orderby' => 'rand',
        'posts_per_page' => 5,
    );
    $the_query = new WP_Query($args);
    $string = '';
    if ($the_query->have_posts()) {
        $string .= '<ul>';
        while ($the_query->have_posts()) {
            $the_query->the_post();
            $string .= '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
        }
        $string .= '</ul>';
        wp_reset_postdata();
    } else {
        $string .= 'no posts found';
    }
    return $string;
}



//add_post_meta(42, 'total_view', 60 );

//global $wpdb;
//$kq = $wpdb->get_results("Select meta_value FROM $wpdb->postmeta Where post_id = 42 AND meta_key = 'total_view'");
//foreach ($kq as $kqarr) {
//    print_r(" " . $kqarr->meta_value);
//}