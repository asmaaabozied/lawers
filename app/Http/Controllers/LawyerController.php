<?php

namespace App\Http\Controllers;

use App\Model\Client;
use App\Model\Lawyer;
use Illuminate\Http\Request;

class LawyerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('lawyers.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lawyers.create');
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
            'phone' => 'required',
            'notes' => 'required',
            'email' => 'required|email',
        ], [], ['name' => 'الاسم','phone'=>'التلفون','email'=>'الايميل']);
        Lawyer::create($request->all());
        $this->actionSuccess();
        return redirect()->route('lawyers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Client $client
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $client=Lawyer::find($id);

        return view('lawyers.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Client $client
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client=Lawyer::find($id);

        return view('lawyers.edit', compact('client'));
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

        $client=Lawyer::find($id);

        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'notes' => 'required',
            'email' => 'required|email',
        ], [], ['name' => 'الاسم','phone'=>'التلفون','email'=>'الايميل']);

        $client->update($request->all());
        $this->actionSuccess();
        return redirect()->route('lawyers.index');
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
        $client=Lawyer::find($id);

        $client->delete();
        $this->actionSuccess();
        return back();
    }
}
