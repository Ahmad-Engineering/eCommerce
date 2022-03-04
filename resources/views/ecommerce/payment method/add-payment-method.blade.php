@extends('ecommerce.index')

@section('page-title', 'Add New Payment Method')

@section('content')
    <div class="row match-height">
        <div class="col-md-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Add Payment Method</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <p class="card-text">
                                You can add new payment method, and use this method after submit
                            </p>
                            <div class="mb-1">
                                <label class="form-label" for="name">Name</label>
                                <input id="name" class="form-control form-control-lg" type="text"
                                    placeholder="Like: Credit Card">
                            </div>
                            <button class="btn btn-primary waves-effect waves-float waves-light"
                                onclick="store()"
                                type="button">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    {{-- Add contractType --}}
    <script>
        function store() {
            // admin/payment-method
            axios.post('/admin/payment-method', {
                    name: document.getElementById('name').value,
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
