@php
    $outreach = \App\Models\Outreach::first();
@endphp


{{-- Outreach section start --}}
@if ($outreach != null)
<section class="donate-section spad set-bg" data-setbg="{{ $outreach->bg_image }}" style="background-image: url("{{ $outreach->bg_image }}");">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-5">
                <img src="{{ $outreach->image }}" />
            </div>
            <div class="col-md-6 col-lg-7 donate-content text-right">
                <h2 class="special">{{ $outreach->title }}</h2>
                <p>{{ $outreach->info }}</p>
                <br>
                <br>
                <a href="{{ route($outreach->link) }}" class="n-btn n-btn-trans">{{ $outreach->btn_text }}</a>
            </div>
        </div>
    </div>
</section>
@endif
{{-- Outreach ends --}}
