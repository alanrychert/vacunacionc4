<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\Nullable;

class CreateVaccinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vaccines', function (Blueprint $table) {
            $table->id();
            $table->integer('vaccine_number');
            $table->integer('batch_number');
            $table->integer('type_of_vaccine');
            $table->integer('vaccinated');

            $table->foreign('batch_number')->references('batch_number')->on('vaccines_batches')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('type_of_vaccine')->references('type_code')->on('type_of_vaccines')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('vaccinated')->references('dni')->on('vaccinated')->onUpdate('cascade')->onDelete('cascade')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vaccines');
    }
}
