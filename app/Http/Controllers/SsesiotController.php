<?php

namespace App\Http\Controllers;

use App\Model\Client;
use App\Model\Decision;
use App\Model\Dstatement;
use App\Model\Lawyer;
use App\Model\LawyerCase;
use App\Model\Ssesiot;
use App\Model\Typecourt;
use Illuminate\Http\Request;

class SsesiotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('ssesiots.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cases = LawyerCase::get()->pluck('number', 'id');

        $lawers = Lawyer::get()->pluck('name', 'id');

        $type=Typecourt::get()->pluck('name','id');

        $statement=Dstatement::get()->pluck('name','id');

        $decision=Decision::get()->pluck('name','id');

        return view('ssesiots.create', compact('cases', 'lawers','type','statement','decision'));
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
            'date' => 'required',
            'notes' => 'required',
            'reason' => 'required',
            'decision' => 'required',

            'case_id' => 'required',
            'lawyer_id' => 'required',

        ], [], ['name' => 'الاسم', 'date' => 'التاريخ', 'reason' => 'السبب','decision'=>'القرار','case_id'=>'القضيه','lawyer_id'=>'المحامي']);
        Ssesiot::create($request->all());
        $this->actionSuccess();
        return redirect()->route('ssesiots.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Client $client
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $client = Ssesiot::find($id);

        return view('ssesiots.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Client $client
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = Ssesiot::find($id);
        $cases = LawyerCase::get()->pluck('number', 'id');
        $lawers = Lawyer::get()->pluck('name', 'id');
        $type=Typecourt::get()->pluck('name','id');

        $statement=Dstatement::get()->pluck('name','id');

        $decision=Decision::get()->pluck('name','id');

        return view('ssesiots.edit', compact('client','cases','lawers','type','statement','decision'));
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

        $client = Ssesiot::find($id);

        $request->validate([
            'name' => 'required',
            'date' => 'required',
            'notes' => 'required',
            'reason' => 'required',
            'decision' => 'required',

            'case_id' => 'required',
            'lawyer_id' => 'required',

        ], [], ['name' => 'الاسم', 'date' => 'التاريخ', 'reason' => 'السبب','decision'=>'القرار','case_id'=>'القضيه','lawyer_id'=>'المحامي']);

        $client->update($request->all());
        $this->actionSuccess();
        return redirect()->route('ssesiots.index');
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
        $client = Ssesiot::find($id);

        $client->delete();
        $this->actionSuccess();
        return back();
    }
}
