<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FormatDatesInEvents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('events', function (Blueprint $table) {
            $table -> integer('startMonth');
            $table -> integer('endMonth');
            $table -> integer('startDay');
            $table -> integer('endDay');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('events', function (Blueprint $table) {
            $table -> dropColumn('startMonth');
            $table -> dropColumn('endMonth');
            $table -> dropColumn('startDay');
            $table -> dropColumn('endDay');
        });
    }
}
