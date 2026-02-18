<?php

namespace App\Services;

use Carbon\Carbon;

class GroupScheduleService
{
    private static array $groups = [
        1 => 'Group 1',
        2 => 'Group 2',
        3 => 'Group 3',
        4 => 'Group 4',
        5 => 'Group 5'
    ];

    public static function getTodaysGroup(): string
    {
        $today        = Carbon::now();
        $weekOfYear   = $today->weekOfYear;
        $totalGroups  = count(self::$groups);

        // Rotate groups based on week number
        $groupIndex = ($weekOfYear % $totalGroups) + 1;

        return self::$groups[$groupIndex] ?? self::$groups[1];
    }

    public static function getSchedule(): array
    {
        return [
            Carbon::MONDAY    => 'Group 2',
            Carbon::TUESDAY   => 'Group 3',
            Carbon::WEDNESDAY => 'Group 4',
            Carbon::THURSDAY  => 'Group 5',
            Carbon::FRIDAY    => 'Group 1',
        ];
    }

    // Get group by specific day
    public static function getGroupByDay(?Carbon $date = null): string
    {
        $date      = $date ?? Carbon::now();
        $schedule  = self::getSchedule();
        $dayOfWeek = $date->dayOfWeek;

        return $schedule[$dayOfWeek] ?? 'No Group Today';
    }
}