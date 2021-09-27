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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'shop' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'FFuy&V@E{~;|ea]ZZ g9nzPC7$E~Xc8?tu@OCV2M>xffc9H6}vFl6CyfC+OUt1K|' );
define( 'SECURE_AUTH_KEY',  'xrevoe&{fDY+i?gN]V>I&.lJ;!+ =yKF^f_dT9bg?e??M(&eVn`=XNqcZ:e)cV~2' );
define( 'LOGGED_IN_KEY',    '?86y4RkkHR~<JBr.o<M=nSH*sV`;t9<r36Z17QE[=<Ldq7^KYy.G{E}$Xm,({Kly' );
define( 'NONCE_KEY',        'EeC8E+jrit:~.ozg@T^ N!4B@,~_]t`C[CsP.mDV8BbRcr5G{z1ty/qas<O0LTnj' );
define( 'AUTH_SALT',        'Pz]}J ,O:qyK]|WE`PQDs9<A(ev&{lO:BpuI~+N1*DY?Jj`4y@S7BEeP=SmDB;2m' );
define( 'SECURE_AUTH_SALT', '3k!zi,KsOiDH~|ce(ZvX 0M/,78yDQ5+Pw<2FynR]sJPAJ9Yn.^VtPJEi_4JgId|' );
define( 'LOGGED_IN_SALT',   '!V[Nk6kc=@J tJy4}As> ]59G%^gK#G<X=46%4J.(0m%}HC$7F[#@jPuUhPQMcw)' );
define( 'NONCE_SALT',       'SFReQ+6ZeeI}>cx:r={c.sl;>:(#`<)mB~(zX(snpl6wGTAIIPDhZb%R(mET1j6~' );

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
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', true );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
