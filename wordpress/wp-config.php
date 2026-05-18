<?php
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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

/** Database username */
define( 'DB_USER', 'wpuser' );

/** Database password */
define( 'DB_PASSWORD', 'hmGxBZ8z9VTOXX6skAl7' );

/** Database hostname */
define( 'DB_HOST', 'db:3306' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',          'F^m8#oB`v61Dvu(SH,[cq|3fkh3->W!8f:&rA0gwLf2Ojvje7DB1t]t!8(36i2yT' );
define( 'SECURE_AUTH_KEY',   '2f9F=el7a3)<TQW8 8MSJVq4~JBJSz6**j=[GUpEv?L2sB<{]G<~fW2*4^.]l[i<' );
define( 'LOGGED_IN_KEY',     '%3.:;Z^UIw$s>CwCg&fJ8mkVQ@Xa{cb4}eWNd^%M+C$wn)0DJ5EB#)>GO7TWmtfN' );
define( 'NONCE_KEY',         '?43 68|C DRzvI2B^NZ0u7.Cv:F]Ym0)DYn-W[8[v#a/WN]-h1 |0>z)l)Y]_lSJ' );
define( 'AUTH_SALT',         'Iu-:g|/@W2rE=U%hxvC;|xm/}=?LLYQY!gy.Lt 42=|$i:`YHxA3cx>9O)3@6ie(' );
define( 'SECURE_AUTH_SALT',  'Edn{AEP)vQ-8rx6IKsKN+|MhJ@]^&VIaGp,;0?YS$-E|l=H#tS;tZ]s9~j5]OE:,' );
define( 'LOGGED_IN_SALT',    '@~5Wx$P~n3uDPL71#.RT#Cu`@@a}sRPW`Tnr]EA;?[?_{+P=tJ;+8~w,*]1f)Y9V' );
define( 'NONCE_SALT',        '|CQ bYi-kNzH=X7SoP2b[8h)!1zt3u_2!|Mh!oYstvK{iaCMk3GXi.}/].CAdbN<' );
define( 'WP_CACHE_KEY_SALT', '}vo8zu7J}4_]!-i&zx#)5Z`euWavMU1[#[>@ wOywssuako#0Ry,%U`L[1xw}MXT' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */

// Security hardening
define( 'DISALLOW_FILE_EDIT', true );      // Disable theme/plugin editor in admin
define( 'DISALLOW_FILE_MODS', false );     // Allow plugin/theme updates
define( 'WP_POST_REVISIONS', 3 );          // Limit post revisions

// Reverse proxy (Pangolin) HTTPS detection
if ( isset( $_SERVER['HTTP_X_FORWARDED_PROTO'] ) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https' ) {
	$_SERVER['HTTPS'] = 'on';
}
define( 'WP_HOME',    'https://logispark.pl.l0l.ovh' );
define( 'WP_SITEURL', 'https://logispark.pl.l0l.ovh' );



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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_DEBUG_LOG', false );
define( 'ALLOW_APP_PASSWORDS_OVER_HTTP', true );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
