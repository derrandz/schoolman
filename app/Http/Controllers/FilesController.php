<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use File;
Use User;
Use Student;
use Input;
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
            $files = current_user()->files;
            return view('files.index', ['files' => $files]);
        }



        public function create()
        {
           return view('files.create');
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
                        $size = $file->getClientSize();
                        $extension = $file->guessExtension();
                        $filename = 'file_uploaded_at_'.time().'_'.$file->getClientOriginalName();
                        $destinationPath = public_path().'/uploads'.'/file_upload_'.time();
                        $fullPath = $destinationPath.'/'.$filename;
                        $description = 'This should be description';
                        //Moving the file to the actual upload folders
                        $file->move($destinationPath, $filename);

                        /* 
                        | 
                        |////////////////////////////////////////
                        | User::create_file($name, $extension, $size, $path, $description) /////////////
                        |///////////////////////////////////////
                        |
                        |This Method returns the id of that newly created file in case of success, otherwise it returns false.
                        |
                        |
                        */
                        $id = current_user()->create_file($filename, $extension, $size, $fullPath, $description);
                        $my_file = File::find($id);
                        $my_file->create_students();
                        return Response::json("Success", 200);

                    }
                    else
                    {
                        return Reponse::json('The upload is not valid', 500);
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
