<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'APIsimple' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'tuong@123A' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
/**
*define( 'AUTH_KEY',         'put your unique phrase here' );
*define( 'SECURE_AUTH_KEY',  'put your unique phrase here' );
*define( 'LOGGED_IN_KEY',    'put your unique phrase here' );
*define( 'NONCE_KEY',        'put your unique phrase here' );
*define( 'AUTH_SALT',        'put your unique phrase here' );
*define( 'SECURE_AUTH_SALT', 'put your unique phrase here' );
*define( 'LOGGED_IN_SALT',   'put your unique phrase here' );
*define( 'NONCE_SALT',       'put your unique phrase here' );
 */

define('AUTH_KEY',         'Xs<s@DZfQwY(O3RY3t:jdAkCiA/j}EtZyaD[fB8PSYbdQ@QkLc8b6}||3qYx rh|');
define('SECURE_AUTH_KEY',  '[vs]Z?58S|(#I *RUo2!t3b;^l{^C&/-K`* >BXC+/)vN>ZaSCI9MYUK)4?#Y$mu');
define('LOGGED_IN_KEY',    'n)G`!:~T?U]zygdiZ>W+-+2N??XkM-$OSE@G=L;U.jO^aRob^yD+=Bb Jth}NQsv');
define('NONCE_KEY',        'yVI/H0t6]]R+>=G+9-ZyK~]R_FnJSuZGW$3WrI}|hX>i:[Aw)8|QP0,-n|.-TY]Y');
define('AUTH_SALT',        ';Tw-E=9:y6/CL&~WIcx]t?>Qe&GV43R)QD-CG~eiZR%`G3<e::[)63Z+zlS}2>/D');
define('SECURE_AUTH_SALT', 'dU-|qBngrw}Rhfe38t(2IBW(Q_nu7-0{dD*A)FEb-=,O%j*8m!z?-]cgZ(j|HLw#');
define('LOGGED_IN_SALT',   'RVw9zMm+(W({(t-m)|U0mDT)(_rQ@/}a^Kp46d=MTDq.+i[XDoRYmHWcD7kim51*');
define('NONCE_SALT',       '*Ik9aI}+WMZORyl1LWLyEX/~2D+^bWioM*/Ea2ql)9`KAwI~m1xCyocjs;R#cGb.');


/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', true );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
