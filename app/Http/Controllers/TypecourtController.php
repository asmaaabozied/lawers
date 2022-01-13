<?php

namespace App\Http\Controllers;

use App\Model\Client;
use App\Model\Court;
use App\Model\Lawyer;
use App\model\Typecourt;
use Illuminate\Http\Request;

class TypecourtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('typecourts.index');
    }

    public function getSeessiots(Typecourt $typecourt){

        $seesiotsData = $typecourt->seessiots;
        $data = [];
        foreach ($seesiotsData as $seesiot) {
            array_push($data, [
                'name' => $seesiot->name,
                'notes' => $seesiot->notes,
                'reason' => $seesiot->reason,
                'created_at'=> isset($seesiot->created_at) ? $seesiot->created_at->diffForHumans() :''
            ]);
        }


        return response([
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $courts=Court::get()->pluck('name','id');

        return view('typecourts.create',compact('courts'));
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
            'role'=>'required',
            'court_id'=>'required',
            'number' => 'required',
            'name2' => 'required',
        ], [], ['name' => 'الاسم', 'number' => 'الرقم', 'name2' => 'اسم الخبير']);
        Typecourt::create($request->all());
        $this->actionSuccess();
        return redirect()->route('typecourts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Client $client
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $client = Typecourt::find($id);


        return view('typecourts.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Client $client
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = Typecourt::find($id);

        $courts=Court::get()->pluck('name','id');

        return view('typecourts.edit', compact('client','courts'));
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

        $client = Typecourt::find($id);

        $request->validate([
            'name' => 'required',
            'role'=>'required',
            'court_id'=>'required',
            'number' => 'required',
            'name2' => 'required',
        ], [], ['name' => 'الاسم', 'number' => 'الرقم', 'name2' => 'اسم الخبير']);

        $client->update($request->all());
        $this->actionSuccess();
        return redirect()->route('typecourts.index');
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
        $client = Typecourt::find($id);

        $client->delete();
        $this->actionSuccess();
        return back();
    }
}
