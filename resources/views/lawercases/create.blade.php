@extends('layouts.admin')
@section('title', 'اضافة وضع القضيه')
@section('content')

    <div class="col">
        <div class="widget-content widget-content-area br-6">
            <form action="{{route('lawercases.store')}}" method="post">
                @csrf
                <x-input-text name="name" value="{{old('name')}}" title="الاسم"></x-input-text>

                <button type="submit" class="btn btn-outline-primary">حفظ</button>
            </form>
        </div>
    </div>

@endsection
