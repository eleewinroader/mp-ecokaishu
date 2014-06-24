<?php
/*
* @package Montser Platform
* @subpackage MP-Ecokaishu
* @since MP-Ecokaishu 0.1.1
*/
?>

<div class="contents">
<div class="content">
<fieldset>
	<ol>
		<li class="formContents required">
			<div class="formTitle"><label for="prefectures">お住まいの地域</label></div>
			<div class="formElements">
				<div class="formElement">
				<select name="cstmPrefecture" id="prefectures"<?php echo $disabled; ?> required>
					<option value="">選択してください</option>
					<?php
					$args = array(
						'get' => 'all',
						'parent' => 0,
					);
					$terms = get_terms('cltarea', $args);
					asort($terms);
					$i = 0;
					foreach($terms as $term){
						if($term->name == $cstmPrefecture) $selected = " selected";
						else $selected = "";
						echo '<option class="prefecture'.$i.'" id="prefecture'.$i.'" value="'.$term->name.'"'.$selected.'>'.$term->name.'</option>';
						$i++;
					}?>
				</select>
				<?php
				$j = 0;
				foreach($terms as $term){
					$municipalities = get_term_children($term->term_id, 'cltarea');
					asort($municipalities);
					if($municipalities){
						echo '<select name="cstmMncplt'.$j.'" id="prefecture'.$j.'" class="municipality"'.$disabled.'>';
						echo '<option value="">市区町村を選択してください</option>';
						$k = 0;
						foreach($municipalities as $municipality){								
							$mncplt = get_term_by('id', $municipality, 'cltarea' );
							if($mncplt->name == $cstmMncplt) $selected = "selected";
							else $selected = "";
							echo '<option id="cstmMnciplt'.$k.'" value="'.$mncplt->name.'" class="'.$selected.'"'.$selected.'>'.$mncplt->name.'</option>';
						$k++;
						}
						echo '</select>';
					}
				$j++;
				}?>
				</div>
			</div>
		</li>
		<li class="formContents required">
			<div class="formTitle"><label for="cstmResidence">住居形態</label></div>
			<div class="formElements">
				<ul class="formElement">
					<li>
						<select name="cstmResidence" id="cstmResidence"<?php echo $disabled; ?>>
							<option value="">選択してください</option>
							<?php
							$cstmResidences = array("マンション", "戸建", "アパート", "オフィスビル", "その他");
							for($i=0; $i<count($cstmResidences); $i++){
								if($cstmResidences[$i] == $cstmResidence) $selected = " selected";
								else $selected = "";
								echo '<option id="cstmResidences'.$i.'" value="'.$cstmResidences[$i].'"'.$selected.'>'.$cstmResidences[$i].'</option>';
							}?>
						</select>
						<input type="text" id="cstmRsdcEtc" name="cstmRsdcEtc" value="<?php echo $cstmRsdcEtc; ?>"<?php echo $disabled; ?> placeholder="お住まいの住居についてご入力ください" />
					</li>
				</ul>
			</div>
		</li>
		<li class="formContents required">
			<div class="formTitle"><label for="cstmElvts">階数</label></div>
			<div class="formElements">
				<ul class="formElement">
					<li>
						<select name="cstmFloor" id="cstmFloor"<?php echo $disabled; ?>>
						<option value="">何階から運びますか</option>
						<?php
						$cstmFloors = array("1階", "2階", "3階", "4階", "5階", "6-10階", "11-20階", "20階以上");
						for($i=0; $i<count($cstmFloors); $i++){
							if($cstmFloors[$i] == $cstmFloor) $selected = " selected";
							else $selected = "";
							echo '<option id="cstmFloors'.$i.'" value="'.$cstmFloors[$i].'"'.$selected.'>'.$cstmFloors[$i].'</option>';
						}?>
						</select>
					</li>
				</ul>
			</div>
		</li>
		<li class="formContents required">
			<div class="formTitle"><label for="cstmElvts">エレベーター</label></div>
			<div class="formElements">
				<ul class="formElement">
					<li>
					<?php
					$cstmElvts = array("なし", "あり");
					for($i=0; $i<count($cstmElvts); $i++){
						if($cstmElvts[$i] == $cstmElvt) $checked = " checked";
						else $checked = "";
						echo '<input type="radio" name="cstmElvt" value="'.$cstmElvts[$i].'" id="cstmElvts'.$i.'"'.$checked.$disabled.' /><label for="cstmElvts'.$i.'">'.$cstmElvts[$i].'</label>';
					}?>
					</li>
				</ul>
			</div>
		</li>
		<li class="formContents required">
			<div class="formTitle"><label for="cstmName">お名前</label></div>
			<div class="formElements">
				<ul class="formElement">
					<li><input type="text" id="cstmName" name="cstmName" value="<?php if($cstmName) echo $cstmName;?>"<?php echo $disabled; ?> placeholder="例)エコ花子" /></li>
					<li><input type="checkbox" name="cstmType" value="法人" id="cstmType"<?php if($cstmType) echo ' checked'; echo $disabled; ?> /><label for="cstmType">法人</label></li>
				</ul>
			</div>
		</li>
		<li class="formContents required">
			<div class="formTitle"><label for="cstmPron">ふりがな</label></div>
			<div class="formElements">
				<ul class="formElement">
					<li><input type="text" id="cstmPron" name="cstmPron" value="<?php if($cstmPron) echo $cstmPron;?>"<?php echo $disabled; ?> placeholder="例)えこはなこ" /></li>					
				</ul>
			</div>
		</li>
		<li class="formContents required" id="email">
			<div class="formTitle"><label for="cstmEmail">メールアドレス</label></div>
			<div class="formElements">
				<div class="formElement"><input type="email" name="cstmEmail" id="cstmEmail" value="<?php if($cstmEmail) echo $cstmEmail; ?>"<?php echo $disabled; ?> placeholder="例)hoge@example.com" /></div>
			</div>
		</li>
		<li class="formContents required" id="phone">
			<div class="formTitle"><label for="cstmPhoneNum">ご連絡可能な電話番号</label></div>
			<div class="formElements">
				<div class="formElement"><?php
				echo '<input type="text" name="cstmPhoneNum" value="'.$cstmPhoneNum.'" id="cstmPhoneNum"'.$checked.$disabled.' placeholder="例)01234567890(数字のみ)" />';
				?></div>
			</div>
		</li>
		<li class="formContents required" id="replyWay">
			<div class="formTitle">エコランドからのご返答</div>
			<div class="formElements">
				<ul class="formElement">
				<?php
				$replyWays = array("どちらでも", "電話", "メール");
				for($i=0; $i<count($replyWays); $i++){
					if($replyWay){
						if($replyWays[$i] == $replyWay) $checked = " checked";
						else $checked = "";
					}else{
						if($replyWays[$i] == 'どちらでも') $checked = " checked";
						else $checked = "";
					}
					echo '<li><input type="radio" name="replyWay" value="'.$replyWays[$i].'" id="replyWays'.$i.'"'.$checked.$disabled.' /><label for="replyWays'.$i.'">'.$replyWays[$i].'</label></li>';
				}?>
			</ul>
			</div>
		</li>
	</ol>
