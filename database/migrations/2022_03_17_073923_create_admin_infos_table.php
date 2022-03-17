<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_infos', function (Blueprint $table) {
            $table->id();
            $table->string('bio', 200)->nullable();
            $table->date('DOB');
            $table->string('country')->nullable();
            $table->string('website', 100)->nullable();
            $table->string('phone', 20)->unique()->nullable();

            // Admin Foreign ID
            $table->foreignId('admin_id');
            $table->foreign('admin_id')->on('admins')->references('id');
            
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
        Schema::dropIfExists('admin_infos');
    }
}
