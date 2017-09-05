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
            $table->integer('idproducto')->nullable();
            $table->integer('cantidad')->nullable();
            $table->decimal('monto',6,2)->nullable();
            $table->string('serie')->default('000')->nullable();
            $table->string('numero')->default('00000')->nullable();
            $table->boolean('anulado')->default(false);
            $table->date('fecha')->nullable();
            $table->integer('idusuario');
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
