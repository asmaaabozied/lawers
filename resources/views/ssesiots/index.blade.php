@extends('layouts.admin')
@section('title', 'الجلسات')
@section('content')
    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
        <div class="widget-header d-flex justify-content-between mb-3">
            <h3>الجلسات</h3>
            @if (auth()->user()->hasPermission('create_sessiot'))

            <a href="{{route('ssesiots.create')}}" class="btn btn-outline-primary" title="اضافة جديد"><i data-feather="plus"></i></a>
            @else
                <a href="#" class="btn btn-outline-primary disabled" title="اضافة جديد"><i data-feather="plus"></i></a>

            @endif

        </div>
        <div class="widget-content widget-content-area br-6">
            <div class="table-responsive mb-4 mt-4">
                <table id="clients" class="table table-hover non-hover" style="width:100%">
                    <thead>
                    <tr>
                        <th></th>
                        <th>الاسم</th>
                        <th>التاريخ </th>

                        <th>القضيه</th>
                        <th>المحامي</th>
                        <th>تم اxضافته</th>
                        <th>اجراء</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach(\App\Model\Ssesiot::all() as $item)
                        <tr>
                            <td>{{$item['id']}}</td>
                            <td>{{$item['name']}}</td>
                            <td>{{$item['date']}}</td>

                            <td>{{$item->cases->number ?? ''}}</td>

                            <td>{{$item->lawer->name ?? ''}}</td>
                            <td>{{ isset($item->created_at) ? $item->created_at->diffForHumans() :''	 }}</td>

                            <td class="d-flex">
                                @if (auth()->user()->hasPermission('read_sessiot'))
                                <a href="{{route('ssesiots.show', $item)}}" class="text-primary mr-3"><i data-feather="eye"></i></a>
                                @else
                                    <a href="#" class="text-primary mr-3 disabled"><i data-feather="eye"></i></a>

                                @endif
                                    @if (auth()->user()->hasPermission('update_sessiot'))
                                    <a href="{{route('ssesiots.edit', $item)}}" class="text-success mr-3"><i data-feather="edit"></i></a>
                                    @else
                                        <a href="#" class="text-success mr-3 disabled"><i data-feather="edit"></i></a>


                                    @endif
                                    @if (auth()->user()->hasPermission('delete_sessiot'))

                                        <form action="{{route('ssesiots.destroy',$item)}}" method="post" onsubmit="return confirm('هل انت  متاكد ؟')">
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
                </table>
            </div>
        </div>
    </div>
@endsection
@push('javascript')
    <x-datatables id="clients" mass=""></x-datatables>
@endpush
