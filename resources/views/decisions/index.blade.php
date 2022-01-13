@extends('layouts.admin')
@section('title', 'قرارت الجلسه')
@section('content')
    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
        <div class="widget-header d-flex justify-content-between mb-3">
            <h3> قرارت الجلسه</h3>

            @if (auth()->user()->hasPermission('create_Decision'))
            <a href="{{route('decisions.create')}}" class="btn btn-outline-primary" title="اضافة جديد"><i data-feather="plus"></i></a>
            @else
                <a href="#" class="btn btn-outline-primary disabled"  title="اضافة جديد"><i data-feather="plus"></i></a>

            @endif

        </div>
        <div class="widget-content widget-content-area br-6">
            <div class="table-responsive mb-4 mt-4">
                <table id="clients" class="table table-hover non-hover" style="width:100%">
                    <thead>
                    <tr>
                        <th></th>
                        <th>اسم البيان</th>

                        <th>القرار</th>

                        <th> نوع المحكمه </th>

                        <th>تم اضافته</th>

                        <th>اجراء</th>
                    </tr>
                    </thead>
                    <tbody>


                    @foreach(\App\Model\Decision::all() as $item)
                        <tr>
                            <td>{{$item['id']}}</td>
                            <td>{{$item->statementss->name ?? ''}}</td>
                            <td>{{$item['decision']}}</td>
                            <td>{{$item->typecourt->name ?? ''}}</td>
                            <td>{{ isset($item->created_at) ? $item->created_at->diffForHumans() :''	 }}</td>


                            <td class="d-flex">
                                @if (auth()->user()->hasPermission('read_Decision'))

                                <a href="{{route('decisions.show', $item)}}" class="text-primary mr-3"><i data-feather="eye"></i></a>
                                @else
                                    <a href="#" class="text-primary mr-3 disabled"><i data-feather="eye"></i></a>

                                @endif
                                    @if (auth()->user()->hasPermission('update_Decision'))
                                    <a href="{{route('decisions.edit', $item)}}" class="text-success mr-3"><i data-feather="edit"></i></a>
                                    @else
                                        <a href="#" class="text-success mr-3 disabled"><i data-feather="edit"></i></a>

                                    @endif

                                    @if (auth()->user()->hasPermission('delete_Decision'))

                                        <form action="{{route('decisions.destroy',$item)}}" method="post" onsubmit="return confirm('هل انت  متاكد ؟')">
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
