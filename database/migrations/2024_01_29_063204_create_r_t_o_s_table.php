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
        Schema::create('r_t_o_s', function (Blueprint $table) {
            $table->id();
            $table->text('rto_full_name');
            $table->text('rto_short_name');
            $table->text('rto_address')->nullable();
            $table->text('rto_pincode')->nullable();
            $table->text('rto_state')->nullable();
            $table->text('rto_city')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('r_t_o_s');
    }
};
