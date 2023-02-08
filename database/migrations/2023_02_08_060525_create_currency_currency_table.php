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
            $table->id();
            $table->uuid();
            $table->foreignIdFor(Currency::class, 'from_currency_id')->constrained();
            $table->foreignIdFor(Currency::class, 'to_currency_id')->constrained();
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
