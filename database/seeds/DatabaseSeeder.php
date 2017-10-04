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
        // $this->call(UsersTableSeeder::class);
        $this->call(ActividadesEspecificaTableSeeder::class);
        $this->call(ActividadesTipoTableSeeder::class);
        $this->call(ActividadesTableSeeder::class);
        $this->call(PersonasTableSeeder::class);
        $this->call(CarrerasTableSeeder::class);
        $this->call(EstudiantesTableSeeder::class);
        $this->call(OferentesTableSeeder::class);
        $this->call(ReferentesTableSeeder::class);

    }
}
