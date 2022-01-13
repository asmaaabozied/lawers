@extends('layouts.admin')
@section('title', 'اضافة صرف جديد')
@section('content')

    <div class="col">
        <div class="widget-content widget-content-area br-6">
            <form action="{{route('expense.store')}}" method="post">
                @csrf
                <x-input-number name="value" value="{{old('value')}}" title="قيمة المبلغ"></x-input-number>
                <x-input-datetime name="date" value="{{old('date')}}" title="الوقت / التاريخ"></x-input-datetime>
                <div class="form-group">
                    <label for="details">التفاصيل: </label>
                    <textarea name="details" id="details" cols="30" rows="10" class="form-control">{{old('details')}}</textarea>
                </div>
                <button type="submit" class="btn btn-outline-primary">حفظ</button>
            </form>
        </div>
    </div>

@endsection
