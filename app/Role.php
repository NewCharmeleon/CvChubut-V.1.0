<?php 
namespace App;
use App\User;
//agregado para el borrado logico
use SoftDeletes;

//use Esensi\Model\Contracts\ValidatingModelInterface;
//use Esensi\Model\Traits\ValidatingModelTrait;
use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{
 // use ValidatingModelTrait;

  //protected $throwValidationExceptions = true;
  //atributo para usar el SoftDelete
  protected $dates = ['deleted_at'];
  
  protected $fillable = [
    'name',
    'display_name',
    'description',
  ];

  protected $rules = [
    'name'      => 'required|unique:roles',
    'display_name'      => 'required|unique:roles',
  ];
 
}
