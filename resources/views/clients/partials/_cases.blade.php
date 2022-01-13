<div class="table-responsive mb-4 mt-4">
    <table id="cases" class="table table-hover non-hover" style="width:100%">
        <thead>
        <tr>
            <th></th>
            <th>النوع</th>
            <th>الرقم</th>
            <th>الاتعاب</th>
            <th>المدفوع</th>
            <th>الباقي</th>
            <th>ملاحظات</th>
            <th>العميل</th>

            <th>اجراء</th>
        </tr>
        </thead>
        <tbody>

        @foreach($client->cases as $item)
            <tr>
                <td>{{$item['id']}}</td>
                <td>{{$item['type']}}</td>
                <td>{{$item['number']}}</td>
                <td>{{$item['price']}}</td>
                <td>{{$item->payments->sum('value')}}</td>
                <td>{{$item['price'] - $item->payments->sum('value')}}</td>
                <td>{{$item['notes']}}</td>
                <td>{{$item->client ? $item->client->name : ''}}</td>
                <td class="d-flex">
                    <a href="{{route('case.show', $item)}}" class="text-primary mr-3"><i data-feather="eye"></i></a>
                    <form action="{{route('case.destroy',$item)}}" method="post" onsubmit="return confirm('هل انت  متاكد ؟')">
                        @csrf
                        @method('DELETE')
                        <button class="delete-btn text-danger p-0 m-0" type="submit"><i data-feather="trash"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@push('javascript')
    <x-datatables id="cases"></x-datatables>
@endpush
