<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Excel;

class UploadedFile extends Model
{
    
    /**
     * The database table used by the model.
     *
     * @var string
     */
   // protected $table = 'records`';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'path', 'description'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */

    public function user()
    {
        return $this->belongsTo('User');
    }

    public function create_students()
    {

        $my_file = Excel::load($this->path);
        $results = $my_file->get();

        foreach($results as $sheets)
        {
            foreach($sheets as $row)
            {
                $student = new Student([
                    'name' => $row['name'],
                    'age' => $row['age'],
                    'grade' => $row['grade'],
                ]);

                if(!$student->save())
                {
                    return false;
                }
            }
        }

        return true;
    }


}
