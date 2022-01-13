@extends('layouts.admin')
@section('title', 'اضافه تميز البيان')
@section('content')

    <div class="col">
        <div class="widget-content widget-content-area br-6">
            <form action="{{route('statements.store')}}" method="post">
                @csrf
                <x-input-text name="name" value="{{old('name')}}" title="الاسم"></x-input-text>


                <div class="form-group ">

                    <label>نوع المحكمه</label>

                    <select class="form-control select2" name="typecourt_id" id="parent" required>
                        <option selected disabled>please select</option>
                        @foreach( $courts as $id => $item)
                            <option value="{{$id}}" >{{$item}}</option>
                        @endforeach
                    </select>

                </div>

                <button type="submit" class="btn btn-outline-primary">حفظ</button>
            </form>
        </div>
    </div>

@endsection
