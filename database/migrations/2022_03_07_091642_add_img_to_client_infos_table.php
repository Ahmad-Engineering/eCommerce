<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddImgToClientInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('client_infos', function (Blueprint $table) {
            //
            $table->string('img', 100)->default('/ecommerce/app-assets/images/portrait/small/avatar-s-11.jpg')->after('country');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('client_infos', function (Blueprint $table) {
            //
            $table->dropColumn('country');
        });
    }
}
