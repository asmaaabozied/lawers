@extends('layouts.admin')
@section('title', 'تعديل المحاكم / ' . $client['name'])
@section('content')

    <div class="col">
        <div class="widget-content widget-content-area br-6">
            <form action="{{route('typecourts.update', $client)}}" method="post">
                @csrf
                @method('PATCH')


                <x-input-text name="name" value="{{$client['name']}}" title="الاسم"></x-input-text>
                <x-input-text name="name2" value="{{$client['name2']}}" title="اسم الخبير"></x-input-text>

                <x-input-text name="role" value="{{$client['role']}}" title="الدور"></x-input-text>

                <x-input-text name="number" value="{{$client['number']}}" title="رقم المكتب"></x-input-text>

                <div class="form-group ">

                    <label>المحاكم</label>

                    <select class="form-control select2" name="court_id" id="parent" required>
                        <option selected disabled>please select</option>
                        @foreach( $courts as $id => $item)
                            <option value="{{$id}}"   @if($client->court_id ==$id) selected @endif>{{$item}}</option>
                        @endforeach
                    </select>

                </div>

                <button type="submit" class="btn btn-outline-primary">حفظ</button>
            </form>
        </div>
    </div>

@endsection
