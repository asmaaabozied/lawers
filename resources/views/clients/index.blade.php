@extends('layouts.admin')
@section('title', 'العملاء')
@section('content')
    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
        <div class="widget-header d-flex justify-content-between mb-3">
            <h3>العملاء</h3>
            @if (auth()->user()->hasPermission('create_Client'))
                <a href="{{route('client.create')}}" class="btn btn-outline-primary" title="اضافة جديد"><i
                        data-feather="plus"></i></a>
            @else
                <a href="#" class="btn btn-outline-primary disabled" title="اضافة جديد"><i
                        data-feather="plus"></i></a>

            @endif
        </div>
        <div class="widget-content widget-content-area br-6">
            <div class="table-responsive mb-4 mt-4">
                <table id="clients" class="table table-hover non-hover" style="width:100%">
                    <thead>
                    <tr>
                        <th></th>
                        <th>الاسم</th>
                        <th>الرقم المدني</th>
                        <th>الهاتف</th>
                        <th>عدد القضايا</th>
                        <th>المبلغ المطلوب</th>
                        <th>اجمالي المدفوع</th>
                        <th>اجمالي الباقي</th>
                        <th>اجراء</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach(\App\Model\Client::all() as $item)
                        <tr>
                            <td>{{$item['id']}}</td>
                            <td>{{$item['name']}}</td>
                            <td>{{$item['civilNo']}}</td>
                            <td>{{$item['phone']}}</td>
                            <td>{{$item->cases()->count()}}</td>
                            <td>{{$item->cases->sum('price')}}</td>
                            <td>{{$item->payments()->sum('value')}}</td>
                            <td>{{$item->cases()->sum('price') - $item->payments()->sum('value')}}</td>
                            <td class="d-flex">
                                @if (auth()->user()->hasPermission('read_Client'))

                                    <a href="{{route('client.show', $item)}}" class="text-primary mr-3"><i
                                            data-feather="eye"></i></a>
                                @else
                                    <a href="#" class="text-primary mr-3 disabled"><i
                                            data-feather="eye"></i></a>


                                @endif

                                @if (auth()->user()->hasPermission('update_Client'))
                                    <a href="{{route('client.edit', $item)}}" class="text-success mr-3"><i
                                            data-feather="edit"></i></a>

                                @else
                                    <a href="#" class="text-success mr-3 disabled"><i
                                            data-feather="edit"></i></a>

                                @endif
                                    @if (auth()->user()->hasPermission('delete_Client'))

                                    <form action="{{route('client.destroy',$item)}}" method="post"
                                      onsubmit="return confirm('هل انت  متاكد ؟')">
                                    @csrf
                                    @method('DELETE')
                                        <button class="delete-btn text-danger p-0 m-0" type="submit"><i
                                                data-feather="trash"></i></button>

                                    @else
                                        <button class="delete-btn text-danger p-0 m-0 disabled" type="submit"><i
                                                data-feather="trash"></i></button>

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
