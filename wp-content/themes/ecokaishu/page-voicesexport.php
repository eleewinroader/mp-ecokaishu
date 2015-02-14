<?php

function sexReplace($var){
	switch ($var) {
		case "0" :
			$val = "女性";
			break;
		case "1" :
			$val = "男性";
			break;
		default:
			$val = "";
			break;
	}
	return $val;
}
function ageReplace($var){
	switch ($var) {
		case "0" :
			$val = "20代";
			break;
		case "1" :
			$val = "30代";
			break;
		case "2" :
			$val = "40代";
			break;
		case "3" :
			$val = "50代";
			break;
		case "4" :
			$val = "60代";
			break;
		case "5" :
			$val = "70代以上";
			break;
		default:
			$val = "";
			break;
	}
	return $val;
}
function featureReplace($var){
	switch ($var) {
		case "feature0" :
			$val = "急な対応が可能だった";
			break;
		case "feature1" :
			$val = "日時が指定できる";
			break;
		case "feature2" :
			$val = "運び出ししてもらえる";
			break;
		case "feature3" :
			$val = "土日も対応できる";
			break;
		case "feature4" :
			$val = "買取対応もしている";
			break;
		case "feature5" :
			$val = "解体作業もしてくれる";
			break;
		case "feature6" :
			$val = "メールで見積できる";
			break;
		case "feature7" :
			$val = "1品から対応できる";
			break;
		case "feature8" :
			$val = "1点ずつ料金が決まっている";
			break;
		case "feature9" :
			$val = "料金が安い";
			break;
		case "feature10":
			$val =  "サービス内容が分かりやすかった";
			break;
		case "feature11":
			$val =  "知人/他企業からの紹介だったから";
			break;
		case "feature12":
			$val =  "受付スタッフの対応が良かったから";
			break;
		case "feature13":
			$val =  "見積スタッフの対応が良かったから";
			break;
		case "feature14":
			$val =  "運営会社が信頼できた";
			break;
		case "feature15":
			$val =  "以前利用した時に良かった";
			break;
		case "feature16":
			$val =  "スタッフが事前に分かる";
			break;
		case "feature17":
			$val =  "明確な料金が事前に分かる";
			break;
		case "feature18":
			$val =  "リユース・リサイクルしている";
			break;
		case "feature19":
			$val =  "オークションに出品できる";
			break;
		default:
			$val = "";
			break;
	}
	return $val;
}
function recommendReplace($var){
	switch ($var) {
		case "0" :
			$val = "する";
			break;
		case "1" :
			$val = "しない";
			break;
		default:
			$val = "";
			break;
	}
	return $val;
}


echo "エコNo,リピーター,回収日,エコ回収金額,買取金額,紹介企業名,名前(公開用),性別,年代,エコ回収品,エコ回収品その他,きっかけ,きっかけその他,エコランド選んだ理由,エコランドを選んだ理由1,エコランドを選んだ理由2,エコランド選んだ理由3,コンシェルジュ評価,コンシェルジュ評価記述式,集荷スタッフ評価,集荷スタッフ記述式,サービス全体評価,サービス全体評価記述式,オススメ,オススメ記述式,名前(非公開),メールアドレス(非公開),電話番号(非公開)
";
$args = array(
	'post_type' => 'voices',
	'posts_per_page' => -1,
	'tax_query' => array(
		'relation' => 'AND',
		array(
			'taxonomy' => 'voicekinds',
			'field' => 'slug',
			'terms' => array( 'review' ),
		),
	)
);
$posts = query_posts($args);
foreach($posts as $post){

	$items = array();
	$cltItems = get_the_terms($post->ID, 'cltitems');
	foreach($cltItems as $cltItem){
		if($cltItem->parent != 0){
			array_push($items, $cltItem->name);
		}
	}

	$starts = array();
	$customerStarts = get_the_terms($post->ID, 'starts');
	foreach($customerStarts as $customerStart){
		array_push($starts, $customerStart->name);
	}

	$info1 = get_post_meta($post->ID, "voiceInfo24", TRUE);
	$info2 = get_post_meta($post->ID, "voiceInfo32", TRUE);
	$info3 = get_post_meta($post->ID, "voiceInfo23", TRUE);
	$info4 = get_post_meta($post->ID, "voiceInfo29", TRUE);
	$info5 = get_post_meta($post->ID, "voiceInfo30", TRUE);
	$info6 = get_post_meta($post->ID, "voiceInfo31", TRUE);
	$info7 = get_post_meta($post->ID, "voiceInfo06", TRUE);
	$info8 = sexReplace(get_post_meta($post->ID, "voiceInfo07", TRUE));
	$info9 = ageReplace(get_post_meta($post->ID, "voiceInfo08", TRUE));
	$info10 = implode(" ", $items);
	$info11 = get_post_meta($post->ID, "voiceInfo09", TRUE);
	$info12 = implode(" ", $starts);
	$info13 = get_post_meta($post->ID, "voiceInfo10", TRUE);
	$features = get_post_meta($post->ID, "voiceInfo11", FALSE);
	$featureargs = array();
	foreach($features as $feature){
		array_push($featureargs, featureReplace($feature));
	}
	$info14 = implode(" ", $featureargs);
	$info15 = featureReplace(get_post_meta($post->ID, "voiceInfo26", TRUE));
	$info16 = featureReplace(get_post_meta($post->ID, "voiceInfo27", TRUE));
	$info17 = featureReplace(get_post_meta($post->ID, "voiceInfo28", TRUE));
	$info18 = get_post_meta($post->ID, "voiceInfo12", TRUE);
	$info19 = preg_replace('/(?:\n|\r|\r\n)/', '', trim(strip_tags(get_post_meta($post->ID, "voiceInfo13", TRUE))) );
	$info20 = get_post_meta($post->ID, "voiceInfo14", TRUE);
	$info21 = preg_replace('/(?:\n|\r|\r\n)/', '', trim(strip_tags(get_post_meta($post->ID, "voiceInfo15", TRUE))));
	$info22 = get_post_meta($post->ID, "voiceInfo16", TRUE);
	$info23 = preg_replace('/(?:\n|\r|\r\n)/', '', trim(strip_tags(get_post_meta($post->ID, "voiceInfo17", TRUE))));
	$info24 = recommendReplace(get_post_meta($post->ID, "voiceInfo18", TRUE));
	$info25 = preg_replace('/(?:\n|\r|\r\n)/', '', trim(strip_tags(get_post_meta($post->ID, "voiceInfo19", TRUE))));
	$info26 = get_post_meta($post->ID, "voiceInfo20", TRUE);
	$info27 = get_post_meta($post->ID, "voiceInfo21", TRUE);
	$info28 = get_post_meta($post->ID, "voiceInfo22", TRUE);

	echo $info1.",".$info2.",".$info3.",".$info4.",".$info5.",".$info6.",".$info7.",".$info8.",".$info9.",".$info10.",".$info11.",".$info12.",".$info13.",".$info14.",".$info15.",".$info16.",".$info17.",".$info18.",".$info19.",".$info20.",".$info21.",".$info22.",".$info23.",".$info24.",".$info25.",".$info26.",".$info27.",".$info28."
";
}?>