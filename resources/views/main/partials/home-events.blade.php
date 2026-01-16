  <!-- Event list section -->
  <section class="event-list-section spad" style="background-image: url('https://www.freepik.com/free-photos-vectors/abstract-background')">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <span>Experience God's Presence</span>
                    <h2>Upcoming Events</h2>
                </div>
            </div>
            <div class="col-md-6 text-right event-more">
                <a href="" class="site-btn">view all events</a>
            </div>
        </div>
        <div class="event-list">
            <!-- event list item -->

            @forelse ($events as $event)
                <!-- event list item -->
                <div class="el-item">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="el-thubm set-bg" data-setbg="{{ $event['small_img'] ?? 'img/event/2.jpg'}}"></div>
                        </div>
                        <div class="col-md-8">
                            <div class="el-content">
                                <div class="el-header">
                                    <div class="el-date">
                                        <h2>{{ date("j", strtotime($event['date_start'] ?? '')) }}</h2>{{ date("M", strtotime($event['date_start'] ?? ''))}}
                                    </div>
                                    <h3>{{ $event['name'] ?? '' }}</h3>
                                    <div class="el-metas">
                                        {{-- <div class="el-meta"><i class="fa fa-user"></i> Vincent John</div> --}}
                                        <div class="el-meta"><i class="fa fa-calendar"></i> {{ date("F, jS Y - h:i A", strtotime($event['date_start'] ?? '')) }}  </div>
                                        <a href="{{  $event['link'] ?? '' }}" target="_blank"><div class="el-meta"><i class="fa fa-map-marker"></i> {{ $event['venue'] ?? '' }}</div></a>
                                    </div>
                                </div>
                                <p>{{ $event['description'] ?? ''}}.</p>
                                <a href="{{ route('event.show', ['slug' => $event['slug']]) ?? ''  }}" class="n-btn n-btn-main">Read more</a>
                            </div>
                        </div>
                    </div>
                </div>

            @empty
                {{-- @include('partials.alerts' ,['alert' => ['warning' => 'No Upcoming Event']]) --}}
                <img src="{{ asset('img/no-event-image.png') }}" />
            @endforelse
        </div>
    </div>
</section>

