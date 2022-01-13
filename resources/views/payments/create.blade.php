@extends('layouts.admin')
@section('title', 'اضافة دفعة جديدة')
@section('content')

    <div class="col">
        <div class="widget-content widget-content-area br-6">
            <form action="{{route('payment.store')}}" method="post">
                @csrf
                <cases-user :collection="{{\App\Model\Client::all()}}"></cases-user>
                <x-input-number name="value" value="{{old('value')}}" title="قيمة المبلغ"></x-input-number>
                <x-input-datetime name="date" value="{{old('date')}}" title="الوقت / التاريخ"></x-input-datetime>
                <button type="submit" class="btn btn-outline-primary">حفظ</button>
            </form>
        </div>
    </div>

@endsection
