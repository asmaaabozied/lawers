@extends('layouts.admin')
@section('title', $client['name'])
@section('content')
    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
        <div class="widget-header d-flex justify-content-between mb-3">
            <h3>{{$client['name']}}</h3>
            <a href="{{route('users.index')}}" class="btn btn-outline-primary" title="اضافة جديد"><i data-feather="list"></i></a>
        </div>
        <div class="widget-content widget-content-area br-6">
            <div class="row">
                <div class="col">
                    <x-show-text title="الاسم" value="{{$client['name']}}"></x-show-text>

                    <x-show-text title="البريد" value="{{$client['email']}}"></x-show-text>
                    <x-show-text title="الهاتف" value="{{$client['phone']}}"></x-show-text>

                    <div class="form-group">
                        <label>Roles</label>
                        <select name="roles[]" class="form-control select2" multiple>
                            @foreach ($roles as $key=>$role)
                                <option value="{{ $key }}" {{ $client->hasRole($role) ? 'selected' : '' }}>
                                    {{ $role }}
                                </option>
                            @endforeach
                        </select>
                    </div>


                    <button type="button" class="btn btn-outline-primary"
                            onclick="history.back();">
                        الرجوع
                    </button>


                </div>

            </div>
        </div>
    </div>

@endsection
