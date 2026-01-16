
@extends('main.layouts.main')

@section('content')

@include('main.includes.title-section', ['title' => 'Live Service'])



<section class="sermon-section spad mb-5">
    <div class="section-title">
        <span>Experience God's Presence</span>
        <h2>LIVE SERVICE</h2>
    </div>

    <div class="container">
        <main style="text-align: center">
            @if(in_array(date("l"), ["Sunday"]))
                <iframe
                    class="videoWrapper"
                    height="720" src="https://www.youtube.com/embed/live_stream?channel=UCbKcpy1B9uBaxjQ85NbcHeA&controls=0"
                    title="YouTube video player"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen>
                </iframe>
            @else
                <img  class="videoWrapper" src="../img/livestreaming.jpg" alt="livestreaming">
            @endif
        </main> 
    </div>

</section>

<section class="d-none blog-section blog-page spad">
    <div class="container">
        <div class="section-title">
            <span>Experience God's Presence</span>
            <h2>LATEST EVENT</h2>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="blog-item">
                    <div class="bi-thumb set-bg" data-setbg="img/blog/1.jpg" style="background-image: url(&quot;img/blog/1.jpg&quot;);"></div>
                    <div class="bi-content">
                        <div class="date">On Monday 13 May, 2018</div>
                        <h4><a href="single-blog.html">Give To End Childhood illnesses</a></h4>
                        <div class="bi-author">by <a href="#">Sofia Joelsson</a></div>
                        <a href="#" class="bi-cata">Hope &amp; Faithful</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="blog-item">
                    <div class="bi-thumb set-bg" data-setbg="img/blog/2.jpg" style="background-image: url(&quot;img/blog/2.jpg&quot;);"></div>
                    <div class="bi-content">
                        <div class="date">On Monday 13 May, 2018</div>
                        <h4><a href="single-blog.html">Meet Our 2018 Patient Ambassadors</a></h4>
                        <div class="bi-author">by <a href="#">Sofia Joelsson</a></div>
                        <a href="#" class="bi-cata">color Story</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="blog-item">
                    <div class="bi-thumb set-bg" data-setbg="img/blog/3.jpg" style="background-image: url(&quot;img/blog/3.jpg&quot;);"></div>
                    <div class="bi-content">
                        <div class="date">On Monday 13 May, 2018</div>
                        <h4><a href="single-blog.html">Why We Give Back To Children's Colorado</a></h4>
                        <div class="bi-author">by <a href="#">Sofia Joelsson</a></div>
                        <a href="#" class="bi-cata">Sermon &amp; Pray</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


 @endsection

 @section('scripts')

 <script src="{{ asset('/js/youtube-live.js') }}"></script>

@stop
