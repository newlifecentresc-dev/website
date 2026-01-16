<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\Pages;
use App\Models\PageConfigs;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pageConfigs = [
            (object) [
                'name'          => 'home',
                'controller'    => 'HomeController',
                'configs_name'  => 'home',
                'type'          => 'built',
            ],
            (object) [
                'name'          => 'about',
                'controller'    => 'PageController',
                'content'       => '<section class="about-section spad"> <div class="container"> <div class="row"> <div class="col-md-6 about-content"> <h2>Welcome to Newlife Family</h2> <p>For God did not send his Son into the world to condemn the world, but to save the world through him. We are chosen by God and he loved us first. Join us as we worship the Kings of Kings together. Be a part of the family.</p> <a href="" class="d-none site-btn btn-purple sb-wide">join us</a> </div> <div class="col-md-6 about-img"> <img src="http://localhost/img/welcome-img.jpg" alt="welome poster"> </div> </div> </div></section><section class="services-section spad"> <div class="container"> <div class="row"> <div class="col-sm-4"> <div class="service-box"> <h4><i class="fa fa-fire" style="color: #dd3e3e; margin-right: 10px"></i>Our Value</h4> <p>We believe Jesus Christ is the only begotten Son of God. </p><p>We believe in the trinity; one God who exists in three distinct persons; Father, Son and the Holy Spirit. </p><p>We believe in the Death and Resurrection of Christ. </p><p>We believe in the person of the Holy Spirit, His Fruit and Gifts. </p><p>We believe in the second coming of Christ. </p><p>We believe in the Bible as the foundation and ultimate compass for a successful Christian life. </p> </div> </div> <div class="col-sm-4"> <div class="service-box"> <h4><i class="fa fa-eye" style="color: #dd3e3e; margin-right: 10px"></i>Our Vision</h4> <p>To see believers come to maturity of the faith and reign in life as prince and princess of God. </p><p>We have a mandate from God to build men and women up in the Christian faith, equipping them with the word of God and the power of the Holy Spirit, so they can be maximally effective in what God has called them to do.</p> </div> </div> <div class="col-sm-4"> <div class="service-box"> <h4><i class="fa fa-heart" style="color: #dd3e3e; margin-right: 10px"></i>Our Mission</h4> <p>To nurture the life of God in other believers and to raise men and women who are committed to the body of Christ.</p><p> </p><p>Our commitment is to love, encourage, collaboratively nurture the fruit of the Spirit, serve and to share our possessions and our hearts with each other (1 Cor 12 and Gal 5:13-26).</p> </div> </div> </div> </div></section>',
                'type'          => 'built',
            ],
            (object) [
                'name'          => 'sermon',
                'controller'    => 'SermonController',
                'configs_name'  => 'sermon',
                'type'          => 'built',
            ],
            (object) [
                'name'          => 'giving',
                'controller'    => 'GivingController',
                'configs_name'  => 'giving',
                'type'          => 'built',
            ],
            (object) [
                'name'          => 'event',
                'controller'    => 'EventController',
                'configs_name'  => 'event',
                'type'          => 'built',
            ],
            // (object) [
            //     'name' => 'about-us',
            //     'page' => 'about',
            //     'type' => 'sub-page',
            //     'configs_name' => 'about-us',
            //     'configs_value' => '<p>For God did not send his Son into the world to condemn the world, but to save the world through him. We are chosen by God and he loved us first. Join us as we worship the Kings of Kings together. Be a part of the family.</p>'
            // ],
            // (object) [
            //     'name' => 'about-us-main',
            //     'page' => 'about',
            //     'type' => 'sub-page',
            //     'configs_name' => 'about-us-main',
            //     'configs_value' => '<p>Newlife Family is part of the RCCG (Redeemed Christian Church of God) network in the UK, a bible believing family church,with a cordial interaction and relationship amongst members.Our church is passionate about serving and helping families to build sustainable lives to stay and thrive in the city.</p>'
            // ],
            // (object) [
            //     'name' => 'about-us-value',
            //     'page' => 'about',
            //     'type' => 'sub-page',
            //     'configs_name' => 'about-us-value',
            //     'configs_value' => '<p>We believe Jesus Christ is the only begotten Son of God. </p><p>We believe in the trinity; one God who exists in three distinct persons; Father, Son and the Holy Spirit. </p><p>We believe in the Death and Resurrection of Christ. </p><p>We believe in the person of the Holy Spirit, His Fruit and Gifts. </p><p>We believe in the second coming of Christ. </p><p>We believe in the Bible as the foundation and ultimate compass for a successful Christian life. </p>'
            // ],
            // (object) [
            //     'name' => 'about-us-vision',
            //     'page' => 'about',
            //     'type' => 'sub-page',
            //     'configs_name' => 'about-us-vision',
            //     'configs_value' => '<p>To see believers come to maturity of the faith and reign in life as prince and princess of God. </p><p>We have a mandate from God to build men and women up in the Christian faith, equipping them with the word of God and the power of the Holy Spirit, so they can be maximally effective in what God has called them to do.</p>'
            // ],
            // (object) [
            //     'name' => 'about-us-mission',
            //     'page' => 'about',
            //     'type' => 'sub-page',
            //     'configs_name' => 'about-us-mission',
            //     'configs_value' => '<p>To nurture the life of God in other believers and to raise men and women who are committed to the body of Christ.<p> <p>Our commitment is to love, encourage, collaboratively nurture the fruit of the Spirit,</p><p>serve and to share our possessions and our hearts with each other (1 Cor 12 and Gal 5:13-26).</p>'
            // ],
            (object) [
                'name'          => 'gallery',
                'controller'    => 'GalleryController',
                'configs_name'  => '',
                'configs_value' => '',
                'type'          => 'built'
            ],
            (object) [
                'name'          => 'Join Us Live',
                'controller'    => 'JoinUsLiveController',
                'configs_name'  => '',
                'configs_value' => '',
                'type'          => 'built'
            ],
            // (object) [
            //     'name'          => 'contact',
            //     'controller'    => 'ContactController',
            //     'configs_name'  => '',
            //     'configs_value' => '',
            //     'type'          => 'built'
            // ],
        ];


        foreach ($pageConfigs as $key => $configs) {

            // if ($configs->type === 'built') {
            $page = Pages::create([
                'name'          => $configs->name,
                'slug'          => Str::slug($configs->name),
                'controller'    => $configs->controller ?? '',
                'type'          => $configs->type,
                'content'       => $configs->content ?? '',
            ]);

            Menu::create([
                'title'         => $configs->name,
                'parent_id'     => 2,
                'sort_order'    => $key,
                'slug'          => Str::slug($configs->name),
                'status'        => ($configs->name === 'giving') ? 'inactive' : 'active'
            ]);
            // }

            // if ($configs->type === 'sub-page') {

            //     $pages = Pages::where('name', $configs->page)->first();

            //     PageConfigs::updateOrCreate(
            //         [
            //             'page_id' => $pages->id,
            //             'name' => $configs->configs_name,
            //         ],
            //         [
            //             'page_id' => $pages->id,
            //             'name' => $configs->configs_name,
            //             'value' => $configs->configs_value
            //         ]
            //     );
            // }
        }
    }
}
