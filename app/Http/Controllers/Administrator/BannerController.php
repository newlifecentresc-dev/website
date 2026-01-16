<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\MediaAds;
use App\Models\Outreach;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('administrator.pages.banner.index', [
            'banners' => Banner::getBanners()
        ]);
    }

    /**
     * Update the specified resource status in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function bannerStatus(Request $request)
    {
        Banner::toggleStatus($request->id, $request->mode);
        return response()->json(['msg' => 'Status updated successfully.', 'status' => true]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administrator.pages.banner.create');
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
            'banner_image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $data = new Banner($request->except(['banner_image']));

        if ($request->hasFile('banner_image') && $request->file('banner_image')->isValid()) {
            $data->addMediaFromRequest('banner_image')->toMediaCollection('banners');
        }

        $status = $data->save();

        return $status
            ? redirect()->route('banners.index')->with('success', 'Banner Successfully Created')
            : redirect()->back()->with('error', 'Error Creating Banner!, Try again later');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        return $banner
            ? view('administrator.pages.banner.edit', compact('banner'))
            : back()->with('error', 'Data not found');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Banner $banner)
    {
        if ($banner) {
            $request->validate([
                'banner_image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);

            $data = $request->except(['banner_image']);

            if ($request->hasFile('banner_image') && $request->file('banner_image')->isValid()) {
                $banner->clearMediaCollection('banners');
                $banner->addMediaFromRequest('banner_image')->preservingOriginal()->toMediaCollection('banners');
            }

            return $banner->fill($data)->save()
                ? redirect()->route('banners.index')->with('success', 'Successfully updated banner')
                : back()->with('error', 'Error updating banner');
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
    public function destroy(Banner $banner)
    {
        if ($banner) {
            return $banner->delete()
                ? redirect()->route('banners.index')->with('success', 'Banner deleted successfully')
                : back()->with('error', 'Something went wrong');
        } else {
            return back()->with('error', 'Date not found');
        }
    }


    public function advert_banner()
    {
        return view('administrator.pages.banner.ads_banner');
    }

    public function edit_advert_banner($id)
    {
        $ads_banner = MediaAds::where('id', $id)->firstOrFail();

        return $ads_banner
            ? view('administrator.pages.banner.edit_ads_banner', compact('ads_banner'))
            : back()->with('error', 'Data not found');
    }

    public function update_advert_banner(Request $request, $id)
    {
        $ads_banner = MediaAds::where('id', $id)->firstOrFail();

        if ($ads_banner) {
            $request->validate([
                'bg_image'      => 'sometimes|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
                'image'         => 'sometimes|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
                'title'         => 'required',
                'link'          => 'required',
                'info'          => 'required',
            ]);

            $data = $request->except(['bg_image', 'image']);

            if ($request->hasFile('bg_image') && $request->file('bg_image')->isValid()) {
                $ads_banner->clearMediaCollection('bg_media_ads');
                $ads_banner->addMediaFromRequest('bg_image')->preservingOriginal()->toMediaCollection('bg_media_ads');
            }

            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $ads_banner->clearMediaCollection('media_ads');
                $ads_banner->addMediaFromRequest('image')->preservingOriginal()->toMediaCollection('media_ads');
            }

            return $ads_banner->fill($data)->save()
                ? redirect()->route('banner.advert')->with('success', 'Successfully updated media advert')
                : back()->with('error', 'Error updating banner');
        } else {
            return back()->with('error', 'Date not found');
        }
    }

    public function edit_outreach_banner($id)
    {
        $outreach = Outreach::where('id', $id)->firstOrFail();

        return $outreach
            ? view('administrator.pages.banner.edit_outreach', compact('outreach'))
            : back()->with('error', 'Data not found');
    }

    public function update_outreach_banner(Request $request, $id)
    {
        $outreach = Outreach::where('id', $id)->firstOrFail();

        if ($outreach) {
            $request->validate([
                'bg_image'      => 'sometimes|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
                'image'         => 'sometimes|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
                'title'         => 'required',
                'link'          => 'required',
                'info'          => 'required',
            ]);

            $data = $request->except(['bg_image', 'image']);

            if ($request->hasFile('bg_image') && $request->file('bg_image')->isValid()) {
                $outreach->clearMediaCollection('bg_outreach');
                $outreach->addMediaFromRequest('bg_image')->preservingOriginal()->toMediaCollection('bg_outreach');
            }

            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $outreach->clearMediaCollection('outreach');
                $outreach->addMediaFromRequest('image')->preservingOriginal()->toMediaCollection('outreach');
            }

            return $outreach->fill($data)->save()
                ? redirect()->route('banner.advert')->with('success', 'Successfully updated media outreach')
                : back()->with('error', 'Error updating banner');
        } else {
            return back()->with('error', 'Date not found');
        }
    }
}
