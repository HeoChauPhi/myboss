<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'nhmybakk_test');


/** MySQL database username */
define('DB_USER', 'nhmybakk_test');


/** MySQL database password */
define('DB_PASSWORD', 'admin');


/** MySQL hostname */
define('DB_HOST', 'localhost');


/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         ':,r7kmfaze>0N:?lS~?*zQgR$x0-akx`X!AhIn(n]+DQL.*N,1O9G[W>miQH/rVj');

define('SECURE_AUTH_KEY',  'DJ;En~ar!dvQ((?h+?{(|[2g`[Kx9zdE)vw*+%3&ki}_-6FV-#c:RnwM3^0#<~,8');

define('LOGGED_IN_KEY',    'F8|d1WBi*>XsszJ8|-sk-IlpWM62p`e p$Ov2lmwYa?/9~6@B([H|cBz$+kNt-B-');

define('NONCE_KEY',        '^LWU6+mj7avIIb`wZ$``IoL;_.edh/)!e+IA)=2S+R.[yb)5]PJ-Ti=raX?GV_Hj');

define('AUTH_SALT',        'k^|5iFV|xw:w{Ij~FM)oPQJyUDj(C0[(t@b[z0DNM3-@OLHvO_6e:xS$DPL@QSqr');

define('SECURE_AUTH_SALT', 'QVmaiYUH+ax;d&$l^|z+V]@Pd_vw(&w?[2xc=4jBkb;!d#!Jm8fN_cA];,JR1>{q');

define('LOGGED_IN_SALT',   'Q_&_(-f9OE8#PM#[5+A(4zVw0N>}}VKY9QxK)7b.drtQ476zN&4cZT+wSei1=u]z');

define('NONCE_SALT',       '>u#(`7;DzX]j&wxmx~+P)TXK+fv?({~7WL:S%ew6)1HYh5vEKpD:Ov>S)b8Odeb&');


/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';


/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', 'vi');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
