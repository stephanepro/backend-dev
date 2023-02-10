<?php

use App\Models\User;
use App\Models\Price;
use App\Models\Statu;
use App\Models\PromoCode;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->integer('guest_count');
            $table->boolean('paid');
            $table->double('total_amount');
            $table->text('additional_info');
            $table->foreignIdFor(User::class)->constrained();
            $table->foreignIdFor(Price::class)->constrained();
            $table->foreignIdFor(Statu::class)->constrained();
            $table->foreignIdFor(PromoCode::class)->constrained();

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
        Schema::dropIfExists('reservations');
    }
};
