<?php

use Illuminate\Database\Seeder;
use App\Models\Tipo;

class TipoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tipo::create(['nombre' => 'BOLETA']);
        Tipo::create(['nombre' => 'FACTURA']);
        Tipo::create(['nombre' => 'TICKET']);
    }
}
