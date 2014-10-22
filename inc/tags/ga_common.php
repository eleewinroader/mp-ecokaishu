<!--
// 20140808
// 6サイト共通GA
-->

<script>
	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	ga('create', 'UA-53370589-1', 'auto', {'allowLinker': true}, {'name': 'secondTracker'});
	ga('secondTracker.require', 'linker');
	ga('secondTracker.linker:autoLink', ['eco-land.jp','eco-okataduke.jp','eco-kaishu.jp','eco-auc.jp','kaitori-eco.com']);
	ga('secondTracker.send','pageview');
</script>