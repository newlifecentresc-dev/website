<input id="event-countdown_date" type="hidden" class="form-check-input"
    value="{{ date('M j, Y H:i:s', strtotime($event['date_start'] ?? '')) }}">
@php
$now = date('Y-m-d H:i:s');
$currentDate = date('Y-m-d H:i:s', strtotime($event['date_start'] ?? ''));
$futureDate = date('Y-m-d H:i:s', strtotime($currentDate) + 7200) ?? '';
// $futureDate = date('Y-m-d H:i:s', strtotime($event['date_end']));
@endphp

<div class="top-nav-section hidden-xs">
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-md-4 col-lg-4{{ $now <= $currentDate ? ' t-1' : '' }}">
                <div class="d-inline-block countdown-social-list">
                    @include('main.components.custom.socials')
                </div>
            </div>
            <div class="col-sm-8 col-md-8 col-lg-8">
                @if ($now <= $currentDate)
                    <div class="counter-top">
                        <h5>{{ $event['name'] }}</h5>
                        @include('main.components.custom.countdown')
                        <a href="{{ route('event.show', ['slug' => $event['slug']]) }}"
                            class="countdown-event hidden-sm">readmore</a>
                    </div>
                @else
                    <div class="counter" id="counter-message">
                        <div class="counter" id="countdown">
                            <ul>
                                <li class="counter-item">
                                    {{-- <h4>{{ $now < $futureDate ? 'Current Event: ' . $event['name'] : 'Event: ' . $event['name'] . ' has Finished' }}
                                    </h4> --}}
                                </li>
                            </ul>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
