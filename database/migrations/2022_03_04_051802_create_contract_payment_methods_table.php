<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractPaymentMethodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contract_payment_methods', function (Blueprint $table) {
            $table->id();


            // Contract Foreign Key
            $table->foreignId('contract_id');
            $table->foreign('contract_id')->on('clients')->references('id');

            // Payment Method Foreign Key
            $table->foreignId('payment_method_id');
            $table->foreign('payment_method_id')->on('payment_methods')->references('ids');

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
        Schema::dropIfExists('contract_payment_methods');
    }
}
