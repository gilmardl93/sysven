<?php

use Illuminate\Database\Seeder;
use App\Models\Presentacion;

class PresentacionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Presentacion::create(['nombre' => 'MODELO EXCLUSIVO']);
    }
}
