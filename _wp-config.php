<?php
/**
 * WordPress の基本設定
 *
 * このファイルは、MySQL、テーブル接頭辞、秘密鍵、言語、ABSPATH の設定を含みます。
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
define('AUTH_KEY',         'r|o.7xBy13x|c|7rsvt25D?iwm&sq9G{b<<t0CBk)MPn?KffNR%NB##6t{cm +h3');
define('SECURE_AUTH_KEY',  'HM,tqOyC2>z4/@UnLanSg>iB`To!&G%@PrD8T2GV7HiHYc:f_Km-+=n-B`1PgMr8');
define('LOGGED_IN_KEY',    'Yf)uWh7i7.b:9/dogfU3#2? 2wC+/nuAQb0&HQm+H(KsrxUuAa2<a[cuS/Nr:qO-');
define('NONCE_KEY',        '|GeWAJ(X`Q`Lpp8Nbuyi6bIW18o!|QM_luH/plU2lo.`T9W@l|7te6T0lMl|jms{');
define('AUTH_SALT',        '0pDYHm?Kx%;o/g ESp|cYWXdP[v-Xjw@TG4EmuBP4Gp|j-+E$_]s^]@}G,$~XRMS');
define('SECURE_AUTH_SALT', 'ft!1CqG+dEEAb1]f=0TE0EX>f-F8w,&2~N99~.Y5Nlgn?(ww{`oWF2M1jT7|!o/V');
define('LOGGED_IN_SALT',   'R,1.AO]wR-1o[5fcKn8VO3jkaR2S]5x0%p_E&npUCc%<GjuqAq&>ATP?`-#]cWQ,');
define('NONCE_SALT',       'c-gfczz`>teVjOXea@@?=ak-_1MrYplpbK@vpB0A{LC%fNk gt8SQNNjn4~E0oyU');

/**#@-*/

/**
 * WordPress データベーステーブルの接頭辞
 *
 * それぞれにユニーク (一意) な接頭辞を与えることで一つのデータベースに複数の WordPress を
 * インストールすることができます。半角英数字と下線のみを使用してください。
 */
$table_prefix  = 'wp_';

/**
 * ローカル言語 - このパッケージでは初期値として 'ja' (日本語 UTF-8) が設定されています。
 *
 * WordPress のローカル言語を設定します。設定した言語に対応する MO ファイルが
 * wp-content/languages にインストールされている必要があります。たとえば de_DE.mo を
 * wp-content/languages にインストールし WPLANG を 'de_DE' に設定すると、ドイツ語がサポートされます。
 */
define('WPLANG', 'ja');

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
