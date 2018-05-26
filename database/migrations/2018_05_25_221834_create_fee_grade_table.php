<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeeGradeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fee_grade', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('grade_id');
            $table->foreign('grade_id')
            ->references('id')->on('grades')
            ->onDelete('cascade');

            $table->unsignedInteger('fee_id');
            $table->foreign('fee_id')
            ->references('id')->on('fees')
            ->onDelete('cascade');

            $table->unsignedInteger('school_id');
            $table->foreign('school_id')
            ->references('id')->on('schools')
            ->onDelete('cascade');

            $table->unsignedInteger('year_id');
            $table->foreign('year_id')
            ->references('id')->on('years')
            ->onDelete('cascade');

            $table->unsignedInteger('fee_value')->default(0);
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
        Schema::dropIfExists('fee_grade');
    }
}
