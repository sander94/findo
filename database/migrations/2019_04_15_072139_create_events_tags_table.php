<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events_tags', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('event_id')->unsigned();
            $table->foreign('event_id')->references('id')->on('events');
            $table->integer('tag_id')->unsigned();
            $table->foreign('tag_id')->references('id')->on('tags');
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
        Schema::dropIfExists('events_tags');
    }
}
