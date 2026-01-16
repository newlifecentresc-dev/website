{{-- @if(count($banners) != 0) --}}
<section class="p-relative">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                {{-- @foreach($banners as $key => $item) --}}
                <div class="carousel-item active">
                    <img class="d-block w-100" src="{{ asset('img/bg/4_1bg.png') }}" alt="slider">
                </div>
                {{-- @endforeach --}}
            </div>
        </div>
    </div>
</section>
{{-- @endif --}}
