<?php

use App\Models\Country;
use Spatie\Permission\Models\Role;
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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->string('code',5)->unique();
            $table->enum('dtype', ['ADMIN', 'CLIENT', 'HOST','COMPANY'])->nullable();
            $table->string('last_name',70)->nullable();
            $table->string('name');
            $table->string('first_name',100)->nullable();
            $table->string('email')->unique();
            $table->string('phone',20)->nullable();
            $table->string('phone_code',5)->nullable();
            $table->string('password',254);
            $table->string('photo')->nullable();
            $table->rememberToken();
            $table->string('app_token',254)->nullable();
            $table->string('app_token_expire_at',254)->nullable();
            $table->string('id_card',100)->nullable();
            $table->string('company_name',254)->nullable();
            $table->string('company_number',254)->nullable();
            $table->boolean('great_owner')->nullable();
            $table->dateTime('email_verified_at')->nullable();
            $table->dateTime('phone_verified_at')->nullable();
            $table->dateTime('identify_verified_at')->nullable();
            $table->timestamps();
            $table->foreignIdFor(Country::class)->constrained()->nullable();
            $table->foreignIdFor(Role::class)->constrained()->nullable();
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
