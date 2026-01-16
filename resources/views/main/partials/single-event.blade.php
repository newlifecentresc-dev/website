	<!-- Page section section -->
	<section class="page-section spad">
		<div class="container">
			<div class="row">
				<!-- Single blog post -->
				<div class="col-md-12 single-post">
                    <img src="{{ $event->large_img }}" class="img-thumbnail" alt="Cinque Terre">
					<figure class="post-thumb">
						<img src="img/blog/1.jpg" alt="">
					</figure>
					<div class="post-content">
						<p>{{ $event->date }}.</p>
						<h2 style="font-weight: bold" class="post-title">{{ $event->name }}</h2>
						<div class="post-metas" style="display: none">
							<div class="post-meta">by <a href="#">Sofia Joelsson</a></div>
							<div class="post-meta">Categories: <a href="#">Hope & Faithful</a></div>
						</div>
						
						<h4>{{ $event->description }}.</h4>
						
						<div class="row mt-4">
							<div class="col-sm-3">
								<div class="post-tags">
									<b><img width="20" src="https://cdn-icons-png.flaticon.com/512/3652/3652191.png"> Date and time</b>
									<p>{{ $event->date }}.</p>
									<p>{{ $event->time }}.</p>
								</div>
							</div>
							<div class="text-left col-sm-3">
								<div class="">
									<b><img width="20" src="https://cdn-icons-png.flaticon.com/512/535/535137.png"> Location</b><br>
									<p>{{ $event->venue }}.</p>
								</div>
							</div>
						</div>

						<div class="row mt-4">
							@if ($event->flyer)
								<img src="{{ $event->flyer }}" alt="">
							@endif
						</div>
					</div>
					<div class="row" style="display: none">
						<div class="col-sm-7">
							<div class="post-tags">
								<a href="#">Hope & Faithful</a>
								<a href="#">color Story</a>
								<a href="#">Sermon & Pray</a>
							</div>
						</div>
						<div class="col-sm-5">
							<div class="social-share">
								<p>Share</p>
								<a href=""><i class="fa fa-facebook"></i></a>
								<a href=""><i class="fa fa-twitter"></i></a>
								<a href=""><i class="fa fa-google-plus"></i></a>
								<a href=""><i class="fa fa-instagram"></i></a>
							</div>
						</div>
					</div>
				 
				</div>
			 
			</div>
		</div>
	</section>
	<!-- Page section section end-->

 