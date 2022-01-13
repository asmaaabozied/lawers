<table id="payments" class="table table-hover non-hover" style="width:100%">
    <thead>
    <tr>
        <th></th>
        <th>رقم القضية</th>
        <th>قيمة الدفعة</th>
        <th>التاريخ</th>

        <th>اجراء</th>
    </tr>
    </thead>
    <tbody>

    @foreach(\App\Model\Payment::all() as $item)
        <tr>
            <td>{{$item['id']}}</td>
            <td><a href="{{route('case.show', $item->case)}}">{{$item->case ? $item->case->number : ''}}</a></td>
            <td>{{$item['value']}}</td>
            <td>{{$item['date']}}</td>

            <td class="d-flex">
                <form action="{{route('payment.destroy',$item)}}" method="post" onsubmit="return confirm('هل انت  متاكد ؟')">
                    @csrf
                    @method('DELETE')
                    <button class="delete-btn text-danger p-0 m-0" type="submit"><i data-feather="trash"></i></button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@push('javascript')
    <x-datatables id="payments"></x-datatables>
@endpush
