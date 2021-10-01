<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProblemContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('problem_contents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('problem_infomation_id');
            $table->integer('row');
            $table->integer('pro1');
            $table->string('pro2');
            $table->foreign('problem_infomation_id')
                ->references('id')
                ->on('problem_infomations')
                ->onDelete('cascade');

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
        Schema::dropIfExists('problem_contents');
    }
}
