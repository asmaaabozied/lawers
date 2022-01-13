@extends('layouts.admin')
@section('title', 'اضافه قرارت الجلسه')
@section('content')

    <div class="col">
        <div class="widget-content widget-content-area br-6">
            <form action="{{route('decisions.store')}}" method="post">
                @csrf
                <x-input-text name="decision" value="{{old('decision')}}" title="القرار"></x-input-text>


                <div class="form-group ">

                    <label>نوع المحكمه</label>

                    <select class="form-control select2" name="typecourt_id" id="parent" required>
                        <option selected disabled>please select</option>
                        @foreach( $courts as $id => $item)
                            <option value="{{$id}}" >{{$item}}</option>
                        @endforeach
                    </select>

                </div>


                <div class="form-group ">

                    <label>تميز البيان</label>

                    <select class="form-control select2" name="dstatement_id" id="parent" required>
                        <option selected disabled>please select</option>
                        @foreach( $courtss as $id => $item)
                            <option value="{{$id}}" >{{$item}}</option>
                        @endforeach
                    </select>

                </div>


                <button type="submit" class="btn btn-outline-primary">حفظ</button>
            </form>
        </div>
    </div>

@endsection
