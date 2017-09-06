<?php

use Illuminate\Database\Seeder;
use App\Models\Provedor;

class ProvedorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Provedor::create(['razon_social' => 'MARKETEANDO TU NEGOCIO', 'ruc' => '2023156489','telefono1' => '972255980', 'direccion' => 'San Genaro', 'distrito' => 'CHORRILLOS']);
    }
}
