<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->string('title', 30);
            $table->tinyInteger('status')->default(1);
            $table->date('from_date');
            $table->date('to_date');
            $table->string('type', 20);

            // Contract Type Foreign Key
            $table->foreignId('contract_type_id');
            $table->foreign('contract_type_id')->on('contract_types')->references('id');

            // Client Foreign Key
            $table->foreignId('client_id');
            $table->foreign('client_id')->on('clients')->references('id');

            // Admin Foreign Key
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
        Schema::dropIfExists('contracts');
    }
}
