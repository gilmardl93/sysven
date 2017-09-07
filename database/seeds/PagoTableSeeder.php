<?php

use Illuminate\Database\Seeder;
use App\Models\Pago;

class PagoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pago::create(['nombre' => 'EFECTIVO']);
        Pago::create(['nombre' => 'DEBITO']);
        Pago::create(['nombre' => 'CREDITO']);
    }
}
