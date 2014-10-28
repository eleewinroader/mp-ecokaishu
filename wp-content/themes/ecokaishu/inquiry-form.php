<?php
/**
* The main template file.
* @package Montser Platform
* @subpackage MP-Ecokaishu 2.0
* @since MP-Ecokaishu 0.0
*/
?>

<div class="contents">
<div class="content">
<fieldset id="fwForm">
	<ol>
		<li class="formContents required" id="cltdItems">
			<div class="formTitle"><label for="cltdItems">今回、回収していただいた不用品は何ですか？</label></div>
			<div class="formElements">
				<ul>
					<?php
					$cltdItems = array(
						"パソコン",
						"テレビ",
						"洗濯機",
						"冷蔵庫",
						"自転車",
						"ダンボール",
						"エアコン",
						"ベッド",
						"ソファ",
						"エレクトーン",
						"タイヤ",
						"その他"
					);
					for($i=0; $i<count($cltdItems); $i++){
						if(in_array($cltdItems[$i], $cltdItem)) $checked = " checked";
						else $checked = "";
						echo '<li><input type="checkbox" name="cltdItem[]" value="'.$cltdItems[$i].'" id="cltdItems'.$i.'"'.$checked.$disabled.' /><label for="cltdItems'.$i.'">'.$cltdItems[$i].'</label>';
						if($cltdItems[$i] == "その他"){
							echo '<input type="text" name="cltdItemEtc" value="';
							if($cltdItemEtc) echo $cltdItemEtc;
							echo '" id="cltdItemEtc" class="cltdItemEtc"'.$disabled.' />';
						}
						echo '</li>';
					}?>
				</ul>		
			</div>
		</li>
		<li class="formContents" id="cues">
			<div class="formTitle"><label for="cues">今回、不用品を出そうと思ったきっかけは何ですか？</label></div>
			<div class="formElements">
				<ul>
					<?php
					$cues = array("お引越", "お片づけ", "新品の購入で、古いものを処分古い物を処分", "撤去・解体", "その他");
					for($i=0; $i<count($cues); $i++){
						if(in_array($cues[$i], $cue)) $checked = " checked";
						else $checked = "";
						echo '<li><input type="checkbox" name="cue[]" value="'.$cues[$i].'" id="cues'.$i.'"'.$checked.$disabled.' /><label for="cues'.$i.'">'.$cues[$i].'</label>';
						if($cues[$i] == "その他"){
							echo '<input type="text" name="cueEtc" value="';
							if($cueEtc) echo $cueEtc;
							echo '" id="cueEtc" class="cueEtc"'.$disabled.' />';
						}
						echo '</li>';
					}?>
				</ul>
			</div>
		</li>
		<li class="formContents" id="froms">
			<div class="formTitle"><label for="froms">当社のことはどうやってお知りになりましたか？</label></div>
			<div class="formElements">
				<ul>
					<?php
					$froms = array(
						"インターネットで検索",
						"知人からの紹介",
						"新聞折込チラシ",
						"ポストのチラシ",
						"トラックを見て",
						"フリーペーパー・雑誌",
						"ラジオCM",
						"リピート利用",
						"ダイレクトメール",
						"その他"
					);
					for($i=0; $i<count($froms); $i++){
						if(in_array($froms[$i], $from)) $checked = " checked";
						else $checked = "";
						echo '<li><input type="checkbox" name="from[]" value="'.$froms[$i].'" id="froms'.$i.'"'.$checked.$disabled.' /><label for="froms'.$i.'">'.$froms[$i].'</label>';
						if($froms[$i] == "インターネットで検索"){
							echo '<input type="text" name="searchEtc" value="';
							if($searchEtc) echo $searchEtc;
							echo '" id="searchEtc" placeholder="どんな検索ワードで検索しましたか？" class="searchEtc"'.$disabled.' />';
						}
						if($froms[$i] == "その他"){
							echo '<input type="text" name="fromEtc" value="';
							if($fromEtc) echo $fromEtc;
							echo '" id="fromEtc" class="fromEtc"'.$disabled.' />';
						}
						echo '</li>';
					}?>
				</ul>
			</div>
		</li>
		<li class="formContents" id="causesSelect">
			<div class="formTitle"><label for="causes">当社をお選びいただいた理由は何ですか？</label></div>
			<div class="formElements" id="causes">
				<ul>
					<?php
					$causes = array(
						"料金が安い",
						"受付の対応が良かった",
						"見積に来た人が良かった",
						"急ぎな対応が可能だった",
						"料金が明確で事前にわかる",
						"日時が指定できる",
						"運び出しをしてくれる",
						"大きな物も回収できる",
						"他でダメと言われた物も回収できる",
						"土日も対応できる",
						"買取もしている",
						"解体作業もしてくれる",
						"チラシの内容が良い",
						"ホームページが良い",
						"しっかりとした会社が運営している",
						"適正な処分とリサイクルをしている",
						"環境に対する考え方と取り組みをしている",
						"以前に利用した時に良かった",
						"知人に紹介された",
						"その他"
					);
					for($i=0; $i<count($causes); $i++){							
						if(in_array($causes[$i], $cause)) $checked = " checked";
						else $checked = "";
						echo '<li><input type="checkbox" name="cause[]" value="'.$causes[$i].'" class="causes" id="causes'.$i.'"'.$checked.$disabled.' /><label for="causes'.$i.'">'.$causes[$i].'</label>';
						if($causes[$i] == "その他"){
							echo '<input type="text" name="causeEtc" value="';
							if($causeEtc) echo $causeEtc;
							echo '" id="causeEtc" class="causeEtc"'.$disabled.' />';
						}
						echo '</li>';
					}?>
				</ul>
			</div>
		</li>
		<li class="formContents">
			<div class="formTitle">当社をお選びいただいた理由の中で、ベスト3をお選びください。</div>
			<div class="formElements" id="causesRank">
				<ul>
					<li>
						<label for="causeFirst">1番</label>
						<select name="causeFirst" id="causeFirst" class="select">
							<option value="">選択してください</option>
						</select>
					</li>
					<li>
						<label for="causeSecond">2番</label>
						<select name="causeSecond" id="causeSecond" class="select">
							<option value="">選択してください</option>
						</select>
					</li>
					<li>
						<label for="causeThird">3番</label>
						<select name="causeThird" id="causeThird" class="select">
							<option value="">選択してください</option>
						</select>
					</li>
				</ul>
			</div>
		</li>
	</ol>
