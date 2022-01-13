@extends('layouts.admin')
@section('title', 'اضافة مدفوعات المصاريف جديد')
@section('content')

    <div class="col">
        <div class="widget-content widget-content-area br-6">
            <form action="{{route('expensepayment.store')}}" method="post">
                @csrf
                <x-input-number name="value" value="{{old('value')}}" title="قيمة المبلغ"></x-input-number>
{{--                <x-input-select name="case_id" value="id" title="القضيه" oldValue="{{old('case_id')}}" hasEmptyOption="0" :collection="\App\Model\Expenses::all()" display="number"></x-input-select>--}}

                <div class="form-group ">

                    <label> القضيه</label>

                    <select class="form-control select2" name="case_id" id="parent" required>
                        <option selected disabled>please select</option>
                        @foreach( \App\Model\LawyerCase::get()->pluck('number','id') as $id => $item)
                            <option value="{{$id}}">{{$item}}</option>
                        @endforeach
                    </select>

                </div>

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
