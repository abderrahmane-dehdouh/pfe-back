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

        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('offer_id');
            $table->foreign('offer_id')->references('id')->on('offers');
            $table->bigInteger('student_id');
            $table->foreign('student_id')->references('id')->on('students');
            $table->text('rejection_motive');
            $table->date('date');
            $table->bigInteger('status');
            $table->index(['offer_id', 'student_id']);
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
