<?php

namespace App;
use Zizaco\Entrust\EntrustRole;
//use App\User;
//use Illuminate\Database\Eloquent\Model;
class Role extends EntrustRole
{
  protected $fillable = [
    'name',
    'display_name',
    'description'
];

//establecemos las relacion de muchos a muchos con el modelo User, ya que un rol
//lo pueden tener varios usuarios y un usuario puede tener varios roles
/*public function usuarios(){
  return $this->belongsToMany('App\User','permission_role')
              ->whitPivot('user_id','role_id')
              ->using(permission_role::class);  }
public function permisos(){
  return $this->belongsToMany('Permission:class','permission_role')
  ->whitPivot('user_id','role_id')
  ->using(permission_role::class);
}*/
//establecemos las relacion de muchos a muchos con el modelo User, ya que un rol
   //lo pueden tener varios usuarios y un usuario puede tener varios roles
 public function users(){
    return $this->belongsToMany('App\User');
  }
  

}
