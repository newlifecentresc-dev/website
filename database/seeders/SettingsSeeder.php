<?php

namespace Database\Seeders;

use App\Models\Settings;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Settings::create([
            'site_icon'                     => 'favicon.ico',
            'site_logo'                     => '/img/newlife_logo.png',
            'site_title'                    => 'Newlife Family',
            'about_us'                      => 'Newlife Family is a member of the RCCG (Redeemed Christian Church of God) network in the United Kingdom, which is a bible-believing family church with friendly interaction and relationships among its members. Our church is committed to aiding and assisting families in establishing stable lives in order to remain and grow in the city.',
            'about_image'                   => '/img/welcome-small.png',
            'meta_description'              => 'Newlife Family',
            'meta_keywords'                 => 'church, newlifefamily, newlife, newlifefamilysuttoncoldfield, newlifemeregreen, rccg, rccgnewlife, gospelteaching, familychurchbirmingham, familychurchsutton, familychurchsuttoncoldfield',
            'site_address'                  => 'St James Church Hall, <br>59 Mere Green Road, <br>The Royal Town of Sutton Coldfield, <br>Sutton Coldfield B75 5BW',
            'site_email'                    => 'info@newlifefamily.com',
            'site_phone_number'             => '+447940028966',
            'site_alternative_phone_number' => '+447940028966',
            'facebook_url'                  => '',
            'twitter_url'                   => '',
            'instagram_url'                 => '',
            'youtube_url'                   => '',
        ]);
    }
}