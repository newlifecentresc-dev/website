<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class ArtisanController extends Controller
{
    public function index(Request $request)
    {
        switch($request->action) {
            case 'run-migration':
                Artisan::call('migrate:fresh');
            break;
            case 'run-seed':
                Artisan::call('db:seed');
            break;
        }
 
    }
}
