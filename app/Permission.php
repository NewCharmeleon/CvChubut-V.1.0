<?php

namespace App;
use App\Role;

class Permission extends Role
{
  protected $fillable = [
      'name',
      'display_name',
      'description'
  ];

 //establecemos las relacion de muchos a muchos con el modelo Role, ya que un permiso
 //lo pueden tener varios roles y un rol puede tener varios permisos
 public function usuarios(){
   return $this->belongsToMany('App\User','permission_role_user')
               ->whitPivot('role_id','id');
 }
 public function roles(){
   return $this->belongsToMany('App\Role','permission_role_user')
               ->withPivot('user_id', 'id');
}
