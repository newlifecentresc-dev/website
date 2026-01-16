
<section class="event-section spad" style="background: white">
    <div class="container">
        <div class="sec-head custom-font text-center mb-4">
            <h6 class="wow fadeIn" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeIn;">UPCOMING EVENT</h6>
            <div class="words chars splitting" style="--word-total:1; --char-total:9;">
                <h3 class="wow words chars splitting animated" data-splitting="true" style="visibility: visible;">
                    <span class="word" data-word="Services." style="--word-index:0;">
                        @php
                            $text = str_split('event');
                        @endphp
                        @foreach ($text as $key => $t)
                            <span class="char" data-char="{{ $t }}" style="--char-index:{{ $key }};">{{ $t }}</span>
                        @endforeach
                    </span>
                </h3>
            </div>
            <span class="tbg text-uppercase">events</span>
        </div>
        <div class="event-row row">
            <div class="col-md-8 col-lg-6">
                <img src="{{ asset($latestSpecial->small_img) }}">
            </div>
            <div class="col-md-4 col-lg-4 text-left text-secondary">
                <h2 class="special text-secondary">{{ $latestSpecial->name }}</h2>
                <p>{{ $latestSpecial->description }}</p>
                <br>
                <br>
                <a href="/event/{{ $latestSpecial->slug }}" class="n-btn">Read More</a>
            </div>
        </div>
    </div>
</section>