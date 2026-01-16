<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use App\Http\Services\Navigation;

class SitemapController extends Controller
{
    public function index()
    {
        $pages = Navigation::getNavigation();

        return response()->view('sitemap.index', [
            'pages' => $pages
        ])->header('Content-Type', 'text/xml');
    }
}
