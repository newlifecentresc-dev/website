<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMainSubsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('main_subs', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->string('icon')->nullable();
            $table->string('description')->nullable();
            $table->string('title');
            $table->string('btn_text');
            $table->string('link');
            $table->smallInteger('icon_size');
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
        Schema::dropIfExists('main_subs');
    }
}