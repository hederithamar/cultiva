<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            //Datos de la tabla Usuarios
            $table->increments('id');
            $table->string('name', 50);
            $table->string('firstlastname', 45);
            $table->string('secondlastname', 45);
            $table->string('email', 50)->unique();
            $table->char('celphone', 20)->nullable();
            $table->string('password');
            $table->string('status', 10)->nullable();
            $table->string('pathperfil')->nullable();
            //Claves foranea referencia al modelo roles
            $table->integer('typeuser')->unsigned();
            //Claves foranea referencia al modelo estados
            $table->integer('state_id');
            $table->integer('municipalities_id');
            //Datos adicionales para control de datos
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
