<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Database\Seeders\MenuSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();


        \App\Models\User::create([
            'name'              => 'Technage Limited',
            'email'             => 'admin@technagelimited.co.uk',
            'email_verified_at' => now(),
            'password'          => Hash::make('password'),
            'role'              => 'SuperAdmin',
            'remember_token'    => Str::random(10),
        ]);

        \App\Models\User::create([
            'name'              => 'Admin',
            'email'             => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password'          => Hash::make('admin12345'),
            'role'              => 'Admin',
            'remember_token'    => Str::random(10),
        ]);

        // $this->call(AppConfigsSeeder::class);
        // //$this->call(PageConfigsSeeder::class);
        // $this->call(EventsSeeder::class);
        // $this->call(SettingsSeeder::class);
        // $this->call(BannerSeeder::class);
        // $this->call(WeeklyEventSeeder::class);
        // $this->call(MenuSeeder::class);
        $this->call([
            AppConfigsSeeder::class,
            EventsSeeder::class,
            SettingsSeeder::class,
            BannerSeeder::class,
            WeeklyEventSeeder::class,
            MenuSeeder::class,
            MainSubSeeder::class,
            // MediaAdsSeeder::class,
            OutreachSeeder::class,
            PageSeeder::class
        ]);
    }
}
