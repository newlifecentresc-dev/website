<section class="about-section-home spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="img-mons">
                    <div class="row">
                        <div class="col-md-5 cmd-padding valign">
                            <div class="img1 wow imago animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s;"><img src="{{ asset('img/gallery/p1.jpg') }}" alt=""></div>
                        </div>
                        <div class="col-md-7 cmd-padding">
                            <div class="img2 wow imago animated" data-wow-delay=".3s" style="visibility: visible; animation-delay: 0.3s;"><img src="{{ asset('img/gallery/p2.jpg') }}" alt=""></div>
                            <div class="img3 wow imago animated" data-wow-delay=".8s" style="visibility: visible; animation-delay: 0.8s;"><img src="{{ asset('img/gallery/p6.jpg') }}" alt=""></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 offset-lg-1 valign">
                <div class="content">
                    <div class="sec-head custom-font text-center">
						<h6 class="wow fadeIn" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeIn;">{{ $settings->site_title }}</h6>
						<div class="words chars splitting" style="--word-total:1; --char-total:9;">
							<h3 class="wow words chars splitting animated" data-splitting="true" style="visibility: visible;">
								<span class="word" data-word="Services." style="--word-index:0;">
									@php
                                        $text = str_split('wecome');
									@endphp
									@foreach ($text as $key => $t)
										<span class="char" data-char="{{ $t }}" style="--char-index:{{ $key }};">{{ $t }}</span>
									@endforeach
								</span>
							</h3>
						</div>
						<span class="tbg">WELCOME</span>
					</div>
                    <div class="words chars splitting">
                        <h3 style="font-weight: bold" class="words chars splitting main-title wow animated text-white" data-splitting="true" style="visibility: visible;">
						WE ARE FAMILY 
						</h3>
                    </div>
                    <div class="about-body words chars splitting text-white">
                        <p>{!! $settings->about_us !!}</p>
                    </div>
                     
                </div>
            </div>
        </div>
    </div>
</section>