<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Pages;
use App\Models\PageConfigs;
use App\Http\Services\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(About $about)
    {
        // $images = [
        //     "https://images.pexels.com/photos/459225/pexels-photo-459225.jpeg?auto=compress&cs=tinysrgb&h=750&w=1260",
        //     "https://images.pexels.com/photos/371589/pexels-photo-371589.jpeg?auto=compress&cs=tinysrgb&h=750&w=1260",
        //     "https://images.pexels.com/photos/258109/pexels-photo-258109.jpeg?auto=compress&cs=tinysrgb&h=750&w=1260",
        //     "https://images.pexels.com/photos/210186/pexels-photo-210186.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500",
        //     "https://images.pexels.com/photos/1903702/pexels-photo-1903702.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500",
        //     "https://images.pexels.com/photos/589697/pexels-photo-589697.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500",
        //     "https://images.pexels.com/photos/1903702/pexels-photo-1903702.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500",
        //     "https://images.pexels.com/photos/589697/pexels-photo-589697.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500"
        // ];

        // // dd($about->getAboutUs());
        // $data = [
        //     'aboutUsMain' => [
        //         'text' => $about->getAboutUs()
        //     ],
        //     'data' => [
        //         'Our Value' => [
        //             'icon' => 'fa fa-fire',
        //             'text' => $about->getAboutUsValue()
        //         ],
        //         'Our Vision' => [
        //             'icon' => 'fa fa-eye',
        //             'text' => $about->getAboutUsVision()
        //         ],
        //         'Our Mission' => [
        //             'icon' => 'fa fa-heart',
        //             'text' => $about->getAboutUsMission()
        //         ]
        //     ],
        //     'images' => $images

        // ];

        // return view('main.pages.about', $data);
        $page = Page::where('name', 'about')->first();
        return view('main.pages.about', compact('page'));
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
