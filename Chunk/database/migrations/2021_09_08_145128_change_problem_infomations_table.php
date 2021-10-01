<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeProblemInfomationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('problem_infomations', function (Blueprint $table) {
            //
            $table->renameColumn('big_problem_id', 'big_problems_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('problem_infomations', function (Blueprint $table) {
            //
            $table->renameColumn('big_problems_id', 'big_problem_id');
        });
    }
}
