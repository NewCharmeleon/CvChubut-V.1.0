<?php

namespace App;
use App\Role;
use App\Persona;
use App\Http\Requests\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;
//use App\Role;
//use App\Permission;

class User extends Authenticatable
{
  use Notifiable;
  use EntrustUserTrait; //hacemos uso del trait en la clase User para hacer uso de sus métodos


  const PASSWORD_DEFAULT = '123456';
  const ROLE_DEFAULT = '6';
   protected $table = 'users';
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'username','email','password',
  ];
  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
    'password','remember_token','timestamps',
  ];
  public function passwordDefault(){
    return $this->password ==  User::PASSWORD_DEFAULT;
  }
  public function roleDefault(){
    return $this->user->role == Role::ROLE_DEFAULT;
  }
  /*public function roles(){
    return $this->belongsToMany('App\Role','permission_role_user')
                ->whitPivot('permission_id','id');
  }
  public function permisos(){
    return $this->belongsToMany('App\Permision','permission_role_user')
                ->withPivot('role_id', 'id');
  }*/
  /*public function roles(){
    return $this->belongsToMany(Role::class, 'user_id')
      ->withPivot('user_id','role_id','name','display_name')
      ->using(RolePivot::class);
  }*/
  //establecemos las relaciones con el modelo Role, ya que un usuario puede tener varios roles
    //y un rol lo pueden tener varios usuarios
  public function roles(){
    return $this->belongsToMany('App\Role');
  }

  public function personas(){
    return $this->hasOne('Personas::class');
  }
}
