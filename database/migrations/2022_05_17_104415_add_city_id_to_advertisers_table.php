<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('advertisers', function (Blueprint $table) {
            //
            $table->foreignId('city_id');
            // $table->foreign('city_id')->on('cities')->references('id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
     Schema::table('advertisers', function (Blueprint $table) {
                //
                $table->dropForeign('advertisers_city_id_foreign');
                $table->dropColumn('city_id');
            });
    }
};
