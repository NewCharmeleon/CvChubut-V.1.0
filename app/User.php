<?php

namespace App;
use App\Role;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
//use App\Role;
//use App\Permission;

class User extends Authenticatable
{
  use Notifiable;

  const PASSWORD_DEFAULT = '123456';
  const ROLE_DEFAULT = '6';
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
  public function roles(){
    return $this->user->role;
  }
  public function permisos(){
    return $this->user->role;
  }
}
