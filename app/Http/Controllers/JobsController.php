<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JobsController extends Controller
{

    public function index()
    {

        $json = file_get_contents('https://jobs.github.com/positions.json?description=python&location=new+york');

        $data = json_decode($json);

        if (!\Gate::allows('isAdmin')) {
            abort(403, "tu n pode acessar");
        }
        return view('Jobs.index', compact('data'));

    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}