@extends('ecommerce.index')

@section('page-title', 'Add Branch')

@section('content')
    <section id="floating-label-input">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add New Branch</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 mb-1">
                                <p>
                                    Start creating your branches to start buying your goods with <code>
                                        @php
                                            $username = explode('@', auth('admin')->user()->email);
                                            echo $username[0];
                                        @endphp
                                    </code> user.
                                </p>
                            </div>
                            <div class="col-sm-6 col-12 mb-1 mb-sm-0">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="branch_name"
                                        placeholder="Like For Clothes">
                                    <label for="branch_name">Branch Name</label>
                                </div>
                            </div>
                            <div class="col-sm-6 col-12 mb-1 mb-sm-0">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="branch_address"
                                        placeholder="Enter Your Branch Address">
                                    <label for="branch_address">Branch Address</label>
                                </div>
                            </div>
                            <span style="padding: 15px;"></span>
                            <div class="col-sm-6 col-12 mb-1 mb-sm-0">
                                <div class="form-floating">
                                    <input type="number" class="form-control" id="goods_number" placeholder="1000">
                                    <label for="goods_number">Goods Piece Number</label>
                                </div>
                            </div>
                            <div class="col-sm-6 col-12 mb-1 mb-sm-0">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="branch_type"
                                        placeholder="Enter Your Branch Type">
                                    <label for="branch_type">Branch Type</label>
                                </div>
                            </div>

                            <span style="padding: 15px;"></span>
                            <button
                                class="btn btn-primary waves-effect waves-float waves-light col-sm-2 col-12 mb-1 mb-sm-0"
                                style="margin-left: 15px;" type="button" onclick="store()">Submit</button>
                            {{-- <div class="col-sm-6 col-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="floating-label-disable"
                                    placeholder="Label-placeholder" disabled="">
                                <label for="floating-label-disable">Disabled-placeholder</label>
                            </div>
                        </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    {{-- Add Branch  --}}
    <script>
        function store() {
            // admin/contract-type
            axios.post('/admin/branch', {
                    branch_name: document.getElementById('branch_name').value,
                    branch_address: document.getElementById('branch_address').value,
                    goods_number: document.getElementById('goods_number').value,
                    branch_type: document.getElementById('branch_type').value,
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