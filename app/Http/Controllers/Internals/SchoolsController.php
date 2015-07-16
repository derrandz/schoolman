<?php

namespace App\Http\Controllers\Internals;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use SchoolsRepoInterface;
use SchoolsFactory;

class SchoolsController extends Controller
{
    protected $schools;

    public function __construct(SchoolsRepoInterface $school)
    {
        $this->middleware('admin');
        // $this->middleware('set_proper_database');

        $this->schools = $school;
    }
    
    public function index()
    {
        $schools = $this->schools->all();
        return view('schools.index', ['schools' => $schools]);
    }

    public function create()
    {
        return view('schools.create');
    }

    public function store(Request $request)
    {
        $schools = $this->schools->all();

        $name = $request->input('name');
        $code = $request->input('code');

        if ( !(SchoolsFactory::create(['name' => $name, 'code' => $code, 'connect' => true])) )
        {
            flash('danger', 'School could not be created for the present moment, please try later');
            return view('schools.index', ['schools' => $schools]);
        }

        flash('success', 'School was created successfully');
        return view('schools.index', ['schools' => $schools]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $school = $this->schools->find($id);

        return view('schools.show', ['schools' => $school]);
    }

    public function edit($id)
    {
        return view('schools.edit', ['school' => $this->schools->find($id)]);
    }

    public function update($id, Request $request)
    {
        $name = $request->input('name');
        $code = $request->input('code');

        $update_status = $this->schools->update($id, ['name' => $name, 'code' => $code]);

        if(!($update_status))
        {
            flash('danger', 'There was an error during the update process, please retry later.');
            return view('schools.edit');
        }

        flash('success', 'The update went successfully.');
        return view('schools.edit');


    }

    public function destroy($id)
    {
        $destroy_status = $this->schools->destroy($id);

        if(!($destroy_status))
        {
            flash('danger', 'There was an error during the deletion process, please retry later.');
            return view('schools.index');
        }

        flash('danger', 'There was an error during the update process, please retry later.');
        return view('schools.index');
    }
}
