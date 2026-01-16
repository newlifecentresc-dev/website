@extends('layouts.main')

@section('content')

@include('main.includes.title-section', ['title' => 'Events : ' . $event->name])

@include('main.partials.single-event', ['event' => $event])

@endsection