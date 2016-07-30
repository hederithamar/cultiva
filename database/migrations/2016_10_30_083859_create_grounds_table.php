<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroundsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grounds', function (Blueprint $table) {
            //Datos de la tabla Terrenos
            $table->increments('id');
            $table->string('size', 50);
            $table->string('status', 45);
            $table->string('description', 50);
            $table->string('location', 20)->nullable();
            $table->string('irrigation_system', 60);
            //Claves foranea referencia al modelo roles
            $table->integer('user_id');
            //Claves foranea referencia al modelo estados
            $table->integer('culture_id')->unsigned();
            //$table->foreign('culture_id')->references('id')->on('cultures');
            
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
        Schema::drop('grounds');
    }
}
