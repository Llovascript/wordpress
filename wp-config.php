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
define( 'DB_NAME', 'bd_wordpress' );

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
define( 'AUTH_KEY',         'r^%<t#jz*]o<:nV-z*|rf9f-370N_g`]U?3|kA9^Gh6%H!Emoy0:)K^$)GLl><:)' );
define( 'SECURE_AUTH_KEY',  '3AiYaCU/~OyPq]BD`r]_Ck9c__o|DV`J4#E!+h.K]mG%a>S?%*xqrHYweo3<27o*' );
define( 'LOGGED_IN_KEY',    'n|Z* I5}fSn(8hLJd$`*(`U9(fenY_M$kweX1Box9^6l0e?;caU|$Obq/eeT-RmJ' );
define( 'NONCE_KEY',        'UE`^axjXF1dR4OHr~k#_vEUZv}b2Z|4u5EMd>bGW!t]5n0&w_ TK?lp`}zPTs?-H' );
define( 'AUTH_SALT',        'mQOZ*[@@oQ5D9.$#w)m0WbPB0xNJou;`QFW$Z>>^(SgA*~z2xjZ+3mgJTb$pgSRn' );
define( 'SECURE_AUTH_SALT', '[j7+$h.;1^zqRa(5LK01[gKh1Yb,f=;vMrMgE/EbSyRH/;P@n]ZD[0$8>#~)tI|T' );
define( 'LOGGED_IN_SALT',   '!St35JGe9VbZXI PzV4j{X{#zT~[]^*o<sH`(}.u-m.*Ji1/@fM~4fb5lQ`Z3v1<' );
define( 'NONCE_SALT',       'I@2Y*^=qXuy^q4RV<~/4GI`:Qc*cV`.SGn:*dg~*rdxd$Zge/,lW@TB-DLswhx8g' );

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

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
