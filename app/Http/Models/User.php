<?php

namespace App\Http\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;


class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;

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
    protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public function files()
    {
        return $this->hasMany('File');
    }

    public function create_file($name, $extension, $size, $path, $description)
    {
        $file = new File([
                        'name' => $name,
                        'extension' => $extension,
                        'size'     => $size,
                        'path' => $path,
                        'description' => $description
                        ]);

        $is_file_saved = $this->files()->save($file);
        $id = $is_file_saved->id;

        if( !($is_file_saved) )
        {
            return false;
        }
        return $id;
    }

}
