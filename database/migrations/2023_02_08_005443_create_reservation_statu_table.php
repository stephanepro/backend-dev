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
        Schema::create('reservation_statu', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Reservation::class)->constrained();
            $table->foreignIdFor(Statu::class)->constrained();
            $table->foreignIdFor(User::class)->constrained();
            $table->string('comment',254);
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
        Schema::dropIfExists('reservation_statu');
    }
};
