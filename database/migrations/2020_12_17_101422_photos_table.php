<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photos',function(Blueprint $table){

            $table->id();
            $table->string('name')->unique();
            $table->bigInteger('company_id')->unsigned()->nullable();
            $table->string('type')->default('other');
            $table->boolean('verified')->nullable();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('photos');
    }
}
