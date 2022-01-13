@extends('layouts.admin')
@section('title', $client['name'])
@section('content')
    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
        <div class="widget-header d-flex justify-content-between mb-3">
            <h3>{{$client['name']}}</h3>
            <a href="{{route('lawyers.index')}}" class="btn btn-outline-primary" title="اضافة جديد"><i data-feather="list"></i></a>
        </div>


        <div class="widget-content widget-content-area br-6">
            <div class="row">
                <div class="col">
                    <x-input-text name="name" value="{{$client->name}}" title="الاسم"></x-input-text>
                    <x-input-text name="decision" value="{{$client->decision}}" title="القرار"></x-input-text>
                    <x-input-text name="reason" value="{{$client->reason}}" title="السبب"></x-input-text>
                    <x-input-datetime name="date2" value="{{$client->date2}}" title="الوقت / التاريخ"></x-input-datetime>

                    <x-input-datetime name="date" value="{{$client->date}}" title="الوقت / التاريخ"></x-input-datetime>
                    <x-input-text name="case_id" value="{{$client->cases->number?? ''}}" title="القضايا"></x-input-text>
                    <x-input-text name="lawyer_id" value="{{$client->lawer->name ?? ''}}" title="المحامي"></x-input-text>


                    <x-input-text name="lawyer_id" value="{{$client->statement->name ?? ''}}" title="تميز البيان"></x-input-text>

                    <x-input-text name="lawyer_id" value="{{$client->decision->decision ?? ''}}" title="قرار الجلسه"></x-input-text>

                    <x-input-text name="lawyer_id" value="{{$client->type->name ?? ''}}" title="نوع المحكمه"></x-input-text>



                    <div class="form-group">
                        <label for="notes">التفاصيل: </label>
                        <textarea name="notes" id="notes" cols="30" rows="10" class="form-control">{{$client['notes']}}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="notes">التفاصيل: </label>
                        <textarea name="note" id="note" cols="30" rows="10" class="form-control">{{$client['note']}}</textarea>
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
