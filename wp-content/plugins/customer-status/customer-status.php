<?php
/*
Plugin Name: Customer status
Description: クーポン利用者ステータス変更
Version: 1.0
Author: RESTARD
*/
function customerStatus_admin(){
	global $wpdb;
	if ( $_POST['mode'] == 'change'){
		$error = '';
		$updated = '';
		
		if ( empty ( $_POST['code'] ) ) {
			$error .= '<p>受付番号を入力してください</p>';
		} else {
			$codes = explode ( "\n", $_POST['code'] );
			if(!is_array($codes)) $codes[] = $_POST['code'];
		}

		$codes = preg_replace('/(\s|　)/','',$codes);

		$type = $_POST["postType"];
		if($type == "estimationrequest") $cf = "estmtInfo9";
		else $cf = "contactInfo4";

		$cstm = $_POST["cstmType"];
		if($cstm == "customer") $role = "customer";
		else $role = "couponuser";

	print_r($role);


		foreach($codes as $code){
			$page = get_page_by_title($code, object, $type);
			$cstmEmail = get_post_meta($page->ID, $cf, single);
			$cstmInfo = get_user_by("email", $cstmEmail);
			$cstmID = wp_update_user(array("ID" => $cstmInfo->ID, "role" => $role));
		}		
		
		if($cstmID) $updated = '<p>変更しました。</p>';
			
	}
?>
<div class="wrap">
<div id="icon-themes" class="icon32">&nbsp;</div><h2>ユーザーステータス変更</h2>
<?php
	if ( $error )
		echo '<div class="error">'  . $error . '</div>';
	if ( $updated )
		echo '<div class="updated">'  . $updated . '</div>';
?>
<form method="post" action="?page=customerStatus">
<table class="form-table">
<tr valign="top">
<th scope="row"><label for="fCstmType">顧客ステータス</label></th>
<td>
<select name="cstmType" id="fCstmType">
<option value="customer">会員</option>
<option value="couponuser">クーポン未使用</option>
</select>
</td>
</tr>
<tr valign="top">
<th scope="row"><label for="fPostType">受付番号種類</label></th>
<td>
<select name="postType" id="fPostType">
<option value="">受付番号の種類を選択</option>
<option value="faq">お問い合わせ</option>
<option value="estimationrequest">見積依頼</option>
</select>
</td>
</tr>
<tr valign="top">
<th scope="row"><label for="fCode">受付番号</label></th>
<td>
<textarea name="code" cols="50" rows="20" type="text" id="fCode"></textarea>
</td>
</tr>
</table>
<p class="submit"><input type="submit" value="変更する" class="button-primary"></p>
<input type="hidden" name="mode" value="change" />
</form>
<!-- .wrap --></div>
<?php
}

function customerStatus_menu() {
	add_menu_page( 'Customer Status', 'Customer Status', 10, 'customerStatus', 'customerStatus_admin', '' );
}
add_action( 'admin_menu', 'customerStatus_menu' );
?>