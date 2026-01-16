<?php

namespace Database\Seeders;

use App\Models\Outreach;
use Illuminate\Database\Seeder;

class OutreachSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $bg_image = public_path("img/social-bg.png");
        // $image = public_path("img/4b45a2b1-f96f-427e-b03c-1dfd88a57475.jpg");

        $bg_image = 'img/social-bg.png';
        $image = 'img/4b45a2b1-f96f-427e-b03c-1dfd88a57475.jpg';

        $media = Outreach::create([
            'title'     => 'social outreach',
            'info'      => 'Our vision is to reach out, give hope, rehabilitate, educate, and empower impoverished persons in order to achieve individual and community transformation',
            'btn_text'  => 'Read More',
            'link'      => 'home',
            'image'     => $image,
            'bg_image'  => $bg_image,
        ]);

        // $media->addMedia($bg_image)
        //     ->preservingOriginal()
        //     ->toMediaCollection('bg_outreach');

        // $media->addMedia($image)
        //     ->preservingOriginal()
        //     ->toMediaCollection('outreach');
    }
}
