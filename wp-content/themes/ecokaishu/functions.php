<?php
/*
* @package Montser Platform
*/

define("TAX", 8);


date_default_timezone_set( 'Asia/Tokyo' );


add_action( 'wp_before_admin_bar_render', 'my_before_admin_bar_render' );
function my_before_admin_bar_render() {
	global $wp_admin_bar;
	$wp_admin_bar->remove_menu( 'edit' ); // ［プロフィールを編集］を削除
}

function taxin($price){
	return number_format(floor($price * TAX / 100 + $price));
}


/*******************************************************
* seotag
*******************************************************/

//getTitle
function getTitle($tempType, $obj){
	if($tempType == "single"){
		$metaTitle = get_post_meta($obj->ID, _aioseop_title, TRUE);
		if($metaTitle) $metainfo = $metaTitle."｜".get_bloginfo("name");
		else{
			if($obj->post_type == "voices"){
				$metainfo = getCustomerAreas($obj)."の".getCustomerName($obj)."様から".getCustomerItems($obj)."を回収｜".get_bloginfo("name");
			}
		}
	}elseif($tempType == "postTypeArchive"){
		$metainfo = $obj->label."｜".get_bloginfo("name");
	}elseif($tempType == "archive"){
		if(is_category() || is_tag() || is_tax()){
			$metainfo = $obj->name."｜".get_bloginfo("name");
		}elseif(is_day()){
			$metainfo = get_the_date("")."｜".get_bloginfo("name");
		}elseif(is_month()){
			$metainfo = get_the_date("Y年n月")."｜".get_bloginfo("name");
		}elseif(is_year()){
			$metainfo = get_the_date("Y年")."｜".get_bloginfo("name");
		}
	}elseif($tempType == "home"){
		$metainfo = "不用品回収の前に【エコ回収】";
	}
	if($metainfo) return $metainfo;
	else return false;
}
//getDescription
function getDescription($tempType, $obj){
	if($tempType == "single"){
		$metainfo = get_post_meta($obj->ID, _aioseop_description, TRUE);
		if(!$metainfo){
			if($obj->post_type == "voices"){
				$metainfo = getCustomerAreas($obj)."の".getCustomerName($obj)."様から".getCustomerItems($obj)."をエコ回収いたしました。不用品回収をお考えなら「エコ回収」。単なる不用品回収だけでなく、使わなくなったモノを再利用、再資源化して必要な人・場所に届けることができます。";
			}else{
				$desc = mb_substr(strip_tags($obj->post_content), 0, 100);
				if($desc) $metainfo = mb_substr(strip_tags($obj->post_content), 0, 100)."...";
			}
		}
	}elseif($tempType == "postTypeArchive"){
		$metainfo = $obj->description;
	}elseif($tempType == "archive"){
		if(is_category() || is_tag() || is_tax()){
			$metainfo = $obj->description;
		}
	}
	if($metainfo) return $metainfo;
	else return false;
}
//getKeywords
function getKeywords($tempType, $obj){
	if($tempType == "postTypeArchive"){
		if($obj->name == "area" || $obj->name == "items") $metainfo = $obj->singular_label.",不,用品,回収,エコ";
		$metainfo = $obj->label.",不,用品,回収,エコ";
	}elseif($tempType == "archive"){
		if(is_category() || is_tag() || is_tax()){
			$metainfo = $obj->name.",不,用品,回収,エコ";
		}
	}
	if($metainfo) return $metainfo;
	else return false;
}

//getCanonicalUrl
function getCanonicalUrl($tempType, $obj){
	if($tempType == "single"){
		$metainfo = get_permalink($obj->ID);
	}elseif($tempType == "postTypeArchive"){
		$metainfo = get_post_type_archive_link($obj->name);
	}elseif($tempType == "archive"){
		if(is_category() || is_tag() || is_tax()){
			$metainfo = get_term_link($obj, $obj->taxonomy);
		}elseif(is_day()){
			$metainfo = get_day_link();
		}elseif(is_month()){
			$metainfo = get_month_link();
		}elseif(is_year()){
			$metainfo = get_year_link();
		}
	}elseif($tempType == "home"){
		$metainfo = get_bloginfo("url");
	}
	if($metainfo) return $metainfo;
	else return false;
}

//getH1
function getH1($tempType, $obj){
	if($tempType == "single"){
		if($obj->post_type == "area"){
			$metaH1 = get_the_title($obj->ID)."で不用品回収・処分を考えているならエコ回収";
		}elseif($obj->post_type == "items"){
			$metaH1 = get_the_title($obj->ID)."の処分・廃棄を考えているならエコ回収";
		}elseif($obj->post_type == "campaign"){
			$metaH1 = "無料・格安キャンペーン 〜 ".get_the_title($obj->ID);
		}elseif($obj->post_type == "voices"){
			$metaH1 = getCustomerAreas($obj)."の".getCustomerName($obj)."様から".getCustomerItems($obj)."を回収！";
		}elseif($obj->post_type == "notices"){
			$metaH1 = get_the_title($obj->ID)." 〜 お知らせ&新着情報";
		}else{
			$cat = get_the_category();
			$metaH1 = get_post_meta($obj->ID, "contentsInfo04", TRUE);
			if($metaH1) $metaH1 = $cat[0]->name."お役立ち情報 〜 ".$metaH1;
			else $metaH1 = $cat[0]->name."お役立ち情報 〜 ".get_the_title($obj->ID);
		}
		$metainfo = $metaH1;
	}elseif($tempType == "postTypeArchive"){
		$postType = $obj->name;
		if($postType == "area"){
			$metainfo = "東京・神奈川・千葉・埼玉・大阪・兵庫で不用品をゴミにしない【エコ回収】";
		}elseif($postType == "items"){
			$metainfo = "家電、家具、冷蔵庫、テレビなどの処分をお考えるのなら不用品をゴミにしない【エコ回収】";
		}elseif($postType == "notices"){
			$metainfo = "サービスとサイトに関するお知らせ&新着情報";
		}elseif($postType == "campaign"){
			$metainfo = "エコ回収をお得に利用しよう！ ~ 無料・格安キャンペーン情報";
		}else{
			$metaH1 = getPage("イントロ", "h1");
			if($metaH1) $metainfo = $metaH1;
			else $metainfo = $obj->label;
		}
	}elseif($tempType == "archive"){
		if(is_category() || is_tag() || is_tax()){
			$metainfo = $obj->name."と不用品回収関連記事一覧";
		}elseif(is_day()){
			$metainfo = "不用品回収に関する".get_the_date("")."記事一覧";
		}elseif(is_month()){
			$metainfo = "不用品回収に関する".get_the_date("Y年n月")."記事一覧";
		}elseif(is_year()){
			$metainfo = "不用品回収に関する".get_the_date("Y年")."記事一覧";
		}
	}elseif($tempType == "home"){
		$metainfo = "不用品回収に頼む前に〜あなたのいらないモノが誰かのほしいモノに";
	}
	if($metainfo) return $metainfo;
	else return false;
}

