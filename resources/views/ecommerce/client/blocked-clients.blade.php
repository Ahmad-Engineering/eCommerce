@extends('ecommerce.index')

@section('page-title', 'Blocked Clients')

@section('styles')
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description"
        content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>DataTables - Vuexy - Bootstrap HTML admin template</title>
    <link rel="apple-touch-icon" href="/app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="/app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600"
        rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('ecommerce/app-assets/vendors/css/vendors.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('ecommerce/app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('ecommerce/app-assets/vendors/css/tables/datatable/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('ecommerce/app-assets/vendors/css/tables/datatable/buttons.bootstrap5.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('ecommerce/app-assets/vendors/css/tables/datatable/rowGroup.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('ecommerce/app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css') }}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('ecommerce/app-assets/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('ecommerce/app-assets/css/bootstrap-extended.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('ecommerce/app-assets/css/colors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('ecommerce/app-assets/css/components.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('ecommerce/app-assets/css/themes/dark-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('ecommerce/app-assets/css/themes/bordered-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('ecommerce/app-assets/css/themes/semi-dark-layout.css') }}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('ecommerce/app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('ecommerce/assets/css/style.css') }}">
    <!-- END: Custom CSS-->
@endsection

@section('content')
    <section id="multilingual-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header border-bottom">
                        <h4 class="card-title">Blocked Clients</h4>
                    </div>
                    <div class="card-datatable">
                        <div id="DataTables_Table_3_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                            <div class="d-flex justify-content-between align-items-center mx-0 row">
                                <div class="col-sm-12 col-md-6">
                                    <div class="dataTables_length" id="DataTables_Table_3_length"><label>Show <select
                                                name="DataTables_Table_3_length" aria-controls="DataTables_Table_3"
                                                class="form-select">
                                                <option value="7">7</option>
                                                <option value="10">10</option>
                                                <option value="25">25</option>
                                                <option value="50">50</option>
                                                <option value="75">75</option>
                                                <option value="100">100</option>
                                            </select> entries</label></div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div id="DataTables_Table_3_filter" class="dataTables_filter"><label>Search:<input
                                                type="search" class="form-control" placeholder=""
                                                aria-controls="DataTables_Table_3"></label></div>
                                </div>
                            </div>
                            <table class="dt-multilingual table dataTable no-footer dtr-column" id="DataTables_Table_3"
                                role="grid" aria-describedby="DataTables_Table_3_info">
                                <thead>
                                    <tr role="row">
                                        <th class="control sorting_disabled sorting_asc" rowspan="1" colspan="1"
                                            style="width: 17.0781px; display: none;" aria-label=""></th>
                                        <th>
                                            No.
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_3"
                                            rowspan="1" colspan="1" style="width: 77.2656px;"
                                            aria-label="Name: activate to sort column ascending">Name</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_3"
                                            rowspan="1" colspan="1" style="width: 79.7969px;"
                                            aria-label="Email: activate to sort column ascending">Email</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_3"
                                            rowspan="1" colspan="1" style="width: 70.8281px;"
                                            aria-label="Date: activate to sort column ascending">Blocked Date</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_3"
                                            rowspan="1" colspan="1" style="width: 94.2812px;"
                                            aria-label="Salary: activate to sort column ascending">Phone</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_3"
                                            rowspan="1" colspan="1" style="width: 90.875px;"
                                            aria-label="Status: activate to sort column ascending">Location</th>
                                        <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 100.656px;"
                                            aria-label="Actions">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($clients as $client)
                                        <tr>
                                            <td>{{ $no }}</td>
                                            <td>{{ $client->name }}</td>
                                            <td>{{ $client->email }}</td>
                                            <td>{{ $client->updated_at }}</td>
                                            <td>{{ $client->phone }}</td>
                                            <td>{{ $client->location }}</td>
                                            <td>
                                                <div class="dropdown">
                                                    <button type="button"
                                                        class="btn btn-sm dropdown-toggle hide-arrow waves-effect waves-float waves-light"
                                                        data-bs-toggle="dropdown">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                            class="feather feather-more-vertical">
                                                            <circle cx="12" cy="12" r="1"></circle>
                                                            <circle cx="12" cy="5" r="1"></circle>
                                                            <circle cx="12" cy="19" r="1"></circle>
                                                        </svg>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="#" id="Link" onclick="unblockClient({{$client->id}})">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                                fill="currentColor" class="bi bi-arrow-return-left"
                                                                viewBox="0 0 16 16">
                                                                <path fill-rule="evenodd"
                                                                    d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z" />
                                                            </svg>
                                                            <span>Un-Blocked</span>
                                                        </a>
                                                        <a class="dropdown-item" id="Link" href="#"
                                                            onclick="confirmDestroy({{ $client->id }}, this)">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                                stroke-width="2" stroke-linecap="round"
                                                                stroke-linejoin="round" class="feather feather-trash me-50">
                                                                <polyline points="3 6 5 6 21 6"></polyline>
                                                                <path
                                                                    d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                                </path>
                                                            </svg>
                                                            <span>Delete</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @php
                                            ++$no;
                                        @endphp
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-between mx-0 row">
                                <div class="col-sm-12 col-md-6">
                                    <div class="dataTables_info" id="DataTables_Table_3_info" role="status"
                                        aria-live="polite">Showing 0 to 0 of 0 entries</div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_3_paginate">
                                        <ul class="pagination">
                                            <li class="paginate_button page-item previous disabled"
                                                id="DataTables_Table_3_previous"><a href="#"
                                                    aria-controls="DataTables_Table_3" data-dt-idx="0" tabindex="0"
                                                    class="page-link">&nbsp;</a></li>
                                            <li class="paginate_button page-item next disabled"
                                                id="DataTables_Table_3_next"><a href="#" aria-controls="DataTables_Table_3"
                                                    data-dt-idx="1" tabindex="0" class="page-link">&nbsp;</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    {{-- Delete Client --}}
    <script>
        function confirmDestroy(id, refranec) {
            Swal.fire({
                title: 'You\'re close to delete client, are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    destroy(id, refranec);
                }
            });
        }

        function destroy(id, refranec) {
            // admin/client/{client}
            axios.delete('/admin/client/' + id)
                .then(function(response) {
                    // handle success
                    console.log(response);
                    refranec.closest('tr').remove();
                    location.reload();
                    showDeletingResult(response.data);
                })
                .catch(function(error) {
                    // handle error
                    console.log(error);
                    showDeletingResult(error.response.data);
                })
                .then(function() {
                    // always executed
                });
        }

        function showDeletingResult(data) {
            Swal.fire({
                icon: data.icon,
                title: data.title,
                text: data.text,
                showConfirmButton: false,
                timer: 2000
            });
        }

        // Un-Block Client Function
        function unblockClient(id) {
            // admin/client
            axios.put('/admin/unblock-client/' + id + '/client')
                .then(function(response) {
                    // handle success
                    console.log(response);
                    toastr.success(response.data.message);
                    location.reload();
                })
                .catch(function(error) {
                    // handle error
                    console.log(error);
                    toastr.error(error.response.data.message)
                })
                .then(function() {
                    // always executed
                });
        }
    </script>
@endsection
