@extends('layouts.backend')

@push('styles')
    <link href="{{ asset('css/backend/datatables.min.css') }}" rel="stylesheet"  />

    <style>
    </style>
@endpush
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col -md-12">
                    <a class="btn btn-success btn-sm" href="{{route('dashboard')}}">
                        Dashboard
                        <i class="fa fa-backward"></i>
                    </a>
                    {{--<a class="btn btn-success btn-sm" href="{{route('create_sub')}}">
                        Create Subscriber
                        <i class="fa fa-plus-circle"></i>
                    </a>--}}
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    {{--<h6 class="text-center text-uppercase">Use the options below to filter data accordingly</h6>
                    <table border="0" cellspacing="5" cellpadding="5" class="table table-striped table-bordered">
                        <tbody>
                        <tr>
                            <td>
                                <label for="name">Name</label>
                                <input type="text" class="form-control custom_searcher" id="name" name="name">
                            </td>
                            <td>
                                <label for="contact_number">Contact</label>
                                <input type="text" class="form-control custom_searcher" id="contact_number" name="contact_number">
                            </td>
                            <td>
                                <label for="digester_size_name">Digester Size</label>
                                <input type="text" class="form-control custom_searcher" id="digester_size_name" name="digester_size_name">
                            </td>
                            <td>
                                <label for="initial_loan_amount">Initial Loan</label>
                                <input type="text" class="form-control custom_searcher" id="initial_loan_amount" name="initial_loan_amount">
                            </td>
                            <td>
                                <label for="current_loan_amount">Loan Bal</label>
                                <input type="text" class="form-control custom_searcher" id="current_loan_amount" name="current_loan_amount">
                            </td>
                            <td>
                                <label for="agreed_monthly_amount">Monthly Amnt</label>
                                <input type="text" class="form-control custom_searcher" id="agreed_monthly_amount" name="agreed_monthly_amount">
                            </td>
                        </tr>
                        </tbody>
                    </table>--}}
                    <table id="main_grid" class="table table-striped table-bordered table-hover table-condensed" cellspacing="0" width="100%" style="overflow-x:hidden">
                        <thead>
                        <tr class="success">
                            <th>T</th>
                            <th>F.Name</th>
                            <th>L.Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Country</th>
                            <th>City</th>
                            <th>Company</th>
                            <th>Expertise</th>
                            <th>Experience</th>
                            {{--<th class="last"></th>--}}
                        </tr>
                        </thead>

                        <tbody>
                        </tbody>
                    </table>

                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection

@push('scripts')
    <script src="{{ URL::asset('js/backend/datatables.min.js') }}" ></script>
    <script>
        $(document).ready(function () {

            dataTable = $('#main_grid').DataTable({
                // orderCellsTop: true,
                "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
                fixedHeader: true,
                ajax: {
                    url: '{!! route("subscribers") !!}',
                    data: function (d) {

                        /*d.name                  = $('#name').val();
                        d.contact_number        = $('#contact_number').val();
                        d.digester_size_name         = $('#digester_size_name').val();
                        d.initial_loan_amount   = $('#initial_loan_amount').val();
                        d.current_loan_amount   = $('#current_loan_amount').val();
                        d.agreed_monthly_amount = $('#agreed_monthly_amount').val();*/

                    }
                },
                dom:
                    "<'row table-controls'"+
                    "<'col-sm-4 col-md-8 page-length'l>"+
                    "<'col-sm-4 col-md-2 delete_rows'>"+
                    "<'col-sm-4 col-md-2 export'B>>"+
                    "<'row'"+
                    "<'col-md-12'rt>>"+
                    "<'row space-up-10 after_table'"+
                    "<'col-md-7 table_info_pad'i>"+
                    "<'col-md-5'p>>",
                processing: true,
                serverSide: true,
                scrollX:true,
                "bSort": false,
                language: {
                    "search" : "",
                    "emptyTable": "There is no subscriber data present."
                },
                // "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, 100, 200, "All"]],
                select: {
                    style: 'multi',
                    style:    'os',
                    // selector: 'td:first-child'
                },
                // Put the data route here
                type:"POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                "columns": [
                    /*{
                        "className":      'details-control',
                        "orderable":      false,
                        "searchable":      false,
                        "data":           null,
                        "defaultContent": '',
                        'width' : '3%'
                    },*/
                    {data: 'salutation', name: 'salutation', "width":"2%"},
                    {data: 'first_name', name: 'first_name'},
                    {data: 'last_name', name: 'last_name'},
                    {data: 'email_address', name: 'email_address'},
                    {data: 'phone_number', name: 'phone_number'},
                    {data: 'country', name: 'country'},
                    {data: 'city', name: 'city'},
                    {data: 'company', name: 'company'},
                    {data: 'field_of_expertise', name: 'field_of_expertise'},
                    {data: 'years_of_experience', name: 'years_of_experience'},
                    /*{data: 'action', name: 'action', orderable: false, searchable: false, "width":"20%"},*/

                ],
                /* buttons: [
                     'copyHtml5',
                     'excelHtml5',
                     'csvHtml5',
                     'pdfHtml5'
                 ],*/
                buttons: [
                    {
                        extend: 'collection',
                        text: 'Export Table',

                        buttons: [
                            {
                                extend: 'excelHtml5',
                                text: 'Export as Excel',
                                title: 'Gustoven Subscribers',
                                exportOptions: {
                                    columns: [0,1,2,3,4,5,6,7,8,9],
                                    // columns: ':visible',
                                    orthogonal: 'excel',
                                    modifier: {
                                        order: 'current',
                                        page: 'all',
                                        selected: null
                                    }
                                }
                            },

                            {
                                extend: 'csvHtml5',
                                text: 'Export as CSV',
                                title: 'Gustoven Subscribers',
                                exportOptions: {
                                    columns: [0,1,2,3,4,5,6,7,8,9],

                                }
                            },
                            {
                                extend: 'pdfHtml5',
                                text: 'Export as PDF',
                                title: 'Gustoven Subscribers',
                                exportOptions: {
                                    columns: [0,1,2,3,4,5,6,7,8,9],

                                }
                            }
                        ],

                    },
                ],
                "columnDefs": [

                    /*{
                        "render": function ( data, type, row ) {

                            return '<a class="btn btn-info btn-sm custom_button no_rad full_width" id="'+row.id+'" href="/admin/subscriber/view/'+row.id+'" ><i class="fa fa-eye"></i> View</a> <button class="btn btn-danger btn-sm custom_button btn_delete_resource no_rad full_width" id="'+row.id+'" data-toggle="modal"  data-target="#delete_resource" data-uid="'+row.id+'" data-model_name="'+row.model_name+'"><i class="fa fa-times-circle"></i> Delete</button>';

                        },
                        targets: 10
                    },
                    { "searchable": false, "targets": 10 }*/

                ], // end column defs

            }); // End table definition

            /*$( '.custom_searcher' ).on( 'keyup change', function () {

                dataTable.draw();
            } );*/

        }); // end doc ready
    </script>
@endpush
