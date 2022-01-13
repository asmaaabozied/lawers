@extends('layouts.admin')
@section('title', 'اضافة مستند جديد')
@section('content')

    <div class="col">
        <div class="widget-content widget-content-area br-6">
            <form action="{{route('document.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <cases-user :collection="{{\App\Model\Client::all()}}"></cases-user>
                <div class="form-group">
                    <label for="documents">المستندات</label>
                    <input type="file" class="form-control" name="docs">
                </div>
                <x-input-text value="{{old('name')}}" title="اسم المستند" name="name"></x-input-text>

                <button type="submit" class="btn btn-outline-primary">حفظ</button>
            </form>
        </div>
    </div>

@endsection
