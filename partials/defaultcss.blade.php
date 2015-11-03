<!-- Web Fonts  -->
<!-- If you want to use google font remove this comment block and local font stylesheet
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
-->
{{generate_theme_css('mytema/assets/css/fonts/open-sans/stylesheet.css')}}
{{generate_theme_css('mytema/assets/css/fonts/icomoon/style.css')}}

<!-- CSS styles  -->
{{generate_theme_css('mytema/assets/css/bootstrap.min.css')}}
@if($tema->isiCss=='')
	{{generate_theme_css('mytema/assets/css/style.css')}}
@else
	{{generate_theme_css('mytema/assets/css/editstyle.css')}}
@endif
{{generate_theme_css('mytema/assets/css/responsive.css')}}
{{generate_theme_css('mytema/assets/css/animate.css')}}
{{generate_theme_css('mytema/assets/css/color-scheme.css')}}
<!-- Slider -->
{{generate_theme_css('mytema/assets/css/flexslider/flexslider.css')}}
{{generate_theme_css('mytema/assets/css/flexslider/default.css')}}

<!-- Other -->
{{favicon()}}