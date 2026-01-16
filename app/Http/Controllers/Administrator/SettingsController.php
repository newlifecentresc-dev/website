<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Settings()
    {
        return view('administrator.pages.settings', [
            'setting' => Settings::first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateSettings(Request $request)
    {
        $setting = Settings::firstOrFail();

        // Validate user input fields
        $validated = $this->validateRequest();

        //Check if image was uploaded on update
        if ($image = $request->file('site_icon')) {
            $siteIcon = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('media/favicon/'), $siteIcon);
            $validated['site_icon'] = URL::to('/') . '/' . 'media/favicon/' . $siteIcon;
        } else {
            $validated['site_icon'] = $setting['site_icon'];
        }

        if ($image = $request->file('site_logo')) {
            $siteLogo = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('media/logo/'), $siteLogo);
            $validated['site_logo'] = URL::to('/') . '/' . 'media/logo/' . $siteLogo;

        } else {
            $validated['site_logo'] = $setting['site_logo'];
        }

        if ($image = $request->file('about_image')) {
            $aboutImage = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('media/about_image/'), $aboutImage);
            $validated['about_image'] = URL::to('/') . '/' . 'media/about_image/' . $aboutImage;

        } else {
            $validated['about_image'] = $setting['about_image'];
        }

        // if($image = $request->file('site_icon')){
        //     $imageName = time() . '.' . $image->getClientOriginalExtension();
        //     $image->move('media/site-image/', $imageName);
        //     $validated['site_icon'] = URL::to('/').'/media/site-image/'.$imageName;

        //     $this->unlinkImage($validated['site_icon']);

        // }else{
        //     unset($validated['site_icon']);
        // }

        // if($image = $request->file('site_logo')){
        //     $imageName = time() . '.' . $image->getClientOriginalExtension();
        //     $image->move('media/site-image/', $imageName);
        //     $validated['site_logo'] = URL::to('/').'/media/site-image/'.$imageName;

        //     $this->unlinkImage($validated['site_logo']);

        // }else{
        //     unset($validated['site_logo']);
        // }



        return (Settings::where('id', 1)->update($validated))
            ? back()->with('success', 'Setting successfully updated')
            : back()->with('error', 'Error updating settings!');
    }

    /**
     * Update the mail configuring in environment variable.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function mailConfiguration(Request $request)
    {
        foreach ($request->types as $key => $type) {
            $this->overrideEnvironmentVariables($type, $request[$type]);
        }

        return back()->with('success', 'Configured mail successfully');
    }

    private function overrideEnvironmentVariables($type, $value)
    {
        $path = base_path('.env');
        if (file_exists($path)) {
            $value = '"' . trim($value) . '"';
            if (is_numeric(strpos(file_get_contents($path), $type)) && strpos(file_get_contents($path), $type) >= 0) {
                file_put_contents($path, str_replace(
                    $type . '="' . env($type) . '"',
                    $type . '=' . $value,
                    file_get_contents($path)
                ));
            } else {
                file_put_contents($path, file_get_contents($path) . "\r\n" . $type . '=' . $value);
            }
        }
    }

    private function validateRequest()
    {
        return request()->validate([
            'site_icon'                     =>  'sometimes|mimes:jpg,png,jpeg,gif,svg|max:256',
            'site_logo'                     =>  'sometimes|mimes:jpg,png,jpeg,gif,svg|max:256',
            'site_title'                    =>  'sometimes|string',
            'meta_description'              =>  'sometimes|string',
            'meta_keywords'                 =>  'sometimes|string',
            'about_us'                      =>  'sometimes|string',
            'about_image'                   =>  'sometimes|mimes:jpg,png,jpeg,gif,svg|max:256',
            'site_email'                    =>  'sometimes|email|string',
            'site_address'                  =>  'sometimes|string',
            'site_phone_number'             =>  'sometimes|string|max:14',
            'site_alternative_phone_number' =>  'sometimes|string|max:14',
            'facebook_url'                  =>  'sometimes',
            'instagram_url'                 =>  'sometimes',
            'twitter_url'                   =>  'sometimes',
            'youtube_url'                   =>  'sometimes',
        ]);
    }

    private static function unlinkImage($fileName)
    {
        $imagePath ='media/site-image/';
        $imageName = substr($fileName, strrpos($fileName, '/' )+1);
        $old_image = $imagePath.$imageName;

        if(file_exists($old_image)){
            @unlink($old_image);
        }
    }
}
