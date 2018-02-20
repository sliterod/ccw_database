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
define('DB_NAME', 'ccwperu');

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
define('AUTH_KEY',         'hhf=Hd1xgt=%aT2eN7kQ0vVN2~ER6tzrtoCV_s!)8l9%VB^Q03,Y5^>Ic*1w3Re>');
define('SECURE_AUTH_KEY',  '/fHNd~Ca^S$PIF_@P>E}Y|16,0+J9NF2v4)V8p@~4l%4O&b[DWu7=2wC@)4s. +b');
define('LOGGED_IN_KEY',    '=tLznHwl=72gAesa%Nd!q339+xgJcmsa!}?iMhx$ZJw?z/+GlE9v9$M$ah]Pm32p');
define('NONCE_KEY',        'BU{Un<6[<&$n}~@n:A=h0K`Jx?Q3_Y3}j3!?6/g(>TQ)ny:0/pRki8|MmpjQLk6[');
define('AUTH_SALT',        'Qyb+[ uu9]_XtKe==}Rh;Me=]Mgc(x~(}POc4~Onx.cf3}H`4I7ycF7Qq$;S1,J|');
define('SECURE_AUTH_SALT', 's`}%6fe9T%h/fYMiT_uzGxERr6?x>:vhY~ruO]CmlFDR]jn85!Yyl);x_L+NqMy<');
define('LOGGED_IN_SALT',   '%5&eKKPh_XgX_oh+tU;exIOYSZ{6JTt;wX<VyV9v@GFf7z$UWFm5nb*MSF<-ky(_');
define('NONCE_SALT',       'OItokI5rAC0gd32y{^0s,n}%?$cAUFduI5#oTcu`NmE2q^tLaXSu4@N(ift-|Ns]');

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