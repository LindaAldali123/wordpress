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
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         'Hr{~OMwW@i>+Pdc1;y~ vnUS]s}<A).oqZ!YxgxVSlM7R6gb<OV(#g Z23o_!eAx' );
define( 'SECURE_AUTH_KEY',  '>o~OIi8jI?K 6!aVFH9W*q):0@FMo=UDg`RU7n|M<^iC8!:LvD%igXc,k+y`KHk1' );
define( 'LOGGED_IN_KEY',    'I^)8,u>iW$;W=GhI+c:L/sUM<$B%Uq<j+C%4S:9:;%8!BU3QyMX)x@^?C@a[)j0x' );
define( 'NONCE_KEY',        'b2O&-.84StF5uzz</0g5jVDNf>xvYBgv)@Iw @4zV6!oBi5!jxz@?W&`(0+]8~PQ' );
define( 'AUTH_SALT',        'x>Fsz+:QYD`P]a.&kJa)D1;Ur%2zg3G|MZw;8e5`-iGj+f-2BLq8c[}RfQkSojce' );
define( 'SECURE_AUTH_SALT', ' 0gTh^71va]o1p.,aTrWsHjy<sYbv/p$^RL}/.XcCj,_wQ&G*<}@N1uDv`L0X&^n' );
define( 'LOGGED_IN_SALT',   'EPxJV/*Mt|FZu4x_*XJRSqKZB:1^@Zt%x@Ik*upY!B.UV<3-WTI<oYYk`nZu6*OM' );
define( 'NONCE_SALT',       '}IV@)+35rUOx42721xv_0.`<J%J1:{@{`mN*pP&q>^vk4.OtCXZwDQa:jDrcf(0w' );

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
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
