<?php
//use App\User;
//use App\Referente;
//use App\Oferente;
//use App\Estudiante;
use Illuminate\Foundation\Auth\User;
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
    $this->truncateTables([
      'referentes',
      'oferentes',
      'estudiantes',
      'personas',
      'carreras',
      'legajos',
      'actividades_especifica',
      'actividades_tipo',
      'actividades',
      'users',
        ]);
  /*  Referente::truncate();
    Oferente::truncate();
    Estudiante::truncate();
    Persona::truncate();
    Carrera::truncate();
    Legajo::truncate();
    ActividadEspecifica::truncate();
    Actividades::truncate();
    ActividadTipo::truncate();
    User::truncate();*/

    //RolPermiso::truncate();
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
  public function truncateTables(array $tables)
  {
      DB::statement('SET FOREIGN_KEY_CHECKS = 0;');

      foreach ($tables as $table) {
          DB::table($table)->truncate();
      }

      DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
  }
}
