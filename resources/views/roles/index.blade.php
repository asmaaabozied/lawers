@extends('layouts.admin')
@section('title', 'الادوار')
@section('content')

        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-header d-flex justify-content-between mb-3">
                <h3>الادورا</h3>

                @if (auth()->user()->hasPermission('create_roles'))

                <a href="{{route('roles.create')}}" class="btn btn-outline-primary" title="اضافة جديد"><i data-feather="plus"></i></a>
                @else
                    <a href="#" class="btn btn-outline-primary disabled" title="اضافة جديد"><i data-feather="plus"></i></a>

                @endif


            </div>

            <div class="widget-content widget-content-area br-6">
                <div class="table-responsive mb-4 mt-4">
                    @if ($roles->count() > 0)
                    <table id="clients" class="table table-hover non-hover" style="width:100%">
                        <thead>
                        <tr>
                            <th></th>
                            <th>الاسم</th>
                            <th>الاسم المعروض</th>

                            <th>الوصف</th>
                            <th>التاريخ </th>

                            <th>اجراء</th>
                        </tr>
                        </thead>
                        <tbody>

                                @foreach ($roles as $index=>$role)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $role->name }}</td>
                                        <td>{{ $role->display_name }}</td>
                                        <td>{{ $role->description }}</td>
                                        <td>{{ isset($role->created_at) ? $role->created_at->diffForHumans() :''	 }}</td>
                                        <td class="d-flex">
                                            @if (auth()->user()->hasPermission('read_roles'))

                                            <a href="{{route('roles.show', $role->id)}}" class="text-primary mr-3"><i data-feather="eye"></i></a>
                                            @else
                                                <a href="#" class="text-primary mr-3 disabled"><i data-feather="eye"></i></a>

                                            @endif
                                                @if (auth()->user()->hasPermission('update_roles'))

                                                <a href="{{route('roles.edit', $role->id)}}" class="text-success mr-3"><i data-feather="edit"></i></a>
                                                @else
                                                    <a href="#" class="text-success mr-3 disabled"><i data-feather="edit"></i></a>

                                                @endif
                                                @if (auth()->user()->hasPermission('delete_roles'))

                                            <form action="{{route('roles.destroy',$role->id)}}" method="post" onsubmit="return confirm('هل انت  متاكد ؟')">
                                                @csrf
                                                @method('DELETE')

                                                <button class="delete-btn text-danger p-0 m-0" type="submit"><i data-feather="trash"></i></button>
                                                @else
                                                    <button class="delete-btn text-danger p-0 m-0 disabled" type="submit"><i data-feather="trash"></i></button>


                                                @endif

                                            </form>
                                        </td>


                                    </tr>

                                @endforeach
                                </tbody>

                            </table><!-- end of table -->


                         @else

                                        <h2>لايوجد اي داتا</h2>

                        @endif


                        </tbody>
                    </table>
                </div>
            </div>






            @endsection
            @push('javascript')
                <x-datatables id="clients" mass=""></x-datatables>
        @endpush
