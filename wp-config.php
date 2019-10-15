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
define('DB_NAME', 'bs24main');

/** MySQL database username */
define('DB_USER', 'bs24main');

/** MySQL database password */
define('DB_PASSWORD', 'eB8ien5iudie');

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
define('AUTH_KEY',         'X-3}*xuJ3}!7%0$[*wOZf f*hB_Y0_Xq<JN7Kq?o;%r(WeQmq]3Vr9kQ8#%Y:Ie{');
define('SECURE_AUTH_KEY',  'x@vp>QL8cu3gBW`dM!:/o1o:=0BkB<bU9pTPJyNX,96z*v>@oHA;-iJYLUB@iL*+');
define('LOGGED_IN_KEY',    'BVHko#%bs0MbXF-LQ8*#Ho!B6%z0rD?h+O2t&)5*r1gLigJ+p2VMFJ`oPjFnD>T{');
define('NONCE_KEY',        'Rz5Lk/JoO<GvcOw({*^#+mL3>VeUtPkUr%4+M6LdB9RB1jtJwxiEO:pSd *Fwnoc');
define('AUTH_SALT',        'N?%Wsf2{RApUmP6|:cX);<Xwy,:v_^0qVM&2a#jqhyMX);r6{A^ZgM|3F[ERvNyI');
define('SECURE_AUTH_SALT', '|)3dXtZl@Z[K+:d7aQ.8x}Y h2Ecs-:~zH%?)|{:,|c+*Z-BlWt}itzPkn=OwM|v');
define('LOGGED_IN_SALT',   '3k7<[a{@5;8zQ`jQs;3$|Mfd{J,}?-Pd0dQ]WvQpL~^)Za ~Y_%Fc~M.9i5VQ$Do');
define('NONCE_SALT',       'IUOwLV:;!-.a9|z6FoM{ {at0p :zMmzf]2^RW[RIFf8S*Rkjf%w<.4:=a;nu$^0');

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
define('WP_DEBUG', true);
define('WP_DEBUG_DISPLAY', false);

define('DISABLE_WP_CRON', true);
if (strpos($_SERVER['HTTP_X_FORWARDED_PROTO'], 'https') !== false)
    $_SERVER['HTTPS']='on';

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

require_once(ABSPATH . 'autorun.php');