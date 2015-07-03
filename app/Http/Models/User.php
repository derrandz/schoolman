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

    public function auth_creates_file($array)
    {
        $file = new $this->files([
                        'name' => $array[0],
                        'path' => $array[1].'/'.$array[0],
                        'description' => $array[2]
                        ]);

        $is_file_saved = $file->save();

        if( !$is_file_saved )
        {
            return false;
        }
        else
        {
            return true;
        }
    }

}
