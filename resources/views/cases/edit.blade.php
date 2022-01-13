@extends('layouts.admin')
@section('title', 'اضافة قضية جديدة')
@section('content')

    <div class="col">
        <div class="widget-content widget-content-area br-6">
            <form action="{{route('case.update', $lawyerCase)}}" method="post">
                @csrf
                @method('PATCH')
                <x-input-text name="code" value="{{$lawyerCase['code']}}" title="الكؤد"></x-input-text>
                <x-input-text name="details" value="{{$lawyerCase['details']}}" title="صفه الموكل"></x-input-text>

                <x-input-text name="discount" value="{{$lawyerCase['discount']}}" title="الخصم"></x-input-text>


                <x-input-text name="number" value="{{$lawyerCase['number']}}" title="رقم القضية"></x-input-text>
                <x-input-text name="price" value="{{$lawyerCase['price']}}" title="الاتعاب"></x-input-text>
                <x-input-text name="auto_no" value="{{$lawyerCase['auto_no']}}"
                              title="الرقم الالي للقضية"></x-input-text>

                <x-input-datetime name="date1" value="{{$lawyerCase['date1']}}"
                                  title="تاريخ استلام القضيه"></x-input-datetime>


                <x-input-datetime name="date2" value="{{$lawyerCase['date2']}}"
                                  title="تاريخ رفع الدعوه"></x-input-datetime>
                <div class="form-group ">

                    <label>العميل</label>

                    <select class="form-control select2" name="client_id" id="parent" required>
                        <option selected disabled>please select</option>
                        @foreach( $clients as $id => $item)
                            <option value="{{$id}}"  @if($lawyerCase->client_id ==$id) selected @endif >{{$item}}</option>
                        @endforeach
                    </select>

                </div>

                <div class="form-group ">

                    <label>نوع القضيه</label>

                    <select class="form-control select2" name="typecase_id" id="parent" required>
                        <option selected disabled>please select</option>
                        @foreach( $types as $id => $item)
                            <option value="{{$id}}"  @if($lawyerCase->typecase_id ==$id) selected @endif  >{{$item}}</option>
                        @endforeach
                    </select>

                </div>


                <div class="form-group ">

                    <label>حاله الدعوه</label>

                    <select class="form-control select2" name="statuscase_id" id="parent" required>
                        <option selected disabled>please select</option>
                        @foreach( $statuss as $id => $item)
                            <option value="{{$id}}" @if($lawyerCase->statuscase_id ==$id) selected @endif  >{{$item}}</option>
                        @endforeach
                    </select>

                </div>


                <div class="form-group ">

                    <label>وضع القضيه</label>

                    <select class="form-control select2" name="lawercase_id" id="parent" required>
                        <option selected disabled>please select</option>
                        @foreach( $cases as $id => $item)
                            <option value="{{$id}}"  @if($lawyerCase->lawercase_id ==$id) selected @endif  >{{$item}}</option>
                        @endforeach
                    </select>

                </div>


                <div class="row">
                    <div class="col-4">


                        <x-input-text name="number1" value="{{$lawyerCase['number1'] ?? ''}}"
                                      title="رقم القضيه اول درجه"></x-input-text>


                    </div>
                    <div class="col-4">

                        <x-input-text name="c1" value="{{$lawyerCase['c1'] ?? ''}}" title="الدائره"></x-input-text>

                    </div>
                    <div class="col-4">

                        <x-input-text name="cc1" value="{{$lawyerCase['cc1'] ?? ''}}" title="صفه الموكل"></x-input-text>

                    </div>

                </div>

                <div class="row">
                    <div class="col-4">


                        <x-input-text name="number2" value="{{$lawyerCase['number2'] ?? ''}}"
                                      title="رقم القضية في الاستئناف"></x-input-text>


                    </div>
                    <div class="col-4">

                        <x-input-text name="c2" value="{{$lawyerCase['c2'] ?? ''}}" title="الدائره"></x-input-text>

                    </div>
                    <div class="col-4">

                        <x-input-text name="cc2" value="{{$lawyerCase['cc2'] ?? ''}}" title="صفه الموكل"></x-input-text>

                    </div>

                </div>


                <div class="row">
                    <div class="col-4">


                        <x-input-text name="number3" value="{{$lawyerCase['number3'] ?? ''}}"
                                      title="رقم القضية في التمييز "></x-input-text>


                    </div>
                    <div class="col-4">

                        <x-input-text name="c3" value="{{$lawyerCase['c3'] ?? ''}}" title="الدائره"></x-input-text>

                    </div>
                    <div class="col-4">

                        <x-input-text name="cc3" value="{{$lawyerCase['cc3'] ?? ''}}" title="صفه الموكل"></x-input-text>

                    </div>

                </div>


                <x-textarea name="notes" title="ملاحظات" value="{{$lawyerCase['notes']}}"></x-textarea>
{{--                <x-textarea name="description" title="موضوع الدعوه" value="{{$lawyerCase['description']}}"></x-textarea>--}}

                <button type="submit" class="btn btn-outline-primary">حفظ</button>
            </form>
        </div>
    </div>

@endsection
