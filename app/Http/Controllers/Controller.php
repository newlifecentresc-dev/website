<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $prefix;

    public function __construct()
    {
        $this->prefix = 'main.';

        if (Schema::hasTable('menus')) {
            //its just a dummy data object.
            $menus = Menu::where('status', 'active')->get();

            // Sharing is caring
            View::share('menus', $menus);
        }
    }
}
