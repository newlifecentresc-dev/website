<?php

namespace App\Console\Schedules;


use App\Jobs\SendPrayerReminder;
use App\Services\GroupScheduleService;
use Illuminate\Console\Scheduling\Schedule;


class SendPrayerReminderSchedule
{
    public static function register(Schedule $schedule): void
    {
        $group = GroupScheduleService::getGroupByDay();

        $messages = [
            'morning' => [
                'time'  => '06:00',
                'day'   => 'morning',
                'group' => $group
            ],
            'evening' => [
                'time'  => '17:30',
                'day'   => 'evening',
                'group' => $group
            ],
            'test' => [
                'time'  => '21:27',
                'day'   => 'evening',
                'group' => $group
            ],
        ];

        $schedule->job(new SendPrayerReminder($messages['morning']))
            ->weekdays()
            ->at($messages['morning']['time']);

        $schedule->job(new SendPrayerReminder($messages['evening']))
            ->weekdays()
            ->at($messages['evening']['time']);
        
        $schedule->job(new SendPrayerReminder($messages['evening']))
            ->weekdays()
            ->at($messages['test']['time']);
    }
}