<?php
define('WP_POST_REVISIONS', false);
/**
 * The base configurations of the SriMega.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, SriMega Language, and ABSPATH. You can find more information by
 * visiting {@link http://codex.SriMega.org/Editing_config.php Editing
 * config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "config.php" and fill in the values.
 *
 * @package SriMega
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for SriMega */
define('DB_NAME', 'smsc');

/** MySQL database username */
define('DB_USER', 'tuningfork');

/** MySQL database password */
define('DB_PASSWORD', 'tuning_waves');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.SriMega.org/secret-key/1.1/ SriMega.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', 'put your unique phrase here');
define('SECURE_AUTH_KEY', 'put your unique phrase here');
define('LOGGED_IN_KEY', 'put your unique phrase here');
define('NONCE_KEY', 'put your unique phrase here');
/**#@-*/

/**
 * SriMega Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = '';

/**
 * SriMega Localized Language, defaults to English.
 *
 * Change this to localize SriMega.  A corresponding MO file for the chosen
 * language must be installed to content/languages. For example, install
 * de.mo to content/languages and set WPLANG to 'de' to enable German
 * language support.
 */
define ('WPLANG', '');

/* That's all, stop editing! Happy blogging. */

/** SriMega absolute path to the SriMega directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up SriMega vars and included files. */
require_once(ABSPATH . 'settings.php');
