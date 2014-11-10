// 6サイト共通GA
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
ga('create', 'UA-53370589-1', 'auto', {
	'name': 'secondTracker',
	'allowLinker': true
});
ga('secondTracker.require', 'linker');
ga('secondTracker.linker:autoLink', ['eco-land.jp','eco-okataduke.jp','eco-kaishu.jp','eco-auc.jp','kaitori-eco.com']);
ga('secondTracker.send','pageview');

// エコ回収GA
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
ga('create', 'UA-42854141-2', 'auto');
ga('require', 'displayfeatures');
ga('send', 'pageview');
