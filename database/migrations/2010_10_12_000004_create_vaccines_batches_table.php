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
            $table->increments('batch_id');
            $table->integer('batch_number')->unique(); //se carga en el formulario
            $table->integer('since');
            $table->integer('to');
            $table->smallInteger('dose');
            $table->date('reception_date');
            $table->date('date_of_expiry'); 

            $table->integer('type_of_vaccine_id');
            $table->integer('sanitary_region_id');

            $table->foreign('sanitary_region_id')->references('sanitary_region_id')->on('sanitary_regions')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('type_of_vaccine_id')->references('type_of_vaccine_id')->on('type_of_vaccines')->onUpdate('cascade')->onDelete('cascade');
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
