@extends('main.layouts.main')

@section('content')

@include('main.includes.title-section', ['title' => 'Events'])

@include('main.partials.events', ['events' => $events])

@endsection