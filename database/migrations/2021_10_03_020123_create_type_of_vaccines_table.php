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
            $table->id();
            $table->string('nombre')->unique();
            $table->int('preffix_code')->unique();
            $table->date('time_between_doses');
            $table->date('date_of_Expiry'); 
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