</fieldset>

<fieldset>
	<ol>
		<li class="formContents required">
			<div class="formTitle">エコ回収対象品</div>
			<div class="formElements">
				<div class="formElement">
				<textarea name="cstmContents" class="animated" id="cstmContents" placeholder="例) 本棚(17cm×89cm×59cm)、木棚(三段、29cm×77cm×64cm)、衣装 クリアケース(65cm×17cm×45cm)×４個、ガラス棚(30cm×62cm×40cm)などなど"<?php echo $disabled; ?>><?php if($cstmContents) echo $cstmContents; ?></textarea>	
				</div>
				<p class="footnote"><small>※家具類や大きな品物は、「幅×奥行×高さ」などをお伝え頂くと正確なお見積もりができます。また、家電類は「型番号」、「メーカー名」、「年式」をお伝え頂くと、買取も含め、正確なお見積もりができます。お手数ですが、ご協力のほどよろしくお願いします。</small></p>
				<p class="footnote pink"><small>※原則、購入後５年以上経過している場合は買取は行っておりません。</small></p>
				
			</div>
		</li>
	</ol>
</fieldset>

<fieldset>
	<ol>
		<li class="formContents">
			<div class="formTitle">キャンペーン種類</div>
			<div class="formElements">
				<select name="campKind" id="campKind"<?php echo $disabled; ?>>
					<option value="">選択してください</option>
					<?php
					$campKinds = array();
					$campCodes = array();
					$args = array(
						"post_type" => "campaign",
						"campaignstatus" => "open",
						"posts_per_page" => -1
					);
					$camps = query_posts($args);
					foreach($camps as $camp){
						$campName = get_post_meta($camp->ID, "campInfo01", TRUE);
						if($campName) array_push($campKinds, $campName);
						if(campCode($camp)){
							$childrenClass = campCode($camp, "children");
							$code = substr($childrenClass, 7, 11);
							$code = str_replace("-", "_", $code);
							array_push($campCodes, $code);
						}
					}
					for($i=0; $i<count($campKinds); $i++){
						if($campCodes[$i] == $pr_code){
							$selected = " selected";
							$campName = $campKinds[$i];
						}else{
							$selected = "";
						}
						echo '<option id="campKinds'.$i.'" value="'.$campCodes[$i].'"'.$selected.'>'.$campKinds[$i].'</option>';
					}?>
				</select>
				<input type="hidden" name="campName" value="<?php echo $campName; ?>" />
			</div>
		</li>
	</ol>
