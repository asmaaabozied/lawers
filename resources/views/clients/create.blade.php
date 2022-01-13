@extends('layouts.admin')
@section('title', 'اضافة عميل جديد')
@section('content')

    <div class="col">
        <div class="widget-content widget-content-area br-6">
            <form action="{{route('client.store')}}" method="post">
                @csrf
                <x-input-text name="name" value="{{old('name')}}" title="الاسم"></x-input-text>
                <x-input-text name="email" value="{{old('email')}}" title="البريد"></x-input-text>
                <x-input-text name="phone" value="{{old('phone')}}" title="الهاتف"></x-input-text>
                <x-input-text name="phone2" value="{{old('phone2')}}" title="الهاتف البديل"></x-input-text>
                <x-input-text name="civilNo" value="{{old('civilNo')}}" title="الرقم المدني"></x-input-text>
                <x-input-text name="auto_address" value="{{old('civilNo')}}" title="الرقم الالي للعنوان"></x-input-text>
                <x-input-text name="nationality" value="{{old('civilNo')}}" title="الجنسية"></x-input-text>
                <x-input-text name="passportNo" value="{{old('civilNo')}}" title="رقم الجواز"></x-input-text>
                <button type="submit" class="btn btn-outline-primary">حفظ</button>
            </form>
        </div>
    </div>

@endsection
