@extends('layouts.admin')
@section('title', 'تعديل تميز البيان / ' . $client['name'])
@section('content')

    <div class="col">
        <div class="widget-content widget-content-area br-6">
            <form action="{{route('statements.update', $client)}}" method="post">
                @csrf
                @method('PATCH')


                <x-input-text name="name" value="{{$client['name']}}" title="الاسم"></x-input-text>


                <div class="form-group ">

                    <label>نوع المحكمه</label>

                    <select class="form-control select2" name="typecourt_id" id="parent" required>
                        <option selected disabled>please select</option>
                        @foreach( $courts as $id => $item)
                            <option value="{{$id}}"   @if($client->typecourt_id ==$id) selected @endif>{{$item}}</option>
                        @endforeach
                    </select>

                </div>

                <button type="submit" class="btn btn-outline-primary">حفظ</button>
            </form>
        </div>
    </div>

@endsection
