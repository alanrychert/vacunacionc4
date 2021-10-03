<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVaccinatedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vaccinated', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('last_name');
            $table->integer('dni')->unique();
            $table->string('comorbidity');
            $table->char('sex');
            $table->date('date_of_birth');
            $table->date('date_of_vaccination');

            $table->foreignId('applied_vaccine_id')->constrained('applied_vaccines')->onUpdate('cascade')->onDelete('cascade');
        });
        /*Nombre
        ● Apellido
        ● DNI
        ● Comorbilidad (campo de texto)
        ● Sexo
        ● Fecha de Nacimiento
        ● Código de Vacuna
        ● Fecha de vacunación
        ● Vencimiento de vacuna*/
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vaccinated');
    }
}
