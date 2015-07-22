<?php

namespace App\Http\Controllers\Motors\Tenants;

use FilesRepoInterface;
use Motor;

class FileMotor extends Motor
{
	public function __construct(FilesRepoInterface $model)
	{
		$this->model       = $model;
		$this->view        = 'files';
		$this->routePrefix = 'tenants';
	}

	public function store()
	{
		$request = app()->request;
		if(!$request->hasFile('file'))
		{
            return Response::json("Failed to retrieve files from request", 500);
		}

		foreach($files as $file)
		{
			if( $file->isValid() )
			{
				$attrs = $this->model->getUploadAttributes($file);
				$this->model->upload($file, [
											'destinationPath' => $attr['destinationPath'], 
											'filename'        => $attrs['filename']
											]);
                $this->model->create($attrs);	
                return Response::json("Success", 200);

			}
			else
			{
	            return Response::json("Invalid file", 500);
			}
		}
	}
}