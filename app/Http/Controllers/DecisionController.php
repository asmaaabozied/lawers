<?php

namespace App\Http\Controllers;

use App\Model\Client;
use App\Model\Court;
use App\model\Decision;
use App\model\Dstatement;
use App\Model\Lawyer;
use App\model\Typecourt;
use Illuminate\Http\Request;

class DecisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('decisions.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $courts=Typecourt::get()->pluck('name','id');

        $courtss=Dstatement::get()->pluck('name','id');

        return view('decisions.create',compact('courts','courtss'));
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
            'decision' => 'required',

            'typecourt_id'=>'required',

        ], [], ['name' => 'القرار']);
        Decision::create($request->all());
        $this->actionSuccess();
        return redirect()->route('decisions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Client $client
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $client = Decision::find($id);


        return view('decisions.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Client $client
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = Decision::find($id);

        $courtss=Dstatement::get()->pluck('name','id');

        $courts=Typecourt::get()->pluck('name','id');

        return view('decisions.edit', compact('client','courts','courtss'));
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

        $client = Decision::find($id);
        $request->validate([
            'decision' => 'required',

            'typecourt_id'=>'required',

        ], [], ['name' => 'القرار']);

        $client->update($request->all());
        $this->actionSuccess();
        return redirect()->route('decisions.index');
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
        $client = Decision::find($id);

        $client->delete();
        $this->actionSuccess();
        return back();
    }
}
