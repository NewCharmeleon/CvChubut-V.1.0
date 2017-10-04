<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Oferente extends Model
{
  protected $table = 'oferentes';
  //
  protected $fillable = [
    'persona_id'
  ];
  public static function form(){
	  return ['persona_id' => ''];

    public function personas() {
        return $this->hasOne('Persona::class');
      }
    public function ActividadEspecifica(){
        return $this->hasMany('App\ActividadEspecifica');
    }


  }
}
