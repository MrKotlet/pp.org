<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagsCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags_companies', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('tag_id')->unsigned()->nullable();
            $table->bigInteger('company_id')->unsigned()->nullable();

        });

        Schema::table('tags_companies', function (Blueprint $table) {
            $table->foreign('tag_id')->references('id')->on('tags');
            $table->foreign('company_id')->references('id')->on('companies');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tags_companies');
    }
}
