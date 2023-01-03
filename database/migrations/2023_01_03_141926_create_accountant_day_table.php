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
        Schema::create('accountant_day', function (Blueprint $table) {
            $table->id();
            $table->foreignId('accountant_id')->constrained('accountants')->cascadeOnDelete();
            $table->foreignId('day_id')->constrained('days')->cascadeOnDelete();
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
        Schema::dropIfExists('accountant_day');
    }
};
