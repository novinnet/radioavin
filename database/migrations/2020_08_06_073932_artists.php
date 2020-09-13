<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Artists extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('artists', function (Blueprint $table) {
           $table->bigIncrements('id');
            $table->string('fullname');
             $table->string('slug');
            $table->text('photo')->nullable();
            $table->enum('role',['singer','writer']);
            $table->text('bio')->nullable();
            $table->string('birthday')->nullable();
            $table->boolean('popular')->default(0);
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
        Schema::dropIfExists('artists');
    }
}
