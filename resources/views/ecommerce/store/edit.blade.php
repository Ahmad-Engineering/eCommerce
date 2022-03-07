@extends('ecommerce.index')


@section('page-title', 'Edit ' . $store->name . ' Store')


@section('content')
    <section id="floating-label-input">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit {{ $store->name }} Store</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            {{-- <div class="col-12 mb-1">
                                <p>
                                    Start creating your stores to assign contract with <code>
                                        @php
                                            $username = explode('@', auth('admin')->user()->email);
                                            echo $username[0];
                                        @endphp
                                    </code> user.
                                </p>
                            </div> --}}
                            <div class="col-sm-6 col-12 mb-1 mb-sm-0">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="store_name"
                                        placeholder="Like For Clothes" value="{{$store->name}}">
                                    <label for="store_name">Store Name</label>
                                </div>
                            </div>
                            <div class="col-sm-6 col-12 mb-1 mb-sm-0">
                                <div class="form-floating">
                                    <input type="number" class="form-control" id="goods_amount" placeholder="1000" value="{{$store->amount}}">
                                    <label for="goods_amount">Goods Amount</label>
                                </div>
                            </div>
                            <span style="padding: 15px;"></span>
                            <div class="col-sm-6 col-12 mb-1 mb-sm-0">
                                <div class="form-floating">
                                    <input type="number" class="form-control" id="piece_price" placeholder="1000" value="{{$store->price}}">
                                    <label for="piece_price">Piece Price</label>
                                </div>
                            </div>
                            <div class="col-sm-6 col-12 mb-1 mb-sm-0">
                                <div class="form-floating">
                                    <input type="number" class="form-control" id="special_offer" placeholder="1000" value="{{$store->offer}}">
                                    <label for="special_offer">Special Offer</label>
                                </div>
                            </div>

                            <span style="padding: 15px;"></span>
                            <button
                                class="btn btn-primary waves-effect waves-float waves-light col-sm-2 col-12 mb-1 mb-sm-0"
                                style="margin-left: 15px;" type="button" onclick="update({{$store->id}})">Submit</button>
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
    {{-- Add Store  --}}
    <script>
        function update(id) {
            // admin/store/{store}
            axios.put('/admin/store/' + id, {
                    store_name: document.getElementById('store_name').value,
                    goods_amount: document.getElementById('goods_amount').value,
                    piece_price: document.getElementById('piece_price').value,
                    special_offer: document.getElementById('special_offer').value,
                })
                .then(function(response) {
                    // handle success
                    console.log(response);
                    toastr.success(response.data.message);
                    window.location.href = '/admin/store';
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
