<?php

use Illuminate\Database\Seeder;
use App\Models\Tienda;

class TiendaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tienda::create(['nombre' => 'TIENDA 01', 'direccion' => 'SAN GENARO', 'distrito' => 'CHORRILLOS']);
    }
}
