@extends('main.layouts.main')

@section('content')

@include('main.includes.title-section', ['title' => 'Holy Spirit Experience'])

<section class="blog-section blog-page spad">
    <div class="container">
        <div class="section-title">
            <span>Experience God's Presence</span>
            <h2>LATEST INFORMATION</h2>
        </div>
        <div class="row">
            @foreach ([0] as $experience)
            <div class="col-sm-4">
                <div class="blog-item">
                    <div class="bi-thumb set-bg" data-setbg="https://www.faithward.org/wp-content/uploads/2020/05/adkrsir_0iw-scaled.jpg" style="background-image: url(&quot;img/blog/1.jpg&quot;);"></div>
                    <div class="bi-content">
                        <div class="date">On Friday 1 Jan, 2021</div>
                        <h4><a href="single-blog.html">Who's God</a></h4>
                        <div class="bi-author">by <a href="https://www.faithward.org/who-is-god/">faithward</a></div>
                        <a href="https://www.faithward.org/who-is-god/" class="bi-cata">Read</a>
                    </div>
                </div>
            </div>
             @endforeach
        </div>
    </div>
</section>

@endsection 