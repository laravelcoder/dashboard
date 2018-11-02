<!doctype html>
<html lang="en" dir="ltr">
	<head>
@include('dp_partials.head')

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-MDS48N2');</script>
    <!-- End Google Tag Manager -->

    @yield('topcss')

    @yield('topscripts')
	</head>

	<body class="app sidebar-mini rtl" >
	    <!-- Google Tag Manager (noscript) -->
	    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MDS48N2" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	    <!-- End Google Tag Manager (noscript) -->
		<div id="global-loader" ></div>
		<div class="page">
			<div class="page-main">
@include('dp_partials.header')

				<!-- Sidebar menu-->
@include('dp_partials.leftsidebar')
				<div class="app-content my-3 my-md-5">
					<div class="side-app">

 @yield('content')

					</div>
{{-- @include('dp_partials.footer') --}}
				</div>
			</div>
		</div>

@include('dp_partials.bottomjs')

	</body>
</html>