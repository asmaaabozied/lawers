@extends('layouts.admin')
@section('title', 'اضافة مراحل التقاضي جديد')
@section('content')

    <div class="col">
        <div class="widget-content widget-content-area br-6">
            <form action="{{route('stages.store')}}" method="post">
                @csrf
                <x-input-text name="name" value="{{old('name')}}" title="الاسم"></x-input-text>
                <x-input-datetime name="date" value="{{old('date')}}" title="الوقت / التاريخ"></x-input-datetime>



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
                    <textarea name="notes" id="notes" cols="30" rows="10" class="form-control">{{old('notes')}}</textarea>
                </div>
                <button type="submit" class="btn btn-outline-primary">حفظ</button>
            </form>
        </div>
    </div>

@endsection
