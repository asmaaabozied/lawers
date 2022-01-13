@extends('layouts.admin')
@section('title', 'show roles')
@section('content')
    <div class="col">
        <div class="widget-content widget-content-area br-6">
            <form action="{{route('roles.store')}}" method="post">
                @csrf
                <x-input-text name="name" value="{{$role['name']}}" title="الاسم"></x-input-text>
                <x-input-text name="display_name" value="{{$role['display_name']}}" title="الاسم المعروض"></x-input-text>
                <x-input-text name="description" value="{{$role['description']}}" title="الوصف"></x-input-text>

                <div class="form-group">
                    <h3>الصلاحيات</h3>
                    <div class="form-group">
                        <ul class="nav ">
                            <table class="table table-hover table-bordered">


                                @foreach ($models as $index=>$model)
                                    <tr>
                                        <td>
                                            <li class="form-group {{ $index == 0 ? 'active' : '' }}">
                                                <h4>
                                                    @lang('pagination.' . $model)
                                                </h4>
                                            </li>
                                        </td>
                                        <td>

                                            <div class="form-group {{ $index == 0 ? 'active' : '' }}" id="{{ $model }}">

                                                @foreach ($maps as $map)
                                                    <label><input type="checkbox" name="permissions[]"    {{ $role->hasPermission($map . '_' . $model) ? 'checked' : '' }}    value="{{ $map . '_' . $model }}">
                                                        @lang('pagination.' . $map)
                                                    </label>


                                                @endforeach

                                            </div>
                                        </td>

                                    </tr>
                                @endforeach
                            </table>

                        </ul>

                        <button type="button" class="btn btn-outline-primary"
                                onclick="history.back();">
                            الرجوع
                        </button>

                        <div class="tab-content">

                            @foreach ($models as $index=>$model)


                            @endforeach

                        </div><!-- end of tab content -->

                    </div><!-- end of nav tabs -->

                </div>


            </form>



        </div>

    </div>

@endsection
