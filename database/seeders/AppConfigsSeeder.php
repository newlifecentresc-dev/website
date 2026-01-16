<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\App;
use App\Models\AppConfigs;

class AppConfigsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $buildConfigs = [
            (object) [
                'name'          => 'navigation',
                'configs_name'  => 'youtube-link',
                'configs_value' => 'https://www.youtube.com/watch?v=RqhOmzGcCSw&t=52s&ab_channel=ChristianHouseChristianHouse'
            ],
            (object) [
                'name'          => 'home',
                'configs_name'  => 'yearly-topic',
                'configs_value' => 'A year of <span class="text-warning">Witness</span>, <span class="text-success">{Insert yours}</span>.'
            ],
            (object) [
                'name'          => 'home',
                'configs_name'  => 'yearly-topic-button',
                'configs_value' => 'Worship with Us'
            ],
            (object) [
                'name'          => 'home',
                'configs_name'  => 'yearly-topic-background',
                'configs_value' => 'img/bg.jpg'
            ],

        ];


        foreach ($buildConfigs as $configs) {

            $appId = App::updateOrCreate(
                ['name' => $configs->name]
            );

            AppConfigs::updateOrCreate(
                [
                    'app_id' => $appId->id,
                    'name' => $configs->configs_name,
                ],
                [
                    'app_id' => $appId->id,
                    'name' => $configs->configs_name,
                    'value' => $configs->configs_value
                ]
            );
        }
    }
}
