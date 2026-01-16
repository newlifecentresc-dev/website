@extends('main.layouts.main')

@section('content')

    @include('main.includes.title-section', ['title' => $page->name])

    <section class="about-section spad">
        <div class="container">
            <div class="row">
                {!! $page->content !!}
            </div>
        </div>
    </section>
@endsection
