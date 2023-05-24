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

        Schema::create('requests', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('student_id');
            $table->foreign('student_id')->references('id')->on('students');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('status');
            $table->string('supervisor_email');
            $table->string('supervisor_firstname');
            $table->string('supervisor_lastname');
            $table->bigInteger('duration')->nullable();
            $table->text('rejection_motife')->nullable();
            $table->string('title');
            $table->bigInteger('supervisor_id')->nullable();
            $table->foreign('supervisor_id')->references('id')->on('supervisors');
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requests');
    }
};
