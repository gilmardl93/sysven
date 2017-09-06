<?php

use Illuminate\Database\Seeder;
use App\Models\Producto;

class ProductosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Producto::create(['codigo' => '0000001', 'nombre' => '107', 'idcategoria' => 1, 'idmarca' => 1, 'idpresentacion' => 1]);
        Producto::create(['codigo' => '0000002', 'nombre' => '108', 'idcategoria' => 2, 'idmarca' => 2, 'idpresentacion' => 1]);
    }
}
