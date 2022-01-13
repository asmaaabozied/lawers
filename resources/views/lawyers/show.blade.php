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
                    <x-show-text title="البريد" value="{{$client['email']}}"></x-show-text>
                    <x-show-text title="الهاتف" value="{{$client['phone']}}"></x-show-text>
                    <x-show-text title="الاسم" value="{{$client['name']}}"></x-show-text>

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
