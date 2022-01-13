@extends('layouts.admin')
@section('title', 'اضافة مستخدم جديد')
@section('content')

    <div class="col">
        <div class="widget-content widget-content-area br-6">
            <form action="{{route('users.store')}}" method="post">
                @csrf
                <x-input-text name="name" value="{{old('name')}}" title="الاسم"></x-input-text>
                <x-input-text name="email" value="{{old('email')}}" title="البريد"></x-input-text>
                <x-input-text name="phone" value="{{old('phone')}}" title="الهاتف"></x-input-text>


                <div class="form-group">
                    <label>كلمه المرور</label>
                    <input type="password" name="password" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>تاكيد كلمه المرور</label>
                    <input type="password" name="c_password" class="form-control" required>
                </div>


                <div class="form-group">
                    <label>Roles</label>
                    <select name="roles[]" class="form-control select2" multiple>
                        @foreach ($roles as $key=>$role)
                            <option value="{{ $key }}" {{ old('role_id') == $key ? 'selected' : '' }}>
                                {{ $role }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-outline-primary">حفظ</button>
            </form>
        </div>
    </div>

@endsection
