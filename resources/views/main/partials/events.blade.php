@php
    $weekEvents = App\Models\WeeklyEvent::where('status', 'active')->get();
@endphp

<section class="event-list-section spad">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <span>Experience God's Presence</span>
                    <h2>Weekly Church Events</h2>
                </div>
            </div>
        </div>
        <div class="row event-list">
            <div class="table-responsive">
                <table class="table table-bordered">
                <thead>
                    <tr>
                    <th>Day</th>
                    <th>Title</th>
                    <th>Time</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($weekEvents as $weeklyEvent)
                    <tr>
                        <td>{{ $weeklyEvent->day }}</td>
                        <td>{{ $weeklyEvent->title }}</td>
                        <td>{{ $weeklyEvent->time }}</td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<section class="event-list-section spad">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <span>Experience God's Presence</span>
                    <h2>Upcoming Events</h2>
                </div>
            </div>
            {{-- <div class="col-md-12 event-more">
                <a href="{{ route('events.index') }}" class="site-btn btn-info mb-3">view all events</a>
            </div> --}}
        </div>
        <div class="row event-list">
            <!-- event list item -->
            @forelse ($events as $event)
            	@include('main.components.custom.event' ,['event' => $event])
            @empty
				{{-- @include('partials.alerts' ,['alert' => ['warning' => 'No Upcoming Event']]) --}}
				<img src="{{ asset('img/no-event-image.png') }}" />
            @endforelse
        </div>
    </div>

    <div class="pagination-area">
        <ul class="pageination-list">
            {{ $events->appends(request()->input())->links() }}
        </ul>
        @if ($events->hasPages())
            <p>Page {{ $events->currentPage() }} of {{ $events->count() }} results</p>
        @endif
    </div>
</section>
