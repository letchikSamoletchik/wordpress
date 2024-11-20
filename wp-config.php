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
define( 'DB_NAME', 'my_wp' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost:3306' );

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
define( 'AUTH_KEY',         'MC{##U|O FOtx3f0I=4B.zKhjknr: F9uwPM!FiN){Vm]n f[P=z51`g^|Iqcbdn' );
define( 'SECURE_AUTH_KEY',  'PA:$!#3|3ZLbp E8k*Ao,TabV)meye>[8I0,{E)MFd1W3h72Ziv1=r$T8wr}b~>>' );
define( 'LOGGED_IN_KEY',    'XxIE3,oH+]}E|9T}HuCsP6C9t*:l*HAkq)KS@@)G1h.2l7b8{Wz)f~K)U2{2_<CG' );
define( 'NONCE_KEY',        'V?>a<yf8zh;B,C+qQUn&!UvahH?AXAfk-=iTdwp?tp}LW=Xe9{H]|2s, 4$k17B7' );
define( 'AUTH_SALT',        'Y:A4C*~FnD5(lNmT|i1I,#6{-z~gu]O#lTGjirS_qP,Oqz@%t&VebbZj k14(jP{' );
define( 'SECURE_AUTH_SALT', 'j/@$]!O[W/#[[LS~Iu*ocTl#wK_AQ(DVz*+I^OfZ2liMB.N|s3wtM&(v;R=FWbfQ' );
define( 'LOGGED_IN_SALT',   'lGx=vb];pihR?|6y{2uv^pMx[@*[YJ]YQ3kXSU&g$/V^>49r1R~]e*0|]hZ_e+g0' );
define( 'NONCE_SALT',       'qp#D<S%<WCyv4KDgf&6CMIFN5|-&9G#v-lw+pX<mK;ICyU!Wk6PT&,/H:_rYKNw2' );

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
