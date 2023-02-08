<?php

use App\Models\Type;
use App\Models\User;
use App\Models\Country;
use App\Models\Category;
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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->foreignIdFor(Type::class)->constrained();
            $table->foreignIdFor(Category::class)->constrained();
            $table->foreignIdFor(User::class)->constrained();

            $table->unsignedBigInteger('verified_by');
            $table->foreign('verified_by')->references('id')->on('users');

            $table->foreignIdFor(Country::class)->constrained();
            $table->string('name',100);
            $table->text('description');
            $table->boolean('auto_booking');
            $table->integer('guest_number');
            $table->integer('room_count');
            $table->integer('bed_count');
            $table->integer('bathroom_count');
            $table->double('google_lat');
            $table->double('google_lng');
            $table->string('street',100)->nullable();
            $table->string('district',100)->nullable();
            $table->string('city',100);
            $table->string('state',100)->nullable();
            $table->string('address',254);
            $table->boolean('active');
            $table->boolean('exclusive');
            $table->boolean('show_map_detail');
            $table->boolean('disable_booking');
            $table->dateTime('verified_at');
            $table->dateTime('arrival_time');
            $table->dateTime('verified_time');
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
        Schema::dropIfExists('properties');
    }
};
