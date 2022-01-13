@extends('layouts.admin')
@section('title', 'اضافة دفعة جديدة')
@section('content')

    <div class="col">
        <div class="widget-content widget-content-area br-6">
            <form action="{{route('expensepayment.update', $expense->id)}}" method="post">
                @csrf
                @method('PATCH')
                <x-input-number name="value" value="{{$expense['value']}}" title="قيمة المبلغ"></x-input-number>

{{--                <x-input-select name="case_id" value="id" title="القضيه" oldValue="{{$expense['case_id']}}" hasEmptyOption="0" :collection="\App\Model\Expenses::all()" display="number"></x-input-select>--}}
                <div class="form-group ">

                    <label> القضيه</label>

                    <select class="form-control select2" name="case_id" id="parent" required>
                        <option selected disabled>please select</option>
                        @foreach( \App\Model\LawyerCase::get()->pluck('number','id') as $id => $item)
                            <option value="{{$id}}"   @if($expense->case_id ==$id) selected @endif  >{{$item}}</option>
                        @endforeach
                    </select>

                </div>

                <x-input-datetime name="date" value="{{$expense['date']}}" title="الوقت / التاريخ"></x-input-datetime>
                <div class="form-group">
                    <label for="details">التفاصيل: </label>
                    <textarea name="details" id="details" cols="30" rows="10" class="form-control">{{$expense['details']}}</textarea>
                </div>
                <button type="submit" class="btn btn-outline-primary">حفظ</button>
            </form>
        </div>
    </div>

@endsection
