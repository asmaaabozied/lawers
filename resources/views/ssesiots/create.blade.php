@extends('layouts.admin')
@section('title', 'اضافة جلسه')
@section('content')

    <div class="col">
        <div class="widget-content widget-content-area br-6">
            <form action="{{route('ssesiots.store')}}" method="post">
                @csrf
                <x-input-text name="name" value="{{old('name')}}" title="الاسم"></x-input-text>
                <x-input-text name="decision" value="{{old('decision')}}" title="القرار"></x-input-text>
                <x-input-text name="reason" value="{{old('reason')}}" title="السبب"></x-input-text>
                <x-input-datetime name="date" value="{{old('date')}}" title="الوقت / التاريخ"></x-input-datetime>
                <x-input-datetime name="date2" value="{{old('date2')}}" title="الوقت / التاريخ"></x-input-datetime>


                    <div class="form-group ">

                        <label>القضايا</label>

                        <select class="form-control select2" name="case_id" id="parent" required>
                            <option selected disabled>please select</option>
                            @foreach($cases as $id => $item)
                                <option value="{{$id}}" >{{$item}}</option>
                            @endforeach
                        </select>

                    </div>


                <div class="form-group ">

                    <label>نوع المحكمه </label>

                    <select class="form-control select2" name="typecourt_id" id="parent" required>
                        <option selected disabled>please select</option>
                        @foreach($type as $id => $item)
                            <option value="{{$id}}" >{{$item}}</option>
                        @endforeach
                    </select>

                </div>


                <div class="form-group ">

                    <label>تميز البيان</label>

                    <select class="form-control select2" name="dstatement_id" id="parent" required>
                        <option selected disabled>please select</option>
                        @foreach($statement as $id => $item)
                            <option value="{{$id}}" >{{$item}}</option>
                        @endforeach
                    </select>

                </div>


                <div class="form-group ">

                    <label> قرار الجلسه</label>

                    <select class="form-control select2" name="decision_id" id="parent" required>
                        <option selected disabled>please select</option>
                        @foreach($decision as $id => $item)
                            <option value="{{$id}}" >{{$item}}</option>
                        @endforeach
                    </select>

                </div>


                <div class="form-group ">

                    <label>المحامي</label>

                    <select class="form-control select2" name="lawyer_id" id="parent" required>
                        <option selected disabled>please select</option>
                        @foreach( $lawers as $id => $item)
                            <option value="{{$id}}" >{{$item}}</option>
                        @endforeach
                    </select>

                </div>


                    <div class="form-group">
                    <label for="notes">التفاصيل: </label>
                    <textarea name="notes" id="notes" cols="30" rows="10" class="form-control">{{old('notes')}}</textarea>
                </div>

                <div class="form-group">
                    <label for="notes">التفاصيل2: </label>
                    <textarea name="note" id="notes" cols="30" rows="10" class="form-control">{{old('note')}}</textarea>
                </div>
                <button type="submit" class="btn btn-outline-primary">حفظ</button>
            </form>
        </div>
    </div>

@endsection
