<!-- About section -->
<section class="about-section spad">
    <div class="container">
        <div class="row">
            <div class="col-md-6 about-content">
                <h2>Welcome to {{ $settings->site_title }}</h2>
                {!! $aboutUsMain['text'] !!}
                <a href="" class="d-none site-btn btn-purple sb-wide">join us</a>
            </div>
            <div class="col-md-6 about-img">
                <img src="{{ asset('img/welcome-img.jpg') }}" alt="welome poster">
            </div>
        </div>
    </div>
</section>
<!-- About section end -->

<!-- Services section -->
<section class="services-section spad">
    <div class="container">
        <div class="row">
            @forelse ($aboutUsGroup as $ag => $value)
            <div class="col-sm-4">
                <div class="service-box">
                    <h4><i class="{{ $value['icon'] }}" style="color: #dd3e3e; margin-right: 10px"></i>{{ $ag }}</h4>
                    {!! $value['text'] !!}
                </div>
            </div>
            @empty
            -
            @endforelse
        </div>
    </div>
</section>
<!-- Services section end -->
