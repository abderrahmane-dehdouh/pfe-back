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

        Schema::create('notations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('internship_id');
            $table->bigInteger('descipline');
            $table->foreign('internship_id')->references('id')->on('internships');
            $table->bigInteger('aptitude');
            $table->bigInteger('initiative');
            $table->bigInteger('innovation');
            $table->bigInteger('acquired_knowledge');
            $table->bigInteger('note');
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notations');
    }
};
