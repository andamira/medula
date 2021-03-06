<?php
/**
 * Analytics Tracking Code file
 *
 *     >------------------>
 *
 *     1 Google Analytics
 *
 *     2 Piwik
 *
 *     <------------------<
 */

/**
 * 1 GOOGLE ANALYTICS
 */

// your Google Analytics Code ( UA-XXXXXX-X )
$ga_ua = "";


if ($ga_ua) {
	function medulap_analytics() {
		global $ga_ua;
?>
	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');	
		ga('create', '<?php echo $ga_ua; ?>', 'auto' );
		ga('send', 'pageview');
	</script>
<?php
	}
	add_action('wp_head','medulap_analytics',1,20);
}

/**
 * 2 PIWIK
 *
 * @link https://piwik.org/docs/installation/#install-the-javascript-tracking-tag
 */

