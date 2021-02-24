<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePicksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('picks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('picker_name')->default('');
            $table->string('key')->default('');
            $table->string('team_name')->default('');
            $table->string('pick_corp')->default('');
            $table->string('pick_runn')->default('');
            $table->string('link')->default('');
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
        Schema::dropIfExists('picks');
    }
}