</fieldset>

<fieldset id="fwForm">
	<ol>
		<li class="formContents required" id="voiceCCs">
			<div class="formTitle"><label for="voiceCCs">電話受付、メール対応など受付スタッフの対応はいかがでしたか？</label></div>
			<div class="formElements">
				<ul class="fwRadio">
					<?php
					$voiceCCs = array("大変よかった", "まあまあよかった", "普通", "いまいち", "悪かった");
					for($i=0; $i<count($voiceCCs); $i++){
						if($voiceCCs[$i] == $voiceCC) $checked = " checked";
						else $checked = "";
						echo '<li><input type="radio" name="voiceCC" value="'.$voiceCCs[$i].'" id="voiceCCs'.$i.'"'.$checked.$disabled.' required /><label for="voiceCCs'.$i.'">'.$voiceCCs[$i].'</label></li>';
					}?>
					<li class="fwList">
						<label for="voiceCCCmt" class="subtitle">電話受付、メール対応など受付スタッフの対応について「<span></span>」と思ったのはなぜですか？</label>
						<textarea name="voiceCCCmt" id="voiceCCCmt" placeholder=""<?php echo $disabled; ?> class="animated" required><?php if($voiceCCCmt) echo $voiceCCCmt; ?></textarea>
					</li>
				</ul>
			</div>
		</li>
		<li class="formContents required" id="voiceCSs">
			<div class="formTitle"><label for="voiceCSs">当日の回収スタッフのご対応はいかがでしたか？</label></div>
			<div class="formElements">
				<ul class="fwRadio">
					<?php
					$voiceCSs = array("大変よかった", "まあまあよかった", "普通", "いまいち", "悪かった");
					for($i=0; $i<count($voiceCSs); $i++){
						if($voiceCSs[$i] == $voiceCS) $checked = " checked";
						else $checked = "";
						echo '<li><input type="radio" name="voiceCS" value="'.$voiceCSs[$i].'" id="voiceCSs'.$i.'"'.$checked.$disabled.' required /><label for="voiceCSs'.$i.'">'.$voiceCSs[$i].'</label></li>';
					}?>
					<li class="fwList">
						<label for="voiceCSCmt" class="subtitle">当日の回収スタッフのご対応について「<span></span>」と思ったのはなぜですか？</label>
						<textarea name="voiceCSCmt" id="voiceCSCmt" placeholder=""<?php echo $disabled; ?> class="animated" required><?php if($voiceCSCmt) echo $voiceCSCmt; ?></textarea>
					</li>
				</ul>
			</div>
		</li>
		<li class="formContents required" id="vocieCosts">
			<div class="formTitle"><label for="voiceCosts">回収料金についての全体的な感想はいかがでしょうか？</label></div>
			<div class="formElements">
				<ul class="fwRadio">
					<?php
					$voiceCosts = array("安すぎる", "まあまあ安い", "普通", "ちょっと高い", "高すぎるけど仕方なかった");
					for($i=0; $i<count($voiceCosts); $i++){
						if($voiceCosts[$i] == $voiceCost) $checked = " checked";
						else $checked = "";
						echo '<li><input type="radio" name="voiceCost" value="'.$voiceCosts[$i].'" id="voiceCosts'.$i.'"'.$checked.$disabled.' required /><label for="voiceCosts'.$i.'">'.$voiceCosts[$i].'</label></li>';
					}?>
					<li class="fwList">
						<label for="voiceCostCmt" class="subtitle">回収料金が「<span></span>」と思ったのはなぜですか？</label>
						<textarea name="voiceCostCmt" id="voiceCostCmt" placeholder=""<?php echo $disabled; ?> class="animated" required><?php if($voiceCostCmt) echo $voiceCostCmt; ?></textarea>
					</li>
				</ul>
			</div>
		</li>
		<li class="formContents required" id="vocieHp">
			<div class="formTitle">エコランドのホームページはいかがでしょうか？</div>
			<div class="formElements">
				<ul class="fwRadio">
					<?php
					$voiceHPs = array("大変よかった", "まあまあよかった", "普通", "いまいち", "悪かった");
					for($i=0; $i<count($voiceHPs); $i++){
						if($voiceHPs[$i] == $voiceHP) $checked = " checked";
						else $checked = "";
						echo '<li><input type="radio" name="voiceHP" value="'.$voiceHPs[$i].'" id="voiceHPs'.$i.'"'.$checked.$disabled.' required /><label for="voiceHPs'.$i.'">'.$voiceHPs[$i].'</label></li>';						
					}?>
					<li class="fwList">
						<label for="voiceHPCmt" class="subtitle">ホームページについて「<span></span>」と思ったのはなぜですか？</label>
						<textarea name="voiceHPCmt" id="voiceHPCmt" placeholder=""<?php echo $disabled; ?> class="animated" required><?php if($voiceHPCmt) echo $voiceHPCmt; ?></textarea>
					</li>
				</ul>
			</div>	
		</li>
		<li class="formContents" id="options">
			<div class="formTitle"><label for="options">ご利用いただいたオプションサービスがあれば、選択してください</label></div>
			<div class="formElements">
				<ul>
					<?php
					$options = array(
						"タンス・ベッドなど家具の解体",
						"階段を通る運び出し",
						"吊り降ろし作業",
						"お部屋の掃き掃除と拭き掃除",
						"お時間帯の枠指定",
						"指定時間ぴったりのお伺い",
						"PCデータ物理消去",
						"レディースサービス",
						"エアコンの取外し",
						"大型物置の解体",
						"家具の移動・AV配線"
					);
					for($i=0; $i<count($options); $i++){
						if(in_array($options[$i], $option)) $checked = " checked";
						else $checked = "";
						echo '<li><input type="checkbox" name="option[]" value="'.$options[$i].'" id="options'.$i.'"'.$checked.$disabled.' /><label for="options'.$i.'">'.$options[$i].'</label></li>';
					}?>
				</ul>
			</div>
		</li>
		<li class="formContents">
			<div class="formTitle"><label for="voiceEtcSvc">今後こんなサービスをして欲しいなどのご要望がありましたらお教えください。</label></div>
			<div class="formElements">
				<textarea name="voiceEtcSvc" id="voiceEtcSvc" placeholder=""<?php echo $disabled; ?> class="animated"><?php if($voiceEtcSvc) echo $voiceEtcSvc; ?></textarea>
			</div>
		</li>
		<li class="formContents">
			<div class="formTitle"><label for="voiceEtc">その他、サービス全般について、なにかご意見・ご感想・アドバイスなどありましたらお願い致します。</label></div>
			<div class="formElements">
				<textarea name="voiceEtc" id="voiceEtc" placeholder=""<?php echo $disabled; ?> class="animated"><?php if($voiceEtc) echo $voiceEtc; ?></textarea>
			</div>
		</li>
	</ol>
