<?php

namespace App\Http\Controllers;

use App\Model\Client;
use App\Model\Court;
use App\Model\Lawyer;
use Illuminate\Http\Request;

class CourtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('courts.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('courts.create');
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
            'role_value'=>'required',
            'number' => 'required',
            'notes' => 'required',
        ], [], ['name' => 'الاسم', 'number' => 'الرقم', 'notes' => 'التفاصيل']);
        Court::create($request->all());
        $this->actionSuccess();
        return redirect()->route('courts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Client $client
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $client = Court::find($id);

        return view('courts.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Client $client
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = Court::find($id);

        return view('courts.edit', compact('client'));
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

        $client = Court::find($id);

        $request->validate([
            'name' => 'required',
            'number' => 'required',
            'role_value'=>'required',
            'notes' => 'required',
        ], [], ['name' => 'الاسم', 'number' => 'الرقم', 'notes' => 'التفاصيل']);

        $client->update($request->all());
        $this->actionSuccess();
        return redirect()->route('courts.index');
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
        $client = Court::find($id);

        $client->delete();
        $this->actionSuccess();
        return back();
    }
}
