<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->bigIncrements("id");
            //$table->bigInteger("rol_id")->unsigned()->nullable();
            //$table->foreign("rol_id")->references("id")->on("rols")->onDelete("set null")->onUpdate("cascade");
            $table->string("nombre");
            $table->string("direccion");
            $table->integer("telefono");
            $table->string("correo");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
