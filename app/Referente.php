<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Referente extends Model
{
    protected $table = 'referentes';
    //
    protected $fillable = [
      'persona', 'rol',
    ];
	public static function form(){
	  return [];

    public function personas() {
        return $this->hasOne('Persona::class');
      }
    public function ActividadEspecifica(){
        return $this->hasMany('App\ActividadEspecifica');
    } 

  }
}
