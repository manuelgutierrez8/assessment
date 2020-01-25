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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'assessment' );

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
define( 'AUTH_KEY',         'oEjicnY2CXpy;V{)AO)>t>ADsI3cjMfNVy-2i1zuVk)o36DV#fm3L&Q~o}K4qIu ' );
define( 'SECURE_AUTH_KEY',  '#*Y81_qdzc;QQ$yo]3S)b@_dK;iv|5@OhOZ?<EItcr?u-!.&El;%B>8X^j@z6.k,' );
define( 'LOGGED_IN_KEY',    'SXMnRQyH|=k/9qq0>/.*wVpSl[]~`+Gu1q:H?i^A:zW%|7fWk6E?MVi-6s2``c9N' );
define( 'NONCE_KEY',        '*_HWl|_lieHXZNd[#|P/Aa=eWYt3~?9*fC Wg!3>YR88JWjlpbxh{[}-NF$ZWJ%M' );
define( 'AUTH_SALT',        'mZtWu7!a>!>GM|[uVNp)vUkD$YapAs{[we/FMi!.c5bL~>dUe8&P;!m,Jb$t6uO0' );
define( 'SECURE_AUTH_SALT', '{5-tbq[te-zT#Qxb-LHh&uGW+l~u:Z7s~fOeK1:)1Ib@]%9>)Fu`JU&&tK~1h(su' );
define( 'LOGGED_IN_SALT',   '[t:yJPqbzi.%QTD7P^>PNg(x(z7}X-h%<_;c9sACTbjo5Ij666asUA*sj0,BIl+g' );
define( 'NONCE_SALT',       '2LA_v$Dy&h6gOIYsJ?6KI[:c@49JVL=$pe(#}?os_%h;Cor:b&,T)JcS5vVXr)oB' );

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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
