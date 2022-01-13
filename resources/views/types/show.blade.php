@extends('layouts.admin')
@section('content')
    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
        <div class="widget-content widget-content-area br-6">
            <div class="row">
                <div class="col">
                    <x-show-text title="رقم القضية" :value="$lawyerCase['number']"></x-show-text>
                    <x-show-text title="نوع القضية" :value="$lawyerCase['type']"></x-show-text>
                    <x-show-text title="الاتعاب" :value="$lawyerCase['price']"></x-show-text>
                    <x-show-text title="اسم العميل" :value="$lawyerCase->client->name"></x-show-text>
                </div>
                <div class="col">
                    <x-show-text title="المدفوع" :value="$lawyerCase->payments->sum('value')"></x-show-text>
                    <x-show-text title=الباقي :value="$lawyerCase['price'] - $lawyerCase->payments->sum('value')"></x-show-text>
                    <div class="form-group">
                        <label class="font-weight-bold">الملاحظات</label>
                        <div class="border-width-2px">
                            {{$lawyerCase['notes']}}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
        <div class="widget-content widget-content-area border-top-tab br-4">
            <ul class="nav nav-tabs mb-3 mt-3" id="borderTop" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="border-top-home-tab" data-toggle="tab" href="#border-top-home" role="tab" aria-controls="border-top-home" aria-selected="true"><i data-feather="home"></i>المدفوعات</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="border-top-profile-tab" data-toggle="tab" href="#border-top-profile" role="tab" aria-controls="border-top-profile" aria-selected="false"><i data-feather="user"></i>المستندات</a>
                </li>
            </ul>
            <div class="tab-content" id="borderTopContent">
                <div class="tab-pane fade active show" id="border-top-home" role="tabpanel" aria-labelledby="border-top-home-tab">
                    @include('cases.partials._payments')
                </div>
                <div class="tab-pane fade" id="border-top-profile" role="tabpanel" aria-labelledby="border-top-profile-tab">
                    @include('cases.partials._docs')
                </div>
            </div>

        </div>
    </div>

    <button type="button" class="btn btn-warning mr-1"
            onclick="history.back();">
        <i class="fa fa-backward"></i> الرجوع
    </button>
@endsection
