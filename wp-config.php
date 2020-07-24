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
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'admin' );

/** MySQL database password */
define( 'DB_PASSWORD', 'admin' );

/** MySQL hostname */
define( 'DB_HOST', 'db' );

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
define( 'AUTH_KEY',         ']m&BLU*0z5Bdk~*b;I&f;@s=D5BFR8a[9-|8t/c[`FSTnp}V[ZOoQ7]8SEG9Snig' );
define( 'SECURE_AUTH_KEY',  'L}H}80BhknFUNH]ynAs&sf KO!dJ40v4K<bD/EbmLn!CYo&b_B2WlG/jR:R<P4gQ' );
define( 'LOGGED_IN_KEY',    '9u94On}H.0b=*/?H>p=`{ICzLaxV87RaI}#i`dA-En)NHwkSy>vrv#2r2ouJ1f@C' );
define( 'NONCE_KEY',        'a2zYa%z-g;Yzx$Lm.fx61g/{mJtE q}D]v903NvtAwAJ qEX2B_OFS$!7W.ynS:;' );
define( 'AUTH_SALT',        'yzn(iqkeVnD[!vm~%K<gSz&Yd!/]KL?m?<AH6S?jS5]lR1/#ox|u2[X<6[I|G:^H' );
define( 'SECURE_AUTH_SALT', 'G2[U]<Iw8.2m$[l#7M;8|Ln|i !;Mr#vYdKV!!ETL9w;[KVdqjzB;f8O+qT[?0j.' );
define( 'LOGGED_IN_SALT',   ':$EW,f*%=B|k)W>kY)JvQ=(WuL-X.IuIR}#H=H!Vw0OAxnx@kckvXElX<E1qO;q{' );
define( 'NONCE_SALT',       'V#_`=OV $a-YBsH@P$y3jm^47kcsA1xtw|hAo3|#w#/1Me7}rQg$Msj-((jTf!P+' );

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
