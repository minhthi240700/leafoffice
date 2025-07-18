<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'leafoffice' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '58/^j9`tr!L9F97I50H`l3-_Z w L2ZrZuFuaKJAy}L6<mEAFzR3PQmYn]l/G~]t' );
define( 'SECURE_AUTH_KEY',  'mGsI>guJi7~:$14<XDT33*fc_R*(0-K,Jb)Dsenu40M7[q^SK3|_;f`y{e3ubfh<' );
define( 'LOGGED_IN_KEY',    'iUw5/1@,,be1v}Z>NWUQ[_aYJ6#*lm]N<cz!gF@6Q{C_jrrxi`QLh.(yeGi)w2}J' );
define( 'NONCE_KEY',        'ns!xD6Uu5I8Ex .eA29mKB4h*//u1LUrWQ,W$tz%4s*dr6IUZyiw_hH5uCQAxD@B' );
define( 'AUTH_SALT',        'kR)G%Ra`()45#+<AFO@g)CUw]47L[g.#i8L|sUU<klX89w+OP+1mVT o|K9VOKjw' );
define( 'SECURE_AUTH_SALT', 'A Rv#59s+|6bYi)3@VU<v9XbEj=-zTNn6:mRd7*akS&@CIEwJIz2PJvj>1w3*~DF' );
define( 'LOGGED_IN_SALT',   '_,>6k;:I9&wfM%6R?a(WrNN>Q@5o@ixtZOs3XwaOhksx55oflh5K!(bvMp_:<X[D' );
define( 'NONCE_SALT',       'SIbZpiplVR$zps3C@&:w9Q[?AuyqOZs![ZB%bm5vqu,Ot~tGhCWbHJo-$`9+6oMM' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', false );
define( 'WP_DEBUG_LOG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
