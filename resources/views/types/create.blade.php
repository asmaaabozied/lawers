@extends('layouts.admin')
@section('title', 'اضافة نؤع قضية جديدة')
@section('content')

    <div class="col">
        <div class="widget-content widget-content-area br-6">
            <form action="{{route('Typecases.store')}}" method="post">
                @csrf
                <x-input-text name="name" value="{{old('name')}}" title="النوع"></x-input-text>

                <button type="submit" class="btn btn-outline-primary">حفظ</button>
            </form>
        </div>
    </div>

@endsection
