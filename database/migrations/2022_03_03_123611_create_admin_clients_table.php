<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_clients', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('cooperate')->default(1);

            // Admin Foriegn Key
            $table->foreignId('admin_id');
            $table->foreign('admin_id')->on('admins')->references('id');

            // Client Foriegn Key
            $table->foreignId('client_id');
            $table->foreign('client_id')->on('clients')->references('id');

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
        Schema::dropIfExists('admin_clients');
    }
}
