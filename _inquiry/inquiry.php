<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8" />
<title>Question Form</title>
<link href="css/screen.css" rel="stylesheet" type="text/css" media="all">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="js/jquery-1.11.1.js"></script>
<script src="js/jquery.validate.js"></script>
</head>
<body>
<div class="container">
	<form action="" id="frmQuestion">
		<!--start section01-->
		<section class="section" id="section01">
			<div class="intro">
				<p>エコランドの満足度レビューにご協力ください。</p>
				<p>
					このたびはエコランドのサービスをご利用頂き、誠にありがとうございました。<br />
					ぜひサービスに関するご感想・ご意見をお聞かせください。<br />
					頂いたご意見は今後のサービス品質向上のために活用させて頂きます。
				</p>
				<p>
					レビューにお答えいただくためには、エコNo.とパスワードが必要です。<br />
					（エコNo.とパスワードは領収書に記載されています）
				</p>
				<p>
					お客様レビューの内容はエコランドHP上に掲載されます。<br />
					※お客様の個人情報は掲載致しません。
				</p>
				<a href="#" id="btnNext01" class="btnNext">次へ</a>
			</div>
		</section>
		<!--end section01-->
		<!--start section02-->
		<section class="section" id="section02">
			<p>
				エコランドサービスのレビューのためには<br />
				下記の個人情報の取り扱いについて同意が必要です
			</p>
			<dl class="txtNote">
				<dt>個人情報の取扱について 株式会社ウインローダー</dt>
				<dt>1.利用目的</dt>
				<dd>サービスに関するお知らせ及びご相談やお問合せにお応えするため</dd>
				<dt>2.個人情報の第三者提供</dt>
				<dd>(1)提供する目的</dd>
			</dl>
			<a href="#" id="btnNext02" class="btnNext">同意してレビューを開始</a>
		</section>
		<!--end section02-->
		<!--start section03-->
		<section class="section" id="section03">
			<h2><span>1</span>/10</h2>
			<p>
				エコNo.とパスワードを入力してください。<br />
				エコNo.は領収書の右上に記載されている「案件ID」です。<br />
				パスワードは領収書の左上に記載されています。
			</p>
			<div class="frmGeneral">
				<ul>
					<li><input id="txtEcoNo" name="txtEcoNo" type="text" placeholder="エコNo.を入力してください" required /></li>
					<li><input id="txtPassword" name="txtPassword" type="password" placeholder="パスワードを入力してください" required /></li>
					<li><a href="javascript:void(0);" id="btnPrev03" class="btnPrev">戻る</a><a href="javascript:void(0);" id="btnNext03" class="btnNext">次へ</a></li>
				</ul>
			</div>
		</section>
		<!--end section03-->
		<!--start section04-->
		<section class="section" id="section04">
			<h2><span>2</span>/10</h2>
			<p>HP上に表示する際使うニックネームを入力してください。</p>
			<div class="frmGeneral">
				<ul>
					<li><input id="txtNickname" name="txtNickname" type="text" placeholder="ニックネームを入力してください" required /></li>
					<li>
						<p>
							<input type="radio" name="rdGender" id="rdFemale" checked />
							<label for="rdFemale">女性</label>
						</p>
						<p>
							<input type="radio" name="rdGender" id="rdMale" />
							<label for="rdMale">男性</label>
						</p>
						<p>
							<label>男性</label>
							<select>
								<option>20代</option>
								<option>30代</option>
								<option>40代</option>
								<option>50代</option>
								<option>60代</option>
								<option>70代以上</option>
							</select>
						</p>
					</li>
					<li><a href="javascript:void(0);" id="btnPrev04" class="btnPrev">戻る</a><a href="javascript:void(0);" id="btnNext04" class="btnNext">次へ</a></li>
				</ul>
			</div>
		</section>
		<!--end section04-->
		<!--start section05-->
		<section class="section" id="section05">
			<h2><span>3</span>/10</h2>
			<div class="frmGeneral">
				<p>今回エコ回収にお伺いした地域はどちらですか。</p>
				<ul>
					<li>
						<p>
							<select id="prefectures" name="slbArea" class="slbArea">
								<option value="">都道府県</option>
								<option id="prefecture0" value="東京都">東京都</option>
							</select>
						</p>
						<p>
							<select id="cities" name="slbArea" class="slbArea">
								<option value="">市区町村</option>
								<option id="city01" value="東京都">東京都</option>
							</select>
						</p>
					</li>
				</ul>
				<p>エコ回収させて頂いた品物をお選びください。</p>
				<ul>
					<li>
						<p>
							<input type="checkbox" name="cbProduct" class="cbProduct" id="pro01" value="ベッド" />
							<label for="pro01">ベッド</label>
						</p>	
						<p>
							<input type="checkbox" name="cbProduct" class="cbProduct" id="pro02" value="ソファ" />
							<label for="pro02">ソファ</label>
						</p>
						<p>
							<input type="checkbox" name="cbProduct" class="cbProduct" id="pro03" value="テレビ" />
							<label for="pro03">テレビ</label>
						</p>
						<p>
							<input type="checkbox" name="cbProduct" class="cbProduct" id="pro04" value="冷蔵庫" />
							<label for="pro04">冷蔵庫</label>
						</p>
						<p>
							<input type="checkbox" name="cbProduct" class="cbProduct" id="pro05" value="洗濯機" />
							<label for="pro05">洗濯機</label>
						</p>
						<p>
							<input type="checkbox" name="cbProduct" class="cbProduct" id="pro06" value="パソコン" />
							<label for="pro06">パソコン</label>
						</p>
						<p>
							<input type="checkbox" name="cbProduct" class="cbProduct" id="pro07" value="その他" />
							<label for="pro07">その他</label>
						</p>
					</li>
					<li>
						<input id="txtProductDesc" name="txtProductDesc" type="text" placeholder="その他のアイテムについて具体的記述してください。" />
					</li>
					<li><a href="javascript:void(0);" id="btnPrev05" class="btnPrev">戻る</a><a href="javascript:void(0);" id="btnNext05" class="btnNext">次へ</a></li>
				</ul>
			</div>
		</section>
		<!--end section05-->
		<!--start section06-->
		<section class="section" id="section06">
			<h2><span>4</span>/10</h2>
			<p>今回、不用品を出そうと思ったきっかけは何ですか？</p>
			<div class="frmGeneral">
				<ul>
					<li>
						<p>
							<input type="checkbox" name="cbService" class="cbService" id="ser01" value="引越" />
							<label for="ser01">引越</label>
						</p>	
						<p>
							<input type="checkbox" name="cbService" class="cbService" id="ser02" value="片付け" />
							<label for="ser02">片付け</label>
						</p>
						<p>
							<input type="checkbox" name="cbService" class="cbService" id="ser03" value="買い替え" />
							<label for="ser03">買い替え</label>
						</p>
						<p>
							<input type="checkbox" name="cbService" class="cbService" id="ser04" value="その他" />
							<label for="ser04">その他</label>
						</p>
					</li>
					<li><input type="text" id="txtServiceDesc" name="txtServiceDesc" placeholder="その他のきっかけについて具体的記述してください。" /></li>
					<li><a href="javascript:void(0);" id="btnPrev06" class="btnPrev">戻る</a><a href="javascript:void(0);" id="btnNext06" class="btnNext">次へ</a></li>
				</ul>
			</div>
		</section>
		<!--end section06-->
		<!--start section07-->
		<section class="section" id="section07">
			<h2><span>5</span>/10</h2>
			<div class="frmGeneral">
				<p>当社をお選びいただいた理由は何ですか？</p>
				<ul id="causes">
					<li>
						<p>
							<input type="checkbox" name="cbReason" class="cbReason" id="rs01" value="急な対応が可能だった" />
							<label for="rs01">急な対応が可能だった</label>
						</p>	
						<p>
							<input type="checkbox" name="cbReason" class="cbReason" id="rs02" value="日付が指定できる" />
							<label for="rs02">日付が指定できる</label>
						</p>
						<p>
							<input type="checkbox" name="cbReason" class="cbReason" id="rs03" value="運び出しができる" />
							<label for="rs03">運び出しができる</label>
						</p>
						<p>
							<input type="checkbox" name="cbReason" class="cbReason" id="rs04" value="土日も対応できる" />
							<label for="rs04">土日も対応できる</label>
						</p><p>
							<input type="checkbox" name="cbReason" class="cbReason" id="rs05" value="買取対応もしている" />
							<label for="rs05">買取対応もしている</label>
						</p>	
						<p>
							<input type="checkbox" name="cbReason" class="cbReason" id="rs06" value="解体作業もしてくれる" />
							<label for="rs06">解体作業もしてくれる</label>
						</p>
						<p>
							<input type="checkbox" name="cbReason" class="cbReason" id="rs07" value="メールで見積できる" />
							<label for="rs07">メールで見積できる</label>
						</p>
						<p>
							<input type="checkbox" name="cbReason" class="cbReason" id="rs08" value="1品から対応できる" />
							<label for="rs08">1品から対応できる</label>
						</p>
					</li>
				</ul>
				<p>当社をお選び頂いた理由の中でベスト3をお選びください。</p>
				<ul>
					<li>
						<p>
							<select class="slbReason" name="slbReason" id="slbReason01">
								<option value="">選択してください</option>
							</select>
						</p>
						<p>
							<select class="slbReason" name="slbReason" id="slbReason02">
								<option value="">選択してください</option>
							</select>	
						</p>
						<p>
							<select class="slbReason" name="slbReason" id="slbReason03">
								<option value="">選択してください</option>
							</select>
						</p>
					</li>
					<li><a href="javascript:void(0);" id="btnPrev07" class="btnPrev">戻る</a><a href="javascript:void(0);" id="btnNext07" class="btnNext">次へ</a></li>
				</ul>
			</div>
		</section>
		<!--end section07-->
		<!--start section08-->
		<section class="section" id="section08">
			<h2><span>6</span>/10</h2>
			<p>電話受付、メール対応など受付スタッフの対応はいかがでしたか？</p>
			<div class="frmGeneral">
				<ul id="voiceCC">
					<li>
						<p>
							<input type="radio" name="voiceCC" class="voiceCC" id="voiceCC01" value="感動" />
							<label for="voiceCC01">感動(期待以上)</label>
						</p>	
						<p>
							<input type="radio" name="voiceCC" class="voiceCC" id="voiceCC02" value="満足" />
							<label for="voiceCC02">満足(期待通り)</label>
						</p>
						<p>
							<input type="radio" name="voiceCC" class="voiceCC" id="voiceCC03" value="普通" />
							<label for="voiceCC03">普通(まぁまぁ)</label>
						</p>
						<p>
							<input type="radio" name="voiceCC" class="voiceCC" id="voiceCC04" value="不満" />
							<label for="voiceCC04">不満(がっかり)</label>
						</p>
						<p>
							<input type="radio" name="voiceCC" class="voiceCC" id="voiceCC05" value="非常に不満" />
							<label for="voiceCC05">非常に不満(もう頼まない)</label>
						</p>
					</li>
					<li>電話受付、メール対応など受付スタッフの対応について<span id="valueVoiceCC"></span>と思ったのはなぜですか？</li>
					<li><textarea name="txtVoiceCC" id="txtVoiceCC"></textarea></li>
					<li><a href="javascript:void(0);" id="btnPrev08" class="btnPrev">戻る</a><a href="javascript:void(0);" id="btnNext08" class="btnNext">次へ</a></li>
				</ul>
			</div>
		</section>
		<!--end section08-->
		<!--start section09-->
		<section class="section" id="section09">
			<h2><span>7</span>/10</h2>
			<p>当日のエコ回収スタッフのご対応はいかがでしたか？</p>
			<div class="frmGeneral">
				<ul id="voiceCD">
					<li>
						<p>
							<input type="radio" name="voiceCD" class="voiceCD" id="voiceCD01" value="感動" />
							<label for="voiceCD01">感動(期待以上)</label>
						</p>	
						<p>
							<input type="radio" name="voiceCD" class="voiceCD" id="voiceCD02" value="満足" />
							<label for="voiceCD02">満足(期待通り)</label>
						</p>
						<p>
							<input type="radio" name="voiceCD" class="voiceCD" id="voiceCD03" value="普通" />
							<label for="voiceCD03">普通(まぁまぁ)</label>
						</p>
						<p>
							<input type="radio" name="voiceCD" class="voiceCD" id="voiceCD04" value="不満" />
							<label for="voiceCD04">不満(がっかり)</label>
						</p>
						<p>
							<input type="radio" name="voiceCD" class="voiceCD" id="voiceCD05" value="非常に不満" />
							<label for="voiceCD05">非常に不満(もう頼まない)</label>
						</p>
					</li>
					<li>電話受付、メール対応など受付スタッフの対応について<span id="valueVoiceCD"></span>と思ったのはなぜですか？</li>
					<li><textarea name="txtVoiceCD" id="txtVoiceCD"></textarea></li>
					<li><a href="javascript:void(0);" id="btnPrev09" class="btnPrev">戻る</a><a href="javascript:void(0);" id="btnNext09" class="btnNext">次へ</a></li>
				</ul>
			</div>
		</section>
		<!--end section9-->
		<!--start section10-->
		<section class="section" id="section10">
			<h2><span>8</span>/10</h2>
			<p>エコ回収のサービスのご対応はいかがでしたか？</p>
			<div class="frmGeneral">
				<ul id="voiceCS">
					<li>
						<p>
							<input type="radio" class="voiceCS" name="voiceCS" id="voiceCS01" value="感動" />
							<label for="voiceCS01">感動(期待以上)</label>
						</p>	
						<p>
							<input type="radio" class="voiceCS" name="voiceCS" id="voiceCS02" value="満足" />
							<label for="voiceCS02">満足(期待通り)</label>
						</p>
						<p>
							<input type="radio" class="voiceCS" name="voiceCS" id="voiceCS03" value="普通" />
							<label for="voiceCS03">普通(まぁまぁ)</label>
						</p>
						<p>
							<input type="radio" class="voiceCS" name="voiceCS" id="voiceCS04" value="不満" />
							<label for="voiceCS04">不満(がっかり)</label>
						</p>
						<p>
							<input type="radio" class="voiceCS" name="voiceCS" id="voiceCS05" value="非常に不満" />
							<label for="voiceCS05">非常に不満(もう頼まない)</label>
						</p>
					</li>
					<li>電話受付、メール対応など受付スタッフの対応について<span id="valueVoiceCS"></span>と思ったのはなぜですか？</li>
					<li><textarea name="txtVoiceCS" id="txtVoiceCS"></textarea></li>
					<li><a href="javascript:void(0);" id="btnPrev10" class="btnPrev">戻る</a><a href="javascript:void(0);" id="btnNext10" class="btnNext">次へ</a></li>
				</ul>
			</div>
		</section>
		<!--end section10-->
		<!--start section11-->
		<section class="section" id="section11">
			<h2><span>9</span>/10</h2>
			<p>不用品でお困りの方にエコ回収をオススメして頂けますか？</p>
			<div class="frmGeneral">
				<ul>
					<li>
						<p>
							<input type="radio" name="rdRecommend" class="rdRecommend" id="rdRecommend01" value="オススメする" />
							<label for="rdRecommend01">オススメする</label>
						</p>	
						<p>
							<input type="radio" name="rdRecommend" class="rdRecommend" id="rdRecommend02" value="オススメしない" />
							<label for="rdRecommend02">オススメしない</label>
						</p>
					</li>
					<li><a href="javascript:void(0);" id="btnPrev11" class="btnPrev">戻る</a><a href="javascript:void(0);" id="btnNext11" class="btnNext">次へ</a></li>
				</ul>
			</div>
		</section>
		<!--end section11-->
		<!--start section12-->
		<section class="section" id="section12">
			<h2><span>10</span>/10</h2>
			<p id="txtRecommend01">オススメすると答えた方へ <br />「エコ回収を利用しようかお悩みの方へ、アドバイスをお願いします」</p>
			<p id="txtRecommend02">オススメしないと答えた人へ <br />「どのような点を改善できればエコ回収をオススメできるようになりますか」</p>
			<div class="frmGeneral">
				<ul>
					<li><textarea id="txtRecommend" name="txtRecommend"></textarea></li>
					<li><a href="javascript:void(0);" id="btnPrev12" class="btnPrev">戻る</a><a href="javascript:void(0);" id="btnNext12" class="btnNext">次へ</a></li>
				</ul>
			</div>
		</section>
		<!--end section12-->
		<!--start section13-->
		<section class="section" id="section13">
			<h2><span>10</span>/10</h2>
			<p>最後に、抽選で10名様にはバレンタイン企画で・・・・名前、メールアドレス、電話番号をごお記入してください。</p>
			<div class="frmGeneral">
				<ul>
					<li><input type="text" placeholder="お名前 例 : エコ花子" /></li>
					<li><input type="email" placeholder="メールアドレス 例 : example@mail.jp" /></li>
					<li><input type="tel" placeholder="電話番号 例 : 00000000000" /></li>
					<li><a href="javascript:void(0);" id="btnPrev13" class="btnPrev">戻る</a><input type="submit" value="送信" /></li>
				</ul>
			</div>
		</section>
		<!--end section13-->
		<!--start section14-->
		<section class="section" id="section14">
			<div class="intro">
				<p>ありがとうございました。</p>
				<p>いつもエコランドをご利用頂きましてありがとうございます。</p>
				<a href="javascript:void(0);" id="btnFinish" class="btnFinish">閉じる</a>
			</div>
		</section>
		<!--end section14-->
	</form>
</div>
</body>
</html>

<?php include('inquiry-validation.php'); ?>