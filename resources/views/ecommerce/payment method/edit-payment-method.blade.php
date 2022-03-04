@extends('ecommerce.index')

@section('page-title', 'Edit ' . $paymentMethod->name)

@section('content')
    <div class="row match-height">
        <div class="col-md-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit {{ $paymentMethod->name }} Payment Method</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <p class="card-text">
                                Edit your payment method to start use it.
                            </p>
                            <div class="mb-1">
                                <label class="form-label" for="name">Name</label>
                                <input id="name" class="form-control form-control-lg" type="text"
                                    placeholder="Like: Credit Card" value="{{ $paymentMethod->name }}">
                            </div>
                            <div class="mb-1">
                                <label class="form-label" for="status">Status</label>
                                <select class="form-select" id="status">
                                    <option value="active"
                                        @if ($paymentMethod->status)
                                            selected
                                        @endif
                                    >Active</option>
                                    <option value="blocked"
                                    @if (!$paymentMethod->status)
                                        selected
                                    @endif
                                    >Blocked</option>
                                </select>
                            </div>
                            <button class="btn btn-primary waves-effect waves-float waves-light"
                                onclick="update({{ $paymentMethod->id }})" type="button">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    {{-- Update Payment Method --}}
    <script>
        function update(id) {
            // admin/payment-method/{payment-method}
            axios.put('/admin/payment-method/' + id, {
                    name: document.getElementById('name').value,
                    status: document.getElementById('status').value,
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
