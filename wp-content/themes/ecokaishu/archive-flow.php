<?php
/*
* @package Montser Platform
* @subpackage MP-Ecokaishu
* @since MP-Ecokaishu 0.1.1
*/
get_header( ); ?>

	<h2><?php post_type_archive_title(); ?></h2>

	<div class="container intro">
		<div class="twelvecol col last">

			<div class="summary">
				<p><span class="block">使わなくなった家電や家具などを、</span><span class="block">1個からでもエコ回収・買取に伺います。</span></p>
				<p><span class="block">ご相談・依頼から集荷まで、</span><span class="block">エコ回収の流れをご案内いたします。</span></p>
			<!-- .intro .summary--></div>

			<!--<div class="intro"><?php echo getPage("イントロ", "contents"); ?></div>
			<?php echo getPage("エコ回収の流れ", "contents"); ?>-->

		</div>
	</div>

	<section class="contents" id="trigger">
		<span class="icon-dot" id="top"></span>
		<div class="container">
			<div class="twelvecol col last">
				<h3>使わなくなったモノが出た</h3>
			</div>
		<!--.contents#trigger .container--></div>
	<!--.contents#trigger --></section>

	<section class="contents" id="actions">
		<span class="icon-dot" id="top"></span>
		<div class="container">
			<h3>エコランドに相談してください！</h3>
			<div class="sixcol col">
				<h4>どうすればいいかわからない</h4>
				<div class="content">
					<a href="<?php echo siteInfo("rootURl"); ?>/contact/" id="contact"><span class="icon-question2"></span>お問い合わせ</a>
					<a href="tel:0120-530-<?php echo telNum("", pageCode(), ""); ?>" id="tel"><span class="icon-phone"></span>0120-530-<?php echo telNum("", pageCode(), ""); ?></a>
				</div>
			</div>
			<div class="sixcol col last">
				<h4>見積もってほしい</h4>
				<div class="content">
					<a href="<?php echo siteInfo("rootURl"); ?>/estimate/" id="estimate"><span class="icon-shipping"></span>かんたん見積もり</a>
				</div>
			</div>
			<div class="openingHour">平･土 9時-22時 祝･日 9時-20時 </div>
		<!--.contents#actions .container--></div>
	<!--.contents#actions--></section>

	<section class="contents" id="ecokaishuFlow">
		<div class="container">
			<h3>エコ回収の流れ</h3>

			<section class="twelvecol col last">
				<span class="icon-dot" id="top"></span>
				<h4>お伺い日程と時間を決めます</h4>
				<div class="content">
					<p>ご希望のお日にちでご予約可能です。当日、翌日もご予約可能です。</p>
					<p class="footnote"><small>※ご予約が混み合っている場合、別日のご予約を相談させて頂く事がございます。時間指定は3時間枠で可能、土日・平日ご料金は同じです。</small></p>
				</div>
			<!--.contents#ecokaishu .col--></section>

			<section class="twelvecol col last">
				<span class="icon-dot" id="top"></span>
				<h4>ご自宅にお伺いし、お引取りします</h4>
				<div class="content">
					<p>エコランドのスタッフが2ｔトラックでご自宅にお伺い。お部屋の中から、運び出しの作業は全て行います。中に物が入っていない、上に何も乗っていない状態にご準備だけお願いしております。</p>
					<h5>エコオクに出品します。</h5>
					<p>その場で写真を撮り、すぐにエコオクに出品されます。出品期間は24時間。24時間以内に【詳細を希望する】ボタンが押されたら、お品物の情報・写真を取り直して本出品となります。本出品は3日間です。</p>
					<h5>お支払い。</h5>
					<p>当日現金でのお支払いです。作業終了後、メールアドレスに領収書をすぐに送信致します。どうしても紙で必要な場合、予約時にご相談下さい。</p>
				</div>
			<!--.contents#ecokaishu .col--></section>
			

			<section class="twelvecol col last">
				<span class="icon-dot" id="top"></span>
				<h4>エコオク落札キャッシュバックがあります</h4>
				<div class="content">
					<p>エコオクで落札があると、落札金額の50%がお客様にキャッシュバックか、支援団体に寄付ができます。エコオク出品状況の確認は、HP上のお客様専用ページで確認することができます。</p>
				</div>
			<!--.contents#ecokaishu .col--></section>
			
		<!--.contents#ecokaishu .container--></div>
	<!--.contents#ecokaishu--></section>

<!--


	<div id="after">

	<section class="twelvecol col last">
		<h4><?php echo getPage("お伺い日程と時間を決めます。", "title"); ?></h4>
		<div class="content">
			<?php echo getPage("お伺い日程と時間を決めます。", "content"); ?>
		</div>
	</section>

	<section class="twelvecol col last">
		<h3><?php echo getPage("ご自宅にお伺いし、お引取りします。", "title"); ?></h3>
		<div class="content">
			<?php echo getPage("ご自宅にお伺いし、お引取りします。", "content"); ?>
		</div>
		<section class="content">
			<h4><?php echo getPage("エコオクに出品します。", "title"); ?></h4>
			<?php echo getPage("エコオクに出品します。", "content"); ?>
		</section>
		<section class="content">
			<h4><?php echo getPage("お支払い。", "title"); ?></h4>
			<?php echo getPage("お支払い。", "content"); ?>
		</section>
	</section>

	<section class="twelvecol col last">
		<h3><?php echo getPage("エコオク落札キャッシュバックがあります。", "title"); ?></h3>
		<div class="content">
			<?php echo getPage("エコオク落札キャッシュバックがあります。", "content"); ?>
		</div>
	</section>

	</div>-->

<?php get_footer(); ?>