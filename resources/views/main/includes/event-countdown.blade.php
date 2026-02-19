<input id="event-countdown_date" type="hidden" class="form-check-input"
    value="{{ date('M j, Y H:i:s', strtotime($event['date_start'] ?? '')) }}">
@php
    $now = date('Y-m-d H:i:s');
    $currentDate = date('Y-m-d H:i:s', strtotime($event['date_start'] ?? ''));
    $futureDate = date('Y-m-d H:i:s', strtotime($currentDate) + 7200) ?? '';
    $eventName = $event['name'] ?? 'Event Name';
    $eventUrl  = route('event.show', ['slug' => $event['slug']])  ?? '#';
    $eventTimestamp = isset($eventDate)
        ? (\Carbon\Carbon::parse($eventDate)->timestamp * 1000)
        : (now()->addHours(1)->timestamp * 1000);
@endphp

<div class="event-countdown-banner" id="eventCountdownBanner">
    <div class="banner-inner">
        <span class="event-title">Next Event</span>
        <span class="separator">–</span>
        <span class="event-name">{{ $eventName }}</span>
        <span class="separator">–</span>
        <span class="countdown" id="countdownDisplay">
            <span class="time-segment" id="cd-hours">00</span><span class="colon">:</span><span class="time-segment" id="cd-minutes">00</span><span class="colon">:</span><span class="time-segment" id="cd-seconds">00</span>
        </span>
        <a href="{{ $eventUrl }}" class="read-more-btn">View Event</a>
    </div>
</div>

<style>
    .event-countdown-banner {
        width: 100%;
        border: 1.5px solid #d1d5db;
        background: #00beb9;
        padding: 0;
        box-sizing: border-box;
    }

    .banner-inner {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        padding: 5px 20px;
        flex-wrap: wrap;
    }

    .event-title {
        font-size: .7rem;
        font-weight: 700;
        color: #111;
        letter-spacing: 0.01em;
        white-space: nowrap;
    }

    .event-name {
        font-size: .7rem;
        color: #111;
        letter-spacing: 0.01em;
        white-space: nowrap;
    }

    .separator {
        color: #111;
        font-weight: 400;
        font-size: 1.05rem;
    }

    .countdown {
        display: inline-flex;
        align-items: center;
        gap: 0;
        /* font-size: 1.05rem; */
        font-weight: 700;
        color: #111;
        font-variant-numeric: tabular-nums;
        letter-spacing: 0.04em;
        font-family: 'Courier New', 'Courier', monospace;
    }

    .time-segment {
        display: inline-block;
        min-width: 2ch;
        text-align: center;
        transition: color 0.2s;
    }

    .colon {
        display: inline-block;
        padding: 0 1px;
        color: #111;
        animation: blink 1s step-start infinite;
    }

    @keyframes blink {
        0%, 100% { opacity: 1; }
        50%       { opacity: 0.3; }
    }

    .read-more-btn {
        display: inline-block;
        /* padding: 6px 18px; */
        padding: 2px 15px;
        border: 1.5px solid #d1d5db;
        border-radius: 7px;
        font-size: 0.92rem;
        font-weight: 500;
        color: #111;
        background: #fff;
        text-decoration: none;
        letter-spacing: 0.01em;
        transition: background 0.15s, border-color 0.15s, color 0.15s;
        white-space: nowrap;
        font-family: 'Georgia', 'Times New Roman', serif;
        cursor: pointer;
    }

    .read-more-btn:hover {
        background: #f3f4f6;
        border-color: #9ca3af;
        color: #000;
    }
</style>

<script>
(function () {
    var targetTime = {{ $eventTimestamp }};

    function pad(n) {
        return n < 10 ? '0' + n : String(n);
    }

    function tick() {
        var now  = Date.now();
        var diff = Math.max(0, Math.floor((targetTime - now) / 1000));

        var hours   = Math.floor(diff / 3600);
        var minutes = Math.floor((diff % 3600) / 60);
        var seconds = diff % 60;

        document.getElementById('cd-hours').textContent   = pad(hours);
        document.getElementById('cd-minutes').textContent = pad(minutes);
        document.getElementById('cd-seconds').textContent = pad(seconds);

        if (diff > 0) {
            setTimeout(tick, 1000);
        }
    }

    // Start ticking as soon as DOM is ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', tick);
    } else {
        tick();
    }
})();
</script>