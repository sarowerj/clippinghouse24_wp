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
define('DB_NAME', 'wp_test');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         'H<&O[1IW^W<mU3{!Lyt~+B3Y%Z*$]?GZ0xwsU5 [So#[@z)Yy`A`;i9.*K0q2<Cz');
define('SECURE_AUTH_KEY',  'woXfyLc1nXUXi>EA*A/T~4;6xRIfA,1Jm.Q*B;<=vB|ot&mYHS=H|&dNKwYVKZvW');
define('LOGGED_IN_KEY',    'S9q!E$A|vMK[031#U%c-kZK}DvaO3)&^8^SS$<?37tH~i%t.MhS[=#jN(/kWGRZ/');
define('NONCE_KEY',        '*!Z~[e@!Z4psG%BSg$pN_Homn(z7C;{=mz,k`-4?%AF/27{rP#y_.=5 ~icc?:es');
define('AUTH_SALT',        'Q.d6P<CIIFl*+d#cf /!dQOW7GBTstt*oU<%Q)Hj)Q1 SNPh&a%|u6]Sr(~r!b*D');
define('SECURE_AUTH_SALT', 'yCjV*pc1xd0K(qJtJ_(}]| 1rsUep6T-rdhd,)GkTeUCcA0Eo%[-NX6aUVdc`iM]');
define('LOGGED_IN_SALT',   'F%c34-PqUL:3 -.8z_LzZ]8_O@9:,O6+Le6I].[Ag:ee>;sTLxxxqst?45aag%Y>');
define('NONCE_SALT',       'cK;]2l wl_gXI@E(-!wq$Fz}EC5(S6%@L!z9|*kZ&HD2rF+YlU|/Hp}GO_@<VdZ@');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
define('WP_DEBUG', false);

define( 'WP_ALLOW_MULTISITE', true );

define('MULTISITE', true);
define('SUBDOMAIN_INSTALL', false);
define('DOMAIN_CURRENT_SITE', 'www.mymasjid.io');
define('PATH_CURRENT_SITE', '/');
define('SITE_ID_CURRENT_SITE', 1);
define('BLOG_ID_CURRENT_SITE', 1);

define('MULTISITE', true);
define('SUBDOMAIN_INSTALL', false);
define('DOMAIN_CURRENT_SITE', 'localhost');
define('PATH_CURRENT_SITE', '/wordpress/');
define('SITE_ID_CURRENT_SITE', 1);
define('BLOG_ID_CURRENT_SITE', 1);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
