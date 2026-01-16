<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Events as EventModel;
use App\Http\Services\Events as EventServices;

class EventsSeeder extends Seeder
{

    protected $year;


    public function __construct()
    {
        $this->year = date('Y');
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->displayCalender();
        $this->extraCalendar();
    }

    public function extraCalendar()
    {
        $year = date('Y');

        $events = [
            (object) [
                'name'          => 'Cross Over Service',
                'description'   => 'Join us for Cross Over Service. As we celebrate a wonderful year God has given us',
                'date_start'    =>  "{$this->year}-12-31 10:00:00",
                'date_end'      =>  "{$this->year}-01-01 01:00:00",
                'venue'         => 'Youtube Live',
                'status'        => 1,
                'link'          => 'https://www.youtube.com/channel/UCbKcpy1B9uBaxjQ85NbcHeA',
                'small_img'     => '/img/event/cross-over-small.png',
                'large_img'     => '/img/event/cross-over-large.png',
                'special'       => 1,
            ],
            (object) [
                'name'          => 'Anniversary Celebration',
                'description'   => 'Join us for Anniversary Service. As we celebrate a wonderful year God has given us',
                'date_start'    =>  "{$this->year}-04-01 10:00:00",
                'date_end'      =>  "{$this->year}-01-03 01:00:00",
                'venue'         => 'Church Auditorium',
                'status'        => 1,
                'link'          => 'https://www.youtube.com/channel/UCbKcpy1B9uBaxjQ85NbcHeA',
                'small_img'     => '/img/event/ann-small.png',
                'large_img'     => '/img/event/ann-large.png',
                'special'       => 1,
            ], 
        ];

        foreach ($events as $event) {
            $date = date("Y-m-d", strtotime($event->date_start));
            $slug = strtolower(str_replace(' ', '-', $event->name));
            $eventId = "{$slug}-{$date}";

            EventModel::updateOrCreate(
                [
                    'event_id' => $eventId
                ],
                [
                    'name'        => $event->name,
                    'event_id'    => $eventId,
                    'slug'        => $slug,
                    'description' => $event->description,
                    'display'     => $event->status,
                    'date_start'  => $event->date_start,
                    'date'        => $date,
                    'date_end'    => $event->date_end,
                    'venue'       => $event->venue,
                    'small_img'   => $event->small_img,
                    'large_img'   => $event->large_img,
                    'special'     => $event->special,

                ]
            );
        }
    }

    public function displayCalender()
    {
        define('INTERNAL_FORMAT', 'Y-m-d');
        define('DISPLAY_MONTH_FORMAT', 'M Y');
        define('DISPLAY_DAY_FORMAT', 'D d M Y');

        // format excluded dates as YYYY-MM-DD, date('Y-m-d'):
        $excluded_dates = [];

        function isTuesday($date)
        {
            return date('w', strtotime($date)) === '2';
        }
        function isWednesday($date)
        {
            return date('w', strtotime($date)) === '3';
        }
        function isThursday($date)
        {
            return date('w', strtotime($date)) === '4';
        }
        function isMonday($date)
        {
            return date('w', strtotime($date)) === '1';
        }
        function isSunday($date)
        {
            return date('w', strtotime($date)) === '0';
        }

        // handle the excluded dates
        function isExcludedDate($internal_date)
        {
            global $excluded_dates;
            return in_array($internal_date, $excluded_dates);
        }

        $start_date = date(INTERNAL_FORMAT);

        // something to store months and days
        $months_and_dates = array();

        // loop over 365 days and look for tuesdays or wednesdays not in the excluded list
        foreach (range(0, 365) as $day) {

            $internal_date = date(INTERNAL_FORMAT, strtotime("{$start_date} + {$day} days"));
            // $this_day = date(DISPLAY_DAY_FORMAT, strtotime($internal_date));
            $this_day = $internal_date;
            $this_month = date(DISPLAY_MONTH_FORMAT, strtotime($internal_date));

            $lastDateThisYear = $this->year . '12-31';

            if ($internal_date <= $lastDateThisYear) {
                // if ((isTuesday($internal_date) || isWednesday($internal_date) || isMonday($internal_date) || isThursday($internal_date) || isSunday($internal_date))) {

                if ((isTuesday($internal_date) || isMonday($internal_date) || isThursday($internal_date) || isSunday($internal_date))) {

                    $data = EventServices::getDate($this_day);
                    // $description = "Join us for our {$data->name} as we going into the presense.";

                    if ($day <= 365) {
                        EventModel::updateOrCreate(
                            [
                                'event_id' => "{$data->slug}-{$data->date}"
                            ],
                            [
                                'name'        => $data->name,
                                'event_id'    => "{$data->slug}-{$data->date}",
                                'slug'        => $data->slug,
                                'description' => $data->description,
                                'small_img'   => $data->small_img,
                                'large_img'   => $data->large_img,
                                'display'     => 1,
                                'date_start'  => $data->date_start,
                                'date'        => $data->date,
                                'date_end'    => $data->date_end,
                                'venue'       => $data->venue,
                                'link'        => $data->link,
                            ]
                        );
                    }
                }
            }
        }
    }
}