@include('layouts.main')

@extends('layouts.main')

@section('content')

    @include('includes.event-countdown')

    @include('partials.navigation')
    
	@include('includes.welcome-theme')
    
    @include('includes.event-countdown')

	@include('includes.welcome-small')
    
	@include('partials.services')

	@include('partials.sermons')
 
    @include('partials.events')
  
	@include('includes.year-message')
    
	@include('partials.news')

	@include('includes.subscribe-box')

	@include('partials.footer')
 
@endsection