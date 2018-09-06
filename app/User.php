<?php 
namespace App;
use App\Role;
//use Esensi\Model\Contracts\ValidatingModelInterface;
//use Esensi\Model\Traits\ValidatingModelTrait;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\Model;
use Zizaco\Entrust\Traits\EntrustUserTrait;
//use Acoustep\EntrustGui\Contracts\HashMethodInterface;
use Hash;


class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
  use Authenticatable, CanResetPassword, EntrustUserTrait;
  
    //protected $throwValidationExceptions = true;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['username', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    protected $hashable = ['password'];

    //Metodo publico para utilizar por defecto el Dni de la Persona a cargar como Usuario
    public function hashPassword()
    {
        $this->password = Hash::make($this->persona->dni);
        $this->save();
    }
    //Metodo publico para actualizar el Password
    public function updatePassword( $value )
    {
        $this->password = Hash::make( $value );
        $this->save();
    }
    //Metodo publico para generar Username del Usuario utilizando su email
    public function updateUsername()
    {
        //convertimos el email en dos strings dentro de un array
        //, separados en el caracter '@'
        $username = explode( '@', $this->email   );
        //tomamos el primer string del array y lo asignamos al atributo dni de la persona. 
        $this->username = $username[0];
        $this->save();
    }

    //Designamos las relaciones del Modelo
    //Relacion con el Modelo Persona
    public function persona()
    {
        return $this->hasOne( Persona::class , 'user_id');

    }
    //Definicion de los Accesor al Modelo necesarios
    //Accesor que devuelve el Rol del Usuario
    public function getRolAttribute()
    {
        return $this->roles->first()->display_name;
    }
    //Accesor que devuelve la descripcion del primer Rol hallado del Usuario
    public function getRolObjectAttribute()
    {
        return $this->roles->first();
    }
    //Accesor que devuelve el nombre del Usuario
    public function getUsernameAttribute()
    {
        $nombre_usuario = $this->attributes['username'];
        //lo modificamos para que sea legible sin modificar la estandarizacion 
        //de los datos en la base de datos
        //primera letra en mayuscula
        $nombre_usuario = ucwords( $nombre_usuario);

        return $nombre_usuario;
    }


}
