@extends('ecommerce.index')

@section('page-title', 'Stores')

@section('content')
    <div class="row" id="basic-table">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Stores</h4>
                </div>
                <div class="card-body">
                    <p class="card-text">
                        You can contracted with your client with this store as
                        <code>
                            @php
                                $username = explode('@', auth('admin')->user()->email);
                            @endphp
                            {{ $username[0] }}
                        </code> username.
                    </p>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Store</th>
                                <th>Goods</th>
                                <th>Price per unit</th>
                                <th>Offer</th>
                                <th>Price after offer</th>
                                <th>Settings</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($stores as $store)
                                <tr>
                                    <td>
                                        {{ $no }}
                                    </td>
                                    <td>
                                        {{ $store->name }}
                                    </td>
                                    <td>
                                        {{ $store->amount }}
                                    </td>
                                    <td>
                                        {{ $store->price }}
                                    </td>
                                    <td>
                                        {{ '%' . $store->offer }}
                                    </td>
                                    <td>
                                        {{ $store->price_after_offer }}
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button"
                                                class="btn btn-sm dropdown-toggle hide-arrow waves-effect waves-float waves-light"
                                                data-bs-toggle="dropdown">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-more-vertical">
                                                    <circle cx="12" cy="12" r="1"></circle>
                                                    <circle cx="12" cy="5" r="1"></circle>
                                                    <circle cx="12" cy="19" r="1"></circle>
                                                </svg>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{ route('store.edit', $store->id) }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-edit-2 me-50">
                                                        <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                                        </path>
                                                    </svg>
                                                    <span>Edit</span>
                                                </a>
                                                <a class="dropdown-item" id="Link" href="#"
                                                    onclick="confirmDestroy({{ $store->id }}, this)">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-trash me-50">
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
                </div>
            </div>
        </div>
    </div>
@endsection


@section('scripts')
        {{-- Delete Store --}}
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
                // admin/store/{store}
                axios.delete('/admin/store/' + id)
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
        </script>
@endsection
