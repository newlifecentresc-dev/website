<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\Events as EventServices;

class EventController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(EventServices $eventService)
    {
        $events = $eventService::getAllEvent();
        return view('main.pages.event', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(EventServices $eventService, $slug)
    {
        $value = $eventService->getEventBySlug($slug);
        return view('main.pages.single-event', ['event' => $value]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public static function sortto($arr)
    {
        function sorting($a, $b)
        {
            return strtotime($a['date']) - strtotime($b['date']);
        }
        usort($arr, "App\Http\Controllers\sorting");

        return $arr;
    }
}
