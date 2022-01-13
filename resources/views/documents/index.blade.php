@extends('layouts.admin')
@section('title', 'المستندات')
@section('content')
    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
        <div class="widget-header d-flex justify-content-between mb-3">
            <h3>المستندات</h3>
            @if (auth()->user()->hasPermission('create_document'))

            <a href="{{route('document.create')}}" class="btn btn-outline-primary" title="اضافة جديد"><i data-feather="plus"></i></a>
            @else
                <a href="#" class="btn btn-outline-primary disabled" title="اضافة جديد"><i data-feather="plus"></i></a>

            @endif

        </div>
        <div class="widget-content widget-content-area br-6">
            <div class="table-responsive mb-4 mt-4">
                <table id="documents" class="table table-hover non-hover" style="width:100%">
                    <thead>
                    <tr>
                        <th></th>
                        <th>القضية</th>
                        <th>اسم المستند</th>
                        <th>المستند</th>

                        <th>اجراء</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach(\App\Model\Document::all() as $item)
                        <tr>
                            <td>{{$item['id']}}</td>
                            <td>{{$item->case ? $item->case->number:''}}</td>
                            <td>{{$item['name']}}</td>
                            <td>


                                <a href="{{route('document.show', $item)}}">تحميل المستند</a>
                            </td>
                            <td class="d-flex">
                                @if (auth()->user()->hasPermission('delete_document'))

                                <form action="{{route('document.destroy',$item)}}" method="post" onsubmit="return confirm('هل انت  متاكد ؟')">
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
    <x-datatables id="documents" mass=""></x-datatables>
@endpush
