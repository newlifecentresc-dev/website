<?php

namespace App\Http\Services;

use App\Models\Pages;
use App\Models\PageConfigs;

class About
{

    protected $about;

    public function __construct()
    {
    }

    public function getAboutUs()
    {
        $page = Pages::where('name', 'about')->first();
        return PageConfigs::where('page_id', $page->id)->where('name', 'about-us')->pluck('value')->first();
    }


    public static function getAboutUsValue()
    {
        $page = Pages::where('name', 'about')->first();
        return PageConfigs::where('page_id', $page->id)->where('name', 'about-us-value')->pluck('value')->first();
    }

    public static function getAboutUsVision()
    {
        $page = Pages::where('name', 'about')->first();
        return PageConfigs::where('page_id', $page->id)->where('name', 'about-us-vision')->pluck('value')->first();
    }

    public static function getAboutUsMission()
    {
        $page = Pages::where('name', 'about')->first();
        return PageConfigs::where('page_id', $page->id)->where('name', 'about-us-mission')->pluck('value')->first();
    }

    // public static function getAboutUsInfo()
    // {
    //     $id = Page::pluck('id')->first();
    //     return PageConfigs::where('page_id', $id)->get();
    // }

}
