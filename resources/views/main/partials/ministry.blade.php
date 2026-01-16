@php
    $title = 'newlife ministry';
    $btitle = 'ministry';
@endphp
<section class="media-section spad set-bg">
    <div class="container">
        <div class="sec-head custom-font text-center mb-3">
            <h6 class="wow fadeIn" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeIn;">{{ $title }}</h6>
            <div class="words chars splitting" style="--word-total:1; --char-total:9;">
                <h3 class="wow words chars splitting animated" data-splitting="true" style="visibility: visible;">
                    <span class="word" data-word="Services." style="--word-index:0;">
                        @php
                            $text = str_split($btitle);
                        @endphp
                        @foreach ($text as $key => $t)
                            <span class="char" data-char="{{ $t }}" style="--char-index:{{ $key }};">{{ $t }}</span>
                        @endforeach
                    </span>
                </h3>
            </div>
            <span class="tbg">{{ $btitle }}</span>
        </div>
        <div class="ministry-list row">
            <div class="col-md-4 col-lg-4 ministry-content">
                <img src="{{asset('/img/ministry/teen.png')}}">
            </div>
            <div class="col-md-4 col-lg-4 ministry-content">
                <img src="{{asset('/img/ministry/prayer.png')}}">
            </div>
            <div class="col-md-4 col-lg-4 ministry-content">
                <img src="{{asset('/img/ministry/youth.png')}}">
            </div>
            <div class="col-md-4 col-lg-4 ministry-content">
                <img src="{{asset('/img/ministry/worship.png')}}">
            </div>
            <div class="col-md-4 col-lg-4 ministry-content">
                <img src="{{asset('/img/ministry/outreach.png')}}">
            </div>
            <div class="col-md-4 col-lg-4 ministry-content">
                <img src="{{asset('/img/ministry/media.png')}}">
            </div>
        </div>
    </div>
</section>