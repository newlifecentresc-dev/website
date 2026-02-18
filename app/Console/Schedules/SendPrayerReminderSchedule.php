<?php

namespace App\Console\Schedules;

use App\Jobs\SendPrayerReminder;
use App\Services\GroupScheduleService;
use Illuminate\Console\Scheduling\Schedule;

class SendPrayerReminderSchedule
{
    private static array $schedule = [
        'morning' => '06:00',
        'evening' => '17:30',
    ];

    public static function register(Schedule $schedule): void
    {
        foreach (self::$schedule as $period => $time) {
            $group = GroupScheduleService::getGroupByDay();

            $data = [ 
                'time'  => $time,
                'day'   => $period,
                'group' => $group
            ];

            $schedule->job(new SendPrayerReminder($data))
                ->weekdays()
                ->at($time);
        }
    }
}