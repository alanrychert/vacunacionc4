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
            $table->string('user');
            
            $table->string('email')->unique(); //esto hay que sacarlo 
            $table->timestamp('email_verified_at')->nullable();//despues cuando se personalice el login

            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

            $table->foreignId('sanitary_region_id')->constrained('sanitary_region')->onUpdate('cascade')->onDelete('cascade');
            
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
