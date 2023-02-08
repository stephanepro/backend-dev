<?php

use App\Models\FavoriteList;
use App\Models\Property;
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
        Schema::create('favorite_list_property', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->foreignIdFor(FavoriteList::class)->constrained();
            $table->foreignIdFor(Property::class)->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('favorite_list_property');
    }
};
