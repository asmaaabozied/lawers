@extends('layouts.admin')
@section('title', $client['name'])
@section('content')
    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
        <div class="widget-header d-flex justify-content-between mb-3">
            <h3>{{$client['name']}}</h3>
            <a href="{{route('client.index')}}" class="btn btn-outline-primary" title="اضافة جديد"><i data-feather="list"></i></a>
        </div>
        <div class="widget-content widget-content-area br-6">
            <div class="row">
                <div class="col">
                    <x-show-text title="البريد" value="{{$client['email']}}"></x-show-text>
                    <x-show-text title="الهاتف" value="{{$client['phone']}}"></x-show-text>
                    <x-show-text title="الرقم الالي للعنوان" value="{{$client['auto_address']}}"></x-show-text>
                </div>
                <div class="col">
                    <x-show-text title="الرقم المدني" value="{{$client['civilNo']}}"></x-show-text>
                    <x-show-text title="الهاتف 2" value="{{$client['phone2']}}"></x-show-text>
                    <x-show-text title="رقم الجواز" value="{{$client['passportNo']}}"></x-show-text>
                </div>
            </div>

            <div class="row">
            <div class="col">

                <x-show-text title="الجنسية" value="{{$client['nationality']}}"></x-show-text>

            </div>

            </div>

            <div class="row">

                <div class="col">

                  @foreach($client->cases as $item)

                    <x-show-text title="إجمالي مصاريف القضايا" :value="$item->expensess->sum('value') ?? ''"></x-show-text>

                    <x-show-text title="مدفوعات مصاريف القضايا" :value="$item->expensepayment->sum('value') ?? ''"></x-show-text>


                    <x-show-text title="باقي مصاريف القضايا"

                                 :value="$item->expensess->sum('value') - $item->expensepayment->sum('value') ?? '' "></x-show-text>

                    @endforeach
                </div>

            </div>
        </div>
    </div>
    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
        <div class="widget-header">
            <h3>اضافة دفعة جديدة</h3>
        </div>
        <div class="widget-content widget-content-area br-6">
            <form action="{{route('payment.store')}}" method="post">
                @csrf
                <x-input-select :collection="$client->cases" value="id" name="case_id" title="رقم القضية" display="number" hasEmptyOption="0" oldValue="{{old('case_id')}}"></x-input-select>
                <x-input-number name="value" value="{{old('value')}}" title="قيمة المبلغ"></x-input-number>
                <x-input-datetime name="date" value="{{old('date')}}" title="الوقت / التاريخ"></x-input-datetime>
                <button type="submit" class="btn btn-outline-primary">حفظ</button>
                <button type="button" class="btn btn-outline-primary"
                        onclick="history.back();">
                    الرجوع
                </button>
            </form>
        </div>
    </div>



    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
        <div class="widget-content widget-content-area border-top-tab br-4">
            <ul class="nav nav-tabs mb-3 mt-3" id="borderTop" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="border-top-home-tab" data-toggle="tab" href="#border-top-home" role="tab" aria-controls="border-top-home" aria-selected="true"><i data-feather="home"></i> القضايا</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="border-top-profile-tab" data-toggle="tab" href="#border-top-profile" role="tab" aria-controls="border-top-profile" aria-selected="false"><i data-feather="user"></i>المدفوعات</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="border-top-profile-tab" data-toggle="tab" href="#docs" role="tab" aria-controls="border-top-profile" aria-selected="false"><i data-feather="user"></i>المستندات</a>
                </li>
            </ul>
            <div class="tab-content" id="borderTopContent">
                <div class="tab-pane fade active show" id="border-top-home" role="tabpanel" aria-labelledby="border-top-home-tab">
                    @include('clients.partials._cases')
                </div>
                <div class="tab-pane fade" id="border-top-profile" role="tabpanel" aria-labelledby="border-top-profile-tab">
                    @include('clients.partials._payments')
                </div>
                <div class="tab-pane fade" id="docs" role="tabpanel" aria-labelledby="border-top-profile-tab">
                    @include('clients.partials._documents')
                </div>
            </div>

        </div>
    </div>
@endsection
