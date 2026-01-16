	<!-- Hero section -->
	<section class="hero-section welcome-section set-bg" data-setbg="{!! App\Http\Services\Configs::getYearlyMessageBackgroundImage() !!}">
		<div class="hero-content">
			<div class="hc-inner">
				<div class="container d-none">
					<h2>WELCOME TO <span><?php echo date('Y') ?></span></h2>
					{{-- <p style="font-size: 26px">A year of <span class="text-warning">Ease</span>, <span class="text-warning">Ease in Fruitfulness</span>.</p> --}}
					<h3 class="text-white" style="margin-bottom: 1.3em; font-size: 35px"> {!! App\Http\Services\Configs::getYearlyMessage() !!} </h3>
					<br>
					 <a href="" class="n-btn n-btn-trans">{!! App\Http\Services\Configs::getYearlyMessageButtonText() !!}</a> 
				</div>
			</div>
		</div>
    </section>
    
    <!-- Hero section end -->