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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->text('name');//1
            $table->date('date_birth')->nullable();//2
            $table->date('joining_date');//2
            $table->string('address')->nullable();//3
            $table->string('phone')->nullable();//3
            $table->string('activity')->nullable();//3
            $table->string('nif')->nullable();//4
            $table->string('nic')->nullable();//4
            $table->string('rcn')->nullable();//4
            $table->string('art')->nullable();//4
            $table->text('description')->nullable();//6
            $table->char('status', 1)->comment('A = Active, I = Inactive');//1
            $table->foreignId('wilaya_id')->constrained('wilayas')->cascadeOnDelete();//5
            $table->foreignId('gender_id')->constrained('genders')->cascadeOnDelete();//5
            $table->foreignId('department_id')->constrained('departments')->cascadeOnDelete();//5
            $table->string('year');//5
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
        Schema::dropIfExists('employees');
    }
};
