<?php
/*
* @package Montser Platform
* @subpackage MP-Ecokaishu 2.0
* @since MP-Ecokaishu 0.0
*/

date_default_timezone_set( 'Asia/Tokyo' );

/*******************************************************
* seotag
*******************************************************/

//getTitle
function getTitle($tempType, $obj){
	if($tempType == "single"){
		$metaTitle = get_post_meta($obj->ID, _aioseop_title, TRUE);
		if($metaTitle) $metainfo = $metaTitle."｜".get_bloginfo("name");
		else $metainfo = get_the_title($obj->ID)."｜".get_bloginfo("name");
	}elseif($tempType == "postTypeArchive"){
		$metainfo = $obj->label."｜".get_bloginfo("name");
	}elseif($tempType == "archive"){
		$metainfo = $obj->labels."｜".get_bloginfo("name");
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
		if(!$metainfo) $metainfo = mb_substr(strip_tags($obj->post_content), 0, 100)."...";
	}elseif($tempType == "postTypeArchive"){
		$metainfo = $obj->description;
	}elseif($tempType == "archive"){
		$metainfo = $obj->description;
	}elseif($tempType == "home"){
		$metainfo = get_bloginfo("description");
	}
	if($metainfo) return $metainfo;
	else return false;
}
//getKeywords
function getKeywords($tempType, $obj){
	if($tempType == "postTypeArchive"){
		$metainfo = $obj->label.",不用品,回収,エコ";
	}elseif($tempType == "archive"){
		$metainfo = $obj->name.",不用品,回収,エコ";
	}elseif($tempType == "home"){
		$metainfo = "不,用品,回収,エコ,買取,ゴミ,ゼロ";
	}
	if($metainfo) return $metainfo;
	else return false;
}

//getCanonicalUrl
function getCanonicalUrl($tempType, $obj){
	if($tempType == "single"){
		$metaInfo = get_permalink($obj->ID);
		print_r($metaInfo);
	}elseif($tempType == "postTypeArchive"){
		$metainfo = get_post_type_archive_link($obj->term_id);
	}elseif($tempType == "archive"){
		$metainfo = get_term_link($obj, $obj->taxonomy);
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
			$metaH1 = get_the_title($obj->ID)." 〜 不用品回収の前にオトク情報チェックして【エコ回収】";
		}elseif($obj->post_type == "notices"){
			$metaH1 = get_the_title($obj->ID)." 〜 お知らせ&新着情報";
		}else{
			$cat = get_the_category();
			$metaH1 = get_post_meta($obj->ID, "contentsInfo04", TRUE);
			if(!$metaH1) $metaH1 = get_the_title($obj->ID)." 〜 ".$cat[0]->name;
		}
		$metainfo = $metaH1;
	}elseif($tempType == "postTypeArchive"){
		$postType = $obj->name;
		if($postType == "area"){
			$metainfo = "東京・神奈川・千葉・埼玉・大阪・兵庫で不用品をゴミにしない【エコ回収】";
		}elseif($postType == "items"){
			$metainfo = "家電、家具、冷蔵庫、テレビなどの処分をお考えるのなら不用品をゴミにしない【エコ回収】";
		}elseif($postType == "notices"){
			$metainfo = "エコ回収サイトとサービスに関するお知らせ&新着情報";
		}else{
			$metaH1 = getPage("イントロ", "h1");
			if($metaH1) $metainfo = $metaH1;
			else $metainfo = $obj->label;
		}
	}elseif($tempType == "archive"){
		$metainfo = $obj->name;
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
		}elseif($obj->post_type == "area" || $obj->post_type == "items"){
			$classinfo .= " columns";
			$classinfo .= " ".$obj->post_type;
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

//カスタム投稿パーマリンク「/taxonomy/」削除
function my_custom_post_type_permalinks_set($termlink, $term, $taxonomy){
	return str_replace('/'.$taxonomy.'/', '/', $termlink);
}
add_filter('term_link', 'my_custom_post_type_permalinks_set',11,3);

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


/* shorcodes */
//add_shortcode("siteUrl", "siteInfo");
add_shortcode("telNum", "telNum");

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
function contactBnr($form){
	if(!$form) $formDir = "/estimate";
	else $formDir = "/".$form;
	$contactBnr = '
		<aside class="contact">
			<div class="bnr">
				<a href="tel:0120530'.telNum(siteCode(), pageCode(), $prCode).'" id="tel">
					<p class="expl">お電話で申込む</p>
					<p class="btn"><span class="icon-phone2 icon"></span><span data-type="freeDial">0120</span>-<span data-type="localDial">530</span>-<span data-type="'.telNum(siteCode(), pageCode(), $prCode).'">'.telNum(siteCode(), pageCode(), $prCode).'</span></span></p>
					<p class="openingHour">
						<span class="block">平･土 9時-22時</span>
						<span class="block">祝･日 9時-20時</span>
					</p>
				</a>
			</div>
			<div class="bnr">
				<a href="'.siteInfo("rootUrl").$formDir.'" id="estimate">
					<p class="expl">フォームから申込む</p>
					<p class="btn"><span class="icon-calculator icon"></span>かんたん申込</p>
				</a>
			</div>
		<!-- .contact --></aside>';
	return $contactBnr;
}


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
 
	//項目の追加
	$contactmethods['name'] = 'お名前';
	$contactmethods['namePron'] = 'ふりがな';
	$contactmethods['phone'] = '電話番号';
	$contactmethods['prefecture'] = '都道府県';
	$contactmethods['municipality'] = '市区町村';
	$contactmethods['birthday'] = '誕生日';
	$contactmethods['sex'] = '性別';
	$contactmethods['marrige'] = '既婚・未婚';
	$contactmethods['residence'] = '一緒に暮らしている人数';
	$contactmethods['job'] = '職業';
	$contactmethods['topics'] = '気になるトピック';
 
	return $contactmethods;
}

