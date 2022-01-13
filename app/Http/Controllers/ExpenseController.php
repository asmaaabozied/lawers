<?php

namespace App\Http\Controllers;

use App\Model\Expense;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('expenses.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('expenses.create');
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
        Expense::create($request->all());
        $this->actionSuccess();
        return redirect()->route('expense.index');

    }

    /**
     * Display the specified resource.
     *
     * @param Expense $expense
     * @return Response
     */
    public function show(Expense $expense)
    {
        return view('expenses.show', compact('expense'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Expense $expense
     * @return Response
     */
    public function edit(Expense $expense)
    {
        return view('expenses.edit', compact('expense'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Expense $expense
     * @return Response
     */
    public function update(Request $request, Expense $expense)
    {
        $request->validate([
            'value' => 'required|numeric',
        ]);
        $expense->update($request->all());
        $this->actionSuccess();
        return redirect()->route('expense.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Expense $expense
     * @return Response
     * @throws Exception
     */
    public function destroy(Expense $expense)
    {
        $expense->delete();
        $this->actionSuccess();
        return back();
    }
}
