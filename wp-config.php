<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'rosegol7_wo9393');

/** MySQL database username */
define('DB_USER', 'rosegol7_wo9393');

/** MySQL database password */
define('DB_PASSWORD', 'rLSLGnIS0zzK');

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
define('AUTH_KEY', '?<PxFuifar/rQcB;M^WvGc=QTU@QP!lC@ktgEQVK]wiAS({*[OzxdA@w-P%$e=/NTTDEWozm{X))zc+o-[Srap<>cy}uCfwR@y-pY/(JJ)WF}ZRz)N%/e|l$haM(GhHZ');
define('SECURE_AUTH_KEY', 'Hh*Y$<u|V^)tplNO+z}XxpoRb&p-@G+>hNj_]UXg_$jHT&!AxjQ]LdN)gFt$nRer*VY(VO[izVcQpQQ%^lOLuuE-P/NZjTzrliKic<d=E=<%nLqOZ+/bNMO{xkI)C|>D');
define('LOGGED_IN_KEY', 'Ujv{u<USl[nRX[>*Mx>[PML@VZQ^(};BlZYgvFArql{d!]JliRDE=muo/s/NNXqLqsh[t&P!RM@vFA{s}Df!Ds}*?IQH;+&Vez%r)ywB[<NZw*e/DQHtm^ZUt(ST?%Mf');
define('NONCE_KEY', 'rPpk$b*ls@jX%?JQ^Dcn>KvjqH%aDaCCCjbKcq{t@RQ*@/YqbnUaf<hBDe%lY@LGdcsV;}G!b%yN)purIBbiMpm(&/!OLI$WYw>PMicoHvbP+=(d&u;kHlYQL?RfmPNO');
define('AUTH_SALT', 'DU}@V}Tz[Mqgt^aO!)lxgwz+(fRp[vlUoodCEAuzygttuhy^?NeVFvvSAIYxMG}_mPAhQLRaWda(eKB;@%PK?+$a?vbxQzkNA;t[}{GITX$zboiwi]g>{kF&e%wRd]CH');
define('SECURE_AUTH_SALT', 'DX^|cHryu=<c}h?]B+=N{&vGp&w$lY(^?M|*Bd|lI!Bfk<xbghYy$j](S^$qyGtFbJOc*|P$<^+&aqvzHR<%RYS+fTsyarH%oElw>xBCy[%M-}DWsjK{FLH@[Sil@b@T');
define('LOGGED_IN_SALT', 'gz+<AqsNebs[>$=Nw^L=GvlYKPLpXEKQxkL;s=ALoOkc]Z[x%[!ZjuOlbilBN?U}poypG!noJmo;?jON=^$JeL}[v%PKHncghPbG<z=<IR|GRXFtV$!humE[P}]ol]!_');
define('NONCE_SALT', 'YQRGF&{nTz>INSOeRqqFg|KB&OlbJ{]tVsPKTLiozvddGwD/{<hGSa%Oxtz@mWGT{)/V<ItD*b$[}p>S(Z$xeViNeUpi@Rmf)mXHWh*dQKi-GSsdUwUk@yB=&qDmM<%T');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_dupr_';

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

/**
 * Include tweaks requested by hosting providers.  You can safely
 * remove either the file or comment out the lines below to get
 * to a vanilla state.
 */
if (file_exists(ABSPATH . 'hosting_provider_filters.php')) {
	include('hosting_provider_filters.php');
}
