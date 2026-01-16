<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ $settings->site_title }}</title>
    <meta charset="UTF-8">
    <meta name="author" content="{{ $settings->site_title }}">
    <meta name="description" content="{{ $settings->meta_description }}">
    <meta name="keywords" content="{{ $settings->site_keywords }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->
    <link href="{{ $settings->site_icon }}" rel="shortcut icon" />

    <!-- Google Fonts -->
    @include('main.partials.fonts')
    @include('main.partials.stylesheet')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.css" integrity="sha512-nNlU0WK2QfKsuEmdcTwkeh+lhGs6uyOxuUs+n+0oXSYDok5qy0EI0lt01ZynHq6+p/tbgpZ7P+yUb+r71wqdXg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

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
    {{-- @include('main.partials.preloader') --}}
    @include('main.includes.event-countdown', ['event' => App\Http\Services\Events::getNextEvent()])

    @include('main.partials.navigation', ['data' => App\Http\Services\Navigation::getNavigation()])
    @yield('content')
    @include('main.partials.subscribe-box')

    @include('main.partials.scripts')

    @yield('scripts')

    @include('main.partials.footer')
</body>

</html>
