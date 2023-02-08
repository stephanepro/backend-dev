<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {

            $table->id();
            $table->foreignIdFor(PaymentOption::class)->constrained();
            $table->foreignIdFor(Reservation::class)->constrained();

            $table->string('internal_ref',100);
            $table->string('external_ref',100);
            $table->string('transaction_id',100);
            $table->enum('state', ['', '', ''])->default();
            $table->double('amount_paid');
            $table->double('fee_provider');
            $table->double('commission');
            $table->string('pay_account');
            $table->dateTime('paid_at');
            $table->string('description')->nullable();
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
        Schema::dropIfExists('payments');
    }
};
