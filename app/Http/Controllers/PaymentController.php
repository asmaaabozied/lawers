<?php

namespace App\Http\Controllers;

use App\Model\LawyerCase;
use App\Model\Payment;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('payments.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('payments.create');
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
            'case_id' => 'required|exists:cases,id',
            'value' => 'required|numeric',
            'date' => 'required|date',
        ]);
        $request['date'] = Carbon::parse($request['date']);
        $request['client_id'] = LawyerCase::find($request['case_id'])['client_id'];
        Payment::create($request->all());
        $this->actionSuccess();
        if (url()->previous() == route('client.show', $request['client_id']))
            return back();
        return redirect()->route('payment.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Payment $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        return view('payments.show', compact('payment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Payment $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        return view('payments.edit', compact('payment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Payment $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        $request->validate([
            'case_id' => 'required|exists:cases,id',
            'value' => 'required|numeric',
            'date' => 'required|date',
        ]);
        $request['date'] = Carbon::parse($request['date']);
        $request['client_id'] = LawyerCase::find($request['case_id'])['client_id'];
        $payment->update($request->all());
        $this->actionSuccess();
        return redirect()->route('payment.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Payment $payment
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Payment $payment)
    {
        $payment->delete();
        $this->actionSuccess();
        return back();
    }
}
