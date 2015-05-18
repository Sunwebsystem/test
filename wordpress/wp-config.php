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
define('DB_NAME', 'phone');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         '}u-58Yt(`zX4^w)^x?<9uHhhwrwD7@[g4ySPI9-hsofQH;MrzISGJs{EV@^|s/</');
define('SECURE_AUTH_KEY',  '(&AHv:6Dbn:-:.V%RxuW/mq]S?2|{{D>&VH*HO``(p&24#-|Wz4!5CoIs,sZ$tdu');
define('LOGGED_IN_KEY',    'ubpmuo$?Yfm}:z3=T8&C?vsLnITpxpi >X@Pk_Tk sCT0bCr41;a]^C,RtV>Eq-t');
define('NONCE_KEY',        'o0BtAaa<zer~!*s*uQ3t9XfKST_m{aeB5Qida|$X|&C}0LV5)jjB8GB)QU`2%{GC');
define('AUTH_SALT',        'g(}JLpu<!1FEqUAT8;BN<%@u_A[pdiH6*;z=|`p*4AN%/wm!1k3_2Ht?5DW#Z7Q?');
define('SECURE_AUTH_SALT', 'AR3}}cb)_+0z%TXHh3a!CITo:W)xy|nft35h~dYso:(K@b>0PG~!=VE9+UD31aj+');
define('LOGGED_IN_SALT',   'bHHf|f8ai:#r%y6^B)!s#q=Ewx|}I#9mS0,4a0&jKy72Z58vScY5 W9k]gu-FqEd');
define('NONCE_SALT',       'p04id1<:]%TUpL,rJH/x>i|<n!,qf(Yls]txWkFkKT5`cNPp6(mt:a83lbLZz]cG');

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
