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
define('DB_NAME', 'clipping_house24');

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
define('AUTH_KEY',         '>CUk05Tc$Bb>wwk5D-jyos13g^dTqyH~X9$ LH%WGO(*FAGyOK@F!@PuelcU~~Vq');
define('SECURE_AUTH_KEY',  '4AnN2=i*{CG#0%PVRB:5;m,dU&T&7@[a>n6NJ.XEoic-s49YTj.{78dA@VAz{>rr');
define('LOGGED_IN_KEY',    'g?Z&5a+0?8#SxReP34G2`i=D3WWz(l:9G.|Y3IEK<@/4bhubQc#fXG;-aR+sIy!m');
define('NONCE_KEY',        '7{IpDV0WEP[J.qVpn)zvYEVnlj9hc6.z54~!f/1@G8$5Q+^?Bex$?aU2*?iH{LZX');
define('AUTH_SALT',        '@|VTFXrp]ccvWcy3h]|ZAhdltYle=~>[,NlKBa0}b4UxQ.7uF#0>1ds[L(b@%oPZ');
define('SECURE_AUTH_SALT', '8k$L DQ]m!C<DRG^:1-D8Pn~GsUM<PiC7fUiagGPhUkHa`UJ7k_@3 i98^SL7j_X');
define('LOGGED_IN_SALT',   ';4wei?W+YSgQ~,zdP86nn|SBH:8d>?gWl,>!%3M~rk8kjyr#gYz<x(B7;6K$.KgQ');
define('NONCE_SALT',       '-QosxrT/cB$B0Z75j5W;T-!/WXx$nqH~},)x-}AbD}ZTL-8QZ}N{XVBcZ<!XZ)E8');

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

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
