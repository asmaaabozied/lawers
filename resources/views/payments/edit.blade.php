@extends('layouts.admin')
@section('title', 'تعديل')
@section('content')

    <div class="col">
        <div class="widget-content widget-content-area br-6">
            <form action="{{route('payment.update', $payment)}}" method="post">
                @csrf
                @method('PATCH')
                <cases-user :collection="{{\App\Model\Client::all()}}" :oldUser="{{$payment->case->client}}" :oldCase="{{$payment->case}}"></cases-user>
                <x-input-number name="value" value="{{$payment['value']}}" title="قيمة المبلغ"></x-input-number>
                <x-input-datetime name="date" value="{{$payment['date']}}" title="الوقت / التاريخ"></x-input-datetime>
                <button type="submit" class="btn btn-outline-primary">حفظ</button>
            </form>
        </div>
    </div>

@endsection
