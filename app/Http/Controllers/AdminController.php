<?php

namespace App\Http\Controllers;

use App\Http\Services\About;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function getAboutUsInformation()
    {
        $data = [
            'aboutUsMain' => About::getAboutUs(),
            'data' => [
                'Our Value' => [
                    'icon' => 'fa fa-fire',
                    'text' => About::getAboutUsValue()
                ],
                'Our Vision' => [
                    'icon' => 'fa fa-eye',
                    'text' => About::getAboutUsVision()
                ],
                'Our Mission' => [
                    'icon' => 'fa fa-heart',
                    'text' => About::getAboutUsMission()
                ]
            ],

        ];
        return  $data;
    }
}
