<?php
/**
 * The main template file.
 *
 * Template name: メルマガ仮解除の完了
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
	$user = get_user_by('email', $cstmEmail);
	$args = array(
		'ID' => $user->ID,
		'role' => 'resignuser',
	);
	$user_id = wp_update_user($args);
}

//エラーメッセージ取得
if(is_wp_error($user_id)) $errormsg = "登録されていないメールアドレスです";
if(!$verified) $errormsg = "メールアドレスが正しくありません";
if(!$cstmEmail) $errormsg = "メールアドレスをご入力ください";

get_header();
wp_reset_query();?>

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
						$actions = get_permalink(get_page_by_path('mmgresign/temp', OBJECT));
						$submits = "メルマガを解除する";
						echo '<form action="'.$actions.'" method="post" name="form" id="mailmag" enctype="multipart/form-data">';
						include(TEMPLATEPATH.'/mmgregist-form.php');
						echo '<div class="formBtns"><input type="submit" name="" value="'.$submits.'" id="submit" /></div></form>';
					}else{	
						echo "<p>メルマガ仮解除を受け付けました。<br />仮解除確認メールをお送りしています。<br />メール本文のメルマガ解除URLをクリックしてメルマガ解除を完了してください。";
						mmg_resign_ntfct($cstmEmail, $user_id);
					}?>
				</div>
			</div>
		</div>

	<?php endwhile; endif; ?>

</article>
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>