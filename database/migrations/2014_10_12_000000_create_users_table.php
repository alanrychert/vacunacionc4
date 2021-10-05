<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('last_name');
            $table->integer('dni')->unique();
            $table->string('user')->unique();
            
            $table->string('email')->unique(); //esto hay que sacarlo 
            $table->timestamp('email_verified_at')->nullable();//despues cuando se personalice el login

            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

            $table->string('sanitary_region_province');
            $table->string('sanitary_region_code');

            $table->foreign('sanitary_region_province')->references('province')->on('sanitary_regions')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('sanitary_region_province')->references('code')->on('sanitary_regions')->onUpdate('cascade')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
