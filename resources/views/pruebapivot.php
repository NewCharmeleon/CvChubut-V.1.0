$user = User::find(1)

//obteniendo los menus asociados al User
foreach ($user->role as $role) {
//obteniendo los datos de un rol específico
echo $role->name;
echo $role->display_name;
//obteniendo datos de la tabla pivot por permiso
echo $role->pivot->permision_id;
echo $role->pivot->id;
}

//obteniendo los permisos asociados al User
foreach ($user->permission as $permission) {
//obteniendo los datos de un permiso específico
echo $permission->display_name;
//obteniendo datos de la tabla pivot por permiso
echo $permission->pivot->role_id;
echo $permission->pivot->id;
}
