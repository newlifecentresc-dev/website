@php
    $media_ads = \App\Models\MediaAds::first();
@endphp

@if ($media_ads != null)
<section class="media-section spad set-bg" data-setbg="{{ $media_ads->bg_image }}" style="background-image: url("{{ $media_ads->getFirstMediaUrl('bg_media_ads') }}");">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-7 media-content">
                <h2 class="special">{{ $media_ads->title }}</h2>
                <p>{{ $media_ads->info }}</p>
                <br>
                <br>
                @if (Route::has($media_ads->link))
                <a href="{{ route($media_ads->link) }}" class="n-btn n-btn-trans">{{ $media_ads->btn_text }}</a>
                @endif
            </div>
            <div class="col-md-6 col-lg-5">
                <img src="{{ $media_ads->image }}" />
            </div>
        </div>
    </div>
</section>
@endif
