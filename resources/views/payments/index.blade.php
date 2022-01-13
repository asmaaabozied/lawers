@extends('layouts.admin')
@section('title', 'الدفعات')
@section('content')
    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
        <div class="widget-header d-flex justify-content-between mb-3">
            <h3>الدفعات</h3>
            @if (auth()->user()->hasPermission('create_payment'))
            <a href="{{route('payment.create')}}" class="btn btn-outline-primary" title="اضافة جديد"><i data-feather="plus"></i></a>
            @else
                <a href="#" class="btn btn-outline-primary disabled" title="اضافة جديد"><i data-feather="plus"></i></a>

            @endif

        </div>
        <div class="widget-content widget-content-area br-6">
            <div class="table-responsive mb-4 mt-4">
                <table id="payments" class="table table-hover non-hover" style="width:100%">
                    <thead>
                    <tr>
                        <th></th>
                        <th>رقم القضية</th>
                        <th>العميل</th>
                        <th>قيمة الدفعة</th>
                        <th>التاريخ</th>
                        <th>اجراء</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach(\App\Model\Payment::all() as $item)
                        <tr>
                            <td>{{$item['id']}}</td>
                            <td>

                                <a href="{{route('case.show', $item->case)}}">{{$item->case ? $item->case->number : ''}}</a>


                            </td>
                            <td>
                                @if (auth()->user()->hasPermission('update_payment'))

                                <a href="{{route('client.show', $item->case->client)}}">{{$item->case->client ? $item->case->client->name : ''}}</a>
                                @else
                                    <a href="#">{{$item->case->client ? $item->case->client->name : ''}}</a>

                                @endif


                            </td>
                            <td>{{$item['value']}}</td>
                            <td>{{$item['date']}}</td>

                            <td class="d-flex">
                                @if (auth()->user()->hasPermission('update_payment'))

                                <a href="{{route('payment.edit', $item)}}" class="text-success mr-3"><i data-feather="edit"></i></a>
                                @else
                                    <a href="#" class="text-success mr-3 disabled"><i data-feather="edit"></i></a>

                                @endif

                                    @if (auth()->user()->hasPermission('delete_payment'))

                                    <form action="{{route('payment.destroy',$item)}}" method="post" onsubmit="return confirm('هل انت  متاكد ؟')">
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
    <x-datatables id="payments" mass=""></x-datatables>
@endpush
