@extends('layouts.admin')
@section('title', 'تعديل العميل / ' . $client['name'])
@section('content')

    <div class="col">
        <div class="widget-content widget-content-area br-6">
            <form action="{{route('client.update', $client)}}" method="post">
                @csrf
                @method('PATCH')
                <x-input-text name="name" value="{{$client['name']}}" title="الاسم"></x-input-text>
                <x-input-text name="email" value="{{$client['email']}}" title="البريد"></x-input-text>
                <x-input-text name="phone" value="{{$client['phone']}}" title="الهاتف"></x-input-text>
                <x-input-text name="phone2" value="{{$client['phone2']}}" title="الهاتف البديل"></x-input-text>
                <x-input-text name="civilNo" value="{{$client['civilNo']}}" title="الرقم المدني"></x-input-text>
                <x-input-text name="auto_address" value="{{$client['auto_address']}}" title="الرقم الالي للعنوان"></x-input-text>
                <x-input-text name="nationality" value="{{$client['nationality']}}" title="الجنسية"></x-input-text>
                <x-input-text name="passportNo" value="{{$client['passportNo']}}" title="رقم الجواز"></x-input-text>
                <button type="submit" class="btn btn-outline-primary">حفظ</button>
            </form>
        </div>
    </div>

@endsection
