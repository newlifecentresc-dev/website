<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\Events;
use App\Http\Services\Pages;
use App\Models\Newsletter;
use App\Models\Banner;
use App\Models\Menu;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $event = Events::getNextEvent();

        $latestSpecial = Events::getLatestSpecialEvent();
        $latestFiveEvents = Events::getLatestFiveEvents();
        $aboutUsMini = Pages::getAboutUsValue();

        $banners = Banner::getBannerWithBanners();
        $promo_banner = Banner::getBannerWithPromo();


        // $menus = Menu::where('status', 'active')->get();
        $data = [
            'latestSpecial'     => $latestSpecial,
            'latestFiveEvents'  => $latestFiveEvents,
            'aboutUsMini'       => $aboutUsMini,
            'maxEventNumber'    => 5,
            'banners'           => $banners,
            'promo_banner'      => $promo_banner,
            // 'menus'             => $menus
        ];

        return view('main.pages.home', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function newsletter(Request $request)
    {
        Newsletter::create([
            'email' => $request->email
        ]);
        return response()->json(['success' => 'red']);
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
}