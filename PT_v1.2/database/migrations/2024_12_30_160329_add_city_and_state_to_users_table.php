<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCityAndStateToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('test', function (Blueprint $table) {
            $table->unsignedBigInteger('state_id')->nullable(); // Assuming you're using state IDs
            $table->unsignedBigInteger('city_id')->nullable(); // Assuming you're using city IDs
        });
    }

    public function down()
    {
        Schema::table('test', function (Blueprint $table) {
            $table->dropColumn('state_id');
            $table->dropColumn('city_id');
        });
    }
}
