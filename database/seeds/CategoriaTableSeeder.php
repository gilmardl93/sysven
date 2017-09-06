<?php

use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categoria::create(['nombre' => 'LLAVES']);
        Categoria::create(['nombre' => 'RELOJES']);
    }
}
