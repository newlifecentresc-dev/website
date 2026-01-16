@extends('main.layouts.main')

@section('content')

    @include('main.includes.title-section', ['title' => 'about us'])

    {{-- @include('main.partials.about', ['aboutUs' =>  'about us', 'aboutUsGroup' => $data])
 --}}

    {!! $page->content !!}

@endsection
