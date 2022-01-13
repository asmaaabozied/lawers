@extends('layouts.admin')
@section('title', 'تعديل المحاكم / ' . $client['name'])
@section('content')

    <div class="col">
        <div class="widget-content widget-content-area br-6">
            <form action="{{route('courts.update', $client)}}" method="post">
                @csrf
                @method('PATCH')
                <x-input-text name="name" value="{{$client['name']}}" title="الاسم"></x-input-text>
                <x-input-text name="role_value" value="{{$client['role_value']}}" title="الدور"></x-input-text>

                <x-input-text name="number" value="{{$client['number']}}" title="رقم الغرفه"></x-input-text>
                <div class="form-group">
                    <label for="notes">التفاصيل: </label>
                    <textarea name="notes" id="notes" cols="30" rows="10" class="form-control">{{$client['notes']}}</textarea>
                </div>
                <button type="submit" class="btn btn-outline-primary">حفظ</button>
            </form>
        </div>
    </div>

@endsection
