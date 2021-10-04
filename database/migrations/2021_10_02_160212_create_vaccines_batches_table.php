<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVaccinesBatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vaccines_batches', function (Blueprint $table) {
            $table->id();
            $table->integer('since');
            $table->integer('to');
            $table->integer('number_of_vaccines');
            $table->smallInteger('dose');
            $table->date('reception_date');

            $table->foreignId('type_of_vaccine_id')->constrained('type_of_vaccines')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vaccines_batches');
    }
}
