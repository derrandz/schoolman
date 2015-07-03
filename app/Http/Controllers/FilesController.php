<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Models\File;
use Input;
use File;
use Response;
use Excel;
use View;

class FilesController extends Controller
{

        public function __construct()
        {
            $this->beforeFilter('@is_logged');
        }

        public function index()
        {
            $files = File::all();
            return view('uploaded_files.index', ['files' => $uploaded_files]);
        }



        public function create()
        {
           return view('uploaded_files.create');
        }

        public function store(Request $request)
        {

            $files = $request->files;

            if( $request->hasFile('file') )
            {
                foreach($files as $file)
                {
                    if ( $file->isValid() )
                    {
                        $extension = $file->getExtension();
                        $destinationPath = public_path().'/uploads'.'/file_upload_'.time();
                        $filename = 'file_uploaded_at_'.time().$file->getClientOriginalName();
                        $file->move($destinationPath, $filename);

                        //Create an record of the file in the database.
                        
                        if( $uploaded_file->create_students() )
                        {
                            return Response::json(['upload' => 'success', 'population' => 'success']);
                        }
                        else
                        {
                            return Response::json(['upload' => 'success', 'population' => 'failure']);
                        }
                    }
                    else
                    {
                        return Response::json(['upload' => 'failure', 'population' => 'failure']);    
                    }
                }
            }
            else
            {
                return Response::json('no_file_detected', 500);
            }

        }




        public function show($id)
        {
           
        }




        public function edit($id)
        {
            //
        }




        public function update($id)
        {
            //
        }




        public function delete($id)
        {


        }




        public function destroy($id)
        {
            //
        }

}
