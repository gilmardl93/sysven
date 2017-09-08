<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('serie')->default('001')->nullable();
            $table->string('numero')->default('00000')->nullable();
            $table->integer('idproducto')->nullable();
            $table->integer('idtipo')->nullable();
            $table->integer('idpago')->nullable();
            $table->string('descuento')->nullable();
            $table->integer('idcliente')->nullable();
            $table->integer('idtienda')->nullable();
            $table->integer('idcaja')->nullable();
            $table->integer('cantidad')->nullable();
            $table->decimal('monto',10,2)->nullable();
            $table->boolean('anulado')->default(false);
            $table->string('motivo')->nullable();
            $table->dateTime('fecha')->nullable();
            $table->integer('idusuario');
            $table->softDeletes();
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
        Schema::dropIfExists('ventas');
    }
}
