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
define( 'DB_USER', 'wordpress' );

/** Database password */
define( 'DB_PASSWORD', 'mxV2KPCs' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

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
define( 'AUTH_KEY',          ')^1vgkST/#6K G2PG;tU%?ms5#bE$AH;|S]~Z-;N[^>]#,<NPI5Of?x$7R$aMF*@' );
define( 'SECURE_AUTH_KEY',   'Eyuy -7RG=c0O:N3O|2JU;EMm+b<!>hZ;a<`S6zQBNmO~?ya|x/zYbd%~Q&k9sIi' );
define( 'LOGGED_IN_KEY',     'nP8r8p5-Aq-@~4dsUH+z,B}S<8}P(S|4EhHg}N^}caZGvXb%(J?rz*(I+K9TrHq.' );
define( 'NONCE_KEY',         '@kIz!9kth;5g`~!$]SCJ{b]TumDoA$q+o+A?^8Evtmtgi^wv8z5D+9NQi5E+oJ.^' );
define( 'AUTH_SALT',         '*llS{Lz#(TG|N1H<^,h1/#$C#-Vd.Z2.1f^WT_Vu)D6]8?4WkwRK1=bdaFt:()KT' );
define( 'SECURE_AUTH_SALT',  ';l*zWJ|Q8C piJ_#p<o<0N]IgT,}RV,#tXS }>(CW}S=dP^ @>6s3qb[apWb@Dzb' );
define( 'LOGGED_IN_SALT',    ',%QMtfmT48QPwESrCWjjKf1U2*|MyJ](4Ptp4amt+~@&{-:CzkcF@%|^Uq)akh<Y' );
define( 'NONCE_SALT',        'XbjqXOR[SfwwHMG(;vI0TdkB&z?e~x2W?md}`4:j?-8rACoA!q{p^@|~9@;LW,8=' );
define( 'WP_CACHE_KEY_SALT', 'UhYCa(LjE[!7Xh1^(!c;L5<>+rW8i&o-dj5dk|9Ex!^YVTne4?RZx@Fab+T&G3^^' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
