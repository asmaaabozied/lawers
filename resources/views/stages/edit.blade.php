@extends('layouts.admin')
@section('title', 'تعديل مراحل التقاضي / ' . $client['name'])
@section('content')

    <div class="col">
        <div class="widget-content widget-content-area br-6">
            <form action="{{route('stages.update', $client)}}" method="post">
                @csrf
                @method('PATCH')
                <x-input-text name="name" value="{{$client->name}}" title="الاسم"></x-input-text>

                <x-input-datetime name="date" value="{{$client->date}}" title="الوقت / التاريخ"></x-input-datetime>

                <div class="form-group" >
                    <label>images</label>
                    <input type="file" class="form-control"  name='images[]'>
                </div>
                <div class="form-group" >
                    <img src="{{ asset('public/uploads/images') }}" style="width: 100px"
                         class="img-thumbnail image-preview" alt="">
                </div>

                <div class="form-group">
                    <label for="notes">التفاصيل: </label>
                    <textarea name="notes" id="notes" cols="30" rows="10" class="form-control">{{$client['notes']}}</textarea>
                </div>
                <button type="submit" class="btn btn-outline-primary">حفظ</button>
            </form>
        </div>
    </div>

@endsection
