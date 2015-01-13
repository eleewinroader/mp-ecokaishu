<?php
/**
 * WordPress の基本設定
 *
 * このファイルは、MySQL、テーブル接頭辞、秘密鍵、ABSPATH の設定を含みます。
 * より詳しい情報は {@link http://wpdocs.sourceforge.jp/wp-config.php_%E3%81%AE%E7%B7%A8%E9%9B%86 
 * wp-config.php の編集} を参照してください。MySQL の設定情報はホスティング先より入手できます。
 *
 * このファイルはインストール時に wp-config.php 作成ウィザードが利用します。
 * ウィザードを介さず、このファイルを "wp-config.php" という名前でコピーして直接編集し値を
 * 入力してもかまいません。
 *
 * @package WordPress
 */

// 注意: 
// Windows の "メモ帳" でこのファイルを編集しないでください !
// 問題なく使えるテキストエディタ
// (http://wpdocs.sourceforge.jp/Codex:%E8%AB%87%E8%A9%B1%E5%AE%A4 参照)
// を使用し、必ず UTF-8 の BOM なし (UTF-8N) で保存してください。

// ** MySQL 設定 - この情報はホスティング先から入手してください。 ** //
/** WordPress のためのデータベース名 */
define('DB_NAME', 'ecokaishu');

/** MySQL データベースのユーザー名 */
define('DB_USER', 'root');

/** MySQL データベースのパスワード */
define('DB_PASSWORD', 'root');

/** MySQL のホスト名 */
define('DB_HOST', 'localhost');

/** データベースのテーブルを作成する際のデータベースの文字セット */
define('DB_CHARSET', 'utf8');

/** データベースの照合順序 (ほとんどの場合変更する必要はありません) */
define('DB_COLLATE', '');

/**#@+
 * 認証用ユニークキー
 *
 * それぞれを異なるユニーク (一意) な文字列に変更してください。
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org の秘密鍵サービス} で自動生成することもできます。
 * 後でいつでも変更して、既存のすべての cookie を無効にできます。これにより、すべてのユーザーを強制的に再ログインさせることになります。
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'R|7trcwjJ</05Pxp%E;`C{+cb7-&mw-%]yGI?2Ug*Y||(WJ^9HHQuUPK=`zXw~_O');
define('SECURE_AUTH_KEY',  'PjIFqp`{)rag8ko$%yh{[`=ls%5E1EqK$xnXcF7kYU SGlSQjNUl-au=4[7r[K{:');
define('LOGGED_IN_KEY',    '/}>A0H()9Aid%WnJz-}P&.+=2|b&#KD1jbg75;cD`7hiPWx_]6vswk)4-0|0>2y@');
define('NONCE_KEY',        'WBpj94mXBT$kQv|~,<]E|YWs0`I8YG-vNXev?M Oa!?8P5kQ(pL3OT%J)tnPI).o');
define('AUTH_SALT',        '87a-F#XPBL- J@+c|@A})h^1#kY][tx~g$Ih~t,o6klcE|n<pB[NHDR#/uqy,<)Q');
define('SECURE_AUTH_SALT', '22lw3 MuP7e@m|AIcsde0 e_<h@p[K5st#|<|8]j&k.C:L4jPrJ]^C#9!2da;?Aa');
define('LOGGED_IN_SALT',   ')<;6>U6yc!|Cz#$9yO}q^u{i8PDiWxQ62|&A 6hD[S3omByewa69-@o7PS&[dr-C');
define('NONCE_SALT',       'nLDHM&Dp<URPC7ik4q!;T}S[>uj!W<[>`MhH&eh~t|-(?`_d$mA+^fiu-to+XWnK');

/**#@-*/

/**
 * WordPress データベーステーブルの接頭辞
 *
 * それぞれにユニーク (一意) な接頭辞を与えることで一つのデータベースに複数の WordPress を
 * インストールすることができます。半角英数字と下線のみを使用してください。
 */
$table_prefix  = 'wp_';

/**
 * 開発者へ: WordPress デバッグモード
 *
 * この値を true にすると、開発中に注意 (notice) を表示します。
 * テーマおよびプラグインの開発者には、その開発環境においてこの WP_DEBUG を使用することを強く推奨します。
 */
define('WP_DEBUG', false);

/* 編集が必要なのはここまでです ! WordPress でブログをお楽しみください。 */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
