@extends('layouts.admin')
@section('title', $client['name'])
@section('content')
    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
        <div class="widget-header d-flex justify-content-between mb-3">
            <h3>{{$client['name']}}</h3>
            <a href="{{route('stages.index')}}" class="btn btn-outline-primary" title="اضافة جديد"><i data-feather="list"></i></a>
        </div>


        <div class="widget-content widget-content-area br-6">
            <div class="row">
                <div class="col">
                    <x-input-text name="name" value="{{$client->name}}" title="الاسم"></x-input-text>
                    <x-input-datetime name="date" value="{{$client->date}}" title="الوقت / التاريخ"></x-input-datetime>
                    <div class="form-group">
                        <label for="notes">التفاصيل: </label>
                        <textarea name="notes" id="notes" cols="30" rows="10" class="form-control">{{$client['notes']}}</textarea>
                    </div>
                    <button type="button" class="btn btn-outline-primary"
                            onclick="history.back();">
                        الرجوع
                    </button>
                </div>
            </div>
        </div>
    </div>



@endsection
