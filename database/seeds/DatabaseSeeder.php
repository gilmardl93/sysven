<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UsersTableSeeder::class);
         $this->call(EmpresaTableSeeder::class);
         $this->call(CategoriaTableSeeder::class);
         $this->call(MarcaTableSeeder::class);
         $this->call(PresentacionTableSeeder::class);
         $this->call(ProductosTableSeeder::class);
         $this->call(PagoTableSeeder::class);
         $this->call(ProvedorTableSeeder::class);
         $this->call(TipoTableSeeder::class);
         $this->call(TiendaTableSeeder::class);
         $this->call(RolTableSeeder::class);
    }
}
