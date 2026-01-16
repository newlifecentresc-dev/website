<?php

namespace Database\Seeders;

use App\Models\Banner;
use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // $values = $this->getBanners();

        // foreach($values as $value){
        //     $banners = Banner::create([
        //         'banner_status' => $value->banner_status,
        //         'banner_condition' => $value->banner_condition,
        //     ]);

        //     $banners->addMedia($value->banner_image)
        //     ->preservingOriginal()
        //     ->toMediaCollection('banners');
        // }
    }

    public static function getBanners()
    {
        $banners = [
            (object) [
                'banner_status' => 'active',
                'banner_condition' => 'banner',
                'banner_image' =>  public_path("img/bg.jpg"),
            ],
            (object) [
                'banner_status' => 'active',
                'banner_condition' => 'banner',
                'banner_image' =>  public_path("img/bg1.jpg"),
            ],
            (object) [
                'banner_status' => 'active',
                'banner_condition' => 'banner',
                'banner_image' =>  public_path("img/bg2.jpg"),
            ],
            (object) [
                'banner_status' => 'inactive',
                'banner_condition' => 'banner',
                'banner_image' =>  public_path("img/bg3.jpg"),
            ],
            (object) [
                'banner_status' => 'active',
                'banner_condition' => 'promo',
                'banner_image' =>  public_path("img/media-bg.jpg"),
            ],
        ];
        return $banners;
    }
}
