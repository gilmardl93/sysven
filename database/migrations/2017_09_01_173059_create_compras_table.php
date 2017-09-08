<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compras', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idproducto');
            $table->integer('idtipo')->nullable();
            $table->integer('idpago')->nullable();
            $table->integer('idprovedor')->nullable();
            $table->string('operacion')->nullable();
            $table->integer('cantidad')->nullable();
            $table->decimal('precio_unitario',10,2)->nullable();
            $table->decimal('importe',10,2)->nullable();
            $table->string('fecha')->nullable();
            $table->integer('iduser');
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
        Schema::dropIfExists('compras');
    }
}
