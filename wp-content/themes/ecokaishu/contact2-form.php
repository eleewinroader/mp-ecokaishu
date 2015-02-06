<?php
/*
* @package Montser Platform
*/
?>

<div class="contents">
<div class="content">

<fieldset>
	<ol>
		<li class="formContents required">
			<div class="formTitle"><label for="cstmName">会員番号</label></div>
			<div class="formElements">
				<ul class="formElement">
					<li><input type="text" id="afUserID" name="afUserID" value="<?php if($afUserID) echo $afUserID;?>"<?php echo $disabled; ?> placeholder="例) 123456789" /></li>
				</ul>
			</div>
		</li>
		<li class="formContents required">
			<div class="formTitle"><label for="afUserName">お名前</label></div>
			<div class="formElements">
				<ul class="formElement">
					<li><input type="text" id="afUserName" name="afUserName" value="<?php if($afUserName) echo $afUserName;?>"<?php echo $disabled; ?> placeholder="例) エコ花子" /></li>
				</ul>
			</div>
		</li>
		<li class="formContents required">
			<div class="formTitle"><label for="afUserPhone">電話番号</label></div>
			<div class="formElements">
				<ul class="formElement">
					<li><input type="text" id="afUserPhone" name="afUserPhone" value="<?php if($afUserPhone) echo $afUserPhone;?>"<?php echo $disabled; ?> placeholder="例) 08012345678" /></li>
				</ul>
			</div>
		</li>
		<li class="formContents required" id="afUserCltDate">
			<div class="formTitle">引き取り希望日</div>
			<div class="formElements">
				<ul class="formElement">
				<?php
				$afUserCltDates = array("2月15日(日)", "2月16日(月)", "2月22日(日)", "2月23日(月)");
				for($i=0; $i<count($afUserCltDates); $i++){
					if(in_array($afUserCltDates[$i], $afUserCltDate)) $checked = " checked";
					else $checked = "";
					echo '<li><input type="checkbox" name="afUserCltDate['.$i.']" value="'.$afUserCltDates[$i].'" id="afUserCltDate'.$i.'"'.$checked.$disabled.' /><label for="afUserCltDate'.$i.'">'.$afUserCltDates[$i].'</label></li>';
				}?>
			</ul>
			</div>
		</li>
	</ol>
</fieldset>

<fieldset>
	<ol>
		<li class="formContents required">
			<div class="formTitle">個人情報の取扱について</div>
			<div class="formElements">
				<ul class="formElement">
					<li class="lawDoc"><?php echo get_post_field('post_content', 947); ?></li>
					<li class="lawBtn"><input type="checkbox" name="agreeLaw" value="同意" id="agreeLaw"<?php if($agreeLaw) echo ' checked'; echo $disabled; ?> /><label for="agreeLaw">上記個人情報の取扱について同意しました</label></li>
				</ul>
			</div>
		</li>
	</ol>
</fieldset>

<?php include(TEMPLATEPATH.'/page-validation.php'); ?>

</div>
</div>