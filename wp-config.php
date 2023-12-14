<?php
//Begin Really Simple SSL session cookie settings
@ini_set('session.cookie_httponly', true);
@ini_set('session.cookie_secure', true);
@ini_set('session.use_only_cookies', true);
//END Really Simple SSL
define('WP_CACHE', true);
define( 'WPCACHEHOME', '/home/wwwpaybitcoininth/site/wp-content/plugins/wp-super-cache/' );
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
define( 'DB_NAME', 'wwwpaybitcoininthdb' );
/** MySQL database username */
define( 'DB_USER', 'wwwpaybitcoininthusr' );
/** MySQL database password */
define( 'DB_PASSWORD', '89080f43-2c20-459d-b6d6-ea92ad115d1a' );
/** MySQL hostname */
define( 'DB_HOST', 'localhost:6306' );
/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );
/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', 'utf8_unicode_520_ci' );
/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',          '!&1w<YL x{f2BgDUPAQ^=1*rhn^:I>i}_K.naZ#`Q-{<R(.p#C@|k};E:0<14Uu)' );
define( 'SECURE_AUTH_KEY',   ':^`$)uF]c8sB84a];l<E|z|uPwvDUPAoWt^-SMLXvdjhK#M vvzOf=zGmK;7G/U9' );
define( 'LOGGED_IN_KEY',     'NxPS6CmYWxlQb&xemabs^rK rwv7_5MR?#E%DUPAfd%[EP3Nn@{oI<>S/!jpxv~j' );
define( 'NONCE_KEY',         'n~LfiBsl*:Y~&b-qaxDj!+U8A+DUPA^*Q04 dz!}y[o,DxxK%iN+ap9`N.}AJ6>u' );
define( 'AUTH_SALT',         'D>Kl8p|[[L8-teySb:d;RN:>n:{mY)zQ,3ry]gZMY-SSsDUPA|ejJ2oa{S2QBR@{' );
define( 'SECURE_AUTH_SALT',  'ZgOVuBw7ot(eX]0qR[!DUPA&&7=iSB>L2?v$HQg#UD#$/bHi?-(&CEB3EU~FTgdk' );
define( 'LOGGED_IN_SALT',    'i]Cuyv|Imsh}BuDUPAW5}([3Bj8a={4THj<Pr+[zxay`%9l9DuB*<}6Oe9MV)&fY' );
define( 'NONCE_SALT',        'B$h,fZ_J9<1bQ`k3|.[yu{@0O$8`_P(NTl^#bIDUPA0JyE}_i;`h3@85+:}a{d[Y' );
define( 'WP_CACHE_KEY_SALT', 'Q:38-rsa!euiBIL-&]84]=kYwsIbV~3w,DpDUPA2<+)f*X#e)!Y/ZJ7CKB@p^Kcn' );
/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';
/* That's all, stop editing! Happy publishing. */
/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}
/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
