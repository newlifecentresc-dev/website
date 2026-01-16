<?php

namespace Database\Seeders;

use App\Models\WeeklyEvent;
use Illuminate\Database\Seeder;

class WeeklyEventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $values = $this->getWeeklyEvent();

        foreach($values as $value){
            WeeklyEvent::create([
                'day' => $value->day,
                'title' => $value->title,
                'time' => $value->time
            ]);
        }
    }

        /**
     * Get upcoming event based on all events
     *
     * @return
     */
    public static function getWeeklyEvent() {
        return [
            (object) [
                'day'   => 'Sunday',
                'title' => 'Sunday Service',
                'time'  => '11:00am',
            ],
            (object) [
                'day'   => 'Monday',
                'title' => 'Monday Prayer',
                'time'  => '6:00am',
            ],
            (object) [
                'day'   => 'Monday',
                'title' => "Men's Prayer",
                'time'  => '8:00pm'
            ],
            (object) [
                'day'   => 'Tuesday',
                'title' => 'Prayer Meeting',
                'time'  => '8:30pm',
            ],
            (object) [
                'day'   => 'Wednesday',
                'title' => "Women's Prayer",
                'time'  => '7:30pm',
            ],
            (object) [
                'day'   => 'Thursday',
                'title' => "Bible Study",
                'time'  => '8:00pm',
            ],
        ];
    }
}
