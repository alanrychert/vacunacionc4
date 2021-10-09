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
            $table->increments('vaccine_id');
            $table->integer('vaccine_number');
            $table->integer('batch_id');
            $table->unique('batch_id','vaccine_number');
            $table->integer('vaccinated_id')->nullable();

            $table->foreign('batch_id')->references('batch_id')->on('vaccines_batches')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('vaccinated_id')->references('vaccinated_id')->on('vaccinated')->onUpdate('cascade')->onDelete('cascade')->nullable();
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
