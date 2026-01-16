<?php

namespace App\Http\Services;


class Home
{
   
    public static function getSubInformation()
    {
       return [
            [
                'image'     => 'https://greatperformersacademy.com/images/images/Articles_images/science-proof-giving-charity-happier.jpg',
                'btnText'   => 'giving',
                'link'      => 'giving'
            ],
            [
                'image'     => 'https://c0.wallpaperflare.com/preview/384/718/434/church-live-band-album.jpg',
                'btnText'   => 'live streaming',
                'link'      => 'streaming'
            ],
            [
                'image'     => 'https://www.guideposts.org/sites/default/files/styles/bynder_webimage/public/story/biblestudy_marquee.jpg',
                'btnText'   => 'bible study',
                'link'      => 'bible-study'
            ],
            [
                'image'     => 'https://marketingweek.imgix.net/content/uploads/2017/07/28131730/read-book_750.jpg?auto=compress,format&q=60&w=750&h=460',
                'btnText'   => 'book reading',
                'link'      => 'book-reading'
            ] 
        ];
    }

}
