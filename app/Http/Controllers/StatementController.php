<?php

namespace App\Http\Controllers;

use App\Model\Client;
use App\Model\Court;
use App\Model\Dstatement;
use App\Model\Lawyer;
use App\Model\Typecourt;
use Illuminate\Http\Request;

class StatementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('statements.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $courts=Typecourt::get()->pluck('name','id');

        return view('statements.create',compact('courts'));
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

            'typecourt_id'=>'required',

        ], [], ['name' => 'الاسم']);
        Dstatement::create($request->all());
        $this->actionSuccess();
        return redirect()->route('statements.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Client $client
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $client = Dstatement::find($id);


        return view('statements.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Client $client
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = Dstatement::find($id);

        $courts=Typecourt::get()->pluck('name','id');

        return view('statements.edit', compact('client','courts'));
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

        $client = Dstatement::find($id);

        $request->validate([
            'name' => 'required',
            'typecourt_id'=>'required',

        ], [], ['name' => 'الاسم']);

        $client->update($request->all());
        $this->actionSuccess();
        return redirect()->route('statements.index');
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
        $client = Dstatement::find($id);

        $client->delete();
        $this->actionSuccess();
        return back();
    }
}
