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
    //Borramos los datos de las tablas para no tener problemas con datos erroneos
    User::truncate();
    Actividades::truncate();
    ActividadEspecifica::truncate();
    ActividadTipo::truncate();
    Carrera::truncate();
    Estudiante::truncate();
    Legajo::truncate();
    Oferente::truncate();
    Persona::truncate();
    Referente::truncate();
    RolPermiso::truncate();
    //Llamamos en orden a los Seeders para el poblado masivo de las tablas
    $this->call(UsersTableSeeder::class);
    $this->call(ActividadesTipoTableSeeder::class);
    $this->call(ActividadesTableSeeder::class);
    $this->call(ActividadesEspecificaTableSeeder::class);
    $this->call(LegajosTableSeeder::class);
    $this->call(CarrerasTableSeeder::class);
    $this->call(PersonasTableSeeder::class);
    $this->call(EstudiantesTableSeeder::class);
    $this->call(OferentesTableSeeder::class);
    $this->call(ReferentesTableSeeder::class);
  }
}
