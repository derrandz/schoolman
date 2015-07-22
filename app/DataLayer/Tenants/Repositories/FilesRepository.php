<?php

namespace App\DataLayer\Tenants\Repositories;

use CRUDInterface;
use File;

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
        $teacher = File::find($id);

	    return $teacher->updateAttributes($params);
    }

    public function destroy($id)
    {
        $teacher = File::find($id);
        return $teacher->delete();
    }

    public function getUploadAttributes($file)
	{
	    $size = $file->getClientSize();
	    $extension = $file->guessExtension();
	    $filename = 'file_uploaded_at_'.time().'_'.$file->getClientOriginalName();
	    $destinationPath = public_path().'/uploads'.'/file_upload_'.time();
	    $fullPath = $destinationPath.'/'.$filename;
	    $description = 'This should be description';

	    return array(
					'filename'        => $filename, 
					'destinationPath' => $destinationPath, 
					'extension'       => $extension, 
					'fullPath'        => $fullPath, 
					'size'            => $size, 
					'description'     => $description
	    			);
    }

    public function upload($file, $attrs)
    {
	    $file->move($attrs['destinationPath'], $attrs['filename']);    	
    }
    
    public function populateDatabaseFromFile($file_id)
    {
    	$file = $this->find($file_id);
    }
}