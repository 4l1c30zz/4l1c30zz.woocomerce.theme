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
define( 'WP_ENV', 'development' );

define( 'DB_NAME', 'wordpress');

/** MySQL database username */
define( 'DB_USER', 'wordpres1s');

/** MySQL database password */
define( 'DB_PASSWORD', '1w0r355sdDWSGpre^s2s');

/** MySQL hostname */
define( 'DB_HOST', 'db:3306');

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '');


define('FS_METHOD', 'direct');


/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */


define('AUTH_KEY',         'y0rq-6D~0&wA/%bTb Hp+5*n]Fqen*<#n/s8umjA.kYA~.eJ$pKok[X_eVk>;XJj');
define('SECURE_AUTH_KEY',  '7$HUuna VWh|@|dJ{8<_/lOHVA55+<v-o9=fn2rn+4SVz2@{SX7$8$2}]bV |ZpG');
define('LOGGED_IN_KEY',    'hg;&b3-zw@v#?[Q,K1aiL--h{#IrbA[$,ACrO}hH4VS1r@aSprW 09W}O(X+p,HN');
define('NONCE_KEY',        'Xq|WX}E3yQ1QMU*x?Ski?Wy7<Y_Y,ue0/6xvY28@V1zZW2h7|=[i1]5P@ KPduLI');
define('AUTH_SALT',        'Cm|<qGKw*6oGz1Q[9I-Eb;9-U_1`:^FX2I4Z}Uzo3=xpGvS+z;){5N%M-)&9U|y[');
define('SECURE_AUTH_SALT', '@$Y$A0@tz7*|fx(sh{4&)+X%<J-l&H%g@fyUlZyRXVj-YgW4Va%JSwov*]yk_+j-');
define('LOGGED_IN_SALT',   'G:@r9Rqe>W{%W}v`BW)zx0w+|C_6c  nQ^m]87&ZyK,wi7@[>|f>w`ZmG!/~|&6d');
define('NONCE_SALT',       '-qRpFp(pwvz)FQUJ-1$gQ6JwmbyLbMHqmL8d?4=;|[zz:dfQ<`-(qd]-_T>zuSWn');



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
define( 'WP_DEBUG', true );

// If we're behind a proxy server and using HTTPS, we need to alert WordPress of that fact
// see also http://codex.wordpress.org/Administration_Over_SSL#Using_a_Reverse_Proxy
if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') {
	$_SERVER['HTTPS'] = 'on';
}

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
