<div class="col-md-4 mb-4">
    <div class="col-md-12">
        <div class="el-thubm set-bg img-thumbnail" data-setbg="{{ $event->small_img ?? 'img/event/2.jpg'}}"></div>
        <div class="el-content mt-2">
            <div class="el-header">
                <div class="el-date">
                    <h2>{{ date("j", strtotime($event->date_start ?? '')) }}</h2>
                    {{ date("M", strtotime($event->date_start ?? ''))}}
                </div>
                <h3>{{ $event->name ?? '' }}</h3>
                <div class="el-metas">
                    {{-- <div class="el-meta"><i class="fa fa-user"></i> Vincent John</div> --}}
                    <div class="el-meta"><i class="fa fa-calendar"></i> {{ date("F, jS Y - h:i A", strtotime($event['date_start'] ?? '')) }}  </div><br>
                    <a href="{{  $event['link'] ?? '' }}" target="_blank"><div class="el-meta"><i class="fa fa-map-marker"></i> {{ $event['venue'] ?? '' }}</div></a>
                </div>
            </div>
            <p>{{ $event->description ?? ''}}.</p>
            <a href="{{ route('events.show', [$event]) ?? ''  }}" class="n-btn n-btn-main">Read more</a>
        </div>
    </div>
</div>