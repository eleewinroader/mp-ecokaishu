<?php
/**
 * The main template file.
 *
 * Template name: メルマガ本解除の完了
 * 
 * @package WordPress
 * @subpackage ecokaishuCMS
 * @since ecokaishuCMS 0.0
 */
require_once(ABSPATH ."wp-admin".'/includes/user.php');

global $wpdb, $user_ID;

$user_id = $_GET['id'];
$user = get_user_by('id', $user_id);

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
					if(is_wp_error($user_id)){
						echo '<p class="errormsg">仮解除から２４時間以上経過いたしました。お手数ですが、再度仮解除からやり直してください。</p>';
						$actions = get_permalink(get_page_by_path('mmgresign/temp', OBJECT));
						$submits = "メルマガの再解除をする";
						echo '<form action="'.$actions.'" method="post" name="form" id="mailmag" enctype="multipart/form-data">';
						include(TEMPLATEPATH.'/mmgregist-form.php');
						echo 'restard';
						echo '<div class="formBtns"><input type="submit" name="" value="'.$submits.'" id="submit" /></div></form>';
					}else{	
						echo "<p>メルマガ本解除が完了いたしました。またのご登録をお待ちしております。</p>";
						wp_delete_user($user_id);
					}?>
				</div>
			</div>

		</div>

	<?php endwhile; endif; ?>

</article>
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>