<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProblemInfomationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('problem_infomations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('big_problem_id');
            $table->text('body');
            $table->string('answer');
            $table->timestamps();

            $table->foreign('big_problem_id')
            ->references('id')
            ->on('big_problems')
            ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('problem_infomations');
    }
}
