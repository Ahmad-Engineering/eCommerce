<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBranchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branches', function (Blueprint $table) {
            $table->id();
            $table->string('name', 45);
            $table->string('address', 100);
            $table->integer('goods_amount')->unsigned()->default(0);
            $table->string('type');
            $table->string('position', 20)->default('client');

            // Admin Foreign Key
            $table->foreignId('admin_id');
            $table->foreign('admin_id')->on('admins')->references('id');

            // Client Foreign Key
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
        Schema::dropIfExists('branches');
    }
}
