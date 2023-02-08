<?php

use App\Models\Criteria;
use App\Models\Property;
use App\Models\User;
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
        Schema::create('ratings', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->foreignIdFor(Property::class)->constrained();
            $table->foreignIdFor(User::class)->constrained();
            $table->foreignIdFor(\App\Models\Reservation::class)->constrained();
            $table->foreignIdFor(Criteria::class)->constrained();
            $table->integer('rating');
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
        Schema::dropIfExists('ratings');
    }
};