//getArticleClass
function getArticleClass($tempType, $obj){
	if($tempType == "single"){
		$classinfo = "post";
		if($obj->post_type == "campaign"){
			$classinfo .= " campaign";
			if(campCode($post)) $classinfo .= " ".campCode($obj, "parent", " ");
		}elseif($obj->post_type == "voices"){
			$classinfo .= " ".$obj->post_type;
		}elseif($obj->post_type == "area" || $obj->post_type == "items"){
			$classinfo .= " lp";
			$classinfo .= " ".$obj->post_type;
		}elseif($obj->post_type == "staffwords"){
			$classinfo .= " ".$obj->post_type;
		}elseif($obj->post_type == "page" && $obj->post_name == "inquiry"){
			$classinfo .= " ".$obj->post_name;
		}else{
			$classinfo .= " columns";
			$cat = get_the_category();
			if($cat) $classinfo .= " ".$cat[0]->slug;
		}
	}elseif($tempType == "postTypeArchive"){
		$classinfo = "archive";
		if($obj->name == "area" || $obj->name == "items") $classinfo .= " columns";

		$classinfo .= " ".$obj->name;
	}elseif($tempType == "archive"){
		$classinfo = "archive columns";
		$classinfo .= " ".$obj->slug;
	}
	if($classinfo) return $classinfo;
	return false;
}

//getArticleId
function getArticleId($tempType, $obj){
	if($tempType == "single"){
		if($obj->post_type == "campaign"){
			if(campCode($obj)) $idinfo = campCode($obj, "children", " ");
		}elseif($obj->post_name == "askpeople"){
			$idinfo = "askpeople";
		}
	}elseif($tempType == "postTypeArchive"){
		if($obj->post_type == "campaign"){
			if(campCode($obj)) $idinfo = campCode($obj, "children", " ");
		}else{
			$idinfo = $obj->name;
		}
	}elseif($tempType == "home"){
		$idinfo = "home";
	}
	if($idinfo) return ' id="'.$idinfo.'"';
	return false;
}

//getArticleImg
function getArticleImg($tempType, $obj){
	$imginfo = get_bloginfo("template_url")."/assets/img/base/ecoland_logo.gif";
	if($tempType == "single"){
		$img = get_post_meta($obj->ID, "kijitasuInfo03", TRUE);
		$imgurl = wp_get_attachment_image_src($img, "medium");
		if($imgurl) $imginfo = $imgurl[0];
	}
	if($imginfo) return $imginfo;
	return false;
}

function getMetaArr($post, $meta){

	global $wpdb;
	$query = "SELECT meta_id, post_id,meta_key,meta_value FROM $wpdb->postmeta WHERE post_id = $post->ID ORDER BY meta_id ASC";
	$cf = $wpdb->get_results($query, ARRAY_A);

	foreach( $cf as $row ){
		if($row['meta_key'] == $meta) $vars[] = $row['meta_value'];
	}
	if($vars){
		$vars = array_filter($vars, "strlen");
		$vars = array_values($vars);
	}
	return $vars;

}

function getMetaImgArr($post, $meta){

	global $wpdb;
	$query = "SELECT meta_id, post_id,meta_key,meta_value FROM $wpdb->postmeta WHERE post_id = $post->ID ORDER BY meta_id ASC";
	$cf = $wpdb->get_results($query, ARRAY_A);
	foreach( $cf as $row ){
		if($row['meta_key'] == $meta){
			$image = wp_get_attachment_image_src($row['meta_value'], "thumbnail");
			if($image){
				list($src, $width, $height) = $image;
				$vars[] = '<img src="'.$src.'" width="'.$width.'" height="'.$height.'" />';
			}
		}
	}
	if($vars){
		$vars = array_filter($vars, "strlen");
		$vars = array_values($vars);
	}
	return $vars;

}

