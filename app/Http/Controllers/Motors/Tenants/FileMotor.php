<?php

namespace App\Http\Controllers\Motors\Tenants;

use FilesRepoInterface;
use Motor;
use Response;

class FileMotor extends Motor
{
	public function __construct(FilesRepoInterface $model)
	{
		$this->model       = $model;
		$this->view        = 'files';
		$this->routePrefix = 'tenants';
	}

	protected function ValidateFileAndSave($files)
	{
		foreach($files as $file)
		{
			if( !$file->isValid() )
			{
	            return Response::json("Invalid file", 500);
			}

			$attrs = $this->model->getUploadAttributes($file);
			
			$this->model->upload($file, 
									[
									'destinationPath' => $attrs['destinationPath'], 
									'filename'        => $attrs['filename'],
								]);
        
            $fileObj = $this->model->create($attrs);

            if( !$this->model->seedTeachersFromFile($fileObj->id) )	
            {
            	echo 'Failed to populate database';
            }
		}

		return Response::json("Successful Upload and save", 200);
	}

	public function store()
	{
		$request = app()->request;

		//If there was no file added but still proceeded for the store action.
		if( !$request->hasFile('file') )
		{
            return Response::json("Failed to retrieve files from request", 500);
		}

		$files = $request->files;

		return $this->ValidateFileAndSave($files);
	}
}