<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypeOfVaccinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_of_vaccines', function (Blueprint $table) {
            $table->increments('type_of_vaccine_id');
            $table->string('name')->unique();
            $table->integer('type_code')->unique();
            $table->smallInteger('days_between_doses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('type_of_vaccines');
    }
}
