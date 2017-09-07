<?php

use Illuminate\Database\Seeder;
use App\Models\Rol;

class RolTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Rol::create(['nombre' => 'ADMINISTRADOR']);
        Rol::create(['nombre' => 'COMPRAS']);
        Rol::create(['nombre' => 'VENTAS']);
        Rol::create(['nombre' => 'ALMACEN']);
    }
}
