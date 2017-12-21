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
define('DB_NAME', 'demowp_myboss');


/** MySQL database username */
define('DB_USER', 'root');


/** MySQL database password */
define('DB_PASSWORD', '1');


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
define('AUTH_KEY',         '$igFIt_U|`k.Xa6+IK!Kwh+!;8Tzy3g@Bflh`rXVNe4OaJeMBLK_1V[5}%46]$=B');

define('SECURE_AUTH_KEY',  'T t3$ G{%Z`&aD9v1Ar./bX|Tm-0-lg+-, H }`~]~a0ff7!-w8Hn6JOq:Hlo)[K');

define('LOGGED_IN_KEY',    '{/-Iq9?:fR8(kXEL+b;.xa9yh1_|ro9Nws~pV%Vi[;PlNn9X$~nc1|tD3[DayXi+');

define('NONCE_KEY',        'lU(p%+,-1]s+z5*L|pG3fK`g^^&3U@<asD<xS$Ixg)qS[/*~yI>v`gp@{,I+b$P&');

define('AUTH_SALT',        ')m3rO^|68WPooGCP&@(?[7B[.}Yhp+q-xGJN=0<e|51Dve0{7SCWDsks}/yw5=#j');

define('SECURE_AUTH_SALT', 'B%R2u|q n|+Nd[o].|]}3h#q)4D)BT_R& nsJgptjKP@47M>FBcUxFI%+26{cf_m');

define('LOGGED_IN_SALT',   'Eg^>@T-D=u7;rK+5vHVts_jC&z{+`Z@2F<WS*1GSnX]p$FtVI hu&+`Pq;w)ee6|');

define('NONCE_SALT',       ')eyIS|9zw$={C1^@[_m2AQ|pmZW=B,?l<w=#P#R)9nU,tZ=Ay:4P$t|j3]fQhXbg');

define("WP_HOME", "http://localhost/demowp/myboss/");

define("WP_SITEURL", "http://localhost/demowp/myboss/");

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
define('WPLANG', '');

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
