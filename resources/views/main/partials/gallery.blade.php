 	<!-- Sermon section -->
     <section class="sermon-section spad mb-5">
		<div class="section-title">
			<span>Experience God's Presence</span>
			<h2>gallery</h2>
		</div>

        <div class="container">
            <div class="row">
            @forelse ($images as $image)
            <div class="col-sm-4 text-center">
                <div class="container__img-holder">
                <img src="{{ $image }} " alt="Image">
                </div>
            </div>
            @empty
                -
            @endforelse
            
            </div>
        </div>
    </section>
 
  
  <div class="img-popup">
    <img src="" alt="Popup Image">
    <div class="close-btn">
      <div class="bar"></div>
      <div class="bar"></div>
    </div>
  </div>