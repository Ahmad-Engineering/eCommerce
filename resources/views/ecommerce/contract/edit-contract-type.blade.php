@extends('ecommerce.index')

@section('page-title', 'Edit ' . $contractType->type . ' Contract Type')

@section('content')
    <section id="basic-input">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add New Contract Type</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-4 col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="type">Type</label>
                                    <input type="text" class="form-control" id="type" placeholder="Enter contract type"
                                        value="{{$contractType->type}}"
                                    >
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="status">Basic Select</label>
                                    <select class="form-select" id="status">
                                        <option value="active"
                                            @if ($contractType->status)
                                                selected
                                            @endif
                                        >Active</option>
                                        <option value="pending"
                                        @if (!$contractType->status)
                                            selected
                                        @endif
                                        >Pending</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6 col-12">
                                <label class="form-label" for="disabledInput">Contract Manager</label>
                                <p class="form-control-static" id="staticInput">{{ auth('admin')->user()->email }}</p>
                            </div>
                            <div style="margin-top: 20px"></div>
                            <div class="col-xl-2 col-md-6 col-12">
                                <button class="btn btn-primary waves-effect waves-float waves-light"
                                    type="button" onclick="update({{$contractType->id}})">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


@section('scripts')
    {{-- Add contractType --}}
    <script>
        function update(id) {
            // admin/contract-type/{contract_type}
            axios.put('/admin/contract-type/' + id, {
                    type: document.getElementById('type').value,
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
