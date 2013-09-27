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
define('DB_NAME', 'fitnessbookkeeper');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         'k4+Vrx9wdp,@E-qL]j^SHC{bKwCLz]W@3(p[RYxXsyT]]JCTX*6EJrzEoY*a?R}_');
define('SECURE_AUTH_KEY',  '5LO|nyG)V|~Q|6E5z7|S75dL:3nF$JYkT(:Z?b_1B!p|2o#|GfSBmGP.5jxso x|');
define('LOGGED_IN_KEY',    '+9-#uP+PiNVa_/y65}7spO=(}F)-Q-p9V[8 /E1<m;E#6}YQ}iehE~!U.+|v+=32');
define('NONCE_KEY',        'CJQ }(Px*1(y)^x/$U,pfi_ f^JoOH,?tCsBiO|1b-]&bQjy!+^+$+SeQ5hZC(E[');
define('AUTH_SALT',        'TB`l$na|<+Q$N_4wGD(}5d$Z@[WVWx5jYBHn3FMZKb^IDoBvlx/6K)v@MDGb-=F+');
define('SECURE_AUTH_SALT', 'H@rj^x^J|,BenWMeLmqZ1B.^LcRi5)+eLeQJtmSL2+Wg>gz>U5@8>dUW7d/kY.vh');
define('LOGGED_IN_SALT',   '8G9mpf#JXE,6+Ccj$8U|3 `zU(pP3vD5Wg%2a]}FVoz=acXFx(_+-BSfZ,KM|>`f');
define('NONCE_SALT',       '&v0MnHY*IYU>1(@7+-_Q U=*$&I98Y5]MeZ=zX-#pwlf]@+wad xNBJ,|#*Ks8r1');

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
