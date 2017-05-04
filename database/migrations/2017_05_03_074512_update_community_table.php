<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateCommunityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('community', function (Blueprint $table) {
            $table->integer('community_type_id')->unsigned();
            $table->string('info','500')->nullable();
            $table->integer('president_id')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('community', function (Blueprint $table) {
            $table->dropColumn(['community_type_id', 'info', 'president_id']);
        });
    }
}
