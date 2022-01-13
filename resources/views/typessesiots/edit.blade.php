@extends('layouts.admin')
@section('title', 'تعديل نوع الجلسات / ' . $client['name'])
@section('content')

    <div class="col">
        <div class="widget-content widget-content-area br-6">
            <form action="{{route('typessesiots.update', $client)}}" method="post">
                @csrf
                @method('PATCH')


                <x-input-text name="name" value="{{$client['name']}}" title="الاسم"></x-input-text>

                <button type="submit" class="btn btn-outline-primary">حفظ</button>
            </form>
        </div>
    </div>

@endsection
