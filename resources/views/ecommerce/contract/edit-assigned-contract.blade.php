@extends('ecommerce.index')

@section('page-title', 'Edit ' . $contract->title)

@section('styles')
    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('ecommerce/app-assets/vendors/css/vendors.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('ecommerce/app-assets/vendors/css/pickers/pickadate/pickadate.css') }}">
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
    <link rel="stylesheet" type="text/css"
        href="{{ asset('ecommerce/app-assets/css/plugins/forms/pickers/form-flat-pickr.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('ecommerce/app-assets/css/plugins/forms/pickers/form-pickadate.css') }}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('ecommerce/assets/css/style.css') }}">
    <!-- END: Custom CSS-->
@endsection

@section('content')
    <section id="basic-input">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit {{$contract->title}} Contract</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-4 col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="title">Title</label>
                                    <input type="text" class="form-control" id="title" placeholder="Contract Title"
                                    value="{{$contract->title}}">
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="price">Price</label>
                                    <input type="number" class="form-control" id="price" placeholder="Enter Contract Price"
                                    value="{{$contract->price}}">
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="tax_no">Tax No.</label>
                                    <input type="text" class="form-control" id="tax_no" value="%0.5" readonly>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="status">Status</label>
                                    <select class="form-select" id="status">
                                        <option value="active"
                                            @if ($contract->status)
                                                selected
                                            @endif
                                        >Active</option>
                                        <option value="blocked"
                                        @if (!$contract->status)
                                            selected
                                        @endif
                                        >Pending</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6 col-12 mb-1 mb-md-0">
                                <div class="col-md-12 mb-1">
                                    <label class="form-label" for="from_date">From Date</label>
                                    <input type="text" id="from_date" class="form-control flatpickr-basic flatpickr-input"
                                        placeholder="YYYY-MM-DD" readonly="readonly" value="{{$contract->from_date}}">
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6 col-12 mb-1 mb-md-0">
                                <div class="col-md-12 mb-1">
                                    <label class="form-label" for="to_date">To Date</label>
                                    <input type="text" id="to_date" class="form-control flatpickr-basic flatpickr-input"
                                        placeholder="YYYY-MM-DD" readonly="readonly" value="{{$contract->to_date}}">
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="client">Clients</label>
                                    <select class="form-select" id="client">
                                        @foreach ($clients as $client)
                                            <option value="{{ $client->id }}"
                                                    @if ($client->id == $contract->client_id)
                                                        selected
                                                    @endif
                                                >{{ $client->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="contract_type">Contract Type</label>
                                    <select class="form-select" id="contract_type">
                                        @foreach ($contract_types as $contract_type)
                                            <option value="{{ $contract_type->id }}"
                                                    @if ($contract_type->id == $contract->contract_type_id)
                                                        selected
                                                    @endif
                                                >{{ $contract_type->type }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6 col-12">
                                <label class="form-label" for="disabledInput">Contract Manager</label>
                                <p class="form-control-static" id="staticInput">{{ auth('admin')->user()->name }}</p>
                            </div>
                            <div class="col-xl-4 col-md-6 col-12">
                                <button class="btn btn-primary waves-effect waves-float waves-light"
                                    type="button" onclick="update({{$contract->id}})">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


@section('scripts')
    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('ecommerce/app-assets/vendors/js/vendors.min.js') }}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('ecommerce/app-assets/vendors/js/pickers/pickadate/picker.js') }}"></script>
    <script src="{{ asset('ecommerce/app-assets/vendors/js/pickers/pickadate/picker.date.js') }}"></script>
    <script src="{{ asset('ecommerce/app-assets/vendors/js/pickers/pickadate/picker.time.js') }}"></script>
    <script src="{{ asset('ecommerce/app-assets/vendors/js/pickers/pickadate/legacy.js') }}"></script>
    <script src="{{ asset('ecommerce/app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js') }}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('ecommerce/app-assets/js/core/app-menu.js') }}"></script>
    <script src="{{ asset('ecommerce/app-assets/js/core/app.js') }}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{ asset('ecommerce/app-assets/js/scripts/forms/pickers/form-pickers.js') }}"></script>
    <!-- END: Page JS-->

    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script>

    {{-- Add contractType --}}
    <script>
        function update(id) {
            // admin/contract/{contract_id}
            axios.put('/admin/contract/' + id, {
                    title: document.getElementById('title').value,
                    price: document.getElementById('price').value,
                    status: document.getElementById('status').value,
                    from_date: document.getElementById('from_date').value,
                    to_date: document.getElementById('to_date').value,
                    client_id: document.getElementById('client').value,
                    contract_type_id: document.getElementById('contract_type').value,
                })
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