//header cleaner
remove_action( 'wp_head', 'feed_links_extra'); // Display the links to the extra feeds such as category feeds
remove_action( 'wp_head', 'feed_links'); // Display the links to the general feeds: Post and Comment Feed
remove_action( 'wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action( 'wp_head', 'wlwmanifest_link' ); // Display the link to the Windows Live Writer manifest file.
remove_action( 'wp_head', 'index_rel_link' ); // index link
remove_action( 'wp_head', 'parent_post_rel_link', 10); // prev link
remove_action( 'wp_head', 'start_post_rel_link', 10); // start link
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10); // Display relational links for the posts adjacent to the current post.
remove_action( 'wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version


function getPostType($post, $object){
	$postType = get_post_type_object(get_post_type($post));
	switch ($object){
		case "label":
			$var = $postType->label;
			break;
		case "name":
			$var = $postType->name;
			break;
		case "link":
			$var = get_post_type_archive_link($postType->name);
			break;
	}
	return $var;
}



//カスタムポストacv
function change_posts_per_page($query) {
	if(is_admin() || ! $query->is_main_query()) return;
	if(is_tag()) {
		$query->set(
			"post_type", "any"
		);
	}
}
add_action( 'pre_get_posts', 'change_posts_per_page' );


/* shorcodes */
//add_shortcode("siteUrl", "siteInfo");
add_shortcode("telNum", "telNum");



/*******************************************************
* settings for voice pages
*******************************************************/


function getCustomerName($post){
	$name = get_post_meta($post->ID, "voiceInfo06", TRUE);
	return $name;
}

function getCustomerSex($post){
	$meta = get_post_meta($post->ID, "voiceInfo07", TRUE);
	switch ($meta) {
		case '0':
			$sex = "女性";
			break;
		case '1':
			$sex = "男性";
			break;
		default:
			$sex = "";
			break;
	}
	return $sex;
}

function getCustomerAge($post){
	$meta = get_post_meta($post->ID, "voiceInfo08", TRUE);
	switch ($meta){
		case '0':
			$age = "20代";
			break;
		case '1':
			$age = "30代";
			break;
		case '2':
			$age = "40代";
			break;
		case '3':
			$age = "50代";
			break;
		case '4':
			$age = "60代";
			break;
		case '5':
			$age = "70代以上";
			break;
		default:
			$age = "";
			break;
	}
	return $age;
}


function getCustomerDate($post){
	$date = get_post_meta($post->ID, "voiceInfo23", TRUE);
	return $date;
}


function getCustomerStarts($post, $glue=FALSE){
	$customerStarts = array();
	$terms = get_the_terms($post->ID, 'starts');
	foreach($terms as $term){
		array_push($customerStarts, $term->name);
	}
	if(count($customerStarts) > 1){
		if($glue){
			for($i=0; $i<count($customerStarts); $i++) $starts .= "<".$glue.">".$customerStarts[$i]."</".$glue.">";
		}else{
			$starts = implode("・", $customerStarts);
		}
	}else{
		if($glue) $starts = "<".$glue.">".$customerStarts[0]."</".$glue.">";
		else $starts = $customerStarts[0];
	}
	return $starts;
}

function getCustomerFeatures($post, $glue=FALSE){
	$customerFeatures = array();
	$terms = get_the_terms($post->ID, 'features');
	foreach($terms as $term){
		if($term->parent != 0) array_push($customerFeatures, $term->name);
	}
	if(count($customerFeatures) > 1){
		if($glue){
			for($i=0; $i<count($customerFeatures); $i++) $features .= "<".$glue.">".$customerFeatures[$i]."</".$glue.">";
		}else{
			$features = implode("・", $customerFeatures);
		}
	}else{
		if($glue) $features = "<".$glue.">".$customerFeatures[0]."</".$glue.">";
		else $features = $customerFeatures[0];
	}
	return $features;
}

function getCustomerItems($post, $link=FALSE, $glue=FALSE){
	//var
	$customerItems = array();
	//getItems
	$cltItems = get_the_terms($post->ID, 'cltitems');

	foreach($cltItems as $cltItem){
		$pos = mb_strpos($cltItem->name, "類");
		$cltItemName = $pos ? mb_substr($cltItem->name, 0, $pos) : $cltItem->name;
		if($cltItem->parent != 0){
			$args = array(
				"post_type" => "items",
				"name" => $cltItemName
			);
			$items = query_posts($args);
			foreach($items as $item){
				array_push($customerItems, $item->ID);
			}
		}
	}

	for($i=0; $i<count($customerItems); $i++){
		if($glue) $string .= "<".$glue.">";
		if($link) $string .= '<a href="'. get_permalink($customerItems[$i]).'">';
		$string .= get_the_title($customerItems[$i]);
		if($link) $string .= '</a>';
		if($glue) $string .= "</".$glue.">";
		if($i< count($customerItems)-1 && $glue == FALSE) $string .= "・";
	}

	return $string;
}


function getCustomerReview($post, $star){

	//var
	switch ($star) {
		case '5':
			$string = "感動(期待以上)";
			break;

		case '4':
			$string = "満足(期待通り)";
			break;

		case '3':
			$string = "普通(まぁまぁ)";
			break;

		case '2':
			$string = "不満(がっかり)";
			break;

		case '1':
			$string = "非常に不満(もう頼まない)";
			break;

		default:
			$string = "集計中";
			break;
	}

	return $string;
}


function getCustomerAreas($post, $link=FALSE){
	//var
	$customerAreas = array();
	//getAreas
	$cltAreas = get_the_terms($post->ID, 'cltarea');

	foreach($cltAreas as $cltArea){
		if($cltArea->parent == 0){
			$args = array(
				"post_type" => "area",
				"name" => $cltArea->name
			);
			$areas = query_posts($args);
			foreach($areas as $area){
				$prefectureName = $area->post_title;
				$prefectureLink = get_permalink($area->ID);
			}
		}else{
			$args = array(
				"post_type" => "area",
				"name" => $cltArea->name
			);
			$areas = query_posts($args);
			foreach($areas as $area){
				$municipalityName = $area->post_title;
				$municipalityLink = get_permalink($area->ID);
			}
		}

	}
	//returnAreas
	if($link){
		$areaLink = $prefectureLink;
		if($municipalityLink) $areaLink = $municipalityLink;
		return '<a href="'.$areaLink.'">'.$prefectureName.' '.$municipalityName.'</a>';
	}
	else return $prefectureName.' '.$municipalityName;
}

function getStaffComments($post, $staffType, $crtUser){
	$comments = get_comments(array("post_id" => $post->ID));
	if($comments){
		foreach($comments as $comment){
			$staffEmail = $comment->comment_author_email;
			$staff = get_user_by("email", $staffEmail);

			$comments = $comment->comment_content;
			$commentDate = $comment->comment_date;
			$commentDateEdited = date("Y年m月d日", strtotime($commentDate));

			if($staff->roles[0] == $staffType){

				$staffName = $staff->display_name;
				$staffPron = get_user_meta($staff->id, "namePron", TRUE);
				$staffProfileImg = get_user_meta($staff->id, "profileimg", TRUE);

				if($comment->comment_approved == 0){
					if($crtUser->roles[0] == $staffType){
						$notapproved .= <<<EOF
						<div class="reply notApproved">
							<span class="pink">承認待ち</span>
							<p>{$comments}</p>
							<time datetime="<?php echo getCustomerDate($commentDate); ?>">{$commentDate}投稿</time>
						</div>
EOF;
					}
				}else{
					$string = <<<EOF
					<div class="reply">
						<h4> 担当スタッフより</h4>
						<div class="staffInfo flRight">
							<img src="{$staffProfileImg}" class="staffimg" />
							<p class="staffName">
								<span class="block name">{$staffName}</span>
								<span class="block pron">{$staffPron}</span>
							</p>
						</div>
						<div class="staffComments">
							<p>{$comments}</p>
							<time datetime="<?php echo getCustomerDate($commentDate); ?>">{$commentDateEdited}返信</time>
						</div>
						<div class="clear"></div>
					</div>
EOF;
				}

			}
		}
	}

	return $notapproved.$string;

}



/* col  */
function numToStr( $target ) {

	// アルファベットの定義
	$alphabet = array(
		"zero", "one", "two", "three", "four", "five", "six", "seven", "eight", "nine",
		"ten", "eleven", "twelve"
	);

	if(!is_numeric( $target ) || $target < 0){
		return FALSE;
	}

	$one = fmod( $target , 26 );
	$result = $alphabet[ $one ];
	$carry = ( $target - $one ) / 26;

	while( $carry != 0 ) {
		$one = fmod( $carry - 1 , 26 );
		$result = $alphabet[ $one ] . $result;
		$carry = ( $carry - 1 - $one ) / 26;

	}

	return $result;

}


/* こちらの都合です。 */
function convSale(){

	global $wpdb;
	$post_id = 4068;
	$query = "SELECT meta_id, post_id,meta_key,meta_value FROM $wpdb->postmeta WHERE post_id = $post_id ORDER BY meta_id ASC";
	$cf = $wpdb->get_results($query, ARRAY_A);

	$convSaleInfo = array();

	//var convenience sale
	$campConvInfo01 = array();
	$campConvInfo02 = array();
	$campConvInfo03 = array();

	foreach( $cf as $row ){

		//for convenience sale
		if($row['meta_key'] == "campConvInfo01") array_push($campConvInfo01, $row['meta_value']);
		if($row['meta_key'] == "campConvInfo02") array_push($campConvInfo02, $row['meta_value']);
		if($row['meta_key'] == "campConvInfo03") array_push($campConvInfo03, $row['meta_value']);

	}

	if($campConvInfo01){
		$campConvInfo01 = array_filter($campConvInfo01, "strlen");
		$campConvInfo01 = array_values($campConvInfo01);
	}

	$length = count($campConvInfo01);

	if($length > 1){

		for($i=0; $i<$length; $i++){

			$args = array();

			$date = new DateTime();
			$today = $date->format("Y-m-d");

			$campConvDate = $campConvInfo02[$i];
			$campDate = new DateTime($campConvDate);
			$campExpiration = $campDate->format("Y-m-d");
			$campMonth = $campDate->format("m");

			$campMonth = ereg_replace("^0+", "", $campMonth);
			$campDay = ereg_replace("^0+", "", $campDate->format("d"));
			$remain = (strtotime($campExpiration) - strtotime($today)) / ( 60 * 60 * 24);

			$area = $campConvInfo01[$i];

			$args["area"] = $area;
			$args["link"] = get_permalink($post_id);
			$args["month"] = $campMonth;
			$args["day"] = $campDay;
			$args["details"] = $campConvInfo03[$i];

			$convSaleInfo[] =  (object) $args;
		}

		return $convSaleInfo;

	}

	return false;

}

/* calendar */
//本日取得
function getToday($date = "Y-m-d") {
	$today = new DateTime();
	return $today->format($date);
}

//本日かどうかチェック
function isHoliday($year, $month, $day) {

	$day = $year.$month.$day;
	if(array_key_exists($day, getHolidays($year))){
		return true;
	}
	return false;
}

//Googleカレンダーから祝日を取得
function getHolidays($year) {
	$holidays = array();
	$prevYear = $year - 1;
	$nextYear = $year + 1;

	//Googleカレンダーから、指定年の祝日情報をJSON形式で取得するためのURL
	$url = sprintf(
		"http://www.google.com/calendar/feeds/%s/public/full?alt=json&%s&%s",
		"japanese__ja%40holiday.calendar.google.com",
		"start-min=".$prevYear."-01-01",
		"start-max=".$nextYear."-12-31"
	);

	//JSON形式で取得した情報を配列に変換
	$results = json_decode(file_get_contents($url), true);

	//年月日（例：20120512）をキーに、祝日名を配列に格納
	foreach ($results["feed"]["entry"] as $value) {
		$date = str_replace("-", "", $value["gd$when"][0]["startTime"]);
		$title = $value["title"]["$t"];
		$holidays[$date] = $title;
	}

	//祝日の配列を早い順に並び替え
	ksort($holidays);

	//配列として祝日を返す
	return $holidays;
}




//N日（週）+か-する関数
function getNthDay($year, $month, $day, $n) {
	$next_prev = new DateTime($year."-".$month."-".$day);
	$next_prev->modify($n);
	return $next_prev->format("Ymd");
}

function getWeekDay($year, $month, $day, $n){
	$datetime = new DateTime($year."-".$month."-".$day);
	$datetime->modify($n);
	$week = array("日", "月", "火", "水", "木", "金", "土");
	$w = (int)$datetime->format("w");
	return $week[$w];
}

function getReservInfo($ymd){
	$reservs = query_posts(array("pagename" => "reserv"));
	foreach($reservs as $reserv){
		$available = get_post_meta($reserv->ID, "reservInfo01");
		if(in_array($ymd, $available) == 1) $status = "sad";
		else $status = "happy";
	}
	return $status;
}

add_filter( 'aioseop_title', 'rewrite_custom_titles' );

function rewrite_custom_titles( $title ) {
	if ( is_post_type_archive() ) {
	$postTypeName = get_post_type_object(get_post_type())->labels->name;
		$title = $postTypeName . " | " . get_bloginfo("name");
	}
	return $title;
}

//getPage
function getPage($string, $type){

	global $wpdb;

	$postType = get_post_type();
	$title = esc_sql($string);
	if(!$title) return;

	$page = $wpdb->get_results("
		SELECT*
		FROM $wpdb->posts
		WHERE post_title LIKE '%$title%'
		AND post_type = '$postType'
		LIMIT 1
	", OBJECT);

	if($type == "title"){
		$pageInfo = get_post_meta($page[0]->ID, "archiveInfo01", TRUE);
	}elseif($type == "contents"){
		$pageInfo = get_post_meta($page[0]->ID, "archiveInfo02", TRUE);
		$pageInfo = apply_filters("the_content", $pageInfo);
	}elseif($type == "h1"){
		$pageInfo = get_post_meta($page[0]->ID, "metaInfo01", TRUE);
	}
	return $pageInfo;

}

//notices
function notices(){
	$notice = '';
	return $notice;
}



//電話番号
function telNum(){
	return "539";
}

//siteCode取得
function siteCode(){
	$httpHost = $_SERVER['HTTP_HOST'];
	if($httpHost == 'ecoland' || $httpHost == 'www.eco-land.jp'){
		return 'ecoland';
	}elseif($httpHost == 'ecokaishu' || $httpHost == 'www.eco-kaishu.jp'){
		return 'ecokaishu';
	}elseif($httpHost == 'ecookataduke' || $httpHost == 'www.eco-okataduke.jp'){
		return 'ecookataduke';
	}elseif($httpHost == 'kaitorieco' || $httpHost == 'www.kaitori-eco.com'){
		return 'kaitorieco';
	}
}


//pageCode取得
function pageCode($last=null){
	$requestUri = siteInfo("requestUri");
	$pos = strpos($requestUri, '?');
	if($pos){
		$str = substr($requestUri, 0, $pos);
	}else{
		$str = $requestUri;
	}
	$dirs = explode("/", $str);
	$dirs = array_filter($dirs, "strlen");
	$dirs = array_values($dirs);
	if($last == 1){
		$pageCode = end($dirs);
	}else{
		$pageCode = $dirs[0];
	}
	return $pageCode;
}

//ページ情報習取得
function siteInfo($type){
	/*extract(shortcode_atts(array(
		"type" => ""
	), $type));*/
	if(isset($_SERVER['HTTPS']) and $_SERVER['HTTPS'] == 'on'){
		$protocol = 'https://';
	}else{
		$protocol = 'http://';
	}
	$httpHost = $_SERVER['HTTP_HOST'];
	$requestUri = $_SERVER['REQUEST_URI'];
	$crtScrt = $_SERVER['SCRIPT_NAME'];
	$basename = basename(dirname($crtScrt));
	$dirname = dirname($crtScrt);

	if($type == 'rootUrl'){
		$info = $protocol.$httpHost;
	}elseif($type == 'crtUrl'){
		$info = $protocol.$httpHost.$requestUri;
	}elseif($type == 'scrtUrl'){
		$info = $protocol.$httpHost.$crtScrt;
	}elseif($type == 'requestUri'){
		$info = $requestUri;
	}elseif($type == 'siteUrlEcoland'){
		$info = $protocol.'www.eco-land.jp';
	}elseif($type == 'siteUrlEcokaishu'){
		$info = $protocol.'www.eco-kaishu.jp';
	}elseif($type == 'siteUrlEcoauc'){
		$info = $protocol.'www.eco-auc.jp';
	}elseif($type == 'siteUrlEcookataduke'){
		$info = $protocol.'www.eco-okataduke.jp';
	}elseif($type == 'siteUrlEcohokan'){
		$info = $protocol.'www.eco-land.jp/hokan/';
	}elseif($type == 'siteUrlRshop'){
		$info = $protocol.'www.kaitori-eco.com';
	}else{
			$info = $protocol.$httpHost;
	}
	return $info;
}

//スマートフォンキャリア判別
function is_smartphone(){
	$useragents_s = array(
		'iPhone',		 // Apple iPhone
		'iPod',			 // Apple iPod touch
		'Android',		// 1.5+ Android
		'dream',			// Pre 1.5 Android
		'CUPCAKE',		// 1.5+ Android
		'blackberry9500', // Storm
		'blackberry9530', // Storm
		'blackberry9520', // Storm v2
		'blackberry9550', // Storm v2
		'blackberry9800', // Torch
		'webOS',			// Palm Pre Experimental
		'incognito',		// Other iPhone browser
		'webmate'		 // Other iPhone browser
	);
	$pattern_s = '/'.implode('|', $useragents_s).'/i';
	$ua_mobile = preg_match( '/Mobile/', $_SERVER['HTTP_USER_AGENT'] );
	if($ua_mobile == 1){
		return preg_match($pattern_s, $_SERVER['HTTP_USER_AGENT']);
	}
}

//キャンペーンコード取得
function campCode($post, $hier=NULL, $glue = NULL){
	$campCodes = get_the_terms($post->ID, 'campcode');
	$campCodeSlugs = array();
	if($campCodes && !is_wp_error($campCodes)){
		foreach($campCodes as $campCode){
			if($hier == "children"){
				if($campCode->parent != 0) array_push($campCodeSlugs, $campCode->slug);
			}elseif($hier == "parent"){
				if($campCode->parent == 0) array_push($campCodeSlugs, $campCode->slug);
			}else{
				array_push($campCodeSlugs, $campCode->slug);
			}
		}
	}
	if(!$glue){
		return $campCodeSlugs[0];
	}else{
		$campCodeSlugs = implode($glue, $campCodeSlugs);
		return $campCodeSlugs;
	}
}

//お問い合わせフォーム
function contactBnr($msg=FALSE, $form=FALSE, $tel=FALSE, $openingHour=FALSE){

	$telNum = telNum();
	$template_url = get_bloginfo("template_url");
	$site_url = siteInfo("rootUrl");

	if(campCode($post)){
		$childrenClass = campCode($post, "children");
		$code = substr($childrenClass, -2);
		$month = substr($childrenClass, 6, 2);
		if(is_numeric($month)){
			$month = sprintf("%01d", $month);
		}else{
			$month = substr($month, 0, 1);
		}
		$param = "?pr_code=".$month."-".$code;
		if($month == 4) $ycoll = "2-1";
	}

	//msg
	if($msg){
		$balloon = '<span class="block">お気軽に</span><span class="block">なんなりと</span><span class="block">お問い合わせ</span><span class="block">ください!</span>';
		$msg = <<<EOF
		<div class="msg">
			<p class="explains">
				<span class="block">{$balloon}</span>
			</p>
			<div id="ecolin"><img src="{$template_url}/assets/img/base/staff_img_shinki.jpg" alt="" /></div>
		<!--.msg--></div>
EOF;
	}else{
		$msg = "";
	}

	//kinds of form
	if(!$form){
		$form = <<<EOF
		<div class="box" id="mail">
			<a href="{$site_url}/estimate{$ycoll}/{$param}">
				<p class="label block">24時間受付中</p>
				<p class="action">
					<span class="icon-mail4"></span>
					<span>メールで見積依頼</span>
				</p>
			</a>
		</div>
EOF;
	}elseif($form == "contact"){
		$form = <<<EOF
		<div class="box" id="contact">
			<a href="{$site_url}/contact">
				<p class="label block">24時間受付中</p>
				<p class="action">
					<span class="icon-mail4"></span>
					<span>お問い合わせ</span>
				</p>
			</a>
		</div>
EOF;
	}else{
		$form = "";
	}

	//tel
	if(!$tel){
		$tel = <<< EOF
		<div class="box" id="tel">
			<a href="tel:0120530{$telNum}" onclick="ga('send', 'event', 'tel', '発信', '下層', 1, {'nonInteraction': 1});">
				<p class="label block">お急ぎの方はお電話で</p>
				<p class="action">
					<span class="icon-phone"></span>
					<span>0120-530-{$telNum}</span>
				</p>
			</a>
		</div>
EOF;
	}else{
		$tel = "";
	}

	//openingHour
	if(!$openingHour){
		$openingHour = <<< EOF
		<p id="openingHour">
			<span class="date">営業時間</span>
			<span class="date">平･土 9:00-22:00</span><span class="date">日･祝 9:00-20:00</span>
		</p>
EOF;
	}else{
		$openingHour = "";
	}


$string = <<< EOF
	<div class="contact">
		{$msg}
		{$tel}
		{$form}
		{$openingHour}
	<!--.contact--></div>
EOF;
return $string;

}
function contact($atts){
	extract( shortcode_atts ( array(
		"msg" => FALSE,
		"form" => FALSE,
		"tel" => FALSE,
		"open" => FALSE
	), $atts));
	return contactBnr($msg, $form, $tel, $open);
}
add_shortcode("contact", "contact");


/*******************************************************
* old
*******************************************************/

function mime($str){
  $str = mb_convert_encoding($str, "ISO-2022-JP","UTF-8");
  ini_set('mbstring.internal_encoding', 'ISO-2022-JP');
  $str = mb_encode_mimeheader($str, "ISO-2022-JP");
  ini_set('mbstring.internal_encoding', 'UTF-8');
  return $str;
}

//ブラウザ
function IEbrowserVer(){
	$ver = "";
	$agent = getenv( "HTTP_USER_AGENT" );

	if(strstr($agent,"MSIE")){
		$ver .= "msie ";
		if(strstr($agent, "MSIE 6.0")) $ver .= "ie6";
		if(strstr($agent, "MSIE 7.0")) $ver .= "ie7";
		if(strstr($agent, "MSIE 8.0")) $ver .= "ie8";
		if(strstr($agent, "MSIE 9.0")) $ver .= "ie9";
	}
	return $ver;
}

//H1タグ
function wpH1($post){
	if(get_post_type() == 'works'){
		return 'お住まいの地域でのエコ回収の実績をチェック！！不用品をゴミにしないエコ回収！';
	}elseif(get_post_type() == 'items'){
		return get_the_title($post->ID).'を不用品にしないエコ回収・買取の実績';
	}elseif(get_post_type() == 'area'){
		return get_the_title($post->ID).'でお住まいの方必見！不用品をゴミにしないエコ回収！';
	}elseif(get_post_type() == 'voices'){
		if(is_singular()){
			return 'お客様の声一覧：'.get_the_title($post->ID);
		}
	}else{
		return 'そんなにいらない。Less is beautiful. 不用品回収を出す前に「エコ回収」';
	}
}

//imgURL shortcode
function imgurl(){
	$url = siteInfo('rootUrl').'/img/kaishu/';
	return $url;
}
add_shortcode('kaishuImg', 'imgurl');

//サムネール取得
function view_first_image_src(){
	global $post, $posts;
	$_first_img_src = '';

	ob_start();
	ob_end_clean();

	$_output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $_matches);
	$_first_img_src = $_matches[1][0];

	if(empty($_first_img_src)) $_first_img_src = bloginfo("template_url")."/assets/img/base/ecoland_logo.gif";
	return $_first_img_src;
}

//実績の日付取得
function workDate($post){
	$dates = wp_get_post_terms($post->ID, 'date');
	foreach($dates as $date){
		if($date->parent != 0){
			$children = get_term_children($date->term_id, 'date');
			if(empty($children)) $month = $date->name.'月';
			else $day = $date->name;
			if($day) $workDay = $month.$day.'日';
			else $workDay = $month;
		}else{
			$year = $date->name.'年';
		}
		$workDate = $year.$workDay;
	}
	return $workDate;
}

//実績の品目取得
function workItems($post){
	$collected = array();
	$items = wp_get_post_terms($post->ID, 'cltitems');
	foreach($items as $item){
		if($item->name != 'その他') array_push($collected, $item->name);
	}
	$collected = implode(",", $collected);
	return $collected;
}

//実績のエリア取得
function workArea($post){
	$areas = wp_get_post_terms($post->ID, 'cltarea');
	foreach($areas as $area){
		if($area->parent != 0) $municipality = $area->name;
		else $prefecture = $area->name;
	}
	return $prefecture.$municipality;
}

//実績のお客様情報取得
function workCstmInfo($post){
	$cstm = array();
	$cstminfos = wp_get_post_terms($post->ID, 'cstminfo');
	foreach($cstminfos as $cstminfo){
			if($cstminfo->name == '男性' || $cstminfo->name == '女性'){
				array_push($cstm, $cstminfo->name);
			}
	}
	$cstm = implode(",", $cstm);
	return $cstm;
}



//オプション取得
function workOptionSvcs($post){
	$optionsvcs = array();
	$options = wp_get_post_terms($post->ID, 'services');
	foreach($options as $option){
		array_push($optionsvcs, $option->name);
	}
	$optionsvcs = implode(",", $optionsvcs);
	return $optionsvcs;
}

//地方名登録
add_action('cltarea_edit_form_fields', 'extra_taxonomy_fields');
function extra_taxonomy_fields( $tag ) {
	$t_id = $tag->term_id;
	$cat_meta = get_option("cat_$t_id");
?>
<tr class="form-field">
	<th><label for="area_num">地方名</label></th>
	<td><input type="text" name="Cat_meta[area_num]" id="img" size="25" value="<?php if(isset($cat_meta['area_num'])) echo esc_html($cat_meta['area_num']) ?>" /></td>
</tr>

<?php
}

add_action ( 'edited_term', 'save_extra_taxonomy_fileds');
function save_extra_taxonomy_fileds( $term_id ) {
	if ( isset( $_POST['Cat_meta'] ) ) {
		 $t_id = $term_id;
		 $cat_meta = get_option( "cat_$t_id");
		 $cat_keys = array_keys($_POST['Cat_meta']);
			foreach ($cat_keys as $key){
			if (isset($_POST['Cat_meta'][$key])){
			 $cat_meta[$key] = $_POST['Cat_meta'][$key];
			}
		 }
		 update_option( "cat_$t_id", $cat_meta );
	}
}

// プロフィール項目の追加・削除
add_filter('user_contactmethods','update_profile_fields',10,1);
function update_profile_fields($contactmethods){

	//項目の削除
	unset($contactmethods['aim']);
	unset($contactmethods['jabber']);
	unset($contactmethods['yim']);
	unset($contactmethods['url']);

	//項目の追加
	$contactmethods['namePron'] = 'ふりがな';
	$contactmethods['belongs'] = '所属';
	$contactmethods['profileimg'] = 'プロフィール画像';

	return $contactmethods;
}

//ポストタイトル
function cmsTitle($posttype, $submitdate, $pr_code=FALSE){
	date_default_timezone_set('Asia/Tokyo');
	$today = getdate();
	$todayposts = query_posts(
		array(
			'posts_per_page' => -1,
			'post_type' => $posttype,
			'post_status' => array('pending', 'publish', 'draft'),
			'year' => $today["year"],
			'monthnum' => $today["mon"],
			'day' => $today["mday"]
		)
	);

	//post_type判別
	if($posttype == 'contactform'){
		$typeid = 'C';
	}elseif($posttype == 'voices'){
		$typeid = 'V';
	}elseif($posttype == "remind"){
		$typeid = "R";
	}else{
		$typeid = 'E';
	}

	//ユーザーエージェント
	$agent = getenv("HTTP_USER_AGENT");
	if(is_smartphone()){
		$ua = "-SP";
	}else{
		$brow = IEbrowserVer();
		if($brow == "msie ie6" || $brow == "msie ie7" || $brow == "msie ie8") $ua = "-LE";
		else $ua = "-PC";
	}

	//pr_code
	if($pr_code){
		$prCode = "-".$pr_code;
	}else{
		if($posttype == "ycoll") $prCode = "-2_01";
		else $prCode = "-0_00";
	}

	$postcount = count($todayposts) + 1;
	$postcount = sprintf("%03d", $postcount);
	$cmstitle = $typeid.$today["year"].$ua.$prCode."【".$submitdate.$postcount."】";
	return $cmstitle;

}


// 添付の画像を取ってくる
function get_attached_img($id, $cf, $alt=null, $style=null, $size=null, $align=null, $link=null){
	$attach_id = get_post_meta($id, $cf, true);
	$image = wp_get_attachment_image_src($attach_id, $size);
	list($src, $width, $height) = $image;
	if($src){
		$img = '<img src="'.$src.'" width="'.$width.'" height="'.$height.'" id="'.$style.'" class="'.$align.'" alt="'.$alt.'" />';
		if($link){
			$get_attached_img = '<a href="'.$link.'">'.$img.'</a>';
		}else{
			$get_attached_img = $img;
		}
	}
	return $get_attached_img;
	wp_reset_query();
}



add_filter( 'manage_posts_columns', 'shortlink_add_column' );
add_action( 'manage_posts_custom_column', 'shortlink_add_value', 10, 2 );

function shortlink_add_column($cols) {
	$cols['shortlink'] = __('Shortlink');
	return $cols;
}
function shortlink_add_value($column_name, $post_id) {
	if ( 'shortlink' == $column_name ) {
		echo '<input type="text" value="'.wp_get_shortlink($post_id).'" onclick="this.focus(); this.select();" />';
	}
}
add_filter( 'manage_edit-post_sortable_columns', 'shortlink_sortable_column' );
function shortlink_sortable_column( $columns ) {
	$columns['shortlink'] = 'Shortlink';
	return $columns;
}


/****************************************************************************************
* メール送信
*****************************************************************************************/

/* メールヘッダー
*****************************************************************************************/
function mail_header($from = NULL){
	$headers .= "X-Mailer: myphpMail".phpversion()."\n";
	if($from){
		$headers .= "From: ".$from."\r\n";
		$headers .= "Reply-To: ".$from."\r\n";
		$headers .= "Return-Path: ".$from."\r\n";
	}
	return $headers;
}

/* メールフッター
*****************************************************************************************/
function mail_footer(){
	$mail_footer = '


ecoecoecoecoecoecoecoecoecoecoecoecoecoecoecoeco

■ お申し込み方法 ■

⇒ お電話でお申し込み（当日集荷OK!!）
TEL:0120-530-539（フリーダイアル ゴミゼロ ゴミナイ）

⇒ webサイトからのお問い合わせはコチラから
https://www.eco-kaishu.jp/contact

⇒ webサイトからのかんたんお見積依頼はコチラから
https://www.eco-kaishu.jp/estimate

⇒ メールでのお申し込み
E-mail　530-539@eco-land.jp

ecoecoecoecoecoecoecoecoecoecoecoecoecoecoecoeco

【運営】株式会社ウインローダー 〒167-0043　東京都杉並区上荻2-37-7
【エコランド事業部】 TEL:0120-530-539　

ecoecoecoecoecoecoecoecoecoecoecoecoecoecoecoeco

Copyright (C)  winroader, Inc. All Rights Reserved.

';
	return $mail_footer;
}

/* お問い合わせフォーム
*****************************************************************************************/

function contact_ntfct($email, $contactValues){
	$subject = '【エコ回収】お問い合わせの受付が完了いたしました';
	$message = $contactValues['cstmName'].'様

お問合せをいただき誠にありがとうございます。
お問合せいただきました内容は下記の通りです。ご確認ください。';
$message .= '

──────────────────────────────────

■お問い合わせ種類
'.$contactValues['quesKind'].'

■お問い合わせ内容
'.$contactValues['cstmContents'];
$message .= '

■お名前：'.$contactValues['cstmName'].'('.$contactValues['cstmPron'].')
■メールアドレス：'.$contactValues['cstmEmail'].'
■電話番号：'.$contactValues['cstmPhoneNum'].'
■エコランドからのご連絡方法：'.$contactValues['replyWay'].'
■お問い合わせ時刻：'.date("Y年m月d日 H時i分s秒", time()).'

──────────────────────────────────';

$message .= '

担当者より後ほどご連絡をさせていただきます。
この度はお問合わせいただき誠にありがとうございました。

受付番号：'.$contactValues['post_title'].
mail_footer();

	wp_mail($email, $subject, $message, mail_header());
	wp_mail('mail_contact@eco-land.jp', $subject, $message, mail_header($email));
}

/* クーポン未使用者専用フォーム
*****************************************************************************************/

function coupon_ntfct($email, $couponValues){
	$subject = '【エコ回収】お問い合わせの受付が完了いたしました';
	$message = $couponValues['cstmName'].'様

お問合せをいただき誠にありがとうございます。
お問合せいただきました内容は下記の通りです。ご確認ください。';
$message .= '

──────────────────────────────────

■ご使用のクーポン番号
'.$couponValues['couponNum'].'

■お問い合わせ内容
'.$couponValues['cstmContents'].'

■お名前：'.$couponValues['cstmName'].'('.$couponValues['cstmPron'].')
■メールアドレス：'.$couponValues['cstmEmail'].'
■お問い合わせ時刻：'.date("Y年m月d日 H時i分s秒", time()).'

──────────────────────────────────';
$message .= '

担当者より後ほどご連絡をさせていただきます。
この度はお問合わせいただき誠にありがとうございました。

受付番号：'.$couponValues['post_title'].
mail_footer();

	wp_mail($email, $subject, $message, mail_header());
	wp_mail('mail_contact@eco-land.jp', $subject, $message, mail_header($email));

}


/* カンタン見積依頼フォーム
*****************************************************************************************/

function estimate_ntfct($email, $estimateValues){

	if($estimateValues['estmtSvcsEtc']) $estimateValues['estmtSvcsEtc'] = '('.$estimateValues['estmtSvcsEtc'].')';
	$subject = '【エコ回収】メールで見積依頼の受付が完了いたしました';
	$message = $estimateValues['cstmName'].'様

【エコ回収】の見積依頼をしていただき誠にありがとうございます。
依頼いただきました内容は下記の通りです。ご確認ください。

──────────────────────────────────

■集荷品について
'.$estimateValues['cstmContents'];
if($estimateValues['campName']){
	$message .= '

──────────────────────────────────

■申込キャンペーン
'.$estimateValues['campName'];
}
$message .= '

──────────────────────────────────

■集荷場所について
お住まいの県：'.$estimateValues['cstmPrefecture'].'
お住まいの市区町村：'.$estimateValues['cstmMncplt'].'
住居形態：'.$estimateValues['cstmResidence'];
if($estimateValues['cstmRsdcEtc']) $message .= '('.$estimateValues['cstmRsdcEtc'].')';
$message .= '
エレベーター：'.$estimateValues['cstmElvt'].'
階数：'.$estimateValues['cstmFloor'].'

──────────────────────────────────

■集荷日について
第1希望：'.$estimateValues['cltDay0'].'
第2希望：'.$estimateValues['cltDay1'].'
第3希望：'.$estimateValues['cltDay2'].'

──────────────────────────────────

■お客様情報
お名前：'.$estimateValues['cstmName'].'('.$estimateValues['cstmPron'].')
メールアドレス：'.$email.'
電話番号：'.$estimateValues['cstmPhoneNum'].'
エコランドからのご連絡方法：'.$estimateValues['replyWay'].'
見積依頼時刻：'.date("Y年m月d日 H時i分s秒").'

──────────────────────────────────';
$message .= '

担当者より後ほどご連絡をさせていただきます。
この度はお問合わせいただき誠にありがとうございました。

受付番号：'.$estimateValues['post_title'].
mail_footer();
	wp_mail($email, $subject, $message, mail_header());
	wp_mail('mail_contact@eco-land.jp', $subject, $message, mail_header($email));

}

/* ヤフオクコラボ見積依頼フォーム
*****************************************************************************************/

function yColl_ntfct($email, $yCollValues){
	$subject = '【エコ回収】大型家具 無料引取サービスの申込受付が完了いたしました';
	$message = $yCollValues['cstmName'].'様

【エコ回収】大型家具 無料引取サービスに申込いただきまして誠にありがとうございます。
申込いただきました内容は下記の通りです。ご確認ください。

──────────────────────────────────

■集荷品について
'.$yCollValues['cstmContents'].'
──────────────────────────────────

■集荷場所について
お住まいの地域：'.$yCollValues['yCollCstmMuni'].'
住居形態：'.$yCollValues['cstmResidence'];
if($yCollValues['cstmRsdcEtc']) $message .= '('.$yCollValues['cstmRsdcEtc'].')';
$message .= '
エレベーター：'.$yCollValues['cstmElvt'].'
階数：'.$yCollValues['cstmFloor'].'

──────────────────────────────────

■集荷日について
第1希望：'.$yCollValues['cltDay0'].'
第2希望：'.$yCollValues['cltDay1'].'
第3希望：'.$yCollValues['cltDay2'].'

──────────────────────────────────

■お客様情報
お名前：'.$yCollValues['cstmName'].'('.$yCollValues['cstmPron'].')
メールアドレス：'.$email.'
電話番号：'.$yCollValues['cstmPhoneNum'].'
エコランドからのご連絡方法：'.$yCollValues['replyWay'].'
見積依頼時刻：'.date("Y年m月d日 H時i分s秒").'

──────────────────────────────────';
$message .= '

担当者より後ほどご連絡をさせていただきます。
この度はお問合わせいただき誠にありがとうございました。

受付番号：'.$yCollValues['post_title'].
mail_footer();

	wp_mail($email, $subject, $message, mail_header());
	wp_mail('mail_contact@eco-land.jp', $subject, $message, mail_header($email));

}


/* ヤフオクコラボ見積依頼フォーム2
*****************************************************************************************/

function yColl_ntfct2($email, $yCollValues){
	$subject = '大型家具 無料引取サービスの申込受付が完了いたしました';
	$message = $yCollValues['cstmName'].'様

大型家具 無料引取サービスに申込いただきまして誠にありがとうございます。
申込いただきました内容は下記の通りです。ご確認ください。

──────────────────────────────────

■無料引取対象品について
'.$yCollValues['cstmContents'].'

──────────────────────────────────

■集荷日について
第1希望：'.$yCollValues['cltDay0'].'
第2希望：'.$yCollValues['cltDay1'].'
第3希望：'.$yCollValues['cltDay2'].'

──────────────────────────────────

■お客様情報
お名前：'.$yCollValues['cstmName'].'('.$yCollValues['cstmPron'].')
メールアドレス：'.$email.'
見積依頼時刻：'.date("Y年m月d日 H時i分s秒").'

──────────────────────────────────';
$message .= '

担当者より後ほどご連絡をさせていただきます。
この度はお問合わせいただき誠にありがとうございました。

受付番号：'.$yCollValues['post_title'].
mail_footer();

	wp_mail($email, $subject, $message, mail_header());
	wp_mail('mail_contact@eco-land.jp', $subject, $message, mail_header($email));

}

/* アンケートフォーム
*****************************************************************************************/

function inquiry_ntfct($cstmEmail, $inquiryValues){

	$subject = '【エコ回収】アンケートにご協力いただき誠にありがとうございます';
	$message = $inquiryValues['cstmName'].'様

この度は【エコ回収】アンケートに答えていただき誠にありがとうございます。
今後のサービスの向上させていただくために参考にさせていただきます。

なお、お答えいただいたアンケート内容は個人を特定する情報を除き
ホームページに掲載させていただく場合がありますので、
あらかじめご了承ください。';
$message .= '

受付番号：'.$inquiryValues['post_title'].
mail_footer();
	wp_mail($cstmEmail, $subject, $message, mail_header());
}


/*******************************************************
* cron
*******************************************************/


/* メールフッター
*****************************************************************************************/
function mail_footer_forstaff(){
	$mail_footer .= <<<EOF

ecoecoecoecoecoecoecoecoecoecoecoecoecoecoecoeco

管理画面 http://www.eco-kaishu.jp/wp-admin

ecoecoecoecoecoecoecoecoecoecoecoecoecoecoecoeco

EOF;

	return $mail_footer;

}


//レビュー通信
function staffCommentStatus($post, $email){

	$args = array(
		"post_id" => $post->ID,
		"author_email" => $email,
		"status" => "all"
	);
	$comments = get_comments($args);
	if($comments){
		foreach($comments as $comment){
			if($comment->comment_approved){
				return "済";
			}else{
				return "承認待ち";
			}
		}
	}else{
		return "未返信";
	}
}

function dailyReviewReplys(){


	$y = date_parse(date("c", strtotime("-1 day")));
	$yesterday = $y["year"]."年".$y["month"]."月".$y["day"]."日";
	$subject = "【レビュー通信】". $yesterday;

	$message .= <<<EOF
{$yesterday}まで投稿されたレビューの中、まだ返信がないレビュー
※承認待ち返信も含まれています。

------------

EOF;

	$args = array(
		"post_status" => "publish",
		"posts_per_page" => -1,
		"post_type" => "voices",
		"voicekinds" => "review"
	);
	$voices = query_posts($args);
	foreach($voices as $voice){

		$staffs = array();
		$authors = get_the_terms($voice->ID, "author");

		foreach($authors as $author){
			if($author->name != "admin"){
				$staff = get_user_by("login", $author->name);
				if($staff->roles[0] == "cltstaff"){
					$cltstaff = $staff->display_name;
					$cltstaffStatus = staffCommentStatus($voice, $staff->user_email);
					if($cltstaffStatus == "済") $i++;
				}
				if($staff->roles[0] == "conciergestaff"){
					$concierge = $staff->display_name;
					$conciergeStatus = staffCommentStatus($voice, $staff->user_email);
					if($conciergeStatus == "済") $i++;
				}
			}
		}

		if($cltstaffStatus != "済" || $conciergeStatus != "済"){

			$name = get_post_meta($voice->ID, "voiceInfo06", TRUE);
			$econum = get_post_meta($voice->ID, "voiceInfo24", TRUE);
			$cltdate = get_post_meta($voice->ID, "voiceInfo23", TRUE);
			$guid = wp_get_shortlink($voice->ID);
			$message .= <<<EOF

{$name}様 (エコNo. {$econum} / {$cltdate}回収)
{$guid}
担当集荷スタッフ : {$cltstaff} ({$cltstaffStatus})
担当コンシェルジュ : {$concierge} ({$conciergeStatus})

------------

EOF;
		}

	}

	$message .= <<<EOF

コメント作成マニュアル http://goo.gl/PlvOl3

-----

お問い合わせは IT戦略室 永廣&李垠柱まで送信してください。
永廣 a_nagahiro@winroader.co.jp
李垠柱 e_lee@winroader.co.jp


EOF;

	$emails = array(
		"tokura@winroader.co.jp",
		"shimura@winroader.co.jp",
		"y_chou@winroader.co.jp",
		"h_murakami@winroader.co.jp",
		"eco-center@winroader.co.jp",
		"mura_kaisyu@winroader.co.jp",
		"meg_kaisyu@winroader.co.jp",
		"s_okamura@winroader.co.jp",
		"k_yamamoto@winroader.co.jp",
		"a_nagahiro@winroader.co.jp",
		"s_ohta@winroader.co.jp",
		"e_lee@winroader.co.jp"
	);
	wp_mail($emails, $subject, $message, mail_header());

}
add_action( 'reviewReports', 'dailyReviewReplys');

function dailyReviewReports(){

	$y = date_parse(date("c", strtotime("-1 day")));
	$yesterday = $y["year"]."年".$y["month"]."月".$y["day"]."日";
	$subject = "【新着レビュー】". $yesterday;

	$message .= <<<EOF
{$yesterday}に投稿された新着レビュー

------------

EOF;

	$args = array(
		"post_status" => array("pending", "publish", "draft"),
		"posts_per_page" => -1,
		"post_type" => "voices",
		"voicekinds" => "review",
		"year" => $y["year"],
		"month" => $y["month"],
		"day" => $y["day"]
	);
	$voices = query_posts($args);
	if($voices){
		foreach($voices as $voice){

			$name = get_post_meta($voice->ID, "voiceInfo06", TRUE);
			$econum = get_post_meta($voice->ID, "voiceInfo24", TRUE);
			$guid = wp_get_shortlink($voice->ID);

			$message .= <<<EOF

{$name}様 (エコNo. {$econum})

EOF;
		}

	}else{
		$message .= "未公開レビュー無し";
	}

$message .= <<<EOF

------------

管理画面 http://www.eco-kaishu.jp/wp-admin

EOF;

	$emails = array(
		"e_lee@winroader.co.jp",
		"a_nagahiro@winroader.co.jp"
	);
	wp_mail($emails, $subject, $message, mail_header());

}
add_action( 'reviewReports', 'dailyReviewReports');
function reviewReportsActivation() {
	if (! wp_next_scheduled( 'reviewReports')){
		wp_schedule_event( ceil( time() / 86400 ) * 86400 + (5 - get_option( 'gmt_offset' ) ) * 3600, 'daily', 'reviewReports' );
	}
}
add_action('wp', 'reviewReportsActivation');



?>