</fieldset>

<fieldset>
	<ol>
		<li class="formContents" id="cltDay">
			<div class="formTitle"><label for="cltDays">集荷日</label></div>
			<div class="formElements">
				<ul class="formElement">
				<?php
				$cltDayArgs = array($cltDay0, $cltDay1, $cltDay2);				
				for($i=0; $i<3; $i++){
					$j = $i + 1;
					if(is_smartphone()){
						$today = date("Y-m-d");
						$type = "date";
						$mindate = ' min="'.$today.'"';
					}else{
						$type = "text";	
					}
					echo '<li><label for="cltDay'.$i.'">第'.$j.'希望</label><input type="'.$type.'" name="cltDay'.$i.'" class="datepicker" value="'.$cltDayArgs[$i].'" id="cltDay'.$i.'"'.$disabled.$mindate.' /></li>';
				}?>
				</ul>
		</li>
	</ol>
</fieldset>

<!--
<fieldset>
	<ol>
		<li class="formContents">
			<div class="formTitle"><label for="cpiItems">キャンペーン対象品</label></div>
			<div class="formElements">
				<p>下記は今月のキャンペーン対象の品目です。一つでも含まれれば、基本料金(3,240円)が無料になります。含まれている品目があれば、チェックしてください。</p>
				<ul class="formElement">
				<?php
				$cpiItemsArgs = array("食器棚", "電子ピアノ", "自転車", "ベッドフレーム", "ダイニングテーブル");
				for($i=0; $i<count($cpiItemsArgs); $i++){
					if(in_array($cpiItemsArgs[$i], $cpiItems)) $checked = " checked";
					else $checked = "";
					echo '<li><input type="checkbox" name="cpiItems[]" value="'.$cpiItemsArgs[$i].'" id="cpiItems'.$i.'"'.$checked.$disabled.' /><label for="cpiItems'.$i.'">'.$cpiItemsArgs[$i].'</label></li>';
				}?>	
				</ul>				
			</div>
		</li>
	</ol>
</fieldset>

<?php if($quiz != "eco"): ?>
<fieldset>
	<ol>
		<li class="formContents" id="coupon">
			<div class="formTitle">初回限定クーポン</div>
			<div class="formElements">
				<div class="formElement"><input type="checkbox" name="coupon" value="受け取る" id="getCoupon"<?php if($coupon) echo " checked"; echo $disabled; ?>/><label for="getCoupon">初回限定「基本料金100%OFF」クーポンを受け取る</label></div>
			</div>
		</li>
	</ol>
</fieldset>
<?php endif; ?>-->

<fieldset id="law">
	<ol>
		<li class="formContents required" id="law">
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

<input type="hidden" name="siteCode" value="<?php echo siteCode(); ?>" />
<input type="hidden" name="pr_code" value="<?php echo $_GET["pr_code"]; ?>" />
<input type="hidden" name="couponUsed" id="couponUsed" value="<?php echo $couponUsed; ?>" />
<input type="hidden" name="quiz" id="quiz" value="<?php echo $quiz; ?>" />

</div>
</div>

<?php include(TEMPLATEPATH.'/page-validation.php'); ?>