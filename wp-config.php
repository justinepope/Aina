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
define('DB_NAME', 'student215p');

/** MySQL database username */
define('DB_USER', 'student215');

/** MySQL database password */
define('DB_PASSWORD', 'student215');

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
define('AUTH_KEY',         '-aVMA;Y{rj0+CcFJG#Xm2W(T&S#.XW+4q])@q5S:TBZlhDP~A=|9/..StxK|+NkZ');
define('SECURE_AUTH_KEY',  'f67-e<@g^sG{_ -ALp-X]L)?B-,([LP@Py+dVF`f,c<^N<=|DOXt`=<-+;gBumE}');
define('LOGGED_IN_KEY',    ']A>+5u=_xH`sq1#<9V+F~9[s(cq#P Q;<mV+},0`oZ(KzdAcieyK8d5MD4%/>E~*');
define('NONCE_KEY',        '=r.}$A,7gL8Q,}4#CuV=uWD<D*k#l8PTc*LaP%+O>),$Qex+-cQ,C@k,4$ /s<E>');
define('AUTH_SALT',        '}! Ey)N}]@C+N9z-2M9+t|J&uW@%3hFdT*F%?u:Ze)k~~TJ>q-9&L?An}MDsR/jQ');
define('SECURE_AUTH_SALT', '_+77`KT=FY2YG^DK:Dhz)~=6&5LNug|1~TOQ$qn6PqEQxP]-TTG$+8Uw8VV_D(O|');
define('LOGGED_IN_SALT',   'K| PG^^c3jHFupj.)`xD5;O^_GI|M^%`ut*MAukKp|_8+b]IDkPh|kQLKIk|VA^y');
define('NONCE_SALT',       '#AMmX%s%w}($A9pcww=`oyZ!fNXjQ#H$C+ ALz|{O|LsRo,w{S%x{:<[sChFe7gx');

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
