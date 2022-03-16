@extends('ecommerce.index')

@section('page-title', 'Edit ' . $product->name)

@section('content')
    <section class="tooltip-validations" id="tooltip-validation">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit {{ $product->name }} Product</h4>
                    </div>
                    <div class="card-body">
                        <p>
                            After editing your product, you can use the new informations for this product.<br>
                            <code>note.</code> You cannot add new image to your product.<br>
                            <code>note.</code> To change product price, change the price from the store you're have.
                        </p>
                        <form class="needs-validation" novalidate="">
                            <div class="row g-1">
                                <div class="col-md-6 col-12 mb-3 position-relative">
                                    <label class="form-label" for="product_name">Product Name</label>
                                    <input type="text" class="form-control" id="product_name" placeholder="Product name"
                                        value="{{ $product->name }}" required="">
                                    <div class="valid-tooltip">Looks good!</div>
                                </div>
                                <div class="col-md-6 col-12 mb-3 position-relative">
                                    <div class="mb-1">
                                        <label class="form-label" for="store_id">From Store</label>
                                        <select class="form-select" id="store_id">
                                            @foreach ($stores as $store)
                                                <option value="{{ $store->id }}"
                                                    @if ($product->store_id == $store->id) selected @endif>{{ $store->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="status" value="checked" checked="">
                                    <label class="form-check-label" for="status">Active</label>
                                </div>
                            </div>
                            <div style="margin: 15px;">
                                <button class="btn btn-primary waves-effect waves-float waves-light" type="button"
                                    onclick="update({{ $product->id }})">Submit</button>
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
        function update(id) {
            // formData = new FormData();
            // formData.append('product_name', document.getElementById('product_name').value);
            // formData.append('store_id', document.getElementById('store_id').value);
            // formData.append('status', document.getElementById('status').checked ? '1' : '0');
            // formData.append('product_image', document.getElementById('product_image').files[0]);

            // admin/product/{product}
            axios.put('/admin/product/' + id, {
                product_name: document.getElementById('product_name').value,
                store_id: document.getElementById('store_id').value,
                status: document.getElementById('status').checked,
            })
                .then(function(response) {
                    // handle success
                    console.log(response);
                    toastr.success(response.data.message);
                    // window.location.reload();
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
