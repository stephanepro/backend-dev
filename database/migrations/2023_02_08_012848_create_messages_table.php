<?php

use App\Models\User;
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
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->text('content');
            $table->foreignIdFor(User::class,'sender_id')->constrained();
            $table->foreignIdFor(User::class,'receiver_id')->constrained();
            $table->foreignIdFor(Reservation::class)->constrained();
            $table->text('content');
            $table->dateTime('read_at');
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
        Schema::dropIfExists('messages');
    }
};
