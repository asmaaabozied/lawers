@extends('layouts.admin')
@section('title', 'القضايا')
@section('content')
    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
        <div class="widget-header d-flex justify-content-between mb-3">
            <h3>القضايا</h3>
            @if (auth()->user()->hasPermission('create_cases'))
            <a href="{{route('case.create')}}" class="btn btn-outline-primary" title="اضافة جديد"><i data-feather="plus"></i></a>

          @else
                <a href="#" class="btn btn-outline-primary disabled" title="اضافة جديد"><i data-feather="plus"></i></a>

            @endif

        </div>
        <div class="widget-content widget-content-area br-6">
            <div class="table-responsive mb-4 mt-4">
                <table id="cases" class="table table-hover non-hover" style="width:100%">
                    <thead>
                    <tr>
                        <th></th>

                        <th>رقم القضية</th>
                        <th>الاتعاب</th>
                        <th>المدفوع</th>
                        <th>الباقي</th>
                        <th>ملاحظات</th>
                        <th>العميل</th>

                        <th>اجراء</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach(\App\Model\LawyerCase::all() as $item)
                        <tr>
                            <td>{{$item['id']}}</td>

                            <td>{{$item['number']}}</td>
                            <td>{{$item['price']}}</td>
                            <td>{{$item->payments->sum('value')}}</td>
                            <td>{{$item['price'] - $item->payments->sum('value')}}</td>
                            <td>{{Str::limit($item['notes'],50)}}</td>
                            <td>{{$item->client ? $item->client->name : ''}}</td>
                            <td class="d-flex">
                                @if (auth()->user()->hasPermission('read_cases'))
                                <a href="{{route('case.show', $item)}}" class="text-primary mr-3"><i data-feather="eye"></i></a>
                                @else
                                    <a href="#" class="text-primary mr-3 disabled"><i data-feather="eye"></i></a>

                                @endif
                                    @if (auth()->user()->hasPermission('update_cases'))
                                <a href="{{route('case.edit', $item)}}" class="text-success mr-3"><i data-feather="edit"></i></a>

                                    @else
                                        <a href="#" class="text-success mr-3 disabled"><i data-feather="edit"></i></a>
                                    @endif
                                    @if (auth()->user()->hasPermission('delete_cases'))

                                        <form action="{{route('case.destroy',$item)}}" method="post" onsubmit="return confirm('هل انت  متاكد ؟')">

                                    @csrf
                                    @method('DELETE')
                                    <button class="delete-btn text-danger p-0 m-0" type="submit"><i data-feather="trash"></i></button>

                                        </form>
                                    @else
                                        <button class="delete-btn text-danger p-0 m-0 disabled" type="submit"><i data-feather="trash"></i></button>

                                    @endif
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
    <x-datatables id="cases" mass=""></x-datatables>
@endpush
