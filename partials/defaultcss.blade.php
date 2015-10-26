	<!-- Default css-->
	{{HTML::style('themes/'.$toko->akunId.'-tema/tender/assets/css/bootstrap.min.css')}}
	{{HTML::style('themes/'.$toko->akunId.'-tema/tender/assets/css/font.css')}}

	@if($tema->isiCss=='')	
	{{HTML::style('themes/'.$toko->akunId.'-tema/tender/assets/css/style.css')}}
	@else
	{{HTML::style(dirTemaToko().'tender/assets/css/editstyle.css')}}	
	@endif

	<!-- Other -->
	<script type="text/javascript">
		// Add Google Font name here
		WebFontConfig = { google: { families: [ 'Bangers', 'Lato' ] } };
		(function() {
		var wf = document.createElement('script');
		wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
		'://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
		wf.type = 'text/javascript';
		wf.async = 'true';
		var s = document.getElementsByTagName('script')[0];
		s.parentNode.insertBefore(wf, s);
		})();
	</script>

	<style type="text/css">
		/* Add Google Font name here */
		.wf-active {font-family: 'Lato',serif; font-size: 14px;}
		.wf-active .logo {font-family: 'Bangers', serif;}
	</style>
	{{createFavicon($toko)}}	