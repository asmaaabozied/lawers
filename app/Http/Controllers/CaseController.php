<?php

namespace App\Http\Controllers;

use App\model\Lawercase;
use App\Model\LawyerCase;
use App\model\Statuscase;
use App\Model\Type;
use http\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//      return  auth()->user()->hasPermission('create_cases');
        return view('cases.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $statuss=Statuscase::get()->pluck('name','id');

        $clients=\App\Model\Client::get()->pluck('name','id');

        $cases=Lawercase::get()->pluck('name','id');

        $types=Type::get()->pluck('name','id');

        return view('cases.create',compact('statuss','cases','types','clients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required',
            'typecase_id'=>'required',
//            'discount'=>'required',
//
//            'number' => 'required|unique:cases,number',
//            'client_id' => 'required|exists:clients,id',
        ], [], [
            'discount'=>'الخصم',

            'code' => 'الكؤد',
            'number' => 'رقم القضية',
            'client_id' => 'العميل',
            'typecase_id'=>'النوع'
        ]);
        LawyerCase::create($request->all());
        $this->actionSuccess();


       return redirect()->route('case.index');

    }

    /**
     * Display the specified resource.
     *
     * @param LawyerCase $lawyerCase
     * @return \Illuminate\Http\Response
     */
    public function show(LawyerCase $lawyerCase)
    {
        return view('cases.show', compact('lawyerCase'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param LawyerCase $lawyerCase
     * @return \Illuminate\Http\Response
     */
    public function edit(LawyerCase $lawyerCase)
    {

        $statuss=Statuscase::get()->pluck('name','id');

        $clients=\App\Model\Client::get()->pluck('name','id');

        $cases=Lawercase::get()->pluck('name','id');

        $types=Type::get()->pluck('name','id');

        return view('cases.edit', compact('lawyerCase','statuss','cases','types','clients'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param LawyerCase $lawyerCase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LawyerCase $lawyerCase)
    {

        $request->validate([
            'code' => 'required',
            'typecase_id'=>'required',
//            'discount'=>'required',

//            'number' => 'required|unique:cases,number,' . $lawyerCase['id'],
//            'client_id' => 'required|exists:clients,id',
        ], [], [
            'discount'=>'الخصم',
            'typecase_id' => 'النوع',
            'number' => 'رقم القضية',
            'client_id' => 'العميل',
            'typecase_id'=>'النوع'

        ]);
        $lawyerCase->update($request->all());
        $this->actionSuccess();

        return redirect()->route('case.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param LawyerCase $lawyerCase
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(LawyerCase $lawyerCase)
    {
        $lawyerCase->delete();
        $this->actionSuccess();
        return back();
    }
}
