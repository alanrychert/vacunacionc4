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
            $table->integer('batch_number')->unique(); //se carga en el formulario
            $table->integer('since');
            $table->integer('to');
            $table->smallInteger('dose');
            $table->date('reception_date');
            $table->string('name');

            $table->foreign('name')->references('name')->on('sanitary_regions')->onUpdate('cascade')->onDelete('cascade');
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
