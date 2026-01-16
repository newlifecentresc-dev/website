<?php

namespace Database\Seeders;

use App\Models\MainSub;
use Illuminate\Database\Seeder;

class MainSubSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $values = $this->getSubInformation();

        foreach($values as $value){
            MainSub::create([
                'image'         => $value->image,
                'btn_text'      => $value->btnText,
                'link'          => $value->link,
                'title'         => $value->btnText,
                'description'   => $value->description,
                'icon'          => $value->icon,
                'icon_size'     => $value->iconSize,
            ]);
        }
    }


    public static function getSubInformation()
    {
        return [
            (object) [
                'image'         => '',
                'icon'          => 'img/icons/giving.png',
                'iconSize'      => '30',
                'btnText'       => 'giving',
                'description'   => 'Tempore corrupti temporibus fuga earum asperiores fugit laudantium.',
                'link'          => 'giving'
            ],
            (object)[
                'image'         => '',
                'icon'          => 'img/icons/live.png',
                'iconSize'      => '30',
                'btnText'       => 'live streaming',
                'description'   => 'Tempore corrupti temporibus fuga earum asperiores fugit laudantium.',
                'link'          => 'streaming'
            ],
            (object)[
                'image'         => '',
                'icon'          => 'img/icons/bible.png',
                'iconSize'      => '30',
                'btnText'       => 'bible study',
                'description'   => 'Tempore corrupti temporibus fuga earum asperiores fugit laudantium.',
                'link'          => 'bible-study'
            ],
            (object)[
                'image'         => '',
                'btnText'       => 'book reading',
                'icon'          => 'img/icons/book.png',
                'iconSize'      => '30',
                'description'   => 'Tempore corrupti temporibus fuga earum asperiores fugit laudantium.',
                'link'          => 'book-reading',
            ]
        ];
    }
}