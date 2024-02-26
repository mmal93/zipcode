<?php

// BEGIN iThemes Security - Do not modify or remove this line
// iThemes Security Config Details: 2
define( 'DISALLOW_FILE_EDIT', true ); // Disable File Editor - Security > Settings > WordPress Tweaks > File Editor
// END iThemes Security - Do not modify or remove this line

define( 'WP_CACHE', true ); // Added by WP Rocket

/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'sjexprrnud');
/** MySQL database username */
define('DB_USER', 'sjexprrnud');
/** MySQL database password */
define('DB_PASSWORD', 'Wmu7eCkVMG');
/** MySQL hostname */
define('DB_HOST', 'localhost');
/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');
/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

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
define( 'AUTH_KEY',         'uXf3q!Y9(CeatQI4a,W}8Ft&Ze(iGx`l%:>eW3]tV{F++ZL&IAS;~s*HuRo5$|j>' );
define( 'SECURE_AUTH_KEY',  '9.3i81t|Q>LP-,F|d1pH3!EamGg&XG<:2mkmM5=w#p6e>;A;kw.zgPq/#*xMR6BN' );
define( 'LOGGED_IN_KEY',    'Fwxh(a}FaFY,W1laZpK=1%4Il@Q[H(X(Vv/QYI9;B!5aAx4+puKwiMOWa jk0ciF' );
define( 'NONCE_KEY',        'sW(`/9FY,tci?iC~[O](^G)ShFo.%slL<3rIM])Rb/)mKzeX3w;%S}|->N{C>~pf' );
define( 'AUTH_SALT',        'w)A4c`mV]TZFcgvy@<3JJRbPiu;~Q+0P]r|U2Mu:lz+ThC#g$x(:tX<)+4XkmZh)' );
define( 'SECURE_AUTH_SALT', 'fO1SK$xB4~$zU2E,l|RBS!u>P}7l8+8)`~J2YdjJVXjui3v~8wjCZeli0ns.}B?]' );
define( 'LOGGED_IN_SALT',   '6VT. +I2`%!deF/`-rf4Y?j|M%%9|cu^t3/a|gs}cenX_fB% H&&!09YKou ]=[*' );
define( 'NONCE_SALT',       'mf]VmJS |OAfp){Pi;`P07:|diX5EAFTX:FMkj@]w6K6xaU*(}0jSkt]L!-/}::(' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'p6cs';

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
// Enable WP_DEBUG mode
define( 'WP_DEBUG', true );

// Enable Debug logging to the /wp-content/debug.log file
define( 'WP_DEBUG_LOG', true );

// Disable display of errors and warnings
define( 'WP_DEBUG_DISPLAY', true );
@ini_set( 'display_errors', 1 );

// Use dev versions of core JS and CSS files (only needed if you are modifying these core files)
define( 'SCRIPT_DEBUG', true );

/* Add any custom values between this line and the "stop editing" line. */

define('FS_METHOD', 'direct');

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
