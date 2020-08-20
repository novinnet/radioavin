<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UplaylistTrack extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
     {
   Schema::create('uplaylist_track', function (Blueprint $table) {
            $table->unsignedBigInteger('playlist_id');
            $table->unsignedBigInteger('track_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('uplaylist_track');
    }
}
