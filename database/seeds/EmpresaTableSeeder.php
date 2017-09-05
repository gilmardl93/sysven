<?php

use Illuminate\Database\Seeder;
use App\Models\Empresa;

class EmpresaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Empresa::create(['razon_social' => 'Marketeando Tu Negocio', 'ruc' => '201015202301', 'telefono1' => '972255980', 'email' => 'gilmarmoreno1993@gmail.com', 'direccion' => 'Jr. Union 147', 'distrito' => 'Barranco']);
    }
}
