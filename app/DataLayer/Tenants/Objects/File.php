<?php

namespace App\DataLayer\Tenants\Objects;

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
                    'first_name'  => $row['first_name'],
                    'last_name'   => $row['last_name'],
                    'serialcode' => $row['serialcode'],
                    'birthdate' => $row['birthdate'],
                ]);

                if( !$this->students()->save($student) )
                {
                    return false;
                }
            }
        }

        return true;
    }


    public function isFormatValid($format)
    {
        $my_file = Excel::load($this->path);
        $results = $my_file->get();
        
        $rows = $results[0][0];

        foreach($format as $row)
        {
            if( !isset($rows[$row]) )
            {
                return false;
            }
        }

        return true;
    }

    public function isFormatValidOnAllSheets($sheetsCount, $format)
    {

    }

    public function isFormatValidOnEachSheet($sheetsCount, $formats)
    {
        $i = 1;
        
        $my_file = Excel::load($this->path);
        $results = $my_file->get();

        while ($i <= $sheetCount) 
        {
            //continue later.
        }
    }

}
