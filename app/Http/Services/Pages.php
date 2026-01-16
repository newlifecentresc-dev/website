<?php

namespace App\Http\Services;

use App\Models\Pages as Page;
use App\Models\PageConfigs;


class Pages
{
    public static function getAboutUsValue()
    {
        $id = Page::where('name', 'about-us')->pluck('id')->first();
        return PageConfigs::where('page_id', $id)->pluck('value')->first();
    }
}
