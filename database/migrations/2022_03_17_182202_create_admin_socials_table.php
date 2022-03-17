<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminSocialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_socials', function (Blueprint $table) {
            $table->id();
            $table->string('twitter', 100)->nullable();
            $table->string('facebook', 100)->nullable();
            $table->string('google', 100)->nullable();
            $table->string('linkedlin', 100)->nullable();
            $table->string('instagram', 100)->nullable();
            $table->string('quora', 100)->nullable();

            // Admin Foreign ID Key
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
        Schema::dropIfExists('admin_socials');
    }
}
