<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSanitaryRegionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sanitary_regions', function (Blueprint $table) {
            $table->increments('sanitary_region_id');
            $table->string('name');
            $table->integer('province_id');
            $table->unique(['name','province_id']);

            $table->foreign('province_id')->references('province_id')->on('provinces')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sanitary_regions');
    }
}
