<?php

use App\Models\Property;
use App\Models\Selection;
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
        Schema::create('selection_property', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->foreignIdFor(Selection::class)->constrained();
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
        Schema::dropIfExists('selection_property');
    }
};
