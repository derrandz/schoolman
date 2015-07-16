<?php

namespace App\Models\Tenants\Objects\Tenants;

use Illuminate\Database\Eloquent\Model;
use Excel;

class File extends Model
{
    
    protected $table = 'files';


    protected $fillable = ['name', 'extension', 'size', 'path', 'description'];

    public function students()
    {
        return $this->hasMany('Student');
    }   

    public function create_students()
    {
        $my_file = Excel::load($this->path);
        $results = $my_file->get();

        echo('found');
        
        foreach($results as $sheets)
        {
            foreach($sheets as $row)
            {
                $student = new Student([
                    'name'  => $row['name'],
                    'age'   => $row['age'],
                    'grade' => $row['grade'],
                ]);

                if( !$this->students()->save($student) )
                {
                    return false;
                }
            }
        }

        return true;
    }


}
