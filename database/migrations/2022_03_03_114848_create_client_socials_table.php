<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientSocialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_socials', function (Blueprint $table) {
            $table->id();
            $table->string('twitter', 300);
            $table->string('facebook', 300);
            $table->string('instagram', 300);
            $table->string('github', 300);
            $table->string('codepen', 300);
            $table->string('slack', 300);

            // Client ID
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
        Schema::dropIfExists('client_socials');
    }
}
