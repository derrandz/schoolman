<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use OrganismSetup;
use Organism;
use Response;
use Session;

class OrganismsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $orgs = Organism::all();
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
        $orgs = Organism::all();

        $name = $request->input('name');
        $code = $request->input('code');

        if ( !(OrganismSetup::create(['name' => $name, 'code' => $code, 'connect' => false])) )
        {
            Session::flash('failure', 'This is a message!'); 
            return view('organisms.index', ['orgs' => $orgs]);
        }

        Session::flash('success', 'This is a message!'); 
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
        $org = Organism::find($id);

        return view('organisms.show', ['org' => $org]);
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
