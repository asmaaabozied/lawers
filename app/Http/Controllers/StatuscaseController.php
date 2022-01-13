<?php

namespace App\Http\Controllers;

use App\Model\Client;
use App\Model\Court;
use App\model\Lawercase;
use App\Model\Lawyer;
use App\Model\LawyerCase;
use App\model\Statuscase;
use App\model\Typecourt;
use App\model\Typessesiot;
use Illuminate\Http\Request;

class StatuscaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('statuscases.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('statuscases.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $request->validate([
            'name' => 'required',

        ], [], ['name' => 'الاسم']);
        Statuscase::create($request->all());
        $this->actionSuccess();
        return redirect()->route('statuscases.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Client $client
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $client = Statuscase::find($id);


        return view('statuscases.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Client $client
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = Statuscase::find($id);


        return view('statuscases.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Client $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $client = Statuscase::find($id);

        $request->validate([
            'name' => 'required',

        ], [], ['name' => 'الاسم']);

        $client->update($request->all());
        $this->actionSuccess();
        return redirect()->route('statuscases.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Client $client
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy($id)
    {
        $client = Statuscase::find($id);

        $client->delete();
        $this->actionSuccess();
        return back();
    }
}