//ポストタイトル
function cmsTitle($posttype, $submitdate, $pr_code){
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
	}elseif($posttype == 'works'){
		$typeid = 'W';
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

2013年12月18日までお答え頂いた方には、先着100名様限定1,000円分の商品券をプレゼントします。
商品券の詳細については、後日メールにて改めてご案内させていただきます。

なお、お答えいただいたアンケート内容は個人を特定する情報を除き
ホームページに掲載させていただく場合がありますので、
あらかじめご了承ください。';
if($inquiryValues['couponNum']){
	$message .= '

──────────────────────────────────

アンケート回答ありがとう「基本料金100%OFF」クーポン
★★★★★★★★★★★★★★★★★★★
クーポン番号：'.$inquiryValues['couponNum'].'
★★★★★★★★★★★★★★★★★★★

次回エコランドをご利用になる際、こちらのクーポンをお使いください。
'.$inquiryValues['cstmName'].'様のまたのご利用、お待ちしております。

※お申し込みの際、クーポン番号をお伝えください。

──────────────────────────────────';
}
$message .= '

受付番号：'.$inquiryValues['post_title'].
mail_footer();
	wp_mail($cstmEmail, $subject, $message, mail_header());
}

function inquiry_ntfct_isd($inquiryValues){

	$subject = '【エコ回収】アンケート：'.$inquiryValues['post_title'];
	$message = '

──────────────────────────────────

●回収品目
'.$inquiryValues['cltdItems'].'
その他：'.$inquiryValues['cltdItemEtc'].'

●不用品回収を出そうと思ったきっかけ
'.$inquiryValues['cue'].'
その他：'.$inquiryValues['cueEtc'].'

●エコランドを知った経由
'.$inquiryValues['from'].'
検索ワード：'.$inquiryValues['searchEtc'].'
その他：'.$inquiryValues['fromEtc'].'

●エコランドを選んだ理由
'.$inquiryValues['cause'].'
その他：'.$inquiryValues['causeEtc'].'

--
１番：'.$inquiryValues['causeFirst'].'
２番：'.$inquiryValues['causeSecond'].'
３番：'.$inquiryValues['causeThird'].'

──────────────────────────────────

●受付スタッフへの評価＆コメント
'.$inquiryValues['voiceCC'].'
'.$inquiryValues['voiceCCCmt'].'

●回収スタッフへの評価＆コメント
'.$inquiryValues['voiceCS'].'
'.$inquiryValues['voiceCSCmt'].'

●料金への評価＆コメント
'.$inquiryValues['voiceCost'].'
'.$inquiryValues['voiceCostCmt'].'

●HPへの評価＆コメント
'.$inquiryValues['voiceHP'].'
'.$inquiryValues['voiceHPCmt'].'

●他にあってほしいサービス
'.$inquiryValues['voiceEtc'].'

●その他のコメント
'.$inquiryValues['voiceEtcSvc'].'

──────────────────────────────────

●他社に相談したか
'.$inquiryValues['cttCor'].'

●相談した会社
'.$inquiryValues['cttedCor'].'
その他：'.$inquiryValues['cttedCorEtc'].'

──────────────────────────────────

●自治体に相談したか
'.$inquiryValues['cttOrg'].'

●自治体を選ばなかった理由
'.$inquiryValues['notAplyOrg'].'
その他：'.$inquiryValues['notAplyOrgEtc'].'

●自治体に相談しなかった理由
'.$inquiryValues['notCttOrg'].'
その他：'.$inquiryValues['notCttOrgEtc'].'

──────────────────────────────────

受付番号：'.$inquiryValues['post_title'].'
クーポン番号：'.$inquiryValues['couponNum'];
wp_mail(array("e.lee.winroader@gmail.com", "h_murakami@winroader.co.jp", "fzpfyjfek6@i.softbank.jp"), $subject, $message, mail_header());
}


?>
