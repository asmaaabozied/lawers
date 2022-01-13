@extends('layouts.admin')
@section('title', 'مدفوعات المصاريف')
@section('content')
    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
        <div class="widget-header d-flex justify-content-between mb-3">
            <h3>مدفوعات المصاريف</h3>
            @if (auth()->user()->hasPermission('create_Expense'))
            <a href="{{route('expensepayment.create')}}" class="btn btn-outline-primary" title="اضافة جديد"><i data-feather="plus"></i></a>
            @else
                <a href="#" class="btn btn-outline-primary disabled" title="اضافة جديد"><i data-feather="plus"></i></a>

            @endif


        </div>
        <div class="widget-content widget-content-area br-6">
            <div class="table-responsive mb-4 mt-4">
                <table id="payments" class="table table-hover non-hover" style="width:100%">
                    <thead>
                    <tr>
                        <th>رقم مدفوعات المصاريف</th>
                        <th>القيمة</th>
                        <th>رقم القضيه</th>
                        <th>التاريخ</th>
                        <th>التفاصيل</th>
                        <th>اجراء</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach(\App\Model\Expensepayment::all() as $item)
                        <tr>
                            <td>{{$item['id']}}</td>
                            <td>{{$item['value']}}</td>

                            <td>{{$item->lawercase->number  ?? ''}}</td>

                            <td>{{$item['date']}}</td>
                            <td>{{Str::limit($item['details'], 60)}}</td>
                            <td class="d-flex">
                                @if (auth()->user()->hasPermission('read_Expense'))
                                <a href="{{route('expensepayment.show', $item)}}" class="text-primary mr-3"><i data-feather="eye"></i></a>
                                @else
                                    <a href="#" class="text-primary mr-3 disabled"><i data-feather="eye"></i></a>

                                @endif
                                    @if (auth()->user()->hasPermission('update_Expense'))
                                    <a href="{{route('expensepayment.edit', $item)}}" class="text-success mr-3"><i data-feather="edit"></i></a>
                                    @else
                                        <a href="#" class="text-success mr-3 disabled"><i data-feather="edit"></i></a>

                                    @endif
                                    @if (auth()->user()->hasPermission('delete_Expense'))


                                <form action="{{route('expensepayment.destroy',$item)}}" method="post" onsubmit="return confirm('هل انت  متاكد ؟')">
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
