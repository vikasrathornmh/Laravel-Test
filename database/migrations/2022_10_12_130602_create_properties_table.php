<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
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
            $table->uuid('uuid')->default(DB::raw('(UUID())'))->unique();
            $table->string('county');
            $table->string('country');
            $table->string('town');
            $table->longtext('description');
            $table->string('url')->nullable();
            $table->text('address');
            $table->string('postcode')->nullable();
            $table->string('image_full');
            $table->string('image_thumbnail');
            $table->decimal('latitude')->nullable();
            $table->decimal('longitude')->nullable();
            $table->integer('num_bedrooms');
            $table->integer('num_bathrooms');
            $table->string('price');
            $table->string('property_type_id');
            $table->string('type');
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
}
