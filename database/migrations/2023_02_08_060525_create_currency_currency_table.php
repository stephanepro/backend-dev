<?php

use App\Models\Currency;
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
        Schema::create('currency_currency', function (Blueprint $table) {


            $table->unsignedBigInteger('from_currency_id');
            $table->foreign('from_currency_id')->references('id')->on('currencies');

            $table->unsignedBigInteger('to_currency_id');
            $table->foreign('to_currency_id')->references('id')->on('currencies');

            $table->float('rate');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('currency_currency');
    }
};
