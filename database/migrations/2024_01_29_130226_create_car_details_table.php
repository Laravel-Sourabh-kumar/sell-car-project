<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('car_details', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->text('address')->nullable();
            $table->text('rto_id');
            $table->text('bodytype_id');
            $table->text('brand_id');
            $table->text('category_id');
            $table->text('color_id');
            $table->text('seats_id');
            $table->text('spinnyhubs_id');
            
            $table->text('features');
            $table->text('price');
            $table->text('main_image')->nullable();
            $table->text('pincode')->nullable();
            $table->text('state')->nullable();
            $table->text('city')->nullable();

            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_details');
    }
};
