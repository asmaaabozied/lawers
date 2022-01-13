@extends('layouts.admin')
@section('content')
    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
        <div class="row">
            <div class="col">
                <div class="card component-card_1">
                    <div class="card-body">
                        <div class="icon-svg">
                            <i data-feather="droplet"></i>
                        </div>
                        <h5 class="card-title">{{\App\Model\LawyerCase::all()->count()}}</h5>
                        <p class="card-text">عدد القضايا المستلمة</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card component-card_1">
                    <div class="card-body">
                        <div class="icon-svg">
                            <i data-feather="droplet"></i>
                        </div>
                        <h5 class="card-title">{{\App\Model\LawyerCase::all()->sum('price')}}</h5>
                        <p class="card-text">اتعاب جميع القضايا</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card component-card_1">
                    <div class="card-body">
                        <div class="icon-svg">
                            <i data-feather="droplet"></i>
                        </div>
                        <h5 class="card-title">{{\App\Model\Client::all()->count()}}</h5>
                        <p class="card-text">عدد العملاء</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card component-card_1">
                    <div class="card-body">
                        <div class="icon-svg">
                            <i data-feather="droplet"></i>
                        </div>
                        <h5 class="card-title">{{\App\Model\LawyerCase::all()->sum('price') - \App\Model\Payment::all()->sum('value')}}</h5>
                        <p class="card-text">المبالغ المتبقية</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col">
                <div class="card component-card_1">
                    <div class="card-body">
                        <div class="icon-svg">
                            <i data-feather="droplet"></i>
                        </div>
                        <h5 class="card-title">{{\App\Model\Payment::all()->sum('value')}}</h5>
                        <p class="card-text">المبالغ المدفوع</p>
                    </div>
                </div>
            </div>
            <div class="col"></div>
            <div class="col"></div>
            <div class="col"></div>
        </div>
    </div>
@endsection
