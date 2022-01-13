@extends('layouts.admin')
@section('title', $client['name'])
@section('content')
    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
        <div class="widget-header d-flex justify-content-between mb-3">
            <h3>{{$client['name']}}</h3>
            <a href="{{route('decisions.index')}}" class="btn btn-outline-primary" title="اضافة جديد"><i data-feather="list"></i></a>
        </div>
        <div class="widget-content widget-content-area br-6">
            <div class="row">
                <div class="col">
                    <x-show-text name="decision" value="{{$client['decision']}}" title="القرار"></x-show-text>

                    <x-show-text name="name" value="{{$client->statementss->name ?? ''}}" title="تميز البيان"></x-show-text>


                    <x-show-text name="number" value="{{$client->typecourt->name ?? ''}}" title="نوع المحكمه "></x-show-text>
                    <button type="button" class="btn btn-outline-primary"
                            onclick="history.back();">
                        الرجوع
                    </button>


                </div>
            </div>
        </div>
    </div>



@endsection
