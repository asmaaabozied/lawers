<?php

namespace App\Http\Controllers;

use App\Model\LawyerCase;
use App\Model\Type;
use Illuminate\Http\Request;

class TypeCaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types=Type::get();

        return view('types.index',compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('types.create');
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
            'name' => 'required',

        ], [], [
            'name' => 'النوع',

        ]);
        Type::create($request->all());
        $this->actionSuccess();
        return redirect()->route('Typecases.index');

    }

    /**
     * Display the specified resource.
     *
     * @param LawyerCase $lawyerCase
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param LawyerCase $lawyerCase
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $lawyerCase= Type::find($id);

        return view('types.edit', compact('lawyerCase'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param LawyerCase $lawyerCase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $lawyerCase=Type::find($id);

        $request->validate([
            'name' => 'required',

        ], [], [
            'name' => 'النوع',

        ]);
        $lawyerCase->update($request->all());
        $this->actionSuccess();

        return redirect()->route('Typecases.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param LawyerCase $lawyerCase
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy($id)
    {
        $lawyerCase=Type::find($id);

        $lawyerCase->delete();
        $this->actionSuccess();
        return back();
    }
}
