<?php

namespace App\Models\Internals\Objects;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Role;


class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;
    use EntrustUserTrait; // add this trait to your user model

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


    public function school()
    {
        return $this->belongsTo('School');
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

    public function is_admin()
    {
        return $this->hasRole(['admin']);
    }

}
