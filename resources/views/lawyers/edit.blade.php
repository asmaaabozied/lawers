@extends('layouts.admin')
@section('title', 'تعديل المحامي / ' . $client['name'])
@section('content')

    <div class="col">
        <div class="widget-content widget-content-area br-6">
            <form action="{{route('lawyers.update', $client)}}" method="post">
                @csrf
                @method('PATCH')
                <x-input-text name="name" value="{{$client['name']}}" title="الاسم"></x-input-text>
                <x-input-text name="email" value="{{$client['email']}}" title="البريد"></x-input-text>
                <x-input-text name="phone" value="{{$client['phone']}}" title="الهاتف"></x-input-text>
                <div class="form-group">
                    <label for="notes">التفاصيل: </label>
                    <textarea name="notes" id="notes" cols="30" rows="10" class="form-control">{{$client['notes']}}</textarea>
                </div>
                <button type="submit" class="btn btn-outline-primary">حفظ</button>
            </form>
        </div>
    </div>

@endsection
