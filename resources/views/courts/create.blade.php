@extends('layouts.admin')
@section('title', 'اضافة المحاكم جديد')
@section('content')

    <div class="col">
        <div class="widget-content widget-content-area br-6">
            <form action="{{route('courts.store')}}" method="post">
                @csrf
                <x-input-text name="name" value="{{old('name')}}" title="الاسم"></x-input-text>
                <x-input-text name="role_value" value="{{old('role_value')}}" title="الدور"></x-input-text>

                <x-input-text name="number" value="{{old('number')}}" title="رقم الغرفه"></x-input-text>
                <div class="form-group">
                    <label for="notes">التفاصيل: </label>
                    <textarea name="notes" id="notes" cols="30" rows="10" class="form-control">{{old('notes')}}</textarea>
                </div>
                <button type="submit" class="btn btn-outline-primary">حفظ</button>
            </form>
        </div>
    </div>

@endsection
