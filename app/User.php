<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Role;

class User extends Authenticatable
{
  use Notifiable;

  const PASSWORD_DEFAULT = '123456';
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'username','email', 'password'
  ];
  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
    'password','remember_token','timestamps' 
  ];
  public function passwordDefault(){
    return $this->password ==  User::PASSWORD_DEFAULT;
  }

}
