<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Events;
use App\Models\WeeklyEvent;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('administrator.pages.event.index', [
            'weeklyEvents' => WeeklyEvent::getWeeklyEvent()
        ]);
    }

    /**
     * Update the specified resource status in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function eventStatus(Request $request)
    {
        WeeklyEvent::toggleStatus($request->id, $request->mode);
        return response()->json(['msg' => 'Status updated successfully.', 'status' => true]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administrator.pages.event.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'day'       => 'required',
            'time'      => 'required',
            'title'     => 'required',
        ]);

        $data = $request->all();

        $status = WeeklyEvent::create($data);

        return $status
            ? redirect()->route('events.index')->with('success', 'Weekly Event Successfully Created')
            : back()->with('error', 'Error Creating Event!, Try again later');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $weeklyEvent = WeeklyEvent::where('id', $id)->firstOrFail();

        return $weeklyEvent
            ? view('administrator.pages.event.edit', compact('weeklyEvent'))
            : back()->with('error', 'Data not found');
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
        $weeklyEvent = WeeklyEvent::where('id', $id)->firstOrFail();
        if ($weeklyEvent) {
            $request->validate([
                'day'       => 'sometimes',
                'time'      => 'sometimes',
                'title'     => 'sometimes',
            ]);

            $data = $request->all();

            return $weeklyEvent->fill($data)->save()
                ? redirect()->route('events.index')->with('success', 'Weekly Event Successfully Updated')
                : back()->with('error', 'Error Updating Event!, Try again later');
        } else {
            return back()->with('error', 'Date not found');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $weeklyEvent = WeeklyEvent::where('id', $id)->firstOrFail();
        if ($weeklyEvent) {
            return $weeklyEvent->delete()
                ? back()->with('success', 'Weekly Event deleted successfully')
                : back()->with('error', 'Error Deleting Event!, Try again later');
        } else {
            return back()->with('error', 'Date not found');
        }
    }
}
