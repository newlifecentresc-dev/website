<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('site_title');
            $table->text('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->text('about_us')->nullable();
            $table->string('about_image')->nullable();
            $table->string('site_logo');
            $table->string('site_icon');
            $table->string('site_address');
            $table->string('site_email');
            $table->string('site_phone_number');
            $table->string('site_alternative_phone_number');
            $table->string('facebook_url')->nullable();
            $table->string('twitter_url')->nullable();
            $table->string('instagram_url')->nullable();
            $table->string('youtube_url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
