@extends('ecommerce.index')

@section('page-title', 'Add Product Into Market')

@section('content')
    <section class="tooltip-validations" id="tooltip-validation">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add Product</h4>
                    </div>
                    <div class="card-body">
                        <p>
                            After adding your new product, it'll be visible to buy in the <code>Manarat</code> market.
                        </p>
                        <form class="needs-validation" novalidate="" m>
                            <div class="row g-1">
                                <div class="col-md-6 col-12 mb-3 position-relative">
                                    <label class="form-label" for="product_name">Product Name</label>
                                    <input type="text" class="form-control" id="product_name" placeholder="First name"
                                        value="" required="">
                                    <div class="valid-tooltip">Looks good!</div>
                                </div>
                                <div class="col-md-6 col-12 mb-3 position-relative">
                                    <div class="mb-1">
                                        <label class="form-label" for="store_id">From Store</label>
                                        <select class="form-select" id="store_id">
                                            @foreach ($stores as $store)
                                                <option value="{{ $store->id }}">{{ $store->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="product_image">Upload category image</label>
                                    <input type="file" class="form-control-file" id="product_image"
                                        accept="image/png, image/jpeg, image/jpg">
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="status" value="checked" checked="">
                                    <label class="form-check-label" for="status">Active</label>
                                </div>
                            </div>
                            <div style="margin: 15px;">
                                <button class="btn btn-primary waves-effect waves-float waves-light" type="button"
                                onclick="store()">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    {{-- Add Product --}}
    <script>
        function store() {
            formData = new FormData();
            formData.append('product_name', document.getElementById('product_name').value);
            formData.append('store_id', document.getElementById('store_id').value);
            formData.append('status', document.getElementById('status').checked ? '1' : '0');
            formData.append('product_image', document.getElementById('product_image').files[0]);

            axios.post('/admin/product', formData)
                .then(function(response) {
                    // handle success
                    console.log(response);
                    toastr.success(response.data.message);
                    window.location.reload();
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
