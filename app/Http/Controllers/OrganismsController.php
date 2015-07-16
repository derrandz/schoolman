<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Organism;
use User;
use Teacher;
use Sessions;

use OrganismsRepoInterface;

class OrganismsController extends Controller
{

    protected $organisms;

    public function __construct(OrganismsRepoInterface $org)
    {
        $this->middleware('admin');
        $this->middleware('set_proper_database');

        $this->organisms = $org;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $orgs = $this->organisms->all();
        return view('organisms.index', ['orgs' => $orgs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('organisms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $org = $this->organisms->all();

        $name = $request->input('name');
        $code = $request->input('code');

        if ( !(OrganismSetup::create(['name' => $name, 'code' => $code, 'connect' => true])) )
        {
            Session::flash('failure', 'This is a message!'); 
            Session::flash('flash_type', 'alert-danger'); 
            return view('organisms.index', ['orgs' => $orgs]);
        }

        Session::flash('flash_message', 'This is a message!'); 
        Session::flash('flash_type', 'alert-success'); 
        return view('organisms.index', ['orgs' => $orgs]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $users = User::all();
        $teachers = Teacher::all();
        return view('organisms.show', ['users' => $users, 'teachers' => $teachers]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    public function change_db()
    {
        $orgs = Organism::all();
    }
}
