<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_infos', function (Blueprint $table) {
            $table->id();
            $table->integer('age')->unsigned();
            $table->string('mobile', 45);
            $table->string('website', 100);
            $table->string('native_lan', 45)->default('English');
            $table->enum('gender', ['M', 'F']);
            $table->tinyInteger('email_contact')->default(0);
            $table->tinyInteger('chat_contact')->default(1);
            $table->tinyInteger('phone_contact')->default(1);
            $table->string('first_address', 100);
            $table->string('second_address', 100)->nullable();
            $table->string('post_code', 10);
            $table->string('city', 45);
            $table->string('state', 45);
            $table->string('country', 45);

            // Client ID Foreign Key
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
        Schema::dropIfExists('client_infos');
    }
}
