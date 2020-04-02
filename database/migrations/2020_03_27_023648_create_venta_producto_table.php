<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentaProductoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venta_producto', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->bigInteger("venta_id")->unsigned();
            $table->foreign("venta_id")->references("id")->on("ventas");
            $table->bigInteger("producto_id")->unsigned();
            $table->foreign("producto_id")->references("id")->on("productos");
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
        Schema::dropIfExists('venta_producto');
    }
}
