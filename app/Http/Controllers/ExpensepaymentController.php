<?php

namespace App\Http\Controllers;

use App\Model\Expense;
use App\Model\Expensepayment;
use App\Model\Expenses;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ExpensepaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('expensepayment.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('expensepayment.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'value' => 'required|numeric',
        ]);
        Expensepayment::create($request->all());
        $this->actionSuccess();
        return back();
        //return redirect()->route('expensecases.index');

    }

    /**
     * Display the specified resource.
     *
     * @param Expense $expense
     * @return Response
     */
    public function show($id)
    {
        $expense=Expensepayment::find($id);
        return view('expensepayment.show', compact('expense'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Expense $expense
     * @return Response
     */
    public function edit($id)
    {
        $expense=Expensepayment::find($id);

        return view('expensepayment.edit', compact('expense'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Expense $expense
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $expense=Expensepayment::find($id);
        $request->validate([
            'value' => 'required|numeric',
        ]);
        $expense->update($request->all());
        $this->actionSuccess();
        return redirect()->route('expensepayment.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Expense $expense
     * @return Response
     * @throws Exception
     */
    public function destroy($id)
    {
        $expense=Expensepayment::find($id);
        $expense->delete();
        $this->actionSuccess();
        return back();
    }
}
