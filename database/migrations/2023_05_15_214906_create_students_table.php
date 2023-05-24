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
        Schema::disableForeignKeyConstraints();

        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('department_id')->nullable();
            $table->foreign('department_id')->references('id')->on('departments');
            $table->string('major')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->bigInteger('semestre')->nullable();
            $table->bigInteger('academic_year')->nullable();
            $table->bigInteger('phone_num')->nullable();
            $table->bigInteger('student_card_num')->nullable();
            $table->bigInteger('ssn')->nullable();
            $table->bigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
