<?php

namespace App\Http\Controllers\Administrator;

use App\Models\MainSub;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = MainSub::get();
        return view('administrator.pages.subs.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('administrator.pages.subs.create');

        $services = MainSub::get();

        return (count($services) < 4)
            ? view('administrator.pages.subs.create')
            : back()->with('error', 'You cannot create more than 4 services');
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
            'link'      => 'required',
            'btn_text'  => 'required',
            'image'     => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $data = new MainSub($request->except(['banner_image']));

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $data->addMediaFromRequest('image')->toMediaCollection('services');
        }

        $status = $data->save();

        return $status
            ? redirect()->route('services.index')->with('success', 'Service Successfully Created')
            : redirect()->back()->with('error', 'Error Creating Service!, Try again later');
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
        $mainSub = MainSub::where('id', $id)->firstOrFail();

        return $mainSub
        ? view('administrator.pages.subs.edit', compact('mainSub'))
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
        $mainSub = MainSub::where('id', $id)->firstOrFail();
        if ($mainSub) {
            $request->validate([
                'link'      => 'required',
                'btn_text'  => 'required',
                'image'     => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);

            $data = $request->except(['image']);

            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $mainSub->clearMediaCollection('services');
                $mainSub->addMediaFromRequest('image')->preservingOriginal()->toMediaCollection('services');
            }

            return $mainSub->fill($data)->save()
                ? redirect()->route('services.index')->with('success', 'Successfully updated Service')
                : back()->with('error', 'Error updating services');
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
        $mainSub = MainSub::where('id', $id)->firstOrFail();
        if ($mainSub) {
            return $mainSub->delete()
                ? redirect()->route('services.index')->with('success', 'Service deleted successfully')
                : back()->with('error', 'Something went wrong');
        } else {
            return back()->with('error', 'Date not found');
        }
    }
}
