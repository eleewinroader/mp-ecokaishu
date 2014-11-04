//共有するURLは現在のページ
var url = location.href;

//twitterにつぶやく内容はページタイトル
var title = document.title;

//count復活する時は aタグの中に <span class="count"></span>を追記
var f = "#shareFacebook .count";
var t = "#shareTwitter .count";
var g = "#shareGoogle .count";

var f_a = "#shareFacebook a";
var t_a = "#shareTwitter a";
var g_a = "#shareGoogle a";

var f_href = 'https://www.facebook.com/sharer/sharer.php?u='+encodeURI(url);
var t_href = 'http://twitter.com/share?count=horizontal&original_referer='+encodeURI(url)+'&text='+encodeURI(title)+'&url='+encodeURI(url);
var g_href = 'https://plus.google.com/share?url='+encodeURI(url);

$(document).ready(function(){

	//ボタンのhrefを設定

	$(f_a).attr({"href":f_href});
	$(t_a).attr({"href":t_href});
	$(g_a).attr({"href":g_href});

	//クリックイベントを設定

	$(f_a).click(function () {
	  window.open(this.href, 'facebook-share-dialog', 'width=626,height=436'); return false;
	});
	$(t_a).click(function () {
	  window.open(this.href, 'tweetwindow', 'width=550, height=450,personalbar=0,toolbar=0,scrollbars=1,resizable=1'); return false;
	});
	$(g_a).click(function () {
	  window.open(this.href, 'Gwindow', 'width=650, height=450, menubar=no, toolbar=no, scrollbars=yes'); return false;
	});

	//共有数を取得しspanタグ内に設定

	$.getJSON('https://graph.facebook.com/?id='+encodeURI(url)+'&callback=?', {}, function(json) {
		$(f).text(json.shares || 0 );
	})
	$.ajax({
		url:'http://urls.api.twitter.com/1/urls/count.json',
		dataType:'jsonp',
		data:{
			url:url
		},
		success:function(res){
			$(t).text( res.count || 0 );
		}
	});
	$.ajax({
		type: "get", dataType: "xml",
		url: "https://query.yahooapis.com/v1/public/yql",
		data: {
			q: "SELECT content FROM data.headers WHERE url='https://plusone.google.com/_/+1/fastbutton?hl=ja&url=" + url + "' and ua='#Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/33.0.1750.154 Safari/537.36'",
			format: "xml",
			env: "http://datatables.org/alltables.env"
		},
		success: function (data) {
			var content = $(data).find("content").text();
			var match = content.match(/window\.__SSR[\s*]=[\s*]{c:[\s*](\d+)/i);
			var count = (match != null) ? match[1] : 0;
			$(g).text(count);
		}
	});
});