{{-- <style>
.img-back {
  background-image: url('/img/banner/5566879434566.jpg');
  /* height: 43em; */
  /* background-position: center; */
  background-repeat: no-repeat; /* Do not repeat the image */
  background-size: cover; /* Resize the background image to cover the entire container */
}

</style> --}}

{{-- <section class="event-list-section spad img-back">
  <div class="container mt-2">
    <div class="row">
      @foreach (App\Models\MainSub::get() as $sub)
        <div class="col-md-3 col-sm-6 item">
          <div class="card no-background-color box-no-border item-card card-block">
            @if ($sub->getFirstMediaUrl('services'))
            <img class="box" src="{{ $sub->getFirstMediaUrl('services') }}" alt="{{ $sub->btn_text }}">
            @else
            <img class="box" src="{{ $sub->image }}" alt="{{ $sub->btn_text }}">
            @endif
            <a href="{{ route( $sub->link ) }}" class="n-btn n-btn-main">{{ $sub->btn_text }}</a>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section> --}}

<section class="services spad">
  <div class="container">
    
      <div class="row">
           @foreach (App\Models\MainSub::get() as $sub)
               <a href="{{ route( $sub->link ) }}" class="col-lg-3 col-md-6 item-box wow fadeInLeft" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInLeft;">
                  <img class="mb-3" width="{{ $sub->icon_size }}" src="{{ $sub->image ?: asset($sub->icon) }}" />
                  <h6 class="text-white">{{ $sub->title }}</h6>
                  <p>{{ $sub->description }}.</p>
               </a> 
          @endforeach
            
      </div>
  </div>
  <div class="half-bg bottom"></div>
</section>
