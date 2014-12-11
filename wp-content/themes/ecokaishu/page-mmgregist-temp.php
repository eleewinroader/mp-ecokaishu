<?php
/**
 * The main template file.
 *
 * Template name: メルマガ仮登録の完了
 * 
 * @package WordPress
 * @subpackage ecokaishuCMS
 * @since ecokaishuCMS 0.0
 */

require_once(ABSPATH . WPINC . '/registration.php');
global $wpdb, $user_ID;

$cstmEmail = $_POST['cstmEmail'];
$cstmEmail = $wpdb->escape($cstmEmail);
$verified = preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $cstmEmail);

if($verified){
	$user = array(
		'user_email' => $cstmEmail,
		'user_login' => $cstmEmail,
		'user_pass' => '0000',
		'role' => 'tempuser',
	);
	$user_id = wp_insert_user($user);
}

//エラーメッセージ取得
if(is_wp_error($user_id)) $errormsg = "すでに登録されているメールアドレスです";
if(!$verified) $errormsg = "メールアドレスが正しくありません";
if(!$cstmEmail) $errormsg = "メールアドレスをご入力ください";

get_header();
wp_reset_query();

?>

	<?php if(have_posts()): while(have_posts()): the_post(); ?>

		<header>
			<nav id="sitepath">
				<ul class="bread_crumb">
					<li><?php the_title(); ?></li>
				</ul>
			</nav>
			<h2><?php the_title(); ?></h2>
		</header>

		<div class="fullwidthForm" id="contact">

			<div class="contents">
				<div class="content">
					<?php
					if($errormsg){
						echo '<p class="errormsg">'.$errormsg.'</p>';
						$actions = get_permalink(get_page_by_path('mmgregist/temp', OBJECT));
						$submits = "他のメールアドレスでメルマガ登録をする";
						echo '<form action="'.$actions.'" method="post" name="form" id="mailmag" enctype="multipart/form-data">';
						include(TEMPLATEPATH.'/mmgregist-form.php');
						echo '<div class="formBtns"><input type="submit" name="" value="'.$submits.'" id="submit" /></div></form>';
					}else{	
						echo "<p>仮登録が完了いたしました。<br />仮登録確認メールをお送りしています。<br />メール本文の登録完了URLをクリックしてメルマガ本登録を完了してください。";
						mmg_temp_ntfct($cstmEmail, $user_id);
					}?>
				</div>
			</div>

		</div>

	<?php endwhile; endif; ?>

</article>
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>