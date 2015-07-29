<?php

namespace App\Http\Controllers\Motors\Tenants;

use FilesRepoInterface;
use Motor;
use Response;
use SessionsHelper;

class FileMotor extends Motor
{
	public function __construct(FilesRepoInterface $model)
	{
		$this->model       = $model;
		$this->view        = 'tenants.files';
		$this->routePrefix = 'schools';
	}

	protected function ValidateFileAndSave($files)
	{
		$ids = array();

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
            $ids[]   =  $fileObj->id;
		}

		SessionsHelper::saveUploadedFiles($ids);

		return Response::json("SuccessUpload", 200);
	}


	public function createTeachers()
	{
		//uploaded files ids
		$file_ids = SessionsHelper::getUploadedFilesIds();

		$failures = array();
		foreach ($file_ids as $id) 
		{
			if( !$this->model->seedTeachersFromFile($id) )	
	        {
		        $failures[] = $id;
	        }
		}

		if(!empty($failures))
		{
			return Response::json('PopulationFailure', 400);
		}

        return Response::json("PopulationSuccess", 200);

	}



	public function createStudents()
	{
		//uploaded files ids
		$file_ids = SessionsHelper::getUploadedFilesIds();

		$failures = array();
		foreach ($file_ids as $id) 
		{
			if( !$this->model->seedStudentsFromFile($id) )	
	        {
		        $failures[] = $id;
	        }
		}

		if(!empty($failures))
		{
			return Response::json('PopulationFailure', 400);
		}

        return Response::json("PopulationSuccess", 200);

	}




	public function createClasses()
	{
		//uploaded files ids
		$file_ids = SessionsHelper::getUploadedFilesIds();

		$failures = array();
		foreach ($file_ids as $id) 
		{
			if( !$this->model->seedClassesFromFile($id) )	
	        {
		        $failures[] = $id;
	        }
		}

		if(!empty($failures))
		{
			return Response::json('PopulationFailure', 400);
		}

        return Response::json("PopulationSuccess", 200);

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