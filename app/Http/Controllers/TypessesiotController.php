<?php

namespace App\Http\Controllers;

use App\Model\Client;
use App\Model\Court;
use App\Model\Lawyer;
use App\model\Typecourt;
use App\model\Typessesiot;
use Illuminate\Http\Request;

class TypessesiotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('typessesiots.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        return view('typessesiots.create');
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
        Typessesiot::create($request->all());
        $this->actionSuccess();
        return redirect()->route('typessesiots.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Client $client
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $client = Typessesiot::find($id);


        return view('typessesiots.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Client $client
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = Typessesiot::find($id);


        return view('typessesiots.edit', compact('client'));
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

        $client = Typessesiot::find($id);

        $request->validate([
            'name' => 'required',

        ], [], ['name' => 'الاسم']);

        $client->update($request->all());
        $this->actionSuccess();
        return redirect()->route('typessesiots.index');
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
        $client = Typessesiot::find($id);

        $client->delete();
        $this->actionSuccess();
        return back();
    }
}
