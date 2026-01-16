<?php

namespace App\Http\Services;

use App\Models\Events as EventModel;


class Events
{
    /**
     * Get all event together
     * 
     * @return $events
     */
    public static function getLatestSpecialEvent()
    {
        $now = date("Y-m-d H:i:s");
        return EventModel::special(1)->where('date_start', '>=', $now)->orderby('date_start', 'asc')->first();

        // return EventModel::status(1)->where('date_start', '>=', $now)->orderby('date_start', 'asc')->get();
    }

    /**
     * Get all event together
     * 
     * @return $events
     */
    public static function getAllEvent()
    {
        $now = date("Y-m-d H:i:s");
        return EventModel::status(1)->where('date_start', '>=', $now)->orderby('date_start', 'asc')->simplePaginate(15);

        // return EventModel::status(1)->where('date_start', '>=', $now)->orderby('date_start', 'asc')->get();
    }

    /**
     * Get upcoming event based on all events
     * 
     * @return
     */
    public static function getWeeklyEvent()
    {
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
            // (object) [
            //     'day'   => 'Monday',
            //     'title' => "Men's Prayer",
            //     'time'  => '8:00pm'
            // ],
            (object) [
                'day'   => 'Tuesday',
                'title' => 'Prayer Meeting',
                'time'  => '8:30pm',
            ],
            // (object) [
            //     'day'   => 'Wednesday',
            //     'title' => "Women's Prayer",
            //     'time'  => '7:30pm',
            // ],
            (object) [
                'day'   => 'Thursday',
                'title' => "Bible Study",
                'time'  => '8:00pm',
            ],
        ];
    }

    /**
     * Get the first five event
     * 
     * @return
     */
    public static function getLatestFiveEvents()
    {
        $now = date("Y-m-d H:i:s");
        return EventModel::status(1)->where('date_start', '>=', $now)->orderby('date_start', 'asc')->limit(1)->get();
    }

    /**
     * Get the first five event
     * 
     * @return
     */
    public static function getLatestThreeEvents()
    {
        $now = date("Y-m-d H:i:s");
        return EventModel::status(1)->where('date_start', '>=', $now)->orderby('date_start', 'asc')->limit(3)->get();
    }

    /**
     * Get the next event
     * 
     * @return
     */
    public static function getNextEvent()
    {
        $now = date("Y-m-d H:i:s");
        return EventModel::status(1)->where('date_start', '>=', $now)->orderby('date_start', 'asc')->first();
    }

    /**
     * Get church services event
     * 
     * @return
     */
    public static function getDate($date)
    {
        $timestamp = strtotime($date);
        $day = date('D', $timestamp);

        switch ($day) {
            case "Sun":
                $event = self::getSunday($date);
                break;
            case "Thu":
                $event = self::getThursday($date);
                break;
            case "Wed":
                $event = self::getWednesday($date);
                break;
            case "Tue":
                $event = self::getTuesday($date);
                break;
            case "Mon":
                $event = self::getMonday($date);
                break;
            default:
                $event = null;
        }

        return $event;
    }

    /**
     * Retrieving the next sunday service
     * 
     * @return
     */
    public static function getSunday($date)
    {

        return (object) [
            'name'           => 'Sunday Service',
            'slug'           => 'sunday-service',
            'description'    => "Join us, as we fellowship with brethren to enjoy His presence.",
            'date'           =>  $date,
            'date_start'     =>  $date . ' 11:00:00',
            'venue'          => 'Youtube',
            'date_end'       =>  $date . ' 13:00:00',
            'small_img'      => '/img/event/sunday-small.png',
            'large_img'      => '/img/event/sunday-large.png',
            'link'           => 'https://www.youtube.com/channel/UCbKcpy1B9uBaxjQ85NbcHeA'
        ];
    }

    /**
     * Retrieving the next thursday service
     * 
     * @return
     */
    protected static function getThursday($date)
    {
        return (object) [
            'name'           => 'Bible Study',
            'slug'           => 'bible-study',
            'description'    => "Join us, as we dig deep and study His Word to refresh us!",
            'date'           =>  $date,
            'venue'          => 'Zoom Meeting',
            'date_start'     =>  $date . ' 20:00:00',
            'date_end'       =>  $date . ' 21:30:00',
            'small_img'      => '/img/event/bible-study-small.png',
            'large_img'      => '/img/event/bible-study-large.png',
            'link'           => 'https://us02web.zoom.us/j/3411331977?pwd=SDEvYnJMMXJGL0ZCNkFKR3d6ZSthQT09'
        ];
    }

    /**
     * Retrieving the next tuesday service
     * 
     * @return
     */
    public static function getTuesday($date)
    {
        return (object) [
            'name'           => 'Church Prayer',
            'slug'           => 'prayer-meeting',
            'description'    => "Join us, as we continue to seek God's face and will in Prayers",
            'date'           =>  $date,
            'venue'          => 'Zoom Meeting',
            'date_start'     =>  $date . ' 20:30:00',
            'date_end'       =>  $date . ' 21:30:00',
            'small_img'      => '/img/event/prayer-meeting-small.png',
            'large_img'      => '/img/event/prayer-meeting-large.png',
            'link'           => 'https://us02web.zoom.us/j/3411331977?pwd=SDEvYnJMMXJGL0ZCNkFKR3d6ZSthQT09'
        ];
    }

    /**
     * Retrieving the next monday service
     * 
     * @return
     */
    protected static function getMonday($date)
    {
        return (object) [
            'name'           => "Monday Mornings Prayer",
            'slug'           => 'monday-mornings-prayer',
            'description'    => "Join us, as we pray towards the week!",
            'date'           =>  $date,
            'venue'          => 'Zoom Meeting',
            'date_start'     =>  $date . ' 06:00:00',
            'date_end'       =>  $date . ' 07:00:00',
            'small_img'      => '/img/event/monday-mornings-prayer-small.png',
            'large_img'      => '/img/event/monday-mornings-prayer-large.png',
            'link'           => 'https://hello.freeconference.com/conf/call/3074721'
        ];
    }

    /**
     * Retrieving the next wednesday service
     * 
     * @return
     */
    protected static function getWednesday($date)
    {
        return (object) [
            'name'           => "Women's Prayer",
            'slug'           => 'womens-prayer',
            'description'    => "Join us, as we charge ourselves and pray together",
            'date'           =>  $date,
            'venue'          => 'Zoom',
            'date_start'     =>  $date . ' 19:30:00',
            'date_end'       =>  $date . ' 20:30:00',
            'small_img'      => '/img/event/women-prayer-small.png',
            'large_img'      => '/img/event/women-prayer-large.png',
            'link'           => 'https://us02web.zoom.us/j/3411331977?pwd=SDEvYnJMMXJGL0ZCNkFKR3d6ZSthQT09'
        ];
    }

    public static function getEventBySlug($slug)
    {
        return EventModel::where('slug', $slug)->first();
    }

    public static function arrageDate($events)
    {
        for ($j = 0; $j < count($events); $j++) {
            for ($i = 0; $i < count($events) - 1; $i++) {
                $a1 = $events[$i]['date'];
                $a2 = $events[$i + 1]['date'];

                if ($a1 > $a2) {
                    $temp = $events[$i + 1];
                    $events[$i + 1] = $events[$i];
                    $events[$i] = $temp;
                }
            }
        }
        return $events;
    }
}