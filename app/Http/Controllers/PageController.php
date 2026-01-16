<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use App\Http\Services\Events;
use Illuminate\Support\Facades\Route;

class PageController extends Controller
{
    public function index(Page $page)
    {
        $page_slug = last(explode('/', url()->current())); 
    
        $page = Page::where('slug', $page_slug)->first();
        return ($page)
            ? view('main.pages.custom-page', compact('page'))
            : view('errors.404');
    }

    // public function about()
    // {
    // }

    // public function viewPage($page_slug)
    // {
    //     $page = Page::where('slug', $page_slug)->first();

    //     if ($page->slug === 'events') {
    //         $getAllEvents = (new Events())::getAllEvent();
    //         return view('main.pages.event', ['allEvents' => $getAllEvents]);
    //     } else {
    //         return ($page)
    //             ? view('main.pages.custom-page', compact('page'))
    //             : view('errors.404');
    //     }
    // }
}
