<?php

namespace Database\Seeders;

use App\Models\MediaAds;
use Illuminate\Database\Seeder;

class MediaAdsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $bg_image = public_path("img/media-bg.jpg");
        // $image = public_path("img/camera2.png");

        $bg_image = '/img/media-bg.jpg';
        $image = '/media/7/camera2.png';

        $media = MediaAds::create([
            'title'     => 'Media',
            'info'      => 'Discover a wealth of biblical teaching in Newlife Centre library. Listen to the latest messages and past services.',
            'btn_text'  => 'watch and listen',
            'link'      => 'sermon',
            'image'     => $image,
            'bg_image'  => $bg_image,
        ]);

        // $media->addMedia($bg_image)
        //     ->preservingOriginal()
        //     ->toMediaCollection('bg_media_ads');

        // $media->addMedia($image)
        //     ->preservingOriginal()
        //     ->toMediaCollection('media_ads');
    }
}
