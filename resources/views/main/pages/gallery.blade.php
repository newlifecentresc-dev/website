@extends('main.layouts.main')

@section('content')

@include('main.includes.title-section', ['title' => 'Gallery'])

<section class="blog-section blog-page spad">
  <div class="fancy-container">
    <fancy-main class="fancy-main">
        <div class="fancy-container">
            @foreach (range(1, 9) as $photo)
                <div class="fancy-card">
                    <div class="fancy-card-image">
                        <a href="{{ asset("img/gallery/p{$photo}.jpg") }}" data-fancybox="gallery" data-caption="Caption Images 1">
                            <img src="{{ asset("img/gallery/p{$photo}.jpg") }}" alt="{{ $photo }}" />
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </fancy-main>
</div>

</section>
@endsection 


@section('scripts')

<script>
  // Fancybox Configuration
$('[data-fancybox="gallery"]').fancybox({
  buttons: [
    "slideShow",
    "thumbs",
    "zoom",
    "fullScreen",
    "share",
    "close"
  ],
  loop: false,
  protect: true
});
</script>
@endsection