</fieldset>

<div id="test"></div>

<fieldset id="fwForm">
	<ol>
		<li class="formContents" id="cttCors">
			<div class="formTitle"><label for="cttCors">不用品を出すにあたって、他社さんにも相談されましたか？</label></div>
			<div class="formElements" id="cttCors">
				<ul>
					<li>
						<?php
						$cttCors = array("はい", "いいえ");
						for($i=0; $i<count($cttCors); $i++){
							if($cttCors[$i] == $cttCor) $checked = " checked";
							else $checked = "";
							echo '<input type="radio" name="cttCor" value="'.$cttCors[$i].'" id="cttCors'.$i.'"'.$checked.$disabled.' /><label for="cttCors'.$i.'">'.$cttCors[$i].'</label>';
						}?>
						<ul id="cttCorsPro">
							<li>
								<label for="cttedCors" class="subtitle">"はい"と答えられたお客様、どちらの会社にご相談されましたか？</label>
								<ul>
								<?php
								$cttedCors = array(
									"クリーンクルー",
									"ホームズ",
									"片付けレスキュー隊",
									"片付けステーション",
									"スキット",
									"片付け団",
									"ワンナップ",
									"その他"
								);
								for($i=0; $i<count($cttedCors); $i++){							
									if(in_array($cttedCors[$i], $cttedCor)) $checked = " checked";
									else $checked = "";
									echo '<li><input type="checkbox" name="cttedCor[]" value="'.$cttedCors[$i].'" id="cttedCors'.$i.'"'.$checked.$disabled.' /><label for="cttedCors'.$i.'">'.$cttedCors[$i].'</label>';
									if($cttedCors[$i] == "その他"){
										echo '<input type="text" name="cttedCorEtc" value="';
										if($cttedCorEtc) echo $cttedCorEtc;
										echo '" id="cttedCorEtc" class="cttedCorEtc"'.$disabled.' />';
									}
									echo '</li>';
								}?>
								</ul>
							</li>
							<li>
								<label for="notAplyCors" class="subtitle">"はい"と答えられたお客様、他社を選ばなかった理由は何ですか？</label>
								<ul>
								<?php
								$notAplyCors = array(
									"料金が高かった",
									"受付の対応",
									"日時の希望に合わなかった",
									"エリアが合わなかった",
									"その他",
								);
								for($i=0; $i<count($notAplyCors); $i++){
									if(in_array($notAplyCors[$i], $notAplyCor)) $checked = " checked";
									else $checked = "";
									echo '<li><input type="checkbox" name="notAplyCor[]" value="'.$notAplyCors[$i].'" id="notAplyCors'.$i.'"'.$checked.$disabled.' /><label for="notAplyCors'.$i.'">'.$notAplyCors[$i].'</label>';
									if($notAplyCors[$i] == "その他"){
										echo '<input type="text" name="notAplyCorEtc" value="';
										if($notAplyCorEtc) echo $notAplyCorEtc;
										echo '" id="notAplyCorEtc" class="notAplyCorEtc"'.$disabled.' />';
									}
									echo '</li>';
								}?>
							</li>
						</ul>
					</li>
				</ul>				
			</div>
		</li>
		<li class="formContents">
			<div class="formTitle"><label for="cttOrgs">不用品を出すにあたって、自治体には相談されましたか？</label></div>
			<div class="formElements" id="cttOrgs">
				<ul>
					<li>
						<?php
						$cttOrgs = array("はい", "いいえ");
						for($i=0; $i<count($cttOrgs); $i++){
							if($cttOrgs[$i] == $cttOrg) $checked = " checked";
							else $checked = "";
							echo '<input type="radio" name="cttOrg" value="'.$cttOrgs[$i].'" id="cttOrgs'.$i.'"'.$checked.$disabled.' /><label for="cttOrgs'.$i.'">'.$cttOrgs[$i].'</label>';
						}?>
						<ul>
							<li id="cttOrgsPro">
								<label for="notAplyOrgs" class="subtitle">"はい"と答えられたお客様、自治体を選ばなかった理由は何ですか？</label>
								<ul>
								<?php
								$notAplyOrgs = array(
									"日時の希望に合わなかった",
									"受付の対応",
									"その品物については回収できないと言われた",
									"外に運び出すのは面倒",
									"解体作業をしてもらえない",
									"シールを買って貼るのが面倒",
									"その他",
								);
								for($i=0; $i<count($notAplyOrgs); $i++){
									if(in_array($notAplyOrgs[$i], $notAplyOrg)) $checked = " checked";
									else $checked = "";
									echo '<li><input type="checkbox" name="notAplyOrg[]" value="'.$notAplyOrgs[$i].'" id="notAplyOrgs'.$i.'"'.$checked.$disabled.' /><label for="notAplyOrgs'.$i.'">'.$notAplyOrgs[$i].'</label>';
									if($notAplyOrgs[$i] == "その他"){
										echo '<input type="text" name="notAplyOrgEtc" value="';
										if($notAplyOrgEtc) echo $notAplyOrgEtc;
										echo '" id="notAplyOrgEtc" class="notAplyOrgEtc"'.$disabled.' />';
									}
									echo '</li>';
								}?>
								</ul>
							</li>
							<li id="cttOrgsCon">
								<label for="notCttOrgs" class="subtitle">"いいえ"と答えられたお客様、自治体に相談されなかったのはなぜですか？</label>
								<ul>
								<?php
								$notCttOrgs = array(
									"希望の日時に回収してもらえないから",
									"急いで処分したかったから",
									"不用品を外に運び出せないから",
									"不用品が11個以上あったから",
									"シール貼ったりするのが面倒だから",
									"回収してもらえない不用品があるから",
									"その他",
								);
								for($i=0; $i<count($notCttOrgs); $i++){
									if(in_array($notCttOrgs[$i], $notCttOrg)) $checked = " checked";
									else $checked = "";
									echo '<li><input type="checkbox" name="notCttOrg[]" value="'.$notCttOrgs[$i].'" id="notCttOrgs'.$i.'"'.$checked.$disabled.' /><label for="notCttOrgs'.$i.'">'.$notCttOrgs[$i].'</label>';
									if($notCttOrgs[$i] == "その他"){
										echo '<input type="text" name="notCttOrgEtc" value="';
										if($notCttOrgEtc) echo $notCttOrgEtc;
										echo '" id="notCttOrgEtc" class="notCttOrgEtc"'.$disabled.' />';
									}
									echo '</li>';
								}?>
								</ul>
							</li>
						</ul>
					</li>
				</ul>
			</div>
		</li>
	</ol>
