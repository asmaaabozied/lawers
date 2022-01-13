<div class="table-responsive mb-4 mt-4">
    <table id="documents" class="table table-hover non-hover" style="width:100%">
        <thead>
        <tr>
            <th></th>
            <th>القضية</th>
            <th>المستند</th>

            <th>اجراء</th>
        </tr>
        </thead>
        <tbody>

        @foreach($client->documents as $item)
            <tr>
                <td>{{$item['id']}}</td>
                <td>{{$item->case ? $item->case->number:''}}</td>
                <td>
                    <a href="{{route('document.show', $item)}}">تحميل المستند</a>
                </td>
                <td class="d-flex">
                    <form action="{{route('document.destroy',$item)}}" method="post" onsubmit="return confirm('هل انت  متاكد ؟')">
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
    <x-datatables id="documents"></x-datatables>
@endpush
