<?php

namespace App\Http\Services;
use App\Models\App;
use App\Models\AppConfigs;


class Configs
{
   
    public static function getYearlyMessage() {    
        $id = App::where('name', 'home')->pluck('id')->first();
        return AppConfigs::where('app_id', $id)->where('name', 'yearly-topic')->pluck('value')->first();
    }

    public static function getYearlyMessageButtonText() {    
        $id = App::where('name', 'home')->pluck('id')->first();
        return AppConfigs::where('app_id', $id)->where('name', 'yearly-topic-button')->pluck('value')->first();
    }

    public static function getYearlyMessageBackgroundImage() {    
        $id = App::where('name', 'home')->pluck('id')->first();
        return AppConfigs::where('app_id', $id)->where('name', 'yearly-topic-background')->pluck('value')->first();
    }
 
}
