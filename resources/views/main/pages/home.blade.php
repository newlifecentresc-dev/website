@extends('main.layouts.main')

@section('content')

    @if (config('pages.home.welcome-theme'))
        @include('main.includes.welcome-theme')
    @endif

    @if (config('pages.home.home-carosel'))
        @include('main.components.custom.home-carosel')
    @endif

    @if (config('pages.home.welcome-small'))
        @include('main.partials.welcome-small', ['aboutUsMini' => $aboutUsMini])
    @endif

    @if (config('pages.home.event-home'))
        @include('main.partials.event-home', ['events' => $latestFiveEvents])
    @endif

    @if (config('pages.home.latest-sermon'))
        @include('main.partials.latest-sermon')
    @endif

    @if (config('pages.home.sub'))
        @include('main.partials.sub')
    @endif

    @if (config('pages.home.ministry'))
        @include('main.partials.ministry')
    @endif

    @if (config('pages.home.media'))
         @include('main.partials.media')
    @endif

    @if (config('pages.home.outreach'))
        @include('main.partials.outreach')
    @endif
@endsection