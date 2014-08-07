<?php
/** 
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information by
 * visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wordpress_b');

/** MySQL database username */
define('DB_USER', 'wordpress_7');

/** MySQL database password */
define('DB_PASSWORD', 'y4TJ96zqI$');

/** MySQL hostname */
define('DB_HOST', 'localhost:3306');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link http://api.wordpress.org/secret-key/1.1/ WordPress.org secret-key service}
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'ny4lb^(6C*CNlOsK6uX^f7EY&jGahHtSRA6V!kXt$MPYL95BfBEqUfTNDwbQGtv&');
define('SECURE_AUTH_KEY',  'x7*rotU#e^CceX4ChhNuV91L(PwWbkpp3QNB(p8&&IgqYWE&^CFuMvFjhmZSE4RK');
define('LOGGED_IN_KEY',    'e!j@&ww@7rE4u0)G7pL0H7U7XzFlpQ$IXJlwjPx#wF8rx$p3^GPE^TPVDg##NzuR');
define('NONCE_KEY',        'FAQ*uisgZaDvAjG6@xRS25SJ55O%5#x7dDjxqtph0UG0jX17md9&5iG@WfKQ&*YK');
define('AUTH_SALT',        '$ollBLBB8KcwWNYnonC*2$MN@gT8I@yhg#gKvejb4AyVoFAPG8sbPLlhJnz5&1IZ');
define('SECURE_AUTH_SALT', 'YygoGW(aGstc$x3Mte*J$K1U7ZHt1RQwEv9POx)dihXTc5@nop$(qHtRgHC6Kcwu');
define('LOGGED_IN_SALT',   '2!176$VVOMvF3@aKpPvS#NvSbK$%$b$8cec)!yT7OSa7jK3%*4SsWqSMb9ACznPJ');
define('NONCE_SALT',       '0c&ei6^QCKUygxP3DHVBVS!$8jTz5f5hRdm%w!dzwhWec5p)$zoefpdBL2FzGK1)');
/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress.  A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de.mo to wp-content/languages and set WPLANG to 'de' to enable German
 * language support.
 */
define ('WPLANG', 'en_US');

define ('FS_METHOD', 'direct');

define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');


//--- disable auto upgrade
define( 'AUTOMATIC_UPDATER_DISABLED', true );

?>
