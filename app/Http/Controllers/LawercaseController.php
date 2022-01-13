<?php

namespace App\Http\Controllers;

use App\Model\Client;
use App\Model\Court;
use App\model\Lawercase;
use App\Model\Lawyer;
use App\Model\LawyerCase;
use App\model\Typecourt;
use App\model\Typessesiot;
use Illuminate\Http\Request;

class LawercaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('lawercases.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('lawercases.create');
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
        Lawercase::create($request->all());
        $this->actionSuccess();
        return redirect()->route('lawercases.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Client $client
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $client = Lawercase::find($id);


        return view('lawercases.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Client $client
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = Lawercase::find($id);


        return view('lawercases.edit', compact('client'));
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

        $client = Lawercase::find($id);

        $request->validate([
            'name' => 'required',

        ], [], ['name' => 'الاسم']);

        $client->update($request->all());
        $this->actionSuccess();
        return redirect()->route('lawercases.index');
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
        $client = Lawercase::find($id);

        $client->delete();
        $this->actionSuccess();
        return back();
    }
}
