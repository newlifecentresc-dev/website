@extends('main.layouts.main')

@section('content')

@include('main.includes.title-section', ['title' => 'Giving'])
        
<section class="about-section spad">
    <div class="container">
        <div class="row">
            <div class="col-md-6 about-content">
                <h2>Let's Make the World Better Together</h2>
                <p>In giving to the work of God's Kingdom, you contribute to advancing it here on earth.
                    Your financial involvement could also be the greatest investment you make in the lives of others.Your generosity helps spread Christ’s message of hope and healing.</p>
                
            </div>
            <div class="text-center col-md-6 about-img">
                <img src="img/churchaccount.png" alt="">
                <!-- <span class="d-block text-uppercase" style="font-size: 3em">or</span> -->
                <!-- <a href="#" class="site-btn sb-wide" style="background: #2FABE8" disabled>pay with paypal</a> -->
            </div>
        </div>
    </div>
</section>
@endsection