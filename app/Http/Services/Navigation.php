<?php

namespace App\Http\Services;
use App\Models\App;
use App\Models\AppConfigs;
use App\Models\Menu;

class Navigation
{

    public static function getNavigation()
    {
       return Menu::tree()->where('title', 'Pages')->first(); 
    }

    public static function getNavigationOld() {

        $nav = [
            [
                'name' => 'home',
                'link' => 'home',
                'route' => 'laravel',
                'show' => true,
            ],
            [
                'name' => 'about',
                'link' => 'about',
                'route' => 'laravel',
                'show' => true,
            ],
            [
                'name' => 'sermons',
                'link' => 'sermons',
                'route' => 'laravel',
                'show' => true,
            ],
            [
                'name' => 'events',
                'link' => 'events',
                'route' => 'laravel',
                'show' => true,
            ],
            [
                'name' => 'giving',
                'link' => 'giving',
                'route' => 'laravel',
                'show' => true,
            ],
            [
                'name' => 'holy spirit experience',
                'link' => 'holyspiritexperience',
                'route' => 'laravel',
                'show' => true,
            ],
            // [
            //     'name' => 'Join Us Live',
            //     'link' => self::getYoutubeLink(),
            //     'route' => 'youtube',
            //     'show' => true,
            // ]
            [
                'name' => 'Join Us Live',
                'link' => 'streaming',
                'route' => 'laravel',
                'show' => true,
            ]

        ];

        return $nav;
    }

    protected static function getYoutubeLink()
    {
        $id = App::where('name', 'navigation')->pluck('id')->first();
        return AppConfigs::where('app_id', $id)->where('name', 'youtube-link')->pluck('value')->first();
    }

    public static function getAdminNavigation() {

        $nav = [
            [
                'name' => 'about',
                'page' => 'backend.about',
                'link' => 'admin/about',
                'show' => true,
            ],
            [
                'name' => 'pages',
                'page' => 'backend.pages',
                'link' => 'admin/pages',
                'show' => true,
            ],
        ];

        return $nav;
    }
}
