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
define('DB_NAME', 'picurt');

/** MySQL database username */
define('DB_USER', 'picurt1331');

/** MySQL database password */
define('DB_PASSWORD', 'vg[1UI$pb7X5');

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
define('AUTH_KEY',         'G&Wg=crq/T0:?)|GW:lTl#^(7B PmN<QhS{xiK$@1r{/&kCA|2SC</-{dt*1/uD{');
define('SECURE_AUTH_KEY',  'qRAlYY0O?|N5<2As#?kP#IL/^jPcnr .)PNe.JF@oU~!lKLK(WEk7#C3B~FB)({p');
define('LOGGED_IN_KEY',    'b7%+p9t[!7,5dsyfGv[)E-C8=X<vntfM,]uc|DCg%!nnjnYUKkP}zJ8M~hphdnCs');
define('NONCE_KEY',        '7T@KS9_**$DC`W&R01C&rKP61yu3qq#qnqR[o)/[dq&XIdWZlD/F>NR&,qfr,WHR');
define('AUTH_SALT',        'V)-/gWriA[7_?uQ|1(x{Od!.:Smb<EUdrFJT]40_(Y90JyVOF+4j(RoY9htDAzm^');
define('SECURE_AUTH_SALT', '7QP7WXJBMR]z/.N>H)gzv@aPcE${Ft+^12*F#m2VtCGJnC]?{2TioNTmy%z8?SIC');
define('LOGGED_IN_SALT',   'g_DQWXKktxPF}V+/8k0 hO9cr>h;Twdezzv^=X]vcQJ+#}f`%f#G53n6-`Y{A/Zu');
define('NONCE_SALT',       '<6ZC!$n9FapX7uCrrhQDQ@k?.UNxnM<]4@srcJ%z}uD^k@;4kVOgEN@#T/*G_SI4');

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
