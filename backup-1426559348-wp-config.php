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
define('DB_NAME', 'rosegol7_wo7458');

/** MySQL database username */
define('DB_USER', 'rosegol7_wo7458');

/** MySQL database password */
define('DB_PASSWORD', 'Yzq75z9k8AXY');

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
define('AUTH_KEY', 'sevWQiC{D^^]g{zHOlcRcls@}RnCM$k<I=^Y?KDBxzIJ+JcRFsbuk;U<C)sjO|aYFSnS(mYx(OuazLAbh&f!?H+&-M$}HJgTI(u>GK>!-i[&ZL(rb}xA!rK|lLZfC!*;');
define('SECURE_AUTH_KEY', 'MCEaLq*Pq%$ugFDuff^&|BEE;+[$e/Ss@/MJpA|n]UQGbGuzHal}tL]rOmnuXndIfJYQX|<RulRf[G$hto(RLkIGmGYwwIh%irJnK=<+eWI)ZxSa)x&fu$sE_!T$ivQm');
define('LOGGED_IN_KEY', '}t/gvDn%?RriqvQc|u^yWwKvpdAH{u<l>kG^iCjrqXyu|W;sH%[Y@Iy;xJ)eC}xBoD{=v(l^+&F=_()oMKGqQB>{ZyRNnsH{Mq)o<g+Fb(Y&&ndg@}e-aOrV;G@Vnr[y');
define('NONCE_KEY', 'rA%oE)Gz+qf@+rC_c-q)%_fX(y}K@P%PyLUE|Im%&CVTwM?foXHMeUv/Yh|Aq^fq{F((aliKoroC=PfB[yAK*FY;Mb>RPQwz%}nLGHFHU<>Tfi)PE@{NxbGgC;XU)q}v');
define('AUTH_SALT', 'mvML?beOL/Qkx*nPuczGCLA{UIvqz}K-;>hk}?;FJjTVY&{(CB@RmHy!lbTNc*}t/xWS$JVOtjKb<JHB*mOO>^IF=&|*CR*y;HCggSi>OK+OliEI^{&cby/)FnpL_$C*');
define('SECURE_AUTH_SALT', 'BOYf(iF(e-^Si!W;BTtusfTKN!(SwGehaq?[V-e;Zq<bvY?gNJkmeCayDhtZu!wOLxWaYhU?q@PYhEBYx;Rb*T[wxpn>+j[okQl=iQ;/q]w)!fB[w?%$XK=YVL[v{YPF');
define('LOGGED_IN_SALT', 'uecs?XtSsf{e/!)|xS=[c!rh@snGPfhXI(/@^YJVPQQcWzY%*cFxy+LtLdpuZSLGBm$LM|X<Umo|[qta]NeCGfYJlk]DNj+E{TVg&HP/f?M+>U^O)K+Xl=K/$-$HfJ$;');
define('NONCE_SALT', 'oR[)YWi;/)_%kYJT$ffb|liIcuFX_+nl}{_-;knUXJq$L}(KBd[TMQaBy@piuYk_=;l$is<MULI]rtvHNq=bFGfX}w|F;AF]YLwlMo!WDUbRL$D/&t?Hb^Z=m<QJfpLy');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_ukot_';

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
