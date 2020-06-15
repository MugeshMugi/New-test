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

// ** MySQL settings ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'schillerpianocompany_com' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY', 'lmAoxZ5eLuWmb^$jS*BF$Ia@{:D%{tf.yd,z]5;Mym`F^(wUtQybA*{wU*&~(m(h' );
define( 'SECURE_AUTH_KEY', '9B@PQKUFKMFB~m:%=|^56N-M lM)5GL1fRJd,4g`&L[U`1/+QuLU$eB1[c}Dxy(V' );
define( 'LOGGED_IN_KEY', '(hE8mio&GbYkzj%B2|[|`Sa.;vBZ`5x,e<NZ54PCME&RXc&IU51<t4(B_;/x|{4M' );
define( 'NONCE_KEY', '<GX-PNcFsS*<b*;#GoGOA&]1B_ 5.g_HxZnc5RQBbK4A*x]%w+H7ae=u9$QK+mN[' );
define( 'AUTH_SALT', 'Uw^14K-Gk#A-&@4K9{)6@]f]LkQ(BKGv|CR:v57gdXo{%$oJ9NwRJoRkii&1RkUj' );
define( 'SECURE_AUTH_SALT', 'QuN)}vg=0.YLzNdeAa{5NCf!6yv@rH<1@68:c-01M;&,wET@f+P9ZL? j]0(rXDB' );
define( 'LOGGED_IN_SALT', '.66Ia{q>Q(m[0],%pUnT_Sii={qtbiE|JwC)>m*%cn_7Kbt&SL+K;963_1?f%4e+' );
define( 'NONCE_SALT', '80Vq?9mLRWN1z}p<:f1_FC!iwlq^L}@(uJQ~Q(26J=+|ZnQfy)v[p0n]6tZ:xU@@' );

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'schiller_usa_';



 

define('WP_DEBUG', false); 
ini_set( 'display_errors', 0 );
define( 'WP_CACHE_KEY_SALT', 'schillerpianocompany.com:' );


/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) )
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
