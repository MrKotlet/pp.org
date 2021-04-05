<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStreamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('streams',function(Blueprint $table){
            $table -> increments('id');
            $table -> string('name');
            $table -> longText('opis');
            $table -> longText('link');
            $table -> boolean('visible')->nullable();
            $table -> bigInteger('event_id')->nullable();
            $table -> bigInteger('company_id')->nullable();
            $table -> string('date');
            $table -> timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('streams');
    }
}
