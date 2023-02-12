@extends('partials.layout')
@section('title', 'Lista Point')
@section('page-title', 'Lista Point')
@section('content')
<!-- Side Bar principale -->
@include('partials.sidebar')
<!-- Content -->
<section id="page-content" class="col px-0 pb-5 mb-5 pb-lg-4 mb-lg-0">

    <div class="form-group col-auto ml-2">
        <a href="{{route('services.create')}}"
           class="btn btn-sm btn-icon btn-outline-secondary px-3" title="Crea Servizio">

            <span class="d-none d-md-inline">Crea Servizio</span>
        </a>
    </div>
    <!--CONTENUTO DELLA PAGINA-->
    <div class="px-3">
        <section class="card no-after shadow-y0 bg-white rounded">
            <header class="sr-only">
                <h2>Lista point</h2>
            </header>
            <div class="py-4">
                <div class="row">
                    <div class="col mb-4 mb-xl-0 order-0 order-xl-1">
                        <div id="dt-toolbar" class="btn-toolbar border-bottom border-bottom-xl-0 border-light px-4 pb-4 pb-xl-0">
                            <div class="form-group form-boxed form-boxed-outline mb-0 mr-auto ml-xl-auto mr-xl-0 order-0 order-xl-1">
                                <div class="bootstrap-select-wrapper">
                                    <label class="sr-only">Righe record</label>
                                    <div class="input-group">
                                        <select id="dt-length" class="order-1">
                                            <option value="25">25</option>
                                            <option value="50">50</option>
                                            <option value="100">100</option>
                                            <option value="-1">Tutti</option>
                                        </select>
                                        <div class="input-group-prepend order-0">
                                            <span class="input-group-text text-primary small pl-3">Righe:</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <table id="data-table" class="table table-striped table-hover table-sm w-100 service_datatable">
                <thead>
                <tr class="text-muted">
                    <th scope="col" class="text-secondary px-4 text-uppercase">Nome</th>
                    <th scope="col" class="text-secondary px-4 text-uppercase">Descrizione</th>

                    <th scope="col" class="fit"><span class="sr-only">Azioni</span></th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
            <!-- /contenuto pagina -->
        </section>
    </div>
</section>
@endsection
{{-- Extra CSS File --}}
@push('css')
@endpush
{{-- Extra JS File --}}
@push('script')
<script type="text/javascript">
    $(function () {
      var table = $('.service_datatable').DataTable({
        processing: true,
        pageLength: 25,
        deferRender: true,
        "scrollX": true,
        "scrollY": false,
        scrollCollapse: true,
        serverSide: true,
        "dom": '<"table-responsive" rt ><"bottom d-flex flex-column flex-md-row-reverse justify-content-md-between" <"d-flex justify-content-center justify-content-md-right align-items-center p-4" p> <"d-flex justify-content-center justify-content-md-left align-items-center px-4 pb-4 pt-md-4" i> ><"clear">',
        ajax: "{{ route('services.index') }}",
        columnDefs : [
                { className: "pl-4", targets: [0]},
                { className: "pl-4", targets: [1]},
                { className: "py-0 pl-0 text-right fit", targets: [2]},
            ],
        columns: [
                //{ data: 'id', name: 'id' },
                { data: 'service_name', name:'service_name'},
                { data: 'service_desc', name:'service_desc'},

                { data: 'action', orderable:false, name:'action'},
            ],
        language: {
                "sEmptyTable": "{{__('pagination.data')}}",
                "sInfo": "{{__('pagination.info')}}",
                "sInfoEmpty": "{{__('pagination.info_empty')}} ",
                "sInfoFiltered": "{{__('pagination.info_filtered')}}",
                "sInfoPostFix": "",
                "sInfoThousands": ".",
                "sLoadingRecords": "<div class =\"progress-spinner progress-spinner-active\"><span class=\"sr-only\">{{__('pagination.loading')}}</span></div>",
                "sProcessing": "<div class =\"progress-spinner progress-spinner-active\"><span class=\"sr-only\">{{__('pagination.processing')}}</span></div>",
                "sZeroRecords": "{{__('pagination.zero_records')}}",
                "oPaginate": {
                    "sFirst": "{{__('pagination.first')}}",
                    "sPrevious": '<svg class="icon icon-sm"><use xlink:href="{{asset('svg/sprite.svg#it-arrow-left')}}"></use></svg><span class="sr-only">{{__('pagination.previous')}}</span>',
                    "sNext": '<svg class="icon icon-sm"><use xlink:href="{{asset('svg/sprite.svg#it-arrow-right')}}"></use></svg><span class="sr-only">{{__('pagination.next')}}</span>',
                    "sLast": "{{__('pagination.last')}}"
                },
                "oAria": {
                    "sSortAscending": "{{__('pagination.sort_asc')}}",
                    "sSortDescending": "{{__('pagination.sort_des')}}"
                },
                select: {
                    style:    'os',
                    selector: 'td:first-child'
                },
            },
      });
    });
  </script>
@endpush
