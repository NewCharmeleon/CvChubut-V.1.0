<?php

namespace App;
use Zizaco\Entrust\EntrustPermission;
//use Illuminate\Database\Eloquent\Relations\Pivot;
class Permission extends EntrustPermission
{
  //protected $table = 'permission_role';
  protected $fillable = [
          'name',
          'display_name',
          'description'
      ];

     //establecemos las relacion de muchos a muchos con el modelo Role, ya que un permiso
     //lo pueden tener varios roles y un rol puede tener varios permisos
     public function roles(){
          return $this->belongsToMany('App\Role');
      }
//establecemos las relacion de muchos a muchos con el modelo User, ya que un rol
//lo pueden tener varios usuarios y un usuario puede tener varios roles
/*public function usuarios(){
  return $this->belongsTo('User:class');
              }
public function permisos(){
  return $this->belongsToMany('Permission:class','permission_role_user')
              ->withPivot('user_id', 'id');
}*/

}
