<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResultsUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results_users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('results');
            $table->integer('uncorrect');
            $table->integer('attempts');
            $table->integer('percentage');
            $table->stting('name_lectures');
            $table->integer('user_id');
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
        Schema::dropIfExists('results_users');
    }
}
