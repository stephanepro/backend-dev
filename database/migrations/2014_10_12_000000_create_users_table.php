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
        Schema::create('users', function (Blueprint $table) {

            $table->id();
            $table->uuid();
            $table->string('code',5)->unique();
            $table->enum('dtype', ['', '', ''])->default();
            $table->string('last_name',70);
            $table->string('first_name',100);
            $table->string('email')->unique();
            $table->string('phone',20);
            $table->string('phone_code',5);
            $table->string('password',254);
            $table->string('username',50);
            $table->string('photo');
            $table->string('remember_token',254);
            $table->string('app_token',254);
            $table->string('app_token_expire_at',254);
            $table->string('id_card',100);
            $table->string('company_name',254);
            $table->string('compagny_number',254);
            $table->boolean('great_owner');

             $table->dateTime('email_verified_at')->nullable();
            $table->dateTime('phone_verified_at')->nullable();
            $table->dateTime('identify_verified_at')->nullable();

            //$table->rememberToken();
            $table->timestamps();

            $table->foreignIdFor(Country::class)->constrained();
            $table->foreignIdFor(Role::class)->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
