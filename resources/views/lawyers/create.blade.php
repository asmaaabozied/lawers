@extends('layouts.admin')
@section('title', 'اضافة محامي جديد')
@section('content')

    <div class="col">
        <div class="widget-content widget-content-area br-6">
            <form action="{{route('lawyers.store')}}" method="post">
                @csrf
                <x-input-text name="name" value="{{old('name')}}" title="الاسم"></x-input-text>
                <x-input-text name="email" value="{{old('email')}}" title="البريد"></x-input-text>
                <x-input-text name="phone" value="{{old('phone')}}" title="الهاتف"></x-input-text>
                <div class="form-group">
                    <label for="notes">التفاصيل: </label>
                    <textarea name="notes" id="notes" cols="30" rows="10" class="form-control">{{old('notes')}}</textarea>
                </div>
                <button type="submit" class="btn btn-outline-primary">حفظ</button>
            </form>
        </div>
    </div>

@endsection
