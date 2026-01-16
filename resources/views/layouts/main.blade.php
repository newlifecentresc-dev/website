<!DOCTYPE html>
<html lang="en">
<head>
	<title>Newlife Centre</title>
	<meta charset="UTF-8">
	<meta name="description" content="Newlife Centre">
	<meta name="keywords" content="church, newlifecentre, newlife, newlifecentresuttoncoldfield, newlifemeregreen, rccg, rccgnewlife, gospelteaching, familychurchbirmingham, familychurchsutton, familychurchsuttoncoldfield">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->   
	<link href="img/favicon.ico" rel="shortcut icon"/>

	<!-- Google Fonts -->
    @include('main.partials.fonts')
	@include('main.partials.stylesheet')
	
	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

	<script src="https://unpkg.com/react@17/umd/react.development.js"></script>
    <script src="https://unpkg.com/react-dom@17/umd/react-dom.development.js"></script>

    <!-- Don't use this in production: -->
    {{-- <script src="https://unpkg.com/@babel/standalone/babel.min.js"></script> --}}
</head>
<body>
	@include('main.partials.preloader')
	{{-- @include('includes.event-countdown', ['event' => App\Http\Services\Events::getNextEvent()]) --}}

	@include('main.partials.navigation', ['data' => App\Http\Services\Navigation::getNavigation()])
	@yield('content')
	@include('main.partials.subscribe-box')
	
	@include('main.partials.scripts')
	@yield('scripts')
	@include('main.partials.footer')
	

</body>
</html>