<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('name', 40);
            $table->string('phone', 20);
            $table->string('email', 45)->unique();
            $table->string('position', 20)->default('client');
            $table->string('location', 100);
            $table->string('password');
            $table->tinyInteger('status')->default(1);
            $table->time('email_verified_at')->nullable();
            $table->rememberToken();
            $table->text('notes', 300)->nullable();
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
        Schema::dropIfExists('clients');
    }
}
