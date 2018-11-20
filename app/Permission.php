<?php 
namespace App;

//use Esensi\Model\Contracts\ValidatingModelInterface;
//use Esensi\Model\Traits\ValidatingModelTrait;
use Zizaco\Entrust\EntrustPermission;
//agregado para el borrado logico
use SoftDeletes;

class Permission extends EntrustPermission
{
  //use ValidatingModelTrait;

  //protected $throwValidationExceptions = true;
  //atributo para usar el SoftDelete
  protected $dates = ['deleted_at'];
  
  protected $fillable = [
    'name',
    'display_name',
    'description',
  ];

  protected $rules = [
    'name'      => 'required|unique:permissions',
  ];
}