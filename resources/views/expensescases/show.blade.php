@extends('layouts.admin')
@section('title', 'اضافة دفعة جديدة')
@section('content')

    <div class="col">
        <div class="widget-content widget-content-area br-6">
            <div class="form-group">
                <label>القيمة</label>
                <div class="form-control">{{$expense['value']}}</div>
            </div>

            <div class="form-group">
                <label>القضيه</label>
                <div class="form-control">{{$expense->lawercase->number}}</div>
            </div>

            <div class="form-group">
                <label>التاريخ والوقت</label>
                <div class="form-control">{{$expense['date']}}</div>
            </div>
            <div class="form-group">
                <label>التفاصيل</label>
                <div class="br-6 border p-3" style="width: 100%;height: 400px; overflow-y: auto">{{$expense['details']}}</div>
            </div>
            <button type="button" class="btn btn-outline-primary"
                    onclick="history.back();">
                الرجوع
            </button>
        </div>
    </div>

@endsection