</fieldset>

<div id="cstmInfoTitle">お客様情報</div>
<div id="cstmInfo">
<fieldset>
	<ol>
		<li class="formContents required">
			<div class="formTitle"><label for="cstmName">お名前</label></div>
			<div class="formElements">
				<div class="formElement">
					<ul>
						<li><input type="text" id="cstmName" name="cstmName" value="<?php if($cstmName) echo $cstmName;?>"<?php echo $disabled; ?> placeholder="例)エコ花子" /></li>
						<li><input type="checkbox" name="cstmType" value="法人" id="cstmType"<?php if($cstmType) echo ' checked'; echo $disabled; ?> /><label for="cstmType">法人</label></li>
					</ul>
				</div>				
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
		<li class="formContents required" id="email">
			<div class="formTitle"><label for="cstmEmail">メールアドレス</label></div>
			<div class="formElements">
				<div class="formElement"><input type="email" name="cstmEmail" id="cstmEmail" value="<?php if($cstmEmail) echo $cstmEmail; ?>"<?php echo $disabled; ?> placeholder="例)hoge@example.com" /></div>
			</div>
		</li>
		<li class="formContents required" id="phone">
			<div class="formTitle"><label for="cstmPhoneNum">ご連絡可能な電話番号</label></div>
			<div class="formElements">
				<div class="formElement"><?php echo '<input type="text" name="cstmPhoneNum" value="'.$cstmPhoneNum.'" id="cstmPhoneNum"'.$checked.$disabled.' placeholder="例)01234567890(数字のみ)" />'; ?></div>
			</div>
		</li>

		<li class="formContents required">
			<div class="formTitle"><label for="cstmBD">生年月日</label></div>
			<div class="formElements">
				<div class="formElement"><input type="text" name="cstmBD" class="datepicker" value="<?php echo $cstmBD; ?>" id="cstmBD"<?php echo $disabled; ?> required /></div>
			</div>
		</li>

		<li class="formContents required" id="cstmSex">
			<div class="formTitle radio"><label for="cstmSexs">性別</label></div>
			<div class="formElements">
				<ul class="formElement">
				<?php
				$cstmSexs = array("女性", "男性");
				for($i=0; $i<count($cstmSexs); $i++){
					if($cstmSexs[$i] == $cstmSex) $checked = " checked";
					else $checked = "";
					echo '<li><input type="radio" name="cstmSex" value="'.$cstmSexs[$i].'" id="cstmSexs'.$i.'"'.$checked.$disabled.' required /><label for="cstmSexs'.$i.'">'.$cstmSexs[$i].'</label></li>';
				}?>
				</ul>
			</div>
		</li>

		<li class="formContents required" id="cstmMrg">
			<div class="formTitle"><label for="cstmMrg">未婚・既婚</label></div>
			<div class="formElements radio">
				<ul class="formElement">
				<?php
				$cstmMrgs = array("未婚", "既婚");
				for($i=0; $i<count($cstmMrgs); $i++){
					if($cstmMrgs[$i] == $cstmMrg) $checked = " checked";
					else $checked = "";
					echo '<li><input type="radio" name="cstmMrg" value="'.$cstmMrgs[$i].'" id="cstmMrgs'.$i.'"'.$checked.$disabled.' required /><label for="cstmMrgs'.$i.'">'.$cstmMrgs[$i].'</label></li>';
				}?>
				</ul>
			</div>
		</li>

		<li class="formContents required" id="cstmResType">
			<div class="formTitle"><label for="cstmResType">一緒に暮らしている人数</label></div>
			<div class="formElements radio">
				<ul class="formElement">
				<?php
				$cstmResTypes = array("お一人暮らし", "二人以上");
				for($i=0; $i<count($cstmResTypes); $i++){
					if($cstmResTypes[$i] == $cstmResType) $checked = " checked";
					else $checked = "";
					echo '<li><input type="radio" name="cstmResType" value="'.$cstmResTypes[$i].'" id="cstmResTypes'.$i.'"'.$checked.$disabled.' required /><label for="cstmResTypes'.$i.'">'.$cstmResTypes[$i].'</label></li>';
				}?>
				</ul>
			</div>
		</li>
		<li class="errormsg"><?php echo $errormsg['cstmResType']; ?></li>
		<li class="formContents required" id="cstmJob">
			<div class="formTitle"><label for="cstmJob">職業</label></div>
			<div class="formElements radio">
				<ul class="formElement">
					<?php
					$cstmJobs = array("主婦", "会社員・公務員", "学生", "自営業", "その他");
					for($i=0; $i<count($cstmJobs); $i++){
						if($cstmJobs[$i] == $cstmJob) $checked = " checked";
						else $checked = "";
						echo '<li><input type="radio" name="cstmJob" value="'.$cstmJobs[$i].'" id="cstmJobs'.$i.'"'.$checked.$disabled.' required /><label for="cstmJobs'.$i.'">'.$cstmJobs[$i].'</label>';
						if($cstmJobs[$i] == "その他"){
							echo '<input type="text" name="cstmJobEtc" value="';
							if($cstmJobEtc) echo $cstmJobEtc;
							echo '" id="cstmJobEtc" class="cstmJobEtc"'.$disabled.' />';
						}
						echo '</li>';
					}?>
				</ul>
			</div>
		</li>
		<li class="errormsg"><?php echo $errormsg['cstmJob']; ?></li>
		<li class="formContents" id="cstmInt">
			<div class="formTitle"><label for="cstmInt">気になるトピック</label></div>
			<div class="formElements">
				<ul class="formElement">
					<?php
					$cstmInts = array(
						"恋愛・結婚",
						"人間関係の悩み",
						"お買い物・節約術",
						"整理・収納",
						"ファッション",
						"グルメ",
						"エンタメ・映画・音楽",
						"旅行・お出かけ",
						"暮らし方",
						"ヘルス・ビューティー",
						"その他"
					);
					for($i=0; $i<count($cstmInts); $i++){
						if(in_array($cstmInts[$i], $cstmInt)) $checked = " checked";
						else $checked = "";
						echo '<li><input type="checkbox" name="cstmInt[]" value="'.$cstmInts[$i].'" id="cstmInts'.$i.'"'.$checked.$disabled.' /><label for="cstmInts'.$i.'">'.$cstmInts[$i].'</label>';
						if($cstmInts[$i] == "その他"){
							echo '<input type="text" name="cstmIntEtc" value="';
							if($cstmIntEtc) echo $cstmIntEtc;
							echo '" id="cstmIntEtc" class="cstmIntEtc"'.$disabled.' />';
						}
						echo '</li>';
					}?>
				</ul>
			</div>
		</li>
	</ol>
</fieldset>

<fieldset>
	<ol>
		<li class="formContents" id="coupon">
			<div class="formTitle">アンケートありがとうクーポン</div>
			<div class="formElements">
				<div class="formElement"><input type="checkbox" name="coupon" value="受け取る" id="getCoupon"<?php if($coupon) echo " checked"; echo $disabled; ?>/><label for="getCoupon">アンケート回答者限定「基本料金100%OFF」クーポンを受け取る</label></div>
			</div>
		</li>
	</ol>
</fieldset>

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
<input type="hidden" name="pswd" value="<?php echo $chaKey; ?>" />
</div>
</div>

<?php include(TEMPLATEPATH.'/page-validation.php'); ?>