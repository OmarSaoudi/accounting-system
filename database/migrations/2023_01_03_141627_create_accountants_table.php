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
        Schema::create('accountants', function (Blueprint $table) {
            $table->id();
            $table->text('name');//
            $table->string('email')->unique();//
            $table->string('password');
            $table->date('date_birth')->nullable();//
            $table->date('joining_date');//
            $table->string('address')->nullable();//
            $table->string('phone')->nullable();//
            $table->text('description')->nullable();
            $table->char('status', 1)->comment('A = Active, I = Inactive');
            $table->foreignId('wilaya_id')->constrained('wilayas')->cascadeOnDelete();
            $table->foreignId('gender_id')->constrained('genders')->cascadeOnDelete();
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
        Schema::dropIfExists('accountants');
    }
};
