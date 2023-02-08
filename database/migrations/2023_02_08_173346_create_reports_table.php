<?php

use App\Models\Property;
use App\Models\User;
use App\Models\Reservation;
use App\Models\ReportedUser;

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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->foreignIdFor(Property::class)->constrained();
            $table->foreignIdFor(User::class)->constrained();

            $table->unsignedBigInteger('reported_user_id');
            $table->foreign('reported_user_id')->references('id')->on('users');

            $table->foreignIdFor(Reservation::class)->constrained();

            $table->text('reason')->nullable();
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
        Schema::dropIfExists('reports');
    }
};
