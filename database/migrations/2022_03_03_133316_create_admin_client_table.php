<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminClientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_client', function (Blueprint $table) {
            $table->id();

            $table->foreignId('admin_id');
            $table->foreign('admin_id')->on('admins')->references('id');

            $table->foreignId('client_id');
            $table->foreign('client_id')->on('clients')->references('id');

            $table->tinyInteger('cooperate')->default(1);
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
        Schema::dropIfExists('admin_client');
    }
}
