@props(['id'=>'', 'mass'=>''])
<script>
    c1 = $('#{{$id}}').DataTable({
        headerCallback: function (e, a, t, n, s) {
            e.getElementsByTagName("th")[0].innerHTML = '<label class="new-control new-checkbox checkbox-outline-info m-auto">\n<input type="checkbox" class="new-control-input chk-parent select-customers-info" id="customer-all-info">\n<span class="new-control-indicator"></span><span style="visibility:hidden">c</span>\n</label>'
        },
        columnDefs: [{
            targets: 0, width: "30px", className: "", orderable: !1, render: function (e, a, t, n) {
                return '<label class="new-control new-checkbox checkbox-outline-info  m-auto">\n<input type="checkbox" class="new-control-input child-chk select-customers-info" id="customer-all-info">\n<span class="new-control-indicator"></span><span style="visibility:hidden">c</span>\n</label>'
            }
        }],
        select: {
            style: 'multi',
            selector: '.child-chk'
        },
        rowId: 0,
        dom: 'lBfrtip<"actions">',
        buttons: [
            {
                extend: 'copy',
                className: 'btn btn-primary',
                text: 'نسخ',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'excel',
                className: 'btn btn-primary',
                text: 'اكسيل',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'pdf',
                className: 'btn btn-primary',
                text: 'PDF',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'print',
                className: 'btn btn-primary',
                text: 'طباعة',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                className: 'btn btn-danger',
                text: 'حذف المحدد',
                action: function (e, dt, node, config) {
                    if (confirm('هل انت متاكد؟')) {
                        ids = [];
                        c1.rows({selected: true}).ids().each(function (e) {
                            ids.push(e);
                        });
                        $.ajax({
                            method: "POST",
                            url: '{{$mass}}',
                            data: {
                                ids,
                                _token: "{{csrf_token()}}",
                                _method: "DELETE"
                            },
                            success: function () {
                                c1.rows({selected: true}).remove().draw();
                            }
                        });
                    }
                }
            }
        ],
        language: {
            "decimal": "",
            "emptyTable": "لا توجد بيانات",
            "info": "عرض _START_ الي _END_ من _TOTAL_ مدخل",
            "infoEmpty": "عرض 0 الي 0 من 0 مدخل",
            "infoFiltered": "(filtered from _MAX_ total entries)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "عرض _MENU_ صف",
            "loadingRecords": "تحميل ...",
            "processing": "معالجة ...",
            "search": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
            "zeroRecords": "لا توجد مطابقة",
            "paginate": {
                "first": "First",
                "last": "Last",
                "next": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
                "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'
            },
            "aria": {
                "sortAscending": ": activate to sort column ascending",
                "sortDescending": ": activate to sort column descending"
            }
        },
        "lengthMenu": [10, 25, 50, 100],
        "pageLength": 10
    });

    multiCheck(c1);
</script>
@push('css')
    <style>
        .dataTables_length {
            display: inline-block;
            float: right;
        }

        .dt-buttons {
            display: inline-block;
            margin-right: 30px;
        }

        .dataTables_filter {
            display: inline-block;
            float: left;
        }
        .dataTables_paginate{
            float: left;
        }
    </style>
@endpush
