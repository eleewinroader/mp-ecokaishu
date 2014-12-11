<?php
/**
 * The main template file.
 *
 * @package WordPress
 * @subpackage ecokaishuCMS
 * @since ecokaishuCMS 0.0
 */
?>
<fieldset>
	<ol>
		<li class="formContents required">
			<div class="formTitle"><label for="cstmEmail">メールアドレス</label></div>
			<div class="formElements">
				<input type="email" name="cstmEmail" id="cstmEmail" value="<?php echo $cstmEmail; ?>"<?php echo $disabled; ?> placeholder="メールアドレスをご入力ください" required />										
			</div>
		</li>
	</ol>
</fieldset>