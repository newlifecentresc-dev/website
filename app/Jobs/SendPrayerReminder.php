<?php

namespace App\Jobs;

use Twilio\Rest\Client;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class  SendPrayerReminder implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected string $message;

    public function __construct(array $data)
    {
        // $this->message = $message;

        $this->message = view('message.prayer_reminder', [
            'zoom_link' => 'https://zoom.us/j/9945004697?pwd=Z214Z2JaSmxnTVh5bmcrL3BWcWhjdz09',
            'passcode'  => 'newlife',
            'time'      => $data['time'],
            'group'     => $data['group'],
            'day'       => $data['day']
        ])->render();
    }

    public function handle()
    {
        // TODO: replace with DB query later
        // $recipients = Recipient::where('active', true)->get()->pluck('phone')->toArray();
        $recipients = [
            '+447435282406'
        ];

        $twilio = new Client(
            config('services.twilio.sid'),
            config('services.twilio.token')
        );

        foreach ($recipients as $number) {
            $twilio->messages->create(
                'whatsapp:' . $number,
                [
                    'from' => config('services.twilio.whatsapp_from'),
                    'body' => $this->message,
                ]
            );
        }
    }
}
