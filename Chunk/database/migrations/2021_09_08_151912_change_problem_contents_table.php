<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeProblemContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('problem_contents', function (Blueprint $table) {
            //
            $table->renameColumn('problem_infomation_id', 'problem_infomations_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('problem_contents', function (Blueprint $table) {
            //
            $table->renameColumn('problem_infomations_id', 'problem_infomation_id');

        });
    }
}
