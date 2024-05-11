@extends('layouts.app')

@push('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
@endpush

@section('breadcrumb')
    <h4 class="mb-sm-0">QRIS Transaction</h4>
    <div class="page-title-right">
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item"><a href="">Transaction</a></li>
            <li class="breadcrumb-item active">QRIS Transaction</li>
        </ol>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">QRIS Transaction List</h5>
                </div>
                <div class="card-body">
                    <table id="table" class="table table-bordered dt-responsive nowrap table-striped align-middle"
                        style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Ref</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Amount</th>
                                <th class="text-center">Transaction Method</th>
                                <th class="text-center">Last Updated</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <!--datatable js-->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>

    <script>
        var table = $('#table').DataTable({
            "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
                "<'table-responsive'tr>" +
                "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
            "oLanguage": {
                "oPaginate": {
                    "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
                    "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'
                },
                "sInfo": "Showing page _PAGE_ of _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
                "sLengthMenu": "Results :  _MENU_",
            },
            processing: true,
            serverSide: true,
            ajax: "{{ route('qris.index') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    className: 'text-center',
                    orderable: false,
                    searchable: false

                },
                {
                    data: 'ref',
                    name: 'ref',
                    width: '20%'
                },
                {
                    data: 'status',
                    name: 'status',
                    width : '15%',
                    render: function(data, type, row, meta) {
                        var badgeClass;
                        switch (data) {
                            case 'completed':
                                badgeClass = 'badge bg-success';
                                break;
                            case 'failed':
                                badgeClass = 'badge bg-danger';
                                break;
                            case 'pending':
                                badgeClass = 'badge bg-warning';
                                break;
                            default:
                                badgeClass = 'badge bg-secondary';
                                break;
                        }
                        return '<span class="' + badgeClass + '">' + data + '</span>';
                    }
                },
                {
                    data: 'amount',
                    name: 'amount',
                    width : '15%',
                    render: function(data, type, row, meta) {
                        return 'Rp. ' + data.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                    }
                },
                {
                    data: 'transaction_method_id',
                    name: 'transaction_method_id',
                    className: 'text-center',
                    width : '15%',
                    render: function(data, type, row, meta) {
                        if (data == 1) {
                            return 'QRIS';
                        }
                    }
                },
                {
                    data: 'updated_at',
                    name: 'updated_at',
                    width : '15%',
                    render: function(data, type, row, meta) {
                        var date = new Date(data);

                        var formattedDate = date.toLocaleString('id-ID', {
                            weekday: 'short',
                            day: '2-digit',
                            month: 'short',
                            year: 'numeric',
                            hour: 'numeric',
                            minute: '2-digit',
                            timeZone: 'Asia/Jakarta'
                        });

                        return formattedDate;
                    }
                },
                {
                    data: 'id',
                    orderable: false,
                    searchable: false,
                    className: 'text-center',
                    render: function(data, type, row, meta) {
                        var detailUrl = "{{ route('qris.show', ':id') }}";
                        detailUrl = detailUrl.replace(':id', data);
                        return `
                                <div class="dropdown d-inline-block">
                                            <button class="btn btn-soft-secondary btn-sm dropdown" type="button"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="ri-more-fill align-middle"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li><a href="${detailUrl}" class="dropdown-item"><i
                                                            class="ri-eye-fill align-bottom me-2 text-muted"></i> Detail</a>
                                                </li>
                                                <li><a class="dropdown-item edit-item-btn" href=""><i
                                                            class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a>
                                                </li>
                                            </ul>
                                        </div>
                                `;
                    }
                },
            ],
            order: [
                [1, 'desc']
            ],
            language: {
                searchPlaceholder: 'Search...',
                sSearch: '',
                lengthMenu: 'Result : _MENU_',
            },
        });
    </script>
@endpush
