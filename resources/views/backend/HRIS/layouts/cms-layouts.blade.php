<!DOCTYPE html>
<html lang="en-us">
	<head>
        <title> SmartAdmin </title>

		<meta charset="utf-8">
		<meta name="description" content="">
		<meta name="author" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- iOS web-app metas : hides Safari pages Components and Changes Status Bar Appearance -->
        <meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">

		<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
		<!-- <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet"> -->
		<link href="{{ asset('css/smartadmin-production-plugins.min.css') }}" rel="stylesheet">
		<link href="{{ asset('css/smartadmin-production.min.css') }}" rel="stylesheet">
		<link href="{{ asset('css/smartadmin-skins.min.css') }}" rel="stylesheet">

		<!-- SmartAdmin RTL Support  -->
		<link href="{{ asset('css/smartadmin-rtl.min.css') }}" rel="stylesheet">
		<link rel="stylesheet" type="text/css" media="screen" href="{{asset('css/demo.min.css')}}">

		<!-- FAVICONS -->
		<link  href="{{ asset('img/favicon/favicon.ico') }}" rel="icon">
		<link  href="{{ asset('img/favicon/favicon.ico') }}" rel="icon">
		<link rel="apple-touch-icon" href=" {{asset('img/splash/sptouch-icon-iphone.png')}}">
		<link rel="apple-touch-icon" sizes="76x76" href="{{asset('img/splash/touch-icon-ipad.png')}}">
		<link rel="apple-touch-icon" sizes="120x120" href="{{asset('img/splash/touch-icon-iphone-retina.png')}}">
		<link rel="apple-touch-icon" sizes="152x152" href="{{asset('img/splash/touch-icon-ipad-retina.png')}}">
		
		<!-- Startup image for web apps -->
		<link rel="apple-touch-startup-image" href="{{asset('img/splash/ipad-landscape.png')}}" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:landscape)">
		<link rel="apple-touch-startup-image" href="{{asset('img/splash/ipad-portrait.png')}}" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:portrait)">
		<link rel="apple-touch-startup-image" href="{{asset('img/splash/iphone.png')}}" media="screen and (max-device-width: 320px)">
		
		<!-- Custom Own Style -->
		<link  href="{{ asset('css/custom.css') }}" rel="stylesheet">

	</head>
<body class="">

<!-- HEADER -->
@include('backend.HRIS.partials.cms-header')
<!-- END HEADER -->

<!-- Left panel : Navigation area -->
<!-- Note: This width of the aside area can be adjusted through LESS variables -->
@include('backend.HRIS.partials.cms-aside')
<!-- END NAVIGATION -->

<!-- MAIN PANEL -->
<div id="main" role="main">

    <!-- RIBBON -->
@include('backend.HRIS.partials.cms-ribbon')
<!-- END RIBBON -->

    <!-- MAIN CONTENT -->
    <div id="content">
        <!-- widget grid -->
        <section id="widget-grid" class="">
            <div class="row">
                <article class="col-sm-12">
                    <div class="jarviswidget" id="wid-id-0" data-widget-togglebutton="false" data-widget-editbutton="false" data-widget-fullscreenbutton="false" data-widget-colorbutton="false" data-widget-deletebutton="false">
                        <!-- END MAIN CONTENT -->
                        @yield('content')
                    </div>
                </article>
            </div>
        </section>
    </div>
    <!-- END MAIN PANEL -->
    @include('backend.HRIS.partials.cms-script')
	@yield('script')
</div>
</body>
</html>