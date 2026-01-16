<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->string('event_id')->uniqie();
            $table->longText('description', 501)->nullable();
            $table->dateTime('date_start')->nullable();
            $table->date('date')->nullable();
            $table->dateTime('date_end')->nullable();
            $table->string('venue')->nullable();
            $table->string('large_img')->nullable();
            $table->string('small_img')->nullable();
            $table->string('link')->nullable();
            $table->smallInteger('special')->default(0);
            $table->smallInteger('display')->nullable();
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
        Schema::dropIfExists('events');
    }
}