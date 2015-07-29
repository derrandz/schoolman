<?php

namespace App\DataLayer\Tenants\Repositories;

use CRUDInterface;
use File;
use TeachersRepoInterface;
use Excel;

class FilesRepository implements CRUDInterface
{
	public $attributes = ['name', 'extension', 'size', 'path', 'description'];

	public function all()
    {
    	return File::all();
    }

    public function create(array $params)
    {
        return File::create($params);
    }

    public function find($id)
    {
    	return File::find($id);
    }

    public function update($id, $params)
    {
        $file = File::find($id);

	    return $file->updateAttributes($params);
    }

    public function destroy($id)
    {
        $file = File::find($id);
        return $file->delete();
    }

    public function getUploadAttributes($file)
	{
        $size            = $file->getClientSize();
        $extension       = $file->guessExtension();
        $filename        = 'file_uploaded_at_'.time().'_'.$file->getClientOriginalName();
        $destinationPath = public_path().'/uploads'.'/file_upload_'.time();
        $fullPath        = $destinationPath.'/'.$filename;
        $description     = 'This should be description';

	    return array(
					'filename'        => $filename, 
					'destinationPath' => $destinationPath, 
					'extension'       => $extension, 
					'path'            => $fullPath, 
					'size'            => $size, 
					'description'     => $description
	    			);
    }

    public function upload($file, $attrs)
    {
	    $file->move($attrs['destinationPath'], $attrs['filename']);    	
    }
    
    public function seedTeachersFromFile($file_id)
    {
        $teachersModel = new TeachersRepoInterface;

        $file = $this->find($file_id);
        $path = $file->path;

        $my_file = Excel::load($path);
        $results = $my_file->get();
        
        foreach($results as $sheets)
        {
            foreach($sheets as $row)
            {
                $teacher = $teachersModel->create([
                                                    'first_name' => $row['first_name'],
                                                    'last_name'  => $row['last_name'],
                                                    'serialcode' => $row['serialcode'],
                                                    'birthdate'  => $row['birthdate'],
                                                    'hiredate'   => $row['hiredate'],
                                                ]);
            }
        }

        return true;
    }




    public function seedStudentsFromFile($file_id)
    {
        $teachersModel = new TeachersRepoInterface;

        $file = $this->find($file_id);
        $path = $file->path;

        $my_file = Excel::load($path);
        $results = $my_file->get();
        
        foreach($results as $sheets)
        {
            foreach($sheets as $row)
            {
                $teacher = $teachersModel->create([
                                                    'first_name' => $row['first_name'],
                                                    'last_name'  => $row['last_name'],
                                                    'serialcode' => $row['serialcode'],
                                                    'hiredate'   => $row['hiredate'],
                                                ]);
            }
        }

        return true;
    }

    public function seedSeminarsFromFile($file_id)
    {
        $teachersModel = new TeachersRepoInterface;

        $file = $this->find($file_id);
        $path = $file->path;

        $my_file = Excel::load($path);
        $results = $my_file->get();
        
        foreach($results as $sheets)
        {
            foreach($sheets as $row)
            {
                $teacher = $teachersModel->create([
                                                    'first_name' => $row['name'],
                                                    'serialcode'  => $row['serialcode'],
                                                    'serialcode' => $row['serialcode'],
                                                    'birthdate'  => $row['birthdate'],
                                                    'hiredate'   => $row['hiredate'],
                                                ]);
            }
        }

        return true;
    }

}