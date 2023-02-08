<?php

use App\Models\User;
use App\Models\Statu;
use App\Models\Reservation;
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
        Schema::create('reservation_statu', function (Blueprint $table) {
            $table->id();
            $table->uuid();
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